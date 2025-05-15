@extends('layouts.master')
@section('konten')

<section class="p-5">
	<div class="container">
		<div class="row">
			<div class="col-xl-4 offset-xl-4 col-md-12 col-12">
				<div class="text-center">
					<h1 class="mb-1">Lupa Password?</h1>
					<p class="mb-0">
						Jangan khawatir, kami akan mengirimkan Anda instruksi pengaturan ulang.
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
						<form class="formLoad" action="{{ route('storeforgetPassword') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-lg-12">
									<div class="mb-3">
										<label class="form-label">Email<span class="text-danger">*</span></label>
										<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Masukkan Email yang terdaftar.." required />
										<div class="invalid-feedback">Masukkan Email.</div>
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