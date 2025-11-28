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
							<li class="breadcrumb-item"><a class="text-danger" href="{{ route('job.detail', encrypt($data->id)) }}">{{ $data->position_name }}</a></li>
							<li class="breadcrumb-item active"> Screening</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
    </div>
</section>
	
<style>
    .step { display: none; }
    .step.active { display: block; }
</style>

<section class="my-xl-5 my-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-12">
				<div class="card">
					<div class="card-header bg-secondary">
						<h2 class="fw-bold mb-0">{{ $data->position_name }}</h2>
						<p class="text-muted mb-3">{{ $data->dept_name }}</p>
					</div>
					<div class="card-body">
						<form class="formLoad" id="formScreening" action="{{ route('jobApply.storeScreening') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="id_job" value="{{ $data->id }}">
							<input type="hidden" name="screening_content" id="screening_content">
							{{-- Step 1 --}}
							<div class="step active">
								<div class="mb-3">
									<label class="fw-bold">Apa yang membuat Anda tertarik untuk melamar di perusahaan ini?</label>
									<textarea class="form-control answer" data-question="Apa yang membuat Anda tertarik untuk melamar di perusahaan ini?" required placeholder="Jelaskan alasan anda."></textarea>
								</div>
								<div class="mb-3">
									<label class="fw-bold">Keahlian: Hardskill, Softskill</label>
									<textarea class="form-control answer" data-question="Keahlian: Hardskill, Softskill" required placeholder="Contoh: Hardskill: Pemrograman (Python, Java), Analisis Data. Softskill: Komunikasi, Kepemimpinan, Manajemen Waktu."></textarea>
								</div>
								<div class="mb-3">
									<label class="fw-bold">Penguasaan Bahasa</label>
									<textarea class="form-control answer" data-question="Penguasaan Bahasa" required placeholder="Contoh: Bahasa Indonesia (aktif), Bahasa Inggris (pasif), Bahasa Jepang (dasar)."></textarea>
								</div>
								<hr>
								<div class="d-flex justify-content-end">
									<button type="button" class="btn btn-danger" onclick="nextStep()">Berikutnya</button>
								</div>
							</div>
						
							{{-- Step 2 --}}
							<div class="step">
								<div class="mb-3">
									<label class="fw-bold">Apa Kelebihan dan Kelemahan Anda?</label>
									<textarea class="form-control answer" data-question="Apa Kelebihan dan Kelemahan Anda?" required placeholder="Tulis Kelebihan & Kelemahan"></textarea>
								</div>
								<div class="mb-3">
									<label class="fw-bold">Prestasi/Pencapaian Terbesar</label>
									<textarea class="form-control answer" data-question="Apa Prestasi atau Pencapaian Terbesar Anda dalam Karir pekerjaan/Kemahasiswaan/Sekolah/Organisasi?" required placeholder="Contoh: Menjadi ketua tim yang berhasil memenangkan lomba debat nasional, atau menyelesaikan proyek digitalisasi dalam waktu singkat di perusahaan sebelumnya."></textarea>
								</div>
								<div class="mb-3">
									<label class="fw-bold">Mengapa Anda ingin bekerja di posisi ini?</label>
									<textarea class="form-control answer" data-question="Mengapa Anda ingin bekerja di posisi ini?" required placeholder="Jelaskan alasan memilih posisi ini."></textarea>
								</div>
								<hr>
								<div class="d-flex justify-content-between">
									<button type="button" class="btn btn-secondary" onclick="prevStep()">Sebelumnya</button>
									<button type="button" class="btn btn-danger" onclick="nextStep()">Berikutnya</button>
								</div>
							</div>

							{{-- Step 3 --}}
							<div class="step">
								<div class="mb-3">
									<label class="fw-bold">Apa yang Anda ketahui tentang posisi yang Anda lamar?</label>
									<textarea class="form-control answer" data-question="Apa yang Anda ketahui tentang Posisi yang Anda lamar?" required placeholder="Jelaskan.."></textarea>
								</div>
								<div class="mb-3">
									<label class="fw-bold">Tiga keterampilan utama yang Anda kuasai</label>
									<textarea class="form-control answer" data-question="Sebutkan tiga keterampilan utama yang Anda kuasai dan relevan dengan pekerjaan yang Anda Lamar" required placeholder="Contoh: Manajemen proyek, komunikasi efektif, dan analisis data."></textarea>
								</div>
								<div class="mb-3">
									<label class="fw-bold">Nilai-nilai yang penting dalam bekerja</label>
									<textarea class="form-control answer" data-question="Apa nilai-nilai yang paling penting bagi Anda dalam bekerja?" required placeholder="Jelaskan.."></textarea>
								</div>
								<hr>
								<div class="d-flex justify-content-between">
									<button type="button" class="btn btn-secondary" onclick="prevStep()">Sebelumnya</button>
									<button type="button" class="btn btn-danger" onclick="nextStep()">Berikutnya</button>
								</div>
							</div>

							{{-- Step 4 --}}
							<div class="step">
								<div class="mb-3">
									<label class="fw-bold">Kesiapan bepergian dinas ke luar kota</label>
									<select class="form-select answer" data-question="Kesiapan untuk Bepergian Dinas ke luar kota" required>
										<option value="">Pilih</option>
										<option value="Ya">Ya</option>
										<option value="Tidak">Tidak</option>
									</select>
								</div>
								<div class="mb-3">
									<label class="fw-bold">Kesediaan untuk ditempatkan di mana saja (Serang, Cilegon, Pandeglang, Lebak)</label>
									<select class="form-select answer" data-question="Kesediaan untuk ditempatkan di mana saja (Serang, Cilegon, Pandeglang, Lebak)" required>
										<option value="">Pilih</option>
										<option value="Ya">Ya</option>
										<option value="Tidak">Tidak</option>
									</select>
								</div>
								<div class="mb-3">
									<label class="fw-bold">Kesediaan mengikuti pelatihan/training</label>
									<select class="form-select answer" data-question="Kesediaan mengikuti pelatihan/training" required>
										<option value="">Pilih</option>
										<option value="Ya">Ya</option>
										<option value="Tidak">Tidak</option>
									</select>
								</div>
								<hr>
								<div class="d-flex justify-content-between">
									<button type="button" class="btn btn-secondary" onclick="prevStep()">Sebelumnya</button>
									<button type="button" class="btn btn-danger" onclick="nextStep()">Berikutnya</button>
								</div>
							</div>

							{{-- Step 5 --}}
							<div class="step">
								<div class="mb-3">
									<label class="fw-bold">Gaji yang diharapkan</label>
									<input type="text" class="form-control answer currency" data-question="Gaji yang diharapkan" required placeholder="Dalam Rupiah">
									<script>
										// Fungsi format ke Rupiah
										function formatRupiah(angka) {
											let number_string = angka.replace(/[^,\d]/g, "").toString(),
												split   	 = number_string.split(","),
												sisa     	 = split[0].length % 3,
												rupiah     	 = split[0].substr(0, sisa),
												ribuan     	 = split[0].substr(sisa).match(/\d{3}/gi);
											if (ribuan) {
												let separator = sisa ? "." : "";
												rupiah += separator + ribuan.join(".");
											}
											rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
											return rupiah ? "Rp " + rupiah : "";
										}
										// Event input
										document.querySelectorAll(".currency").forEach(function(input) {
											input.addEventListener("keyup", function(e) {
												this.value = formatRupiah(this.value);
											});
										});
										// Cara ambil nilai asli (tanpa format)
										function getNumericValue(input) {
											return input.value.replace(/[^0-9]/g, "");
										}
									</script>
								</div>
								<div class="mb-3">
									<label class="fw-bold">Tanggal ketersediaan mulai bekerja</label>
									<input type="date" class="form-control answer" data-question="Tanggal Ketersediaan untuk Mulai Bekerja" required>
								</div>
								<div class="mb-3">
									<label class="fw-bold">Software/Teknologi yang Anda kuasai</label>
									<textarea class="form-control answer" data-question="Sebutkan software, tools, atau teknologi yang Anda kuasai" required placeholder="Contoh: Microsoft Office, AutoCAD, Python, Canva, Google Workspace."></textarea>
								</div>
								<div class="mb-3">
									<label class="fw-bold">Seberapa mahir Anda menggunakan Excel?</label>
									<textarea class="form-control answer" data-question="Seberapa mahir Anda dalam menggunakan tools Excel?" required placeholder="Contoh: Saya cukup mahir menggunakan Excel, termasuk penggunaan rumus, pivot table, dan data visualization."></textarea>
								</div>
								<hr>
								<div class="d-flex justify-content-between">
									<button type="button" class="btn btn-secondary" onclick="prevStep()">Sebelumnya</button>
									<button type="button" class="btn btn-danger" onclick="nextStep()">Berikutnya</button>
								</div>
							</div>

							{{-- Step 6 --}}
							<div class="step">
								<div class="mb-3">
									<label class="fw-bold">Apakah Anda memiliki sosial media?</label>
									<select class="form-select answer" data-question="Apakah Anda mempunyai sosial media?" required>
										<option value="">Pilih</option>
										<option value="Ya">Ya</option>
										<option value="Tidak">Tidak</option>
									</select>
								</div>
								<div class="mb-3">
									<label class="fw-bold">Jika Ya, Tulis Beberapa Sosial Media yang anda punya</label>
									<textarea class="form-control answer" data-question="Sosial Media" required placeholder="Contoh: Instagram: @namakamu, LinkedIn: linkedin.com/in/namakamu, Facebook: Nama Kamu"></textarea>
								</div>								
								<div class="mb-3">
									<label class="fw-bold">Alasan utama bertahan di suatu perusahaan</label>
									<textarea class="form-control answer" data-question="Apa alasan utama yang bisa membuat Anda bertahan lama di suatu perusahaan?" required placeholder="Sebutkan.."></textarea>
								</div>
								<div class="mb-3">
									<label class="fw-bold">Alasan utama meninggalkan perusahaan sebelumnya</label>
									<textarea class="form-control answer" data-question="Apa alasan utama yang bisa membuat Anda meninggalkan suatu perusahaan?" required placeholder="Sebutkan.."></textarea>
								</div>
								<hr>
								<div class="d-flex justify-content-between">
									<button type="button" class="btn btn-secondary" onclick="prevStep()">Sebelumnya</button>
									<button type="submit" class="btn btn-success">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
        </div>
    </div>
</section>

<script>
	let currentStep = 0;
	const steps = document.querySelectorAll('.step');

	function showStep(index) {
		steps.forEach((step, i) => step.classList.toggle('active', i === index));
	}

	function validateStep(stepElement) {
		const inputs = stepElement.querySelectorAll('.answer');
		let isValid = true;

		inputs.forEach(input => {
			if (!input.value.trim()) {
				input.classList.add('is-invalid');
				isValid = false;
			} else {
				input.classList.remove('is-invalid');
			}
		});

		return isValid;
	}

	function nextStep() {
		const currentStepElement = steps[currentStep];
		if (validateStep(currentStepElement)) {
			if (currentStep < steps.length - 1) {
				currentStep++;
				showStep(currentStep);
			}
		}
	}

	function prevStep() {
		if (currentStep > 0) {
			currentStep--;
			showStep(currentStep);
		}
	}
	document.getElementById('formScreening').addEventListener('submit', function(e) {
		const answers = document.querySelectorAll('.answer');
		let result = [];

		answers.forEach(answer => {
			const question = answer.getAttribute('data-question');
			const value = answer.value;
			result.push({ question, answer: value });
		});

		document.getElementById('screening_content').value = JSON.stringify(result);
	});
</script>


<section class="my-xl-5 my-5"><br></section>

@endsection