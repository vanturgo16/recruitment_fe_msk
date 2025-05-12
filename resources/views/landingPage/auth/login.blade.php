@extends('landingPage.master')
@section('konten')

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

@endsection