@extends('layouts.master')
@section('konten')

<section class="p-5">
	<div class="container">
		<div class="row">
			<div class="col-xl-4 offset-xl-4 col-md-12 col-12">
				<div class="text-center">
					<h1 class="mb-1">Tetapkan Kata Sandi Baru</h1>
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
						<form class="formLoad" action="{{ route('storeresetPassword') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<input type="hidden" name="email" value="{{ $user->email }}">
								<div class="col-lg-12">
									<div class="mb-3">
										<label class="form-label">Password</label> <small>(Min. 8 char, Kombinasi dengan Nomor)</small>
										<div class="password-field position-relative">
											<input type="password" class="form-control fakePassword" name="password" id="password" 
											placeholder="Masukkan Password.." value="{{ old('password') }}" 
											pattern="^(?=.*\d).{8,}$"
											title="Password harus minimal 8 karakter dan mengandung angka."
											required />
											<span><i class="bi bi-eye-slash passwordToggler"></i></span>
											<div class="invalid-feedback">Masukkan Password.</div>
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="mb-3">
										<label for="formSignUpConfirmPassword" class="form-label">Confirm Password</label>
										<div class="password-field position-relative">
											<input type="password" class="form-control fakePassword" id="confirm_password" placeholder="Masukkan Ulang Password.." required />
											<span><i class="bi bi-eye-slash passwordToggler"></i></span>
											<div class="invalid-feedback">Masukkan Ulang Password yang cocok.</div>
										</div>
									</div>
								</div>
							</div>

							<div class="d-grid">
								<button class="btn btn-danger" type="submit">Reset Password</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection