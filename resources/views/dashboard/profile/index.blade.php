@extends('dashboard.menu')
@section('contentDashboard')

<!-- DATATABLES CSS-->
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.5.0/css/rowReorder.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.dataTables.css">
<!-- JQUERY SCRIPT -->
<script type="text/javascript" src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>

<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <div class="page-title-left">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a class="text-danger" href="{{ route('home') }}">..</a></li>
                        <li class="breadcrumb-item active"> Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card p-lg-5 p-3" style="min-height: 70vh;">
    <div class="card shadow mb-3">
        <div class="card-header p-3 bg-secondary">
            <div class="row">
                <div class="col-6">
                    <h4 class="text-bold">Data Diri</h4>
                </div>
                @if($isEditable)
                <div class="col-6">
                    <div class="text-end">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#editMainProfile">
                            <i class='bx bx-edit label-icon'></i> Edit
                        </button>
                        {{-- Modal Edit --}}
                        <div class="modal fade" id="editMainProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-top modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="formLoad" action="{{ route('profile.updateMainProfile') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body small text-start" style="max-height: 67vh; overflow-y: auto;">
                                            <div class="container">
                                                <div class="row">
                                                    <!-- Foto Diri -->
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label">Foto Diri <small class="text-muted">(JPG/PNG/JPEG, max 500KB)</small></label>
                                                        <div class="mb-1">
                                                            @if($mainProfile && $mainProfile->self_photo)
                                                                <a href="{{ url($mainProfile->self_photo) }}" target="_blank" class="btn btn-sm btn-outline-danger">
                                                                    <i class='bx bx-show'></i> Foto Saat Ini
                                                                </a>
                                                            @else
                                                                <button class="btn btn-sm btn-outline-danger" disabled><i class='bx bx-hide'></i> Belum Ada Foto</button>
                                                            @endif
                                                        </div>
                                                        <input class="form-control" type="file" name="self_photo" accept="image/*"
                                                            {{ ($mainProfile && $mainProfile->self_photo) ? '' : 'required' }} 
                                                            onchange="if(this.files[0].size > 512000){ alert('Ukuran maksimal 500KB'); this.value=null; }">
                                                    </div>
                                                    <!-- CV / Resume -->
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label">CV / Resume <small class="text-muted">(PDF/JPG/PNG/JPEG, max 500KB)</small></label>
                                                        <div class="mb-1">
                                                            @if($mainProfile && $mainProfile->cv_path)
                                                                <a href="{{ url($mainProfile->cv_path) }}" target="_blank" class="btn btn-sm btn-outline-danger">
                                                                    <i class='bx bx-show'></i> CV Saat Ini
                                                                </a>
                                                            @else
                                                                <button class="btn btn-sm btn-outline-danger" disabled><i class='bx bx-hide'></i> Belum Ada CV</button>
                                                            @endif
                                                        </div>
                                                        <input class="form-control" type="file" name="cv_path" accept=".pdf,.jpg,.png,.jpeg"
                                                            {{ ($mainProfile && $mainProfile->cv_path) ? '' : 'required' }} 
                                                            onchange="if(this.files[0].size > 512000){ alert('Ukuran maksimal 500KB'); this.value=null; }">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <!-- Nama Depan -->
                                                    <div class="col-lg-3 mb-3">
                                                        <label class="form-label">Nama Depan <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="candidate_first_name" type="text" 
                                                            value="{{ $candidate->candidate_first_name }}" 
                                                            placeholder="Masukkan Nama Depan.." required>
                                                    </div>
                                                    <!-- Nama Belakang -->
                                                    <div class="col-lg-3 mb-3">
                                                        <label class="form-label">Nama Belakang <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="candidate_last_name" type="text" 
                                                            value="{{ $candidate->candidate_last_name }}" 
                                                            placeholder="Masukkan Nama Belakang.." required>
                                                    </div>
                                                    <!-- NIK -->
                                                    <div class="col-lg-3 mb-3">
                                                        <label class="form-label">NIK <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="id_card_no" type="text" 
                                                            value="{{ $candidate->id_card_no }}" 
                                                            placeholder="Masukkan NIK.." required readonly>
                                                    </div>
                                                    <!-- Phone -->
                                                    <div class="col-lg-3 mb-3">
                                                        <label class="form-label">No. Telepon <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="phone" type="text" 
                                                            value="{{ $candidate->phone }}" 
                                                            placeholder="Masukkan No Telepon.." required>
                                                    </div>
                                                    <!-- Tempat Lahir -->
                                                    <div class="col-lg-3 mb-3">
                                                        <label class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="birthplace" type="text" 
                                                            value="{{ $mainProfile->birthplace ?? null }}" 
                                                            placeholder="Masukkan Tempat Lahir.." required>
                                                    </div>
                                                    <!-- Tanggal Lahir -->
                                                    <div class="col-lg-3 mb-3">
                                                        <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="birthdate" type="date" 
                                                            value="{{ $mainProfile->birthdate ?? null }}" 
                                                            placeholder="Masukkan Tanggal Lahir.." required>
                                                    </div>
                                                    <!-- Jenis Kelamin -->
                                                    <div class="col-lg-3 mb-3">
                                                        <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                                        <select name="gender" class="form-control" required>
                                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                                            @foreach($gender as $item)
                                                                <option value="{{ $item }}" {{ ($mainProfile && $mainProfile->gender == $item) ? 'selected' : '' }}>{{ $item }}</option>
                                                            @endforeach
                                                        </select>                                                        
                                                    </div>
                                                    <!-- Status Pernikahan -->
                                                    <div class="col-lg-3 mb-3">
                                                        <label class="form-label">Status Pernikahan <span class="text-danger">*</span></label>
                                                        <select name="marriage_status" class="form-control" required>
                                                            <option value="">-- Pilih Status Pernikahan --</option>
                                                            @foreach($marriageStatus as $item)
                                                                <option value="{{ $item }}" {{ ($mainProfile && $mainProfile->marriage_status == $item) ? 'selected' : '' }}>{{ $item }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>                                                
                                                <hr>
                                                <div class="row">
                                                    <!-- Alamat Sesuai KTP -->
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label">Alamat Sesuai KTP <span class="text-danger">*</span></label>
                                                        <textarea class="form-control" id="id_card_address" name="id_card_address" rows="2"
                                                            placeholder="Masukkan Alamat.." required>{{ $mainProfile->id_card_address ?? "" }}</textarea>
                                                    </div>
                                                    <!-- Alamat Domisili -->
                                                    <div class="col-lg-6 mb-3">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <label class="form-label">Alamat Domisili <span class="text-danger">*</span></label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="same_as_ktp" onchange="toggleDomicileAddress()">
                                                                <label class="form-check-label ms-1" for="same_as_ktp">
                                                                    <small>Sama dengan Alamat KTP</small>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <!-- Textarea -->
                                                        <textarea class="form-control" id="domicile_address" name="domicile_address" rows="2" 
                                                            placeholder="Masukkan Alamat.." required>{{ $mainProfile->domicile_address ?? "" }}</textarea>
                                                    </div>
                                                    <!-- JS untuk salin dan disable -->
                                                    <script>
                                                        function toggleDomicileAddress() {
                                                            const sameAsKtp = document.getElementById('same_as_ktp').checked;
                                                            const ktp = document.getElementById('id_card_address').value;
                                                            const dom = document.getElementById('domicile_address');

                                                            if (sameAsKtp) {
                                                                dom.value = ktp;
                                                                dom.setAttribute('readonly', true);
                                                                dom.removeAttribute('required');
                                                            } else {
                                                                dom.value = '';
                                                                dom.removeAttribute('readonly');
                                                                dom.setAttribute('required', true);
                                                            }
                                                        }

                                                        // Jika kamu ingin auto update saat KTP berubah dan checkbox aktif
                                                        document.getElementById('id_card_address').addEventListener('input', function () {
                                                            if (document.getElementById('same_as_ktp').checked) {
                                                                document.getElementById('domicile_address').value = this.value;
                                                            }
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger"><i class='bx bx-refresh'></i> Perbaharui</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="card-body small">
            <div class="row">
                <div class="col-lg-3 mb-lg-0 mb-3">
                    <div class="form-group">
                        <div><span class="fw-bold">Foto Diri :</span></div>
                        <small>
                            @if($mainProfile && $mainProfile->self_photo)
                                <a href="{{ url($mainProfile->self_photo) }}" target="_blank" class="btn btn-sm btn-outline-danger">
                                    <i class='bx bx-show'></i> Foto Saat Ini
                                </a>
                            @else
                                <button class="btn btn-sm btn-outline-danger" disabled><i class='bx bx-hide'></i> Belum Ada Foto</button>
                            @endif
                        </small>
                    </div>
                </div>
                <div class="col-lg-3 mb-lg-0 mb-3">
                    <div class="form-group">
                        <div><span class="fw-bold">CV / Resume :</span></div>
                        <small>
                            @if($mainProfile && $mainProfile->cv_path)
                                <a href="{{ url($mainProfile->cv_path) }}" target="_blank" class="btn btn-sm btn-outline-danger">
                                    <i class='bx bx-show'></i> CV Saat Ini
                                </a>
                            @else
                                <button class="btn btn-sm btn-outline-danger" disabled><i class='bx bx-hide'></i> Belum Ada CV</button>
                            @endif
                        </small>
                    </div>
                </div>
                <div class="col-lg-6 mb-lg-0 mb-3">
                    <div class="form-group">
                        <div><span class="fw-bold">Email :</span></div>
                        <small>{{ $candidate->email }}</small>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 mb-3">
                    <div class="form-group">
                        <div><span class="fw-bold">Nama Depan :</span></div>
                        <small>{{ $candidate->candidate_first_name }}</small>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="form-group">
                        <div><span class="fw-bold">Nama Belakang :</span></div>
                        <small>{{ $candidate->candidate_last_name }}</small>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="form-group">
                        <div><span class="fw-bold">No. Telephone :</span></div>
                        <small>{{ $candidate->phone }}</small>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="form-group">
                        <div><span class="fw-bold">NIK :</span></div>
                        <small>{{ $candidate->id_card_no }}</small>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="form-group">
                        <div><span class="fw-bold">Tempat Lahir :</span></div>
                        <small>
                            {!! $mainProfile->birthplace ?? '<span class="badge bg-secondary text-dark">Not Set</span>' !!}
                        </small>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="form-group">
                        <div><span class="fw-bold">Tanggal Lahir :</span></div>
                        <small>
                            {!! $mainProfile->birthdate ?? '<span class="badge bg-secondary text-dark">Not Set</span>' !!}
                        </small>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="form-group">
                        <div><span class="fw-bold">Jenis Kelamin :</span></div>
                        <small>
                            {!! $mainProfile->gender ?? '<span class="badge bg-secondary text-dark">Not Set</span>' !!}
                        </small>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="form-group">
                        <div><span class="fw-bold">Status Pernikahan :</span></div>
                        <small>
                            {!! $mainProfile->marriage_status ?? '<span class="badge bg-secondary text-dark">Not Set</span>' !!}
                        </small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-lg-0 mb-2">
                    <div class="form-group">
                        <div><span class="fw-bold">Alamat Sesuai KTP :</span></div>
                        <small>
                            {!! $mainProfile->id_card_address ?? '<span class="badge bg-secondary text-dark">Not Set</span>' !!}
                        </small>
                    </div>
                </div>
                <div class="col-lg-6 mb-lg-0 mb-2">
                    <div class="form-group">
                        <div><span class="fw-bold">Alamat Domisili :</span></div>
                        <small>
                            {!! $mainProfile->domicile_address ?? '<span class="badge bg-secondary text-dark">Not Set</span>' !!}
                        </small>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-6">
                    <h4 class="text-bold">Pendidikan</h4>
                </div>
                @if($isEditable)
                <div class="col-6">
                    <div class="text-end">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#addEducation">
                            <i class='bx bx-plus label-icon'></i> Tambah
                        </button>
                        {{-- Modal Add --}}
                        <div class="modal fade" id="addEducation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            
                            <div class="modal-dialog modal-xl modal-dialog-top modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h5 class="modal-title" id="staticBackdropLabel">Tambah</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="formLoad" action="{{ route('profile.addEducation') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body small text-start" style="max-height: 67vh; overflow-y: auto;">
                                            <div class="container">
                                                <div class="row">
                                                    <!-- Grade -->
                                                    <div class="col-lg-4 mb-3">
                                                        <label class="form-label">Jenjang Pendidikan <span class="text-danger">*</span></label>
                                                        <select name="edu_grade" class="form-control" required>
                                                            <option value="">-- Pilih --</option>
                                                            @foreach($grade as $item)
                                                                <option value="{{ $item }}">{{ $item }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <!-- Institusi -->
                                                    <div class="col-lg-4 mb-3">
                                                        <label class="form-label">Institusi <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="edu_institution" type="text" placeholder="Masukkan Nama Institusi.." required>
                                                    </div>
                                                    <!-- Kota -->
                                                    <div class="col-lg-4 mb-3">
                                                        <label class="form-label">Kota <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="edu_city" type="text" placeholder="Masukkan Kota / Provinsi.." required>
                                                    </div>
                                                    <!-- Jurusan -->
                                                    <div class="col-lg-4 mb-3">
                                                        <label class="form-label">Jurusan <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="edu_major" type="text" placeholder="Masukkan Jurusan.." required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <!-- Periode Dari -->
                                                    <div class="col-lg-4 mb-3">
                                                        <label class="form-label">Periode (Dari) <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="edu_start_year" type="text" placeholder="Masukkan Tahun.." required>
                                                    </div>
                                                    <!-- Periode Dari -->
                                                    <div class="col-lg-4 mb-3">
                                                        <label class="form-label">Periode (Hingga) <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="edu_end_year" type="text" placeholder="Masukkan Tahun.." required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger"><i class='bx bx-plus'></i> Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-12">
                    <table class="table table-bordered table-hover table-stripped dt-responsive w-100 nowrap" id="tableEducation" style="font-size: small">
                        <thead class="table-light">
                            <tr>
                                <th class="align-middle text-center">#</th>
                                <th class="align-middle">Jenjang</th>
                                <th class="align-middle">Institusi</th>
                                <th class="align-middle">Kota</th>
                                <th class="align-middle">Jurusan</th>
                                <th class="align-middle">Periode</th>
                                <th class="align-middle text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($eduInfo as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="fw-bold">{{ $item->edu_grade }}</td>
                                    <td>{{ $item->edu_institution }}</td>
                                    <td>{{ $item->edu_city }}</td>
                                    <td>{{ $item->edu_major }}</td>
                                    <td>{{ $item->edu_start_year }} - {{ $item->edu_end_year }}</td>
                                    <td class="text-center">
                                        @if($isEditable)
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop{{ $item->id }}" type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Aksi <i class="mdi mdi-chevron-down"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop{{ $item->id }}">
                                                    <li><a class="dropdown-item drpdwn" href="{{ route('profile.detailEducation', encrypt($item->id)) }}"><span class="bx bx-info-circle me-2"></span> Detail</a></li>
                                                    <li><a class="dropdown-item drpdwn" href="{{ route('profile.editEducation', encrypt($item->id)) }}"><span class="bx bx-edit me-2"></span> Edit</a></li>
                                                    <li><a class="dropdown-item drpdwn-dgr" href="#" data-bs-toggle="modal" data-bs-target="#deleteEdu{{ $item->id }}"><span class="bx bx-trash me-2"></span> Hapus</a></li>
                                                </ul>
                                            </div>
                                        @else
                                            <a href="{{ route('profile.detailEducation', encrypt($item->id)) }}" type="button" class="btn btn-sm btn-info text-white">
                                                <i class="bx bx-info-circle"></i> Detail
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                {{-- Modal Delete --}}
                                <div class="modal fade" id="deleteEdu{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md modal-dialog-top " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title" id="staticBackdropLabel">Hapus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form class="formLoad" action="{{ route('profile.deleteEducation', encrypt($item->id)) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body text-center">
                                                    <div class="row">
                                                        <p class="text-center">Apakah Anda Yakin Untuk <b>Hapus</b> Data?</p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger"><i class='bx bx-trash'></i> Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-3">
        <div class="card-header p-3 bg-secondary">
            <div class="row">
                <div class="col-6">
                    <h4 class="text-bold">Info Tambahan</h4>
                </div>
                @if($isEditable)
                <div class="col-6">
                    <div class="text-end">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#editGeneralInfo">
                            <i class='bx bx-edit label-icon'></i> Edit
                        </button>
                        {{-- Modal Edit --}}
                        <div class="modal fade" id="editGeneralInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-top" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="formLoad" action="#" id="formadd" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body text-start">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Identitas</label> <label class="text-danger">*</label>
                                                        <textarea name="message" rows="8" cols="50" class="form-control" placeholder="Input Identitas.." required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger"><i class='bx bx-refresh'></i> Perbaharui</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="card-body small">
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <div><span class="fw-bold">Riwayat Penyakit :</span></div>
                        <small>
                            {!! $generalInfo->illness_history_desc ?? '<span class="badge bg-secondary text-dark">Not Set</span>' !!}
                        </small>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <div><span class="fw-bold">Pengalaman Pelatihan :</span></div>
                        <small>
                            {!! $generalInfo->training_exp_desc ?? '<span class="badge bg-secondary text-dark">Not Set</span>' !!}
                        </small>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <div><span class="fw-bold">Riwayat Kriminal :</span></div>
                        <small>
                            {!! $generalInfo->criminal_history ?? '<span class="badge bg-secondary text-dark">Not Set</span>' !!}
                        </small>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <div><span class="fw-bold">Pengalaman Organisasi :</span></div>
                        <small>
                            {!! $generalInfo->mass_org_history_desc ?? '<span class="badge bg-secondary text-dark">Not Set</span>' !!}
                        </small>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <div><span class="fw-bold">Berpengalaman / Fresh Graduate :</span></div>
                        <small>
                            {!! $generalInfo->experience ?? '<span class="badge bg-secondary text-dark">Not Set</span>' !!}
                        </small>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-6">
                    <h4 class="text-bold">Pengalaman</h4>
                </div>
                @if($isEditable)
                <div class="col-6">
                    <div class="text-end">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#addExperience">
                            <i class='bx bx-plus label-icon'></i> Tambah
                        </button>
                        {{-- Modal Add --}}
                        <div class="modal fade" id="addExperience" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-top" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h5 class="modal-title" id="staticBackdropLabel">Tambah</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="formLoad" action="#" id="formadd" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body text-start">
                                            <div class="row">
                                                <div class="col-12">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger"><i class='bx bx-plus'></i> Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-12">
                    <table class="table table-bordered table-hover table-stripped dt-responsive w-100" id="tableExperience" style="font-size: small">
                        <thead class="table-light">
                            <tr>
                                <th class="align-middle text-center">#</th>
                                <th class="align-middle text-center">Institusi / Perusahaan</th>
                                <th class="align-middle text-center">Kota</th>
                                <th class="align-middle text-center">Posisi</th>
                                <th class="align-middle text-center">Periode</th>
                                <th class="align-middle text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($workExpInfo as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DATATABLE -->
<script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.5.0/js/dataTables.rowReorder.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.5.0/js/rowReorder.dataTables.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.dataTables.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#tableEducation').DataTable({
            paging: true,
            searching: false,
            lengthChange: false,
            responsive: true,
            rowReorder: {
                selector: 'td:nth-child(2)'
            }
        });
    });
    $(document).ready(function() {
        var table = $('#tableExperience').DataTable({
            paging: true,
            searching: false,
            lengthChange: false,
            responsive: true,
            rowReorder: {
                selector: 'td:nth-child(2)'
            }
        });
    });
</script>


@endsection