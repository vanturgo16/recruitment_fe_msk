@extends('layouts.master')
@section('konten')

<section class="p-5">
	<div class="container">
		<div class="row">
			<div class="col-xl-4 offset-xl-4 col-md-12 col-12">
				<div class="text-center">
					<h1 class="mb-1">Buat Akun Baru</h1>
					<p class="mb-0">Mulai proses rekrutmen Anda dengan membuat akun.</p>
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
						<form class="formLoad" action="{{ route('storeRegist') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label">Nama Depan<span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" placeholder="Masukkan Nama.." required />
										<div class="invalid-feedback">Masukkan Nama Depan</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label">Nama Belakang<span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" placeholder="Masukkan Nama Belakang.." required />
										<div class="invalid-feedback">Masukkan Nama Belakang</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="mb-3">
										<label class="form-label">NIK (Nomor Induk Kependudukan)<span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="nik" maxlength="16" inputmode="numeric" 
											placeholder="Masukkan 16-digit NIK.." value="{{ old('nik') }}" 
											oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)" required />
										<div class="invalid-feedback">Masukkan NIK</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="mb-3">
										<label class="form-label">No. Telepon <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" 
											placeholder="08xxxxxxxxxx" oninput="validatePhone(this)" required/>
										<div class="invalid-feedback">Masukkan Nomor Telepon yang valid</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="mb-3">
										<label class="form-label">Email<span class="text-danger">*</span></label>
										<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Masukkan Email yang valid.." required />
										<div class="invalid-feedback">Masukkan Email.</div>
									</div>
								</div>
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
							<div class="mb-3">
								<div class="mb-4 d-flex align-items-center justify-content-between">
									<div class="form-check">
									<input class="form-check-input" type="checkbox" id="signupCheckTextCheckbox" title="" required/>
									<label class="form-check-label ms-2" for="signupCheckTextCheckbox">
										Saya menyetujui <span class="containers" data-bs-toggle="modal" data-bs-target="#terms" style="text-decoration: underline; cursor: pointer;"><b>syarat dan kondisi</b></span> sebagaimana ditetapkan dalam perjanjian pengguna
									</label>
									</div>
								</div>
							</div>

							<div class="d-grid">
								<button class="btn btn-danger" type="submit">Daftar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<div class="modal fade" id="terms" tabindex="-1" aria-labelledby="exampleModalCenteredScrollable" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header bg-danger text-white">
				<h1 class="modal-title fs-5" id="exampleModalCenteredScrollableTitle">Terms & Conditions</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<b>Keterangan Syarat dan Kondisi Pendaftaran Rekrutmen MITRA SENDANG KEMAKMURAN:</b>
				<ul class="mt-2">
					<li>Peserta wajib mengisi data diri dengan lengkap dan benar sesuai dokumen resmi.</li>
					<li>Seluruh dokumen yang dilampirkan harus masih berlaku dan dapat dipertanggungjawabkan.</li>
					<li>Proses seleksi dilakukan secara bertahap dan keputusan panitia bersifat mutlak serta tidak dapat diganggu gugat.</li>
					<li>Peserta tidak dipungut biaya apapun selama proses rekrutmen berlangsung.</li>
					<li>Hanya kandidat yang memenuhi kualifikasi yang akan dihubungi untuk tahap selanjutnya.</li>
					<li>Data-data yang didaftarkan akan digunakan untuk keperluan proses seleksi dan administrasi, serta dijaga kerahasiaannya sesuai kebijakan privasi perusahaan.</li>
				</ul>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

@endsection