@extends('layouts.master')
@section('konten')

<!-- CAPTCHA CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/captcha.css') }}"/>

<section class="p-5">
	<div class="container">
		<div class="row">
			<div class="col-xl-4 offset-xl-4 col-md-12 col-12">
				<div class="text-center">
					<h1 class="mb-1">Selamat Datang</h1>
					<p class="mb-0">
						Belum punya akun?
						<a href="{{ route('register') }}" class="text-danger">Daftar disini</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="row justify-content-center mb-6">
			<div class="col-xl-5 col-lg-6 col-md-8 col-12 mb-4">
				<div class="card shadow-sm mb-3">
					<div class="card-body">
						<form class="formLoad" action="{{ route('postlogin') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-lg-12">
									<div class="mb-3">
										<label class="form-label">Email<span class="text-danger">*</span></label>
										<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Masukkan Email yang valid.." required />
										<div class="invalid-feedback">Masukkan Email.</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="mb-3">
										<label class="form-label">Password<span class="text-danger">*</span></label>
										<div class="password-field position-relative">
											<input type="password" class="form-control fakePassword" name="password" placeholder="Masukkan Password.." value="{{ old('password') }}" required />
											<span><i class="bi bi-eye-slash passwordToggler"></i></span>
											<div class="invalid-feedback">Masukkan Password.</div>
										</div>
									</div>
								</div>
								<!-- CAPTCHA display and refresh -->
								<div class="col-lg-12">
									<div class="mb-5">
										<label class="form-label">Captcha<span class="text-danger">*</span></label>
										<div class="d-flex align-items-center">
											<div class="captcha-container me-2">
												<div class="captcha" id="captcha-text">
													@foreach(str_split(session('captcha_code')) as $index => $char)
														<span class="captcha-char" style="--i:{{ $index }}; --rand:{{ rand(0, 4) }};">{{ $char }}</span>
													@endforeach
												</div>
												<div class="middle-line"></div>
											</div>
											<button type="button" id="refresh-captcha" title="Refresh Kode Captcha">↻</button>
										</div>
										<input type="text" class="form-control mt-2" name="captcha_input" placeholder="Masukkan kode CAPTCHA" required/>
									</div>
								</div>
							</div>
							<div class="mb-4 d-flex align-items-center justify-content-between">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="rememberMeCheckbox" />
									<label class="form-check-label" for="rememberMeCheckbox">Remember me</label>
								</div>
								<div><a href="{{ route('forgetPassword') }}" class="text-danger">Forgot Password</a></div>
							</div>

							<div class="d-grid">
								<button class="btn btn-danger" type="submit">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- CAPTCHA JS -->
<script src="{{ asset('assets/js/captcha.js') }}"></script>

@endsection