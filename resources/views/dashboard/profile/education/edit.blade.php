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
                        <li class="breadcrumb-item active"> Edit Pendidikan</li>
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
        <form class="formLoad" action="{{ route('profile.updateEducation', encrypt($data->id)) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body small">
                <div class="row">
                    <!-- Grade -->
                    <div class="col-lg-4 mb-3">
                        <label class="form-label">Jenjang Pendidikan <span class="text-danger">*</span></label>
                        <select name="edu_grade" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            @foreach($grade as $item)
                                <option value="{{ $item }}" {{ ($data->edu_grade) == $item ? 'selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <!-- Institusi -->
                    <div class="col-lg-4 mb-3">
                        <label class="form-label">Institusi <span class="text-danger">*</span></label>
                        <input class="form-control" name="edu_institution" type="text" value="{{ $data->edu_institution }}" placeholder="Masukkan Nama Institusi.." required>
                    </div>
                    <!-- Kota -->
                    <div class="col-lg-4 mb-3">
                        <label class="form-label">Kota <span class="text-danger">*</span></label>
                        <input class="form-control" name="edu_city" type="text" value="{{ $data->edu_city }}" placeholder="Masukkan Kota / Provinsi.." required>
                    </div>
                    <!-- Jurusan -->
                    <div class="col-lg-4 mb-3">
                        <label class="form-label">Jurusan <span class="text-danger">*</span></label>
                        <input class="form-control" name="edu_major" type="text" value="{{ $data->edu_major }}" placeholder="Masukkan Jurusan.." required>
                    </div>
                </div>
                <div class="row">
                    <!-- Periode Dari -->
                    <div class="col-lg-4 mb-3">
                        <label class="form-label">Periode (Dari) <span class="text-danger">*</span></label>
                        <input class="form-control" name="edu_start_year" type="text" value="{{ $data->edu_start_year }}" placeholder="Masukkan Tahun.." required>
                    </div>
                    <!-- Periode Dari -->
                    <div class="col-lg-4 mb-3">
                        <label class="form-label">Periode (Hingga) <span class="text-danger">*</span></label>
                        <input class="form-control" name="edu_end_year" type="text" value="{{ $data->edu_end_year }}" placeholder="Masukkan Tahun.." required>
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