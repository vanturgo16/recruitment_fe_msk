@extends('dashboard.menu')
@section('contentDashboard')

<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <div class="page-title-left">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a class="text-danger" href="{{ route('home') }}">..</a></li>
                        <li class="breadcrumb-item active"> Lamaran</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card" style="min-height: 70vh;">
    <div class="card-header bg-secondary">
        Daftar Lamaran Anda
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-hover table-stripped dt-responsive w-100" id="tableJobApply">
                    <thead class="table-light">
                        <tr>
                            <th class="align-middle text-center">#</th>
                            <th class="align-middle">Posisi</th>
                            <th class="align-middle">Department</th>
                            <th class="align-middle">Tanggal Melamar</th>
                            <th class="align-middle text-center">Status</th>
                            <th class="align-middle text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="fw-bold">{{ $item->position_name }}</td>
                                <td>{{ $item->dept_name }}</td>
                                <td>{{ $item->created_at->format('F j, Y') }}</td>
    
                                <td class="align-middle text-center">
                                    @if($item->is_approved_1 == null)
                                        <span class="badge bg-secondary text-dark">Review</span>
                                    @else 
                                        -
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('jobApply.detail', encrypt($item->id)) }}" type="button" class="btn btn-sm btn-info text-white">
                                        <i class="bx bx-info-circle"></i> Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection