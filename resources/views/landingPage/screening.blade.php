@extends('landingPage.master')
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
							<li class="breadcrumb-item"><a class="text-danger" href="{{ route('job.detail', encrypt($data->id)) }}">{{ $data->position_name }}</a></li>
							<li class="breadcrumb-item active"> Screening</li>
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
            <div class="col-12">
				<div class="card">
					<div class="card-body">
						<h2 class="fw-bold mb-0">{{ $data->position_name }}</h2>
						<p class="text-muted mb-3">{{ $data->dept_name }}</p>
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