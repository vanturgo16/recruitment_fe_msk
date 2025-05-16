@extends('dashboard.menu')
@section('contentDashboard')

<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <div class="page-title-left">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a class="text-danger" href="{{ route('home') }}">..</a></li>
                        <li class="breadcrumb-item"><a class="text-danger" href="{{ route('profile') }}">Profil</a></li>
                        <li class="breadcrumb-item active"> Edit Pengalaman Kerja</li>
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
                    <h4 class="text-bold">Edit</h4>
                </div>
            </div>
        </div>
        <form class="formLoad" action="{{ route('profile.updateExperience', encrypt($data->id)) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body small">
                <div class="row">
                    <!-- Institusi -->
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">Institusi / Perusahaan <span class="text-danger">*</span></label>
                        <input class="form-control" name="we_institution" type="text" value="{{ $data->we_institution }}" placeholder="Masukkan Nama Institusi.." required>
                    </div>
                </div>
                <div class="row">
                    <!-- Kota -->
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">Kota <span class="text-danger">*</span></label>
                        <input class="form-control" name="we_city" type="text" value="{{ $data->we_city }}" placeholder="Masukkan Kota / Provinsi.." required>
                    </div>
                    <!-- Posisi -->
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">Posisi <span class="text-danger">*</span></label>
                        <input class="form-control" name="we_position" type="text" value="{{ $data->we_position }}" placeholder="Masukkan Posisi.." required>
                    </div>
                </div>
                <div class="row">
                    <!-- Jobdesc -->
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">Job Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="we_jobdesc" rows="2" placeholder="Masukkan Job Deskripsi.." required>{{ $data->we_jobdesc }}</textarea>
                    </div>
                    <!-- Alasan Berhenti -->
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">Alasan Berhenti </label>
                        <textarea class="form-control" name="resign_reason" rows="2" placeholder="Alasan Berhenti (Opsional)..">{{ $data->resign_reason }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <!-- Periode Dari -->
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">Periode (Dari) <span class="text-danger">*</span></label>
                        <input class="form-control" name="we_start" type="date" value="{{ $data->we_start }}" required>
                    </div>
                    <!-- Periode Dari -->
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">Periode (Hingga) </label>
                        <input class="form-control" name="we_end" value="{{ $data->we_end ?? null }}" type="date">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row text-end">
                    <div>
                        <button type="submit" class="btn btn-md btn-danger">
                            <i class='bx bx-refresh'></i> Perbaharui
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection