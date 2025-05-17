@extends('layouts.master')
@section('konten')

<section class="bg-white">
	<div class="container py-4">
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<div class="page-title-left">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a class="text-danger" href="{{ route('home') }}">Home</a></li>
							<li class="breadcrumb-item"><a class="text-danger" href="{{ route('home') }}#career">Karir</a></li>
							<li class="breadcrumb-item active"> Detail</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
    </div>
</section>
	
<section class="my-xl-5 my-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
				<div class="card">
					<div class="card-body">
						<h2 class="fw-bold mb-0">{{ $data->position_name }}</h2>
						<p class="text-muted mb-3">{{ $data->dept_name }}</p>
						<hr>
						
						<h3 class="fw-bold"><span class="badge bg-secondary text-dark">Deskripsi Pekerjaan</span></h3>
						<div class="text-muted mb-3">
							{!! $data->jobdesc !!}
						</div>
						<br>

						<h3 class="fw-bold"><span class="badge bg-secondary text-dark">Persyaratan</span></h3>
						<div class="text-muted mb-3">
							{!! $data->requirement !!}
						</div>
					</div>
				</div>
			</div>
            <div class="col-lg-6">
				<div class="row">
					<div class="col-12 mb-3 order-lg-2">
						<div class="card">
							<div class="card-body">
								<div class="card p-2 mb-2">
									<div class="d-flex">
										<i class="career-icon bi bi-calendar-check me-2 align-self-start"></i>
										<div>
											<div class="fw-bold">Periode Pendaftaran</div>
											<div>
												{{ \Carbon\Carbon::parse($data->rec_date_start)->translatedFormat('d M Y') }}
												@if ($data->rec_date_end)
													- {{ \Carbon\Carbon::parse($data->rec_date_end)->translatedFormat('d M Y') }}
												@endif
											</div>
										</div>
									</div>
								</div>
								<div class="card p-2 mb-2">
									<div class="d-flex">
										<i class="career-icon bi bi-mortarboard-fill me-2 align-self-start"></i>
										<div>
											<div class="fw-bold">Pendidikan</div>
											<div>{{ $data->min_education ?? '-' }}</div>
										</div>
									</div>
								</div>
								<div class="card p-2 mb-2">
									<div class="d-flex">
										<i class="career-icon bi bi-briefcase-fill me-2 align-self-start"></i>
										<div>
											<div class="fw-bold">Pengalaman di Bidang yang Sama</div>
											<div>
												@if (!is_null($data->min_yoe))
													> {{ $data->min_yoe }} tahun
												@else
													-
												@endif
											</div>                                        
										</div>
									</div>
								</div>
								<div class="card p-2 mb-2">
									<div class="d-flex">
										<i class="career-icon bi bi-person-fill me-2 align-self-start"></i>
										<div>
											<div class="fw-bold">Umur</div>
											<div>
												@if (!is_null($data->min_age))
													> {{ $data->min_age }} tahun
												@else
													-
												@endif
											</div>                                        
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 mb-3 order-lg-1">
						<div class="card">
							<div class="card-body">
								<div class="d-grid px-2">
									<a href="{{ route('job.apply', encrypt($data->id)) }}" type="button" class="btn btn-lg btn-danger">Ajukan Lamaran</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</section>

<section class="my-xl-5 my-5">
	<br>
</section>

@endsection