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


@php
    $progressSteps = [
        'LAMARAN TERKIRIM' => ['icon' => 'bi-send-check', 'badge' => 'secondary', 'text' => 'dark'],
        'REVIEW ADM'       => ['icon' => 'bi-hourglass-split', 'badge' => 'warning', 'text' => 'white'],
        'INTERVIEW'        => ['icon' => 'bi-person-lines-fill', 'badge' => 'warning', 'text' => 'white'],
        'TESTED'           => ['icon' => 'bi-file-earmark-text', 'badge' => 'warning', 'text' => 'white'],
        'OFFERING'         => ['icon' => 'bi-question-circle', 'badge' => 'warning', 'text' => 'white'],
        'MCU'              => ['icon' => 'bi-file-medical', 'badge' => 'warning', 'text' => 'white'],
        'SIGN'             => ['icon' => 'bi-pen-fill', 'badge' => 'warning', 'text' => 'white'],
        'HIRED'            => ['icon' => 'bi-check-circle', 'badge' => 'success', 'text' => 'white'],
        'REJECT'           => ['icon' => 'bi-x-circle-fill', 'badge' => 'danger', 'text' => 'white'],
        // fallback/default for undefined or unknown statuses
        'DEFAULT'          => ['icon' => 'bi-question-circle', 'badge' => 'secondary', 'text' => 'dark'],
    ];
@endphp

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
                                <td class="align-top text-center">{{ $loop->iteration }}</td>
                                <td class="align-top text-center fw-bold">{{ $item->position_name }}</td>
                                <td class="align-top">{{ $item->dept_name }}</td>
                                <td class="align-top">{{ $item->created_at->format('F j, Y') }}</td>
                                <td class="align-top text-center">
                                    @php
                                        $status = $item->status == 2 ? 'REJECT' : $item->progress_status;
                                        $step = $progressSteps[$status] ?? $progressSteps['DEFAULT'];
                                    @endphp
                                    <span class="badge bg-{{ $step['badge'] }} text-{{ $step['text'] }}">
                                        <i class="bi {{ $step['icon'] }}"></i> {{ $status }}
                                    </span>
                                </td>
                                <td class="align-top text-center">
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