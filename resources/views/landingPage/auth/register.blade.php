@extends('landingPage.master')
@section('konten')

<section class="p-5">
	<div class="container">
		<div class="row">
			<div class="col-xl-4 offset-xl-4 col-md-12 col-12">
				<div class="text-center">
					<h1 class="mb-1">Buat Akun Baru</h1>
					<p class="mb-0">Mulai proses rekrutmen Anda dengan membuat akun secara gratis dan instan.</p>
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
						<form class="needs-validation mb-6" novalidate>
							<div class="mb-3">
								<label for="signupFullnameInput" class="form-label">Full Name</label>
								<input type="text" class="form-control" id="signupFullnameInput" required />
								<div class="invalid-feedback">Please enter full name</div>
							</div>
							<div class="mb-3">
								<label for="signupEmailInput" class="form-label">
									Email
									<span class="text-danger">*</span>
								</label>
								<input type="email" class="form-control" id="signupEmailInput" required />
								<div class="invalid-feedback">Please enter email.</div>
							</div>
							<div class="mb-3">
								<label for="formSignUpPassword" class="form-label">Password</label>
								<div class="password-field position-relative">
									<input type="password" class="form-control fakePassword" id="formSignUpPassword" required />
									<span><i class="bi bi-eye-slash passwordToggler"></i></span>
									<div class="invalid-feedback">Please enter password.</div>
								</div>
							</div>
							<div class="mb-3">
								<label for="formSignUpConfirmPassword" class="form-label">Confirm Password</label>
								<div class="password-field position-relative">
									<input type="password" class="form-control fakePassword" id="formSignUpConfirmPassword" required />
									<span><i class="bi bi-eye-slash passwordToggler"></i></span>
									<div class="invalid-feedback">Please enter password.</div>
								</div>
							</div>
							<div class="mb-3">
								<div class="mb-4 d-flex align-items-center justify-content-between">
									<div class="form-check">
									<input class="form-check-input" type="checkbox" id="signupCheckTextCheckbox" />
									<label class="form-check-label ms-2" for="signupCheckTextCheckbox">
										Saya menyetujui <span onclick="openModal()" class="containers" data-bs-toggle="modal" data-bs-target="#terms" style="text-decoration: underline; cursor: pointer;"><b>syarat dan kondisi</b></span> sebagaimana ditetapkan dalam perjanjian pengguna
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

<style>
	/* Modal Styling */
.modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    /* top: 8vh; */
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    background-color: #fefefe;
    border: 1px solid #888;
    border-radius: 5px;
}

.modal-header {
    background-color: #5f6991;
    color: white;
    border-bottom: none;
}

.modal-header .modal-title {
    color: inherit;
}

.modal-header button.btn-close {
    background-color: #ffffff;
}

.modal-body {
    padding: 15px;
}

.modal-footer {
    padding: 8px;
}

</style>
<div id="termsc" class="modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title font-weight-bold" id="termhead">Terms & Conditions</h6>
				<button type="button" class="btn-close" onclick="closeModal()"></button>
			</div>
			<div class="modal-body" style="max-height: 63vh; overflow-y: auto;">
				<div id="termbodyidn">
					<b>Keterangan Syarat dan Kondisi Layanan Internet:</b>
					<ul class="mt-2">
					<li>Jaringan 100% Fiber Optic.</li>
					<li>1 IP Public /30. (Dedicated)</li>
					<li>Service Agreement level 99,5% (Dedicated)</li>
					<li>24/7 Customer Care Support & 2 Engginer stanby on site.</li>
					<li>Biaya di atas sudah termasuk penggunaan durasi internet selama Pekan Raya Jakarta berlangsung.</li>
					<li>Biaya di atas belum termasuk penyewaan perangkat tambahan (Switch hub, Akses Point dll)</li>
					<li>Biaya di atas belum termasuk PPN 11% dan tagihan wajib dilunasi 3 (tiga) hari setelah RFS.</li>
					<li>Biaya di atas belum termasuk Relokasi perangkat & penambahan spot baru jika terjadi perubahan Layout.</li>
					<li>Khusus Biaya Installasi pada lokasi Outdoor/Open Area, dikenakan biaya Rp. 10,000,000,-</li>
					<li>1 Spot di pinjamkan 1 ONT dengan toleransi diberikan 3-unit LAN.</li>
					<li>Apabila terjadi kerusakan / kehilangan pada perangkat kami dengan sengaja atau tidak sengaja, akan dikenakan biaya pergantian perangkat sebesar Rp, 1,500,000.</li>
					<li>Pengerjaan instalasi akan dimulai setelah Pelanggan mengirimkan Purchase Order (PO) dan atau Konfirmasi Persetujuan Syarat dengan menandatangani Sales Order Form (SOF).</li>
					<li>Target Ready For Service (RFS) adalah 4 (Empat) hari kerja.</li>
					<li>Masa berlaku penawaran ini, hingga akhir Mei 2024.</li>
					</ul>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-secondary" onclick="closeModal()" id="clsBtn">Close</button>
			</div>
		</div>
	</div>
</div>

<script>
	function openModal() {
		var modal = document.getElementById("termsc");
		modal.style.display = "block";
	}

	function closeModal() {
		var modal = document.getElementById("termsc");
		modal.style.display = "none";
	}
</script>

@endsection