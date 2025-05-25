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
                        <li class="breadcrumb-item"><a class="text-danger" href="{{ route('jobApply') }}">Lamaran ({{ $data->position_name }} - {{ $data->created_at->format('F j, Y') }})</a></li>
                        <li class="breadcrumb-item active"> Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card p-lg-5 p-3" style="min-height: 70vh;">
    <div class="row">
        <div class="col-12">
            @php
                $steps = [
                    ['label' => 'LAMARAN TERKIRIM', 'icon' => 'bi-send-check'],
                    ['label' => 'REVIEW ADM', 'icon' => 'bi-hourglass-split'],
                    ['label' => 'INTERVIEW', 'icon' => 'bi-person-lines-fill'],
                    ['label' => 'READY TESTED', 'icon' => 'bi-file-earmark-text'],
                    ['label' => 'REJECTED / ACCEPTED', 'icon' => 'bi-info-circle'],
                ];
                $rawStatus = strtoupper($data->progress_status);
                // Normalize status
                if (in_array($rawStatus, ['REJECTED', 'ACCEPTED'])) {
                    $currentStep = 'REJECTED / ACCEPTED';
                } else {
                    $currentStep = $rawStatus;
                }
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
        </div>

        @if($data->status == 2)
        <div class="col-12 mt-4">
            <div class="alert alert-primary d-flex align-items-center" role="alert">
                <div class="me-2">
                    <i class="bi bi-info-circle-fill"></i>
                </div>
                <div class="text-dark">
                    "Mohon Maaf, Setelah melalui proses seleksi, kami informasikan bahwa Anda belum berhasil melanjut ke tahap selanjutnya."
                </div>
            </div>
        </div>
        @endif

        @if($data->progress_status == 'REVIEW ADM')
        <div class="col-12 mt-4">
            <div class="mb-3">
                <h3 class="fw-bold"><span class="badge bg-secondary text-dark">Respons Screening Anda</span></h3>
            </div>
            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#showScreening">
                <i class="bi bi-eye"></i> Lihat
            </button>
            {{-- Modal Detail --}}
            <div class="modal fade" id="showScreening" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-top modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h5 class="modal-title" id="staticBackdropLabel">Respons Screening Anda</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body small text-start" style="max-height: 67vh; overflow-y: auto;">
                            @php
                                $screening = json_decode($data->screening_content);
                            @endphp

                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        @foreach($screening as $index => $item)
                                            <div class="mb-4 p-3 border rounded shadow-sm bg-light">
                                                <h5 class="mb-2">Pertanyaan {{ $index + 1 }}</h5>
                                                <p><strong>{{ $item->question }}</strong></p>
                                                <p class="text-muted">{{ $item->answer }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        
        @if($data->progress_status == 'INTERVIEW')
        <div class="col-12 mt-4">
            <div class="mb-3">
                <h3 class="fw-bold"><span class="badge bg-secondary text-dark">Jadwal Interview</span></h3>
            </div>
        </div>
        @endif

        @if($data->progress_status == 'READY TESTED')
        <div class="col-12 mt-4">
            <div class="mb-3">
                <h3 class="fw-bold"><span class="badge bg-secondary text-dark">Jadwal Test</span></h3>
            </div>
        </div>
        @endif

        @if($data->progress_status == 'ACEPTED' && $data->status == 1)
        <div class="col-12 mt-4">
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <div class="me-2">
                    <i class="bi bi-info-circle-fill"></i>
                </div>
                <div class="text-dark">
                    "Selamat! Lamaran Anda telah diterima dan Anda dinyatakan lulus dalam proses rekrutmen ini."
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection