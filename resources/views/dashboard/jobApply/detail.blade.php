@extends('dashboard.menu')
@section('contentDashboard')

<link href="{{ asset('assets/css/step.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/progress-detail.css') }}" rel="stylesheet">

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
                    ['label' => 'TESTED', 'icon' => 'bi-file-earmark-text'],
                    ['label' => 'OFFERING', 'icon' => 'bi-question-circle'],
                    ['label' => 'MCU', 'icon' => 'bi-file-medical'],
                    ['label' => 'HIRED', 'icon' => 'bi-pen-fill'],
                    ['label' => 'REJECTED / ACCEPTED', 'icon' => 'bi-info-circle'],
                ];
                $rawStatus = strtoupper($data->progress_status);
                $currentStep = in_array($rawStatus, ['REJECTED', 'ACCEPTED']) ? 'REJECTED / ACCEPTED' : $rawStatus;
                $currentIndex = collect($steps)->pluck('label')->search($currentStep);
            @endphp

            <!-- Stepper as Tabs -->
            <div class="stepper nav nav-tabs d-flex justify-content-between mb-4" id="stepTab" role="tablist">
                @foreach ($steps as $index => $step)
                    @php
                        $isCompleted = $index <= $currentIndex;
                        $isActive = $index === $currentIndex;
                        $isEnabled = $isCompleted || $isActive;
                        // $isEnabled = true;

                        $stepClass = $isCompleted ? 'completed' : '';
                        $stepActive = $isActive ? 'active' : '';
                    @endphp
                    <button
                        class="step nav-link d-flex flex-column align-items-center {{ $stepClass }} {{ $stepActive }} {{ !$isEnabled ? 'disabled' : '' }}"
                        id="step-tab-{{ $index }}"
                        data-bs-toggle="{{ $isEnabled ? 'tab' : '' }}"
                        data-bs-target="{{ $isEnabled ? '#step-content-' . $index : '' }}"
                        type="button"
                        role="tab"
                        aria-controls="step-content-{{ $index }}"
                        aria-selected="{{ $isActive ? 'true' : 'false' }}"
                        {{ $isEnabled ? '' : 'tabindex="-1"' }}
                    >
                        <div class="step-icon"><i class="bi {{ $step['icon'] }}"></i></div>
                        <div class="step-label">{{ $step['label'] }}</div>
                    </button>
                @endforeach
            </div>

            <!-- Tab Content -->
            <div class="tab-content" id="stepTabContent">
                
                <!-- REJECT INFO IN CAN BE SHOW IN ALL STEP -->
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

                <!-- LAMARAN TERKIRIM -->
                <div class="tab-pane fade {{ $currentIndex == 0 ? 'show active' : '' }}" id="step-content-0" role="tabpanel" aria-labelledby="step-tab-0">
                    <div class="p-3 border rounded">
                        <h5>LAMARAN TELAH TERKIRIM</h5>
                        <p>{{ $data->created_at }}</p>
                    </div>
                </div>

                <!-- REVIEW ADMINISTRASI -->
                <div class="tab-pane fade {{ $currentIndex == 1 ? 'show active' : '' }}" id="step-content-1" role="tabpanel" aria-labelledby="step-tab-1">
                    <div class="p-3 border rounded">
                        <h5>REVIEW ADMINISTRASI</h5>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#showScreening">
                            <i class="bi bi-eye"></i> Lihat Respons Screening Anda
                        </button>
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
                        <br>
                        <br>
                        
                        <div class="progress-detail-item">
                            <div class="progress-detail-dot active"></div>
                            <div class="progress-detail-content active">
                                <div class="row progress-detail-title">
                                    <div class="col-6 fw-bold">Review</div>
                                    <div class="col-6 d-flex justify-content-end">{{ $data->created_at }}</div>
                                </div>
                                <div class="progress-detail-fill">
                                    <p>Data Anda sedang dalam proses verifikasi dan peninjauan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="progress-detail-item">
                            <div class="progress-detail-dot {{ $schedInterview || ($schedInterview == null && $data->status == 2) ? 'active' : '' }}"></div>
                            <div class="progress-detail-content {{ $schedInterview || ($schedInterview == null && $data->status == 2) ? 'active' : '' }}">
                                <div class="row progress-detail-title">
                                    <div class="col-6 fw-bold">Hasil</div>
                                    <div class="col-6 d-flex justify-content-end">
                                        @if($schedInterview)
                                            {{ $schedInterview->created_at ?? '-' }}
                                        @elseif($schedInterview == null && $data->status == 2)
                                            {{ $data->updated_at ?? '-' }}
                                        @else
                                        @endif
                                    </div>
                                </div>
                                <div class="progress-detail-fill">
                                    @if($schedInterview)
                                        <h3 class="fw-bold"><span class="badge bg-success text-white">LOLOS REVIEW</span></h3>
                                    @elseif($schedInterview == null && $data->status == 2)
                                        <h3 class="fw-bold"><span class="badge bg-danger text-white">GAGAL</span></h3>
                                    @else 
                                        -
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- INTERVIEW -->
                <div class="tab-pane fade {{ $currentIndex == 2 ? 'show active' : '' }}" id="step-content-2" role="tabpanel" aria-labelledby="step-tab-2">
                    <div class="p-3 border rounded">
                        <h5>INTERVIEW</h5>
                        @if($schedInterview)
                            <div class="progress-detail-item">
                                <div class="progress-detail-dot active"></div>
                                <div class="progress-detail-content active">
                                    <div class="row progress-detail-title">
                                        <div class="col-6 fw-bold">Ready To Interview</div>
                                        <div class="col-6 d-flex justify-content-end">{{ $schedInterview->created_at }}</div>
                                    </div>
                                    <div class="progress-detail-title">Jadwal</div>
                                    <ul class="progress-detail-fill">
                                        <li class="mb-n3">
                                            <b>Tanggal & Waktu</b>
                                            <p>{{ $schedInterview->interview_date ?? '-' }}</p>
                                        </li>
                                        <li class="mb-n3">
                                            <b>Alamat</b>
                                            <p>{{ $schedInterview->interview_address ?? '-' }}</p>
                                        </li>
                                        <li class="mb-n3">
                                            <b>Catatan</b>
                                            <p>{{ $schedInterview->interview_notes ?? '-' }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="progress-detail-item">
                                <div class="progress-detail-dot {{ ($schedInterview->ready_tested == 1 || $schedInterview->ready_tested == 2) ? 'active' : ''  }}"></div>
                                <div class="progress-detail-content {{ ($schedInterview->ready_tested == 1 || $schedInterview->ready_tested == 2) ? 'active' : ''  }}">
                                    <div class="row progress-detail-title">
                                        <div class="col-6 fw-bold">Hasil</div>
                                        <div class="col-6 d-flex justify-content-end">
                                            @if($schedInterview->ready_tested == 1 || $schedInterview->ready_tested == 2)
                                                {{ $schedInterview->updated_at ?? '-' }}
                                            @else
                                            @endif
                                        </div>
                                    </div>
                                    <div class="progress-detail-fill">
                                        @if($schedInterview->ready_tested == 1)
                                            <h3 class="fw-bold"><span class="badge bg-success text-white">LOLOS INTERVIEW</span></h3>
                                        @elseif($schedInterview->ready_tested == 2)
                                            <h3 class="fw-bold"><span class="badge bg-danger text-white">GAGAL INTERVIEW</span></h3>
                                        @else 
                                            -
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @else
                            <p>Menunggu Jadwal</p>
                        @endif
                    </div>
                </div>

                <!-- TESTED -->
                <div class="tab-pane fade {{ $currentIndex == 3 ? 'show active' : '' }}" id="step-content-3" role="tabpanel" aria-labelledby="step-tab-3">
                    <div class="p-3 border rounded">
                        <h5>TESTED</h5>
                        @if($schedTest)
                            <div class="progress-detail-item">
                                <div class="progress-detail-dot active"></div>
                                <div class="progress-detail-content active">
                                    <div class="row progress-detail-title">
                                        <div class="col-6 fw-bold">Ready To Test</div>
                                        <div class="col-6 d-flex justify-content-end">{{ $schedTest->created_at }}</div>
                                    </div>
                                    <div class="progress-detail-title">Jadwal</div>
                                    <ul class="progress-detail-fill">
                                        <li class="mb-n3">
                                            <b>Tanggal & Waktu</b>
                                            <p>{{ $schedTest->test_date ?? '-' }}</p>
                                        </li>
                                        <li class="mb-n3">
                                            <b>Alamat</b>
                                            <p>{{ $schedTest->test_address ?? '-' }}</p>
                                        </li>
                                        <li class="mb-n3">
                                            <b>Catatan</b>
                                            <p>{{ $schedTest->test_notes ?? '-' }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="progress-detail-item">
                                <div class="progress-detail-dot {{ ($schedTest->ready_offering == 1 || $schedTest->ready_offering == 2) ? 'active' : ''  }}"></div>
                                <div class="progress-detail-content {{ ($schedTest->ready_offering == 1 || $schedTest->ready_offering == 2) ? 'active' : ''  }}">
                                    <div class="row progress-detail-title">
                                        <div class="col-6 fw-bold">Hasil</div>
                                        <div class="col-6 d-flex justify-content-end">
                                            @if($schedTest->ready_offering == 1 || $schedTest->ready_offering == 2)
                                                {{ $schedTest->updated_at ?? '-' }}
                                            @else
                                            @endif
                                        </div>
                                    </div>
                                    <div class="progress-detail-fill">
                                        @if($schedTest->ready_offering == 1)
                                            <h3 class="fw-bold"><span class="badge bg-success text-white">LOLOS TEST</span></h3>
                                        @elseif($schedTest->ready_offering == 2)
                                            <h3 class="fw-bold"><span class="badge bg-danger text-white">GAGAL TEST</span></h3>
                                        @else 
                                            -
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @else
                            <p>Menunggu Jadwal</p>
                        @endif
                    </div>
                </div>

                <!-- OFFERING -->
                <div class="tab-pane fade {{ $currentIndex == 4 ? 'show active' : '' }}" id="step-content-4" role="tabpanel" aria-labelledby="step-tab-4">
                    <div class="p-3 border rounded">
                        <h5>OFFERING</h5>
                        @if($schedOffering)
                            <div class="progress-detail-item">
                                <div class="progress-detail-dot active"></div>
                                <div class="progress-detail-content active">
                                    <div class="row progress-detail-title">
                                        <div class="col-6 fw-bold">Ready To Offering</div>
                                        <div class="col-6 d-flex justify-content-end">{{ $schedOffering->created_at }}</div>
                                    </div>
                                    <div class="progress-detail-title">Jadwal</div>
                                    <ul class="progress-detail-fill">
                                        <li class="mb-n3">
                                            <b>Tanggal & Waktu</b>
                                            <p>{{ $schedOffering->offering_date ?? '-' }}</p>
                                        </li>
                                        <li class="mb-n3">
                                            <b>Alamat</b>
                                            <p>{{ $schedOffering->offering_address ?? '-' }}</p>
                                        </li>
                                        <li class="mb-n3">
                                            <b>Catatan</b>
                                            <p>{{ $schedOffering->offering_notes ?? '-' }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="progress-detail-item">
                                <div class="progress-detail-dot {{ ($schedOffering->ready_mcu == 1 || $schedOffering->ready_mcu == 2) ? 'active' : ''  }}"></div>
                                <div class="progress-detail-content {{ ($schedOffering->ready_mcu == 1 || $schedOffering->ready_mcu == 2) ? 'active' : ''  }}">
                                    <div class="row progress-detail-title">
                                        <div class="col-6 fw-bold">Hasil</div>
                                        <div class="col-6 d-flex justify-content-end">
                                            @if($schedOffering->ready_mcu == 1 || $schedOffering->ready_mcu == 2)
                                                {{ $schedOffering->updated_at ?? '-' }}
                                            @else
                                            @endif
                                        </div>
                                    </div>
                                    <div class="progress-detail-fill">
                                        @if($schedOffering->ready_mcu == 1)
                                            <h3 class="fw-bold"><span class="badge bg-success text-white">LOLOS OFFERING</span></h3>
                                        @elseif($schedOffering->ready_mcu == 2)
                                            <h3 class="fw-bold"><span class="badge bg-danger text-white">GAGAL OFFERING</span></h3>
                                        @else 
                                            -
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @else
                            <p>Menunggu Jadwal</p>
                        @endif
                    </div>
                </div>

                <!-- MCU -->
                <div class="tab-pane fade {{ $currentIndex == 5 ? 'show active' : '' }}" id="step-content-5" role="tabpanel" aria-labelledby="step-tab-5">
                    <div class="p-3 border rounded">
                        <h5>MEDICAL CHECK UP</h5>
                        @if($schedMCU)
                            <div class="progress-detail-item">
                                <div class="progress-detail-dot active"></div>
                                <div class="progress-detail-content active">
                                    <div class="row progress-detail-title">
                                        <div class="col-6 fw-bold">Ready To MCU</div>
                                        <div class="col-6 d-flex justify-content-end">{{ $schedMCU->created_at }}</div>
                                    </div>
                                    <div class="progress-detail-title">Jadwal</div>
                                    <ul class="progress-detail-fill">
                                        <li class="mb-n3">
                                            <b>Tanggal & Waktu</b>
                                            <p>{{ $schedMCU->mcu_date ?? '-' }}</p>
                                        </li>
                                        <li class="mb-n3">
                                            <b>Alamat</b>
                                            <p>{{ $schedMCU->mcu_address ?? '-' }}</p>
                                        </li>
                                        <li class="mb-n3">
                                            <b>Catatan</b>
                                            <p>{{ $schedMCU->mcu_notes ?? '-' }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="progress-detail-item">
                                <div class="progress-detail-dot {{ ($schedMCU->ready_hired == 1 || $schedMCU->ready_hired == 2) ? 'active' : ''  }}"></div>
                                <div class="progress-detail-content {{ ($schedMCU->ready_hired == 1 || $schedMCU->ready_hired == 2) ? 'active' : ''  }}">
                                    <div class="row progress-detail-title">
                                        <div class="col-6 fw-bold">Hasil</div>
                                        <div class="col-6 d-flex justify-content-end">
                                            @if($schedMCU->ready_hired == 1 || $schedMCU->ready_hired == 2)
                                                {{ $schedMCU->updated_at ?? '-' }}
                                            @else
                                            @endif
                                        </div>
                                    </div>
                                    <div class="progress-detail-fill">
                                        @if($schedMCU->ready_hired == 1)
                                            <h3 class="fw-bold"><span class="badge bg-success text-white">LOLOS MCU</span></h3>
                                        @elseif($schedMCU->ready_hired == 2)
                                            <h3 class="fw-bold"><span class="badge bg-danger text-white">GAGAL MCU</span></h3>
                                        @else 
                                            -
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @else
                            <p>Menunggu Jadwal</p>
                        @endif
                    </div>
                </div>

                <!-- END RESULT -->
                <div class="tab-pane fade {{ $currentIndex == 6 ? 'show active' : '' }}" id="step-content-6" role="tabpanel" aria-labelledby="step-tab-6">
                    <div class="p-3 border rounded">
                        <h5>HIRED / SIGNING CONTRACT</h5>
                        <p>Menunggu Jadwal</p>
                    </div>
                </div>

                <!-- END RESULT -->
                <div class="tab-pane fade {{ $currentIndex == 7 ? 'show active' : '' }}" id="step-content-7" role="tabpanel" aria-labelledby="step-tab-7">
                    <div class="p-3 border rounded">
                        <h5>HASIL AKHIR</h5>
                        @if($data->progress_status == 'ACCEPTED' && $data->status == 1)
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
                        @elseif($data->progress_status == 'REJECTED' && $data->status == 2)
                            <h3 class="fw-bold"><span class="badge bg-danger text-white">GAGAL</span></h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection