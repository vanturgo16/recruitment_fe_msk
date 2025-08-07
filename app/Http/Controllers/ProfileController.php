<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

// Traits
use App\Traits\AuditLogsTrait;
use App\Traits\ProfilTrait;

// Model
use App\Models\Candidate;
use App\Models\MainProfile;
use App\Models\EducationInfo;
use App\Models\GeneralInfo;
use App\Models\WorkExpInfo;
use App\Models\JobApplies;
use App\Models\MstDropdowns;

class ProfileController extends Controller
{
    use AuditLogsTrait;
    use ProfilTrait;

    public function index(Request $request)
    {
        $idCandidate = auth()->user()->id_candidate;
        
        $candidate = Candidate::where('id', $idCandidate)->first();
        $mainProfile = MainProfile::where('id_candidate', $idCandidate)->first();
        $generalInfo = GeneralInfo::where('id_candidate', $idCandidate)->first();
        $eduInfo = EducationInfo::where('id_candidate', $idCandidate)->get();
        $workExpInfo = WorkExpInfo::where('id_candidate', $idCandidate)->get();

        // Cannot Edit When Any Apllication In Progress
        $isEditable = !$this->checkApplicationIP($idCandidate);

        $gender = MstDropdowns::where('category', 'Gender')->pluck('name_value');
        $marriageStatus = MstDropdowns::where('category', 'Marriage Status')->pluck('name_value');
        $grade = MstDropdowns::where('category', 'Education')->pluck('name_value');
        $optionYN = MstDropdowns::where('category', 'OptionYN')->pluck('name_value');
        $sourceInfo = MstDropdowns::where('category', 'Source Info')->pluck('name_value');
        $expInfo = MstDropdowns::where('category', 'Exp Info')->pluck('name_value');

        return view('dashboard.profile.index', compact('candidate', 'mainProfile', 'generalInfo', 'eduInfo', 'workExpInfo', 'isEditable',
            'gender', 'marriageStatus', 'grade', 'optionYN', 'sourceInfo', 'expInfo'));
    }

    // MAIN PROFILE
    public function updateMainProfile(Request $request)
    {
        $request->validate([
            'candidate_first_name' => 'required|string|max:25',
            'candidate_last_name'  => 'required|string|max:25',
            'phone'                => 'required|string|max:15',
            'self_photo'           => 'nullable|mimes:jpg,jpeg,png|max:500',
            'cv_path'              => 'nullable|mimes:pdf,jpg,jpeg,png|max:500',
            'id_card_address'      => 'required|string',
            'domicile_address'     => 'required|string',
            'birthplace'           => 'required|string',
            'birthdate'            => 'required|date',
            'gender'               => 'required|string',
            'marriage_status'      => 'required|string',
        ], [
            'candidate_first_name.required' => 'Nama depan wajib diisi.',
            'candidate_first_name.string'   => 'Nama depan harus berupa teks.',
            'candidate_first_name.max'      => 'Nama depan maksimal :max karakter.',
            'candidate_last_name.required'  => 'Nama belakang wajib diisi.',
            'candidate_last_name.string'    => 'Nama belakang harus berupa teks.',
            'candidate_last_name.max'       => 'Nama belakang maksimal :max karakter.',
            'phone.required'                => 'Nomor telepon wajib diisi.',
            'phone.string'                  => 'Nomor telepon harus berupa teks.',
            'phone.max'                     => 'Nomor telepon maksimal :max karakter.',
            // 'self_photo.mimes'              => 'Foto harus berupa file jpg, jpeg, atau png.',
            // 'self_photo.max'                => 'Ukuran foto maksimal 500KB.',
            // 'cv_path.mimes'                 => 'CV harus berupa file pdf, jpg, jpeg, atau png.',
            // 'cv_path.max'                   => 'Ukuran CV maksimal 500KB.',
            'id_card_address.required'      => 'Alamat sesuai KTP wajib diisi.',
            'domicile_address.required'     => 'Alamat domisili wajib diisi.',
            'birthplace.required'           => 'Tempat lahir wajib diisi.',
            'birthdate.required'            => 'Tanggal lahir wajib diisi.',
            'birthdate.date'                => 'Format tanggal lahir tidak valid.',
            'gender.required'               => 'Jenis kelamin wajib diisi.',
            'marriage_status.required'      => 'Status pernikahan wajib diisi.',
        ]);

        $idCandidate = auth()->user()->id_candidate;
        $candidate = Candidate::findOrFail($idCandidate);
        $mainProfile = MainProfile::firstOrNew(['id_candidate' => $idCandidate]);

        $candidate->fill([
            'candidate_first_name' => $request->candidate_first_name,
            'candidate_last_name'  => $request->candidate_last_name,
            'phone'                => $request->phone,
        ]);

        $mainProfile->fill([
            'id_card_address'   => $request->id_card_address,
            'domicile_address'  => $request->domicile_address,
            'birthplace'        => $request->birthplace,
            'birthdate'         => $request->birthdate,
            'gender'            => $request->gender,
            'marriage_status'   => $request->marriage_status,
        ]);

        // $oldSelfPhoto = $mainProfile->exists ? $mainProfile->self_photo : null;
        // $oldCV = $mainProfile->exists ? $mainProfile->cv_path : null;

        // Upload new files
        // if ($request->hasFile('self_photo')) {
        //     $path = $request->file('self_photo');
        //     $selfPhotoPath = $path->move('storage/self_photo', $path->hashName());
        //     $mainProfile->self_photo = $selfPhotoPath;
        // }
        // if ($request->hasFile('cv_path')) {
        //     $path = $request->file('cv_path');
        //     $cvPath = $path->move('storage/cv_path', $path->hashName());
        //     $mainProfile->cv_path = $cvPath;
        // }

        if ($candidate->isDirty() || $mainProfile->isDirty()) {
            DB::beginTransaction();
            try {
                $candidate->save();
                $mainProfile->save();

                $this->auditLogs('Update Data Diri');
                DB::commit();
                // // Delete old files only after commit success
                // if ($request->hasFile('self_photo') && $oldSelfPhoto && file_exists(public_path($oldSelfPhoto))) {
                //     unlink(public_path($oldSelfPhoto));
                // }
                // if ($request->hasFile('cv_path') && $oldCV && file_exists(public_path($oldCV))) {
                //     unlink(public_path($oldCV));
                // }
                return back()->with('success', 'Data berhasil diperbaharui.');
            } catch (\Exception $e) {
                DB::rollBack();
                // // Delete the *new* files if transaction fails
                // if (isset($selfPhotoPath) && file_exists(public_path($selfPhotoPath))) {
                //     unlink(public_path($selfPhotoPath));
                // }
                // if (isset($cvPath) && file_exists(public_path($cvPath))) {
                //     unlink(public_path($cvPath));
                // }
                return back()->with('fail', 'Terjadi kesalahan saat memperbaharui data.');
            }
        }
        return back()->with('info', 'Tidak ada perubahan data.');
    }

    // EDUCATION
    public function addEducation(Request $request)
    {
        $request->validate([
            'edu_grade'        => 'required|string',
            'edu_institution'  => 'required|string',
            'edu_city'         => 'required|string',
            'edu_major'        => 'required|string',
            'edu_start_year'   => 'required|string',
            'edu_end_year'     => 'required|string',
        ], [
            'edu_grade.required'        => 'Jenjang pendidikan wajib diisi.',
            'edu_grade.string'          => 'Jenjang pendidikan harus berupa teks.',
            'edu_institution.required'  => 'Nama institusi wajib diisi.',
            'edu_institution.string'    => 'Nama institusi harus berupa teks.',
            'edu_city.required'         => 'Kota institusi wajib diisi.',
            'edu_city.string'           => 'Kota institusi harus berupa teks.',
            'edu_major.required'        => 'Jurusan wajib diisi.',
            'edu_major.string'          => 'Jurusan harus berupa teks.',
            'edu_start_year.required'   => 'Tahun mulai wajib diisi.',
            'edu_start_year.string'     => 'Tahun mulai harus berupa teks.',
            'edu_end_year.required'     => 'Tahun selesai wajib diisi.',
            'edu_end_year.string'       => 'Tahun selesai harus berupa teks.',
        ]);
        
        $idCandidate = auth()->user()->id_candidate;
        if (EducationInfo::where('id_candidate', $idCandidate)->count() >= 5) {
            return back()->with('fail', 'Tidak dapat menambah data pengalaman kerja lagi (maksimal 5 entri).');
        }

        DB::beginTransaction();
        try {
            EducationInfo::create([
                'id_candidate'    => $idCandidate,
                'edu_grade'       => $request->edu_grade,
                'edu_institution' => $request->edu_institution,
                'edu_city'        => $request->edu_city,
                'edu_major'       => $request->edu_major,
                'edu_start_year'  => $request->edu_start_year,
                'edu_end_year'    => $request->edu_end_year,
            ]);

            $this->auditLogs('Tambah Pendidikan Baru');
            DB::commit();
            return back()->with('success', 'Data berhasil ditambah.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('fail', 'Terjadi kesalahan saat menambah data.');
        }
        
    }
    public function detailEducation($id)
    {
        $id = decrypt($id);
        $data = EducationInfo::findOrFail($id);

        return view('dashboard.profile.education.detail', compact('data'));
    }
    public function editEducation($id)
    {
        $id = decrypt($id);
        $data = EducationInfo::findOrFail($id);
        $grade = MstDropdowns::where('category', 'Education')->pluck('name_value');

        return view('dashboard.profile.education.edit', compact('data', 'grade'));
    }
    public function updateEducation(Request $request, $id)
    {
        $id = decrypt($id);
        $request->validate([
            'edu_grade'        => 'required|string',
            'edu_institution'  => 'required|string',
            'edu_city'         => 'required|string',
            'edu_major'        => 'required|string',
            'edu_start_year'   => 'required|string',
            'edu_end_year'     => 'required|string',
        ], [
            'edu_grade.required'        => 'Jenjang pendidikan wajib diisi.',
            'edu_grade.string'          => 'Jenjang pendidikan harus berupa teks.',
            'edu_institution.required'  => 'Nama institusi wajib diisi.',
            'edu_institution.string'    => 'Nama institusi harus berupa teks.',
            'edu_city.required'         => 'Kota institusi wajib diisi.',
            'edu_city.string'           => 'Kota institusi harus berupa teks.',
            'edu_major.required'        => 'Jurusan wajib diisi.',
            'edu_major.string'          => 'Jurusan harus berupa teks.',
            'edu_start_year.required'   => 'Tahun mulai wajib diisi.',
            'edu_start_year.string'     => 'Tahun mulai harus berupa teks.',
            'edu_end_year.required'     => 'Tahun selesai wajib diisi.',
            'edu_end_year.string'       => 'Tahun selesai harus berupa teks.',
        ]);

        $education = EducationInfo::findOrFail($id);
        $education->fill([
            'edu_grade'       => $request->edu_grade,
            'edu_institution' => $request->edu_institution,
            'edu_city'        => $request->edu_city,
            'edu_major'       => $request->edu_major,
            'edu_start_year'  => $request->edu_start_year,
            'edu_end_year'    => $request->edu_end_year,
        ]);

        if ($education->isDirty()) {
            DB::beginTransaction();
            try {
                EducationInfo::where('id', $id)->update([
                    'edu_grade'       => $request->edu_grade,
                    'edu_institution' => $request->edu_institution,
                    'edu_city'        => $request->edu_city,
                    'edu_major'       => $request->edu_major,
                    'edu_start_year'  => $request->edu_start_year,
                    'edu_end_year'    => $request->edu_end_year,
                ]);

                $this->auditLogs('Update Pendidikan ID: '. $id);
                DB::commit();
                return redirect()->route('profile')->with('success', 'Data berhasil diperbaharui.');
            } catch (\Exception $e) {
                DB::rollBack();
                return back()->with('fail', 'Terjadi kesalahan saat memperbaharui data.');
            }
        }
        return back()->with('info', 'Tidak ada perubahan data.');
    }
    public function deleteEducation($id)
    {
        $id = decrypt($id);

        DB::beginTransaction();
        try {
            EducationInfo::findOrFail($id)->delete();

            $this->auditLogs('Hapus Pendidikan ID: '. $id);
            DB::commit();
            return back()->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('fail', 'Terjadi kesalahan saat menghapus data.');
        }
    }

    // GENERAL INFO
    public function updateGeneralInfo(Request $request)
    {
        $request->validate([
            'illness_history'         => 'required',
            'illness_history_desc'    => 'required_if:illness_history,Yes|string|nullable',
            'criminal_history'        => 'required',
            'criminal_history_desc'   => 'required_if:criminal_history,Yes|string|nullable',
            'mass_org_history'        => 'required',
            'mass_org_history_desc'   => 'required_if:mass_org_history,Yes|string|nullable',
            'training_exp'            => 'required',
            'training_exp_desc'       => 'required_if:training_exp,Yes|string|nullable',
            'source_info'             => 'required|string',
            'experience'              => 'required|string',
        ], [
            'illness_history.required'        => 'Riwayat penyakit harus diisi.',
            'illness_history_desc.required_if' => 'Detail riwayat penyakit harus diisi jika ada.',
            'criminal_history.required'       => 'Riwayat kriminal harus diisi.',
            'criminal_history_desc.required_if' => 'Detail riwayat kriminal harus diisi jika ada.',
            'mass_org_history.required'       => 'Riwayat organisasi massa harus diisi.',
            'mass_org_history_desc.required_if' => 'Detail organisasi massa harus diisi jika ada.',
            'training_exp.required'           => 'Pengalaman pelatihan harus diisi.',
            'training_exp_desc.required_if'   => 'Detail pelatihan harus diisi jika ada.',
            'source_info.required'            => 'Sumber informasi harus diisi.',
            'experience.required'             => 'Pengalaman kerja harus diisi.',
        ]);

        $idCandidate = auth()->user()->id_candidate;
        $generalInfo = GeneralInfo::firstOrNew(['id_candidate' => $idCandidate]);

        $generalInfo->fill([
            'illness_history'        => $request->illness_history,
            'illness_history_desc'   => $request->illness_history_desc,
            'criminal_history'       => $request->criminal_history,
            'criminal_history_desc'  => $request->criminal_history_desc,
            'mass_org_history'       => $request->mass_org_history,
            'mass_org_history_desc'  => $request->mass_org_history_desc,
            'training_exp'           => $request->training_exp,
            'training_exp_desc'      => $request->training_exp_desc,
            'source_info'            => $request->source_info,
            'experience'             => $request->experience,
        ]);

        if ($generalInfo->isDirty()) {
            DB::beginTransaction();
            try {
                $generalInfo->save();

                $this->auditLogs('Update Informasi Tambahan');
                DB::commit();
                return back()->with('success', 'Data berhasil diperbaharui.');
            } catch (\Exception $e) {
                DB::rollBack();
                return back()->with('fail', 'Terjadi kesalahan saat memperbaharui data.');
            }
        }
        return back()->with('info', 'Tidak ada perubahan data.');
    }

    // WORK EXPERIENCE
    public function addExperience(Request $request)
    {
        $request->validate([
            'we_institution' => 'required|string',
            'we_city'        => 'required|string',
            'we_position'    => 'required|string',
            'we_jobdesc'     => 'required|string',
            'we_start'       => 'required|date',
            'we_end'         => 'nullable|date',
        ], [
            'we_institution.required' => 'Nama institusi wajib diisi.',
            'we_institution.string'   => 'Nama institusi harus berupa teks.',
            'we_city.required'        => 'Kota institusi wajib diisi.',
            'we_city.string'          => 'Kota institusi harus berupa teks.',
            'we_position.required'    => 'Posisi wajib diisi.',
            'we_position.string'      => 'Posisi harus berupa teks.',
            'we_jobdesc.required'     => 'Job deskripsi wajib diisi.',
            'we_jobdesc.string'       => 'Job deskripsi harus berupa teks.',
            'we_start.required'       => 'Tanggal mulai wajib diisi.',
            'we_start.date'           => 'Tanggal mulai harus berupa tanggal.',
            'we_end.date'             => 'Tanggal selesai harus berupa tanggal.',
        ]);
    
        $idCandidate = auth()->user()->id_candidate;
        if (WorkExpInfo::where('id_candidate', $idCandidate)->count() >= 10) {
            return back()->with('fail', 'Tidak dapat menambah data pengalaman kerja lagi (maksimal 10 entri).');
        }
    
        DB::beginTransaction();
        try {
            WorkExpInfo::create([
                'id_candidate'   => $idCandidate,
                'we_institution' => $request->we_institution,
                'we_city'        => $request->we_city,
                'we_position'    => $request->we_position,
                'we_jobdesc'     => $request->we_jobdesc,
                'resign_reason'  => $request->resign_reason,
                'we_start'       => $request->we_start,
                'we_end'         => $request->we_end,
            ]);
    
            $this->auditLogs('Tambah Pengalaman Kerja Baru');
            DB::commit();
    
            return back()->with('success', 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('fail', 'Terjadi kesalahan saat menambah data.');
        }
    }
    public function detailExperience($id)
    {
        $id = decrypt($id);
        $data = WorkExpInfo::findOrFail($id);

        return view('dashboard.profile.experience.detail', compact('data'));
    }
    public function editExperience($id)
    {
        $id = decrypt($id);
        $data = WorkExpInfo::findOrFail($id);

        return view('dashboard.profile.experience.edit', compact('data'));
    }
    public function updateExperience(Request $request, $id)
    {
        $id = decrypt($id);
        $request->validate([
            'we_institution' => 'required|string',
            'we_city'        => 'required|string',
            'we_position'    => 'required|string',
            'we_jobdesc'     => 'required|string',
            'we_start'       => 'required|date',
            'we_end'         => 'nullable|date',
        ], [
            'we_institution.required' => 'Nama institusi wajib diisi.',
            'we_institution.string'   => 'Nama institusi harus berupa teks.',
            'we_city.required'        => 'Kota institusi wajib diisi.',
            'we_city.string'          => 'Kota institusi harus berupa teks.',
            'we_position.required'    => 'Posisi wajib diisi.',
            'we_position.string'      => 'Posisi harus berupa teks.',
            'we_jobdesc.required'     => 'Job deskripsi wajib diisi.',
            'we_jobdesc.string'       => 'Job deskripsi harus berupa teks.',
            'we_start.required'       => 'Tanggal mulai wajib diisi.',
            'we_start.date'           => 'Tanggal mulai harus berupa tanggal.',
            'we_end.date'             => 'Tanggal selesai harus berupa tanggal.',
        ]);

        $experience = WorkExpInfo::findOrFail($id);
        $experience->fill([
            'we_institution' => $request->we_institution,
            'we_city'        => $request->we_city,
            'we_position'    => $request->we_position,
            'we_jobdesc'     => $request->we_jobdesc,
            'resign_reason'  => $request->resign_reason,
            'we_start'       => $request->we_start,
            'we_end'         => $request->we_end,
        ]);

        if ($experience->isDirty()) {
            DB::beginTransaction();
            try {
                WorkExpInfo::where('id', $id)->update([
                    'we_institution' => $request->we_institution,
                    'we_city'        => $request->we_city,
                    'we_position'    => $request->we_position,
                    'we_jobdesc'     => $request->we_jobdesc,
                    'resign_reason'  => $request->resign_reason,
                    'we_start'       => $request->we_start,
                    'we_end'         => $request->we_end,
                ]);

                $this->auditLogs('Update Pengalaman Kerja ID: '. $id);
                DB::commit();
                return redirect()->route('profile')->with('success', 'Data berhasil diperbaharui.');
            } catch (\Exception $e) {
                DB::rollBack();
                return back()->with('fail', 'Terjadi kesalahan saat memperbaharui data.');
            }
        }
        return back()->with('info', 'Tidak ada perubahan data.');
    }
    public function deleteExperience($id)
    {
        $id = decrypt($id);

        DB::beginTransaction();
        try {
            WorkExpInfo::findOrFail($id)->delete();

            $this->auditLogs('Hapus Pengalaman Kerja ID: '. $id);
            DB::commit();
            return back()->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('fail', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
