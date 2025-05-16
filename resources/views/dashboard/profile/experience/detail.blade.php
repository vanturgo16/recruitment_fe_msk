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
                        <li class="breadcrumb-item active"> Detail Pengalaman Kerja</li>
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
                    <h4 class="text-bold">Detail</h4>
                </div>
            </div>
        </div>
        <div class="card-body small">
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <div><span class="fw-bold">Nama Institusi :</span></div>
                        <small>{{ $data->we_institution ?? '-' }}</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <div><span class="fw-bold">Kota / Provinsi :</span></div>
                        <small>{{ $data->we_city ?? '-' }}</small>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <div><span class="fw-bold">Posisi :</span></div>
                        <small>{{ $data->we_position ?? '-' }}</small>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <div><span class="fw-bold">Job Deskripsi :</span></div>
                        <small>{{ $data->we_jobdesc ?? '-' }}</small>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <div><span class="fw-bold">Alasan Berhenti :</span></div>
                        <small>{{ $data->resign_reason ?? '-' }}</small>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <div><span class="fw-bold">Periode (Tahun) :</span></div>
                        <small>{{ $data->we_start ?? '-' }} - {{ $data->we_end ?? 'Sekarang' }}</small>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 mb-3">
                    <div class="form-group">
                        <div><span class="fw-bold">Dibuat Pada :</span></div>
                        <small>{{ $data->created_at ?? '-' }}</small>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="form-group">
                        <div><span class="fw-bold">Terakhir Diubah :</span></div>
                        <small>{{ $data->updated_at ?? '-' }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection