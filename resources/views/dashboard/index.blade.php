@extends('dashboard.menu')
@section('contentDashboard')

<style>
    .stepper {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 1rem;
    }
    .step {
        flex: 1 1 18%;
        min-width: 150px;
        background-color: #f8f9fa;
        color: darkgray;
        padding: 1rem;
        border-radius: 0.5rem;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        box-sizing: border-box;
        transition: background-color 0.3s, color 0.3s;
    }
    .step.completed {
        background-color: #d1e7dd;
        color: #0f5132;
    }
    .step.active {
        background-color: #db1436;
        color: #ffffff;
        transform: scale(1.05);
    }
    .step-icon {
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }
    .step.completed .step-icon {
        color: #198754;
    }
    /* Mobile */
    @media (max-width: 768px) {
        .stepper {
            flex-direction: column;
            gap: 0.75rem;
        }
        .step {
            flex: none;
            min-width: auto;
            flex-direction: row;
            justify-content: flex-start;
            padding: 0.75rem 1rem;
            text-align: left;
        }
        .step-icon {
            margin-right: 1rem;
            margin-bottom: 0;
        }
    }
</style>

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
                    <h3 class="mb-0 mt-4 text-muted"><strong>{{ $jobApplies }}</strong> Lamaran Dikirim</h3>
                </div>
            </div>
        </div>
    </div>

    @if(!$profileComplete || !$jobAppliesIP)
        <hr>
        <div class="mb-3">
            <h3 class="fw-bold"><span class="badge bg-secondary text-dark">Langkah Selanjutnya</span></h3>
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
            <h3 class="fw-bold"><span class="badge bg-secondary text-dark">Status Lamaran Terakhir</span></h3>
        </div>
        @php
            $steps = [
                ['label' => 'Lamaran Terkirim', 'icon' => 'bi-send-check'],
                ['label' => 'Review HRD', 'icon' => 'bi-hourglass-split'],
                ['label' => 'Interview HRD', 'icon' => 'bi-person-lines-fill'],
                ['label' => 'Tes', 'icon' => 'bi-file-earmark-text'],
                ['label' => 'Selesai', 'icon' => 'bi-check-circle'],
            ];
            $currentStep = 'Review HRD';
        @endphp
        {{-- <div class="stepper">
            @foreach($steps as $step)
                @php
                    $status = 'default';
                    if (array_search($step, $steps) < array_search(array_filter($steps, fn($s) => $s['label'] === $currentStep)[0], $steps)) {
                        $status = 'completed';
                    } elseif ($step['label'] === $currentStep) {
                        $status = 'active';
                    }
                @endphp
        
                <div class="step {{ $status }}">
                    <div class="step-icon">
                        <i class="bi {{ $step['icon'] }}"></i>
                    </div>
                    <div class="step-label">{{ $step['label'] }}</div>
                </div>
            @endforeach
        </div> --}}

        <div class="stepper">
            <div class="step completed">
                <div class="step-icon"><i class="bi bi-send-check"></i></div>
                <div class="step-label">Lamaran Terkirim</div>
            </div>
            <div class="step active">
                <div class="step-icon"><i class="bi bi-hourglass-split"></i></div>
                <div class="step-label">Review HRD</div>
            </div>
            <div class="step">
                <div class="step-icon"><i class="bi bi-person-lines-fill"></i></div>
                <div class="step-label">Interview HRD</div>
            </div>
            <div class="step">
                <div class="step-icon"><i class="bi bi-file-earmark-text"></i></div>
                <div class="step-label">Tes</div>
            </div>
            <div class="step">
                <div class="step-icon"><i class="bi bi-check-circle"></i></div>
                <div class="step-label">Selesai</div>
            </div>
        </div>
    @endif
</div>

@endsection