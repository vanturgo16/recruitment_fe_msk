@extends('dashboard.menu')
@section('contentDashboard')

<link href="{{ asset('assets/css/step.css') }}" rel="stylesheet">

<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <div class="page-title-left">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a class="text-danger" href="{{ route('home') }}">..</a></li>
                        <li class="breadcrumb-item active"> Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card p-lg-5 p-3" style="min-height: 70vh;">
    <div class="mb-4 text-center">
        <h1 class="mb-0 h3">Halo, {{ Auth::user()->name }}! Selamat datang di Dashboard Kandidat MSK.</h1>
    </div>

    <br>
    <div class="row mb-5 g-4">
        <div class="col-lg-4 col-md-6">
            <div class="card border shadow">
                <div class="card-body">
                    <span>Jumlah Lamaran</span>
                    <h3 class="mb-0 mt-4 text-muted"><strong><a href="{{ route('jobApply') }}" class="text-dark">{{ $jobApplies }}</a></strong> Lamaran Dikirim</h3>
                </div>
            </div>
        </div>
    </div>

    @if(!$profileComplete || !$jobAppliesIP)
        <hr>
        <div class="mb-3">
            <h3 class="fw-bold"><span class="badge bg-secondary text-dark">{{ ($jobApplies > 0) ? 'Lamaran Yang Tersedia' : 'Langkah Selanjutnya' }}</span></h3>
        </div>
        <div class="row g-4">
            @if(!$profileComplete)
                <div class="col-lg-4 col-md-6">
                    <div class="card border shadow">
                        <div class="card-body">
                            <div class="mb-4">
                                <i class="bi bi-person-vcard text-warning" style="font-size:24px;"></i>
                            </div>
                            <div class="mb-4">
                                <h5 class="mb-2">Lengkapi Profil</h5>
                                <p class="mb-0 pe-xl-7">Lengkapi data pribadi dan pengalaman kerja.</p>
                            </div>
                            <a href="{{ route('profile') }}" class="icon-link icon-link-hover text-inherit">
                                Lengkapi Sekarang
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            @if(!$jobAppliesIP)
                <div class="col-lg-4 col-md-6">
                    <div class="card border shadow">
                        <div class="card-body">
                            <div class="mb-4">
                                <i class="bi bi-file-earmark-lock text-danger" style="font-size:24px;"></i>
                            </div>
                            <div class="mb-4">
                                <h5 class="mb-2">Lihat Lowongan Tersedia</h5>
                                <p class="mb-0">Jelajahi posisi yang sesuai dengan keahlian Anda.</p>
                            </div>
                            <a href="{{ route('home') }}#career" class="icon-link icon-link-hover text-inherit">
                                Cari Lowongan
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @else
        <hr>
        <div class="mb-3">
            <div class="row">
                <div class="col-6">
                    <h3 class="fw-bold"><span class="badge bg-secondary text-dark">Status Lamaran Terakhir</span></h3>
                </div>
                <div class="col-6">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('jobApply.detail', encrypt($lastJobApplies->id)) }}" type="button" class="btn btn-sm btn-info text-white">
                            <i class="bx bx-info-circle"></i> Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        @php
            $steps = [
                ['label' => 'LAMARAN TERKIRIM', 'icon' => 'bi-send-check'],
                ['label' => 'REVIEW ADM', 'icon' => 'bi-hourglass-split'],
                ['label' => 'TESTED', 'icon' => 'bi-file-earmark-text'],
                ['label' => 'INTERVIEW', 'icon' => 'bi-person-lines-fill'],
                ['label' => 'OFFERING', 'icon' => 'bi-question-circle'],
                ['label' => 'MCU', 'icon' => 'bi-file-medical'],
                ['label' => 'SIGN', 'icon' => 'bi-pen-fill'],
                ['label' => 'HIRED', 'icon' => 'bi-info-circle'],
            ];
            $currentStep = strtoupper($lastJobApplies->progress_status);
            $currentIndex = collect($steps)->pluck('label')->search($currentStep);
        @endphp

        <div class="stepper">
            @foreach ($steps as $index => $step)
                @php
                    $class = '';
                    if ($index < $currentIndex) {
                        $class = 'completed';
                    } elseif ($index === $currentIndex) {
                        $class = 'active';
                    }
                @endphp
                <div class="step {{ $class }}">
                    <div class="step-icon"><i class="bi {{ $step['icon'] }}"></i></div>
                    <div class="step-label">{{ $step['label'] }}</div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@endsection