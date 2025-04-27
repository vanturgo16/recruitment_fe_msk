@extends('landingPage.master')
@section('konten')

<section id="home">
	<div data-cue="fadeIn" class="bg-dark py-3 background-section">
		<section data-cue="fadeIn">
			<div class="container">
			   <a href="#!">
				  <div class="py-lg-10 rounded-3 px-lg-8 py-md-8 px-md-6 p-4 image-blur bg-company">
					 <div class="row g-0">
						<div class="col-xxl-6 col-xl-7 col-lg-8">
						   <div class="d-flex flex-column gap-5" data-cue="zoomIn">
							  <div>
								 <span class="badge bg-danger border border-white text-white-stable px-3 py-2 fw-medium rounded-pill fs-8">RECRUITMENT MITRA SENDANG KEMAKMURAN</span>
							  </div>
							  <div class="d-flex flex-column gap-6">
								 <div class="d-flex flex-column gap-3">
									<h1 class="mb-0 text-white-stable">Mari Bertumbuh Bersama AHASS Banten</h1>
									<p class="mb-0 text-white-stable">
									   Buka lembaran baru dalam perjalanan karier Anda bersama AHASS Banten — jaringan bengkel resmi yang terus berkembang. Kami mencari individu berbakat dan berdedikasi untuk bergabung dalam tim profesional kami. Raih kesempatan untuk berkembang, berkontribusi, dan sukses bersama kami.
									</p>
								 </div>
								 <div class="d-flex align-items-center">
									<a href="#!" class="btn btn-danger">Lihat Kesempatan</a>
								 </div>
							  </div>
						   </div>
						</div>
						<div class="col-xxl-6 col-xl-5 col-lg-4 d-none d-lg-block text-end d-flex flex-column justify-content-end">
							<img src="{{ asset('assets/images/test2.png') }}" alt="Person Standing" class="img-fluid" style="max-height: 400px;">
						</div>
					</div>
				  </div>
			   </a>
			</div>
		</section>
	</div>
</section>


<!--Who we are start-->
<section class="my-xl-9 my-5" id="home">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-5 col-lg-6 col-12">
                <div class="mb-4">
                    <small class="text-uppercase ls-md fw-semibold">
						Siapa Kami
					</small>
					<h2 class="h1 mt-4 mb-3">Komitmen Kami untuk Layanan Terbaik Honda.</h2>
                    <p class="mb-3">
						PT Mitra Sendang Kemakmuran adalah jaringan resmi Honda di Banten yang melayani penjualan motor, layanan bengkel, dan penyediaan suku cadang asli Honda.
					</p>
					<p class="mb-0">
						Dengan pelayanan profesional dan fasilitas terbaik, kami berkomitmen memberikan pengalaman terbaik bagi setiap pelanggan setia Honda.
					</p>
                </div>
            </div>
            <div class="col-xl-6 offset-xl-1 col-lg-6 col-12">
                <div class="row g-4">
                    <div class="col-lg-6 col-md-6 col-12">
                        <a href="#!">
                            <div class="rounded-3 card-lift" style="
								background-image: url('{{ asset('assets/images/msk/MSK.png') }}');
								background-repeat: no-repeat;
								height: 386px;
								background-size: cover;
							"></div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <a href="#!">
                            <div class="mb-4 rounded-3 card-lift" style="
								background-image: url('{{ asset('assets/images/msk/MSK-2.jpg') }}');
								background-repeat: no-repeat;
								height: 180px;
								background-size: cover;
							"></div>
                        </a>
                        <a href="#!">
                            <div class="mb-2 rounded-3 card-lift" style="
								background-image: url('{{ asset('assets/images/msk/MSK-Qurban.jpg') }}');
								background-repeat: no-repeat;
								height: 180px;
								background-size: cover;
							"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Who we are end-->

<!--Expert team start-->
<section id="home">
    <div class="container">
        <div class="row border-top border-bottom">
			<div class="col-md-4 border-end-md border-bottom border-bottom-md-0">
				<div class="text-center py-lg-5 p-4">
					<div class="mb-4">
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
							class="bi bi-people-fill text-danger" viewBox="0 0 16 16">
							<path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
						</svg>
					</div>
					<div>
						<h4>Tim Profesional</h4>
						<p class="mb-0">Didukung teknisi berpengalaman dan staf ahli untuk melayani kebutuhan kendaraan Anda.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 border-end-md border-bottom border-bottom-md-0">
				<div class="text-center py-lg-5 p-4">
					<div class="mb-4">
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
							class="bi bi-trophy-fill text-danger" viewBox="0 0 16 16">
							<path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935z" />
						</svg>
					</div>
					<div>
						<h4>Pelayanan Terbaik</h4>
						<p class="mb-0">Kami berkomitmen memberikan layanan penjualan, bengkel, dan suku cadang terbaik untuk pelanggan Honda.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="text-center py-lg-5 p-4">
					<div class="mb-4">
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
							class="bi bi-stars text-danger" viewBox="0 0 16 16">
							<path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z" />
						</svg>
					</div>
					<div>
						<h4>Lebih dari 10 Tahun</h4>
						<p class="mb-0">Berpengalaman lebih dari satu dekade dalam melayani kebutuhan pelanggan Honda di Banten.</p>
					</div>
				</div>
			</div>
		</div>
		
    </div>
</section>
<!--Expert team end-->

<section class="career-section my-xl-9 my-5" id="career">
    <div class="container">
		<div class="row mb-4">
			<div class="col-xl-8 offset-xl-2 col-12">
			   <div class="d-flex flex-column gap-2 mx-lg-8 text-center">
				  <h2 class="mb-0">Karir</h2>
				  <p class="mb-0 lead">
					Daftar Kesempatan Berkarir Bersama PT Mitra Sendang Kemakmuran
				  </p>
			   </div>
			</div>
		</div>
        <div class="row g-4">
            <div class="col-12">
                <div class="career-card p-4 transition">
                    <h4 class="fw-bold mb-2">Staff</h5>
                    <p class="text-muted mb-3">IT & Helpdesk</p>
					<hr>
                    <div class="career-requirements row mb-3">
                        <div class="career-degree col-md-6">
							<div class="d-flex">
								<i class="career-icon bi bi-calendar-check me-2 align-self-start"></i>
								<div>
									<div class="fw-bold">Periode Pendaftaran</div>
									<div>01 Mei 2025 - 31 Mei 2025</div>
								</div>
							</div>
                        </div>
                        <div class="career-degree col-md-6">
							<div class="d-flex">
								<i class="career-icon bi bi-mortarboard-fill me-2 align-self-start"></i>
								<div>
									<div class="fw-bold">Pendidikan</div>
									<div>S1/Sarjana</div>
								</div>
							</div>							
						</div>
                        <div class="career-degree col-md-6">
							<div class="d-flex">
								<i class="career-icon bi bi-briefcase-fill me-2 align-self-start"></i>
								<div>
									<div class="fw-bold">Pengalaman di Bidang yang Sama</div>
									<div>> 2 tahun</div>
								</div>
							</div>
						</div>
                        <div class="career-degree col-md-6">
							<div class="d-flex">
								<i class="career-icon bi bi-person-fill me-2 align-self-start"></i>
								<div>
									<div class="fw-bold">Umur</div>
									<div>> 25 tahun</div>
								</div>
							</div>
						</div>
                    </div>
					<div class="career-description text-muted mb-3">
						Bertanggung jawab atas support IT harian, maintenance hardware dan software, serta troubleshooting jaringan internal perusahaan.
						Bertanggung jawab atas support IT harian, maintenance hardware dan software, serta troubleshooting jaringan internal perusahaan.
						Bertanggung jawab atas support IT harian, maintenance hardware dan software, serta troubleshooting jaringan internal perusahaan.
						Bertanggung jawab atas support IT harian, maintenance hardware dan software, serta troubleshooting jaringan internal perusahaan.
						Bertanggung jawab atas support IT harian, maintenance hardware dan software, serta troubleshooting jaringan internal perusahaan.
						Bertanggung jawab atas support IT harian, maintenance hardware dan software, serta troubleshooting jaringan internal perusahaan.
					</div>
					<hr>
                    <div class="career-tags d-flex gap-2 flex-wrap">
						<a href="#!" class="btn btn-small btn-info text-white">
							<span class="badge bg-light text-dark"><i class="bi bi-eye"></i></span>
							Detail Lowongan
						</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<hr>
	<div class="container">
		<div class="row mb-4">
			<div class="col-xl-8 offset-xl-2 col-12">
			   <div class="d-flex flex-column gap-2 mx-lg-8 text-center">
				  <h2 class="mb-0">Ketentuan Umum Pendaftaran</h2>
			   </div>
			</div>
		</div>
        <div class="row g-4"></div>
	</div>
	<hr>
	<div class="container">
		<div class="row mb-4">
			<div class="col-xl-8 offset-xl-2 col-12">
			   <div class="d-flex flex-column gap-2 mx-lg-8 text-center">
				  <h2 class="mb-0">Tata Cara Melamar</h2>
			   </div>
			</div>
		</div>
        <div class="row g-4"></div>
	</div>
</section>
<hr>


<!--Preview image start-->
<section class="my-xl-9 my-5" id="lifeatmsk">
    <div class="container">
		<div class="row">
			<div class="col-xl-8 offset-xl-2 col-12">
			   <div class="d-flex flex-column gap-2 mx-lg-8 text-center">
				  <h2 class="mb-0">Life at MSK</h2>
				  <p class="mb-0 lead">
					Kami mendukung karyawan untuk tumbuh, belajar, dan menjadi bagian dari keluarga besar MSK.
				  </p>
			   </div>
			</div>
		</div>
		<div class="my-xl-7 py-5 d-none d-lg-block">
			<div class="container-fluid" data-cue="fadeIn">
			<div class="row mb-7 pb-2 text-center justify-content-center gy-4">
				<div class="col-lg-12 col-12">
					<div class="marquee h-auto" data-cue="slideInLeft">
						<div class="track d-flex gap-4">
						<div>
							<img src="{{ asset('assets/images/hero/hero1.jpg') }}" alt="Image" class="rounded-3 border" width="360" />
						</div>
						<div>
							<img src="{{ asset('assets/images/hero/hero2.jpg') }}" alt="Image" class="rounded-3 border" width="360" />
						</div>
						<div>
							<img src="{{ asset('assets/images/hero/hero3.jpeg') }}" alt="Image"class="rounded-3 border" width="360" />
						</div>
						<div>
							<img src="{{ asset('assets/images/hero/hero1.jpg') }}" alt="Image" class="rounded-3 border" width="360" />
						</div>
						<div>
							<img src="{{ asset('assets/images/hero/hero2.jpg') }}" alt="Image" class="rounded-3 border" width="360" />
						</div>
						<div>
							<img src="{{ asset('assets/images/hero/hero3.jpeg') }}" alt="Image"class="rounded-3 border" width="360" />
						</div>
						<div>
							<img src="{{ asset('assets/images/hero/hero1.jpg') }}" alt="Image" class="rounded-3 border" width="360" />
						</div>
						<div>
							<img src="{{ asset('assets/images/hero/hero2.jpg') }}" alt="Image" class="rounded-3 border" width="360" />
						</div>
						<div>
							<img src="{{ asset('assets/images/hero/hero3.jpeg') }}" alt="Image"class="rounded-3 border" width="360" />
						</div>
						<div>
							<img src="{{ asset('assets/images/hero/hero1.jpg') }}" alt="Image" class="rounded-3 border" width="360" />
						</div>
						<div>
							<img src="{{ asset('assets/images/hero/hero2.jpg') }}" alt="Image" class="rounded-3 border" width="360" />
						</div>
						<div>
							<img src="{{ asset('assets/images/hero/hero3.jpeg') }}" alt="Image"class="rounded-3 border" width="360" />
						</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-12">
					<div class="marquee h-auto" data-cue="slideInRight">
						<div class="track-2 d-flex gap-4 py-3">
							<div>
								<img src="{{ asset('assets/images/hero/hero4.jpg') }}" alt="Image" class="rounded-3 border" width="360" />
							</div>
							<div>
								<img src="{{ asset('assets/images/hero/hero5.jpg') }}" alt="Image" class="rounded-3 border" width="360" />
							</div>
							<div>
								<img src="{{ asset('assets/images/hero/hero6.jpg') }}" alt="Image"class="rounded-3 border" width="360" />
							</div>
							<div>
								<img src="{{ asset('assets/images/hero/hero4.jpg') }}" alt="Image" class="rounded-3 border" width="360" />
							</div>
							<div>
								<img src="{{ asset('assets/images/hero/hero5.jpg') }}" alt="Image" class="rounded-3 border" width="360" />
							</div>
							<div>
								<img src="{{ asset('assets/images/hero/hero6.jpg') }}" alt="Image"class="rounded-3 border" width="360" />
							</div>
							<div>
								<img src="{{ asset('assets/images/hero/hero4.jpg') }}" alt="Image" class="rounded-3 border" width="360" />
							</div>
							<div>
								<img src="{{ asset('assets/images/hero/hero5.jpg') }}" alt="Image" class="rounded-3 border" width="360" />
							</div>
							<div>
								<img src="{{ asset('assets/images/hero/hero6.jpg') }}" alt="Image"class="rounded-3 border" width="360" />
							</div>
							<div>
								<img src="{{ asset('assets/images/hero/hero4.jpg') }}" alt="Image" class="rounded-3 border" width="360" />
							</div>
							<div>
								<img src="{{ asset('assets/images/hero/hero5.jpg') }}" alt="Image" class="rounded-3 border" width="360" />
							</div>
							<div>
								<img src="{{ asset('assets/images/hero/hero6.jpg') }}" alt="Image"class="rounded-3 border" width="360" />
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</section>
<!--Preview image end-->

<!--Have question start-->
<div class="card">
	<div class="card-body">
		<section class="py-xl-9 py-5 bg-gray-100" id="faq">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-6">
						<div class="mb-7 mb-md-0 me-lg-7">
							<div class="mb-4">
								<h2 class="mb-3">Masih Ada Pertanyaan?</h2>
								<p class="mb-0">
									Kami telah menjawab beberapa pertanyaan umum terkait rekrutmen di PT Mitra Sendang Kemakmuran. Jangan ragu untuk menghubungi kami jika ada hal lain yang ingin Anda tanyakan.
								</p>
							</div>
							<a href="#!" class="btn btn-outline-danger">
								Human Resource
							</a>
							<span class="ms-3">
								<svg xmlns="http://www.w3.org/2000/svg" width="16"
									height="16" fill="currentColor"
									class="bi bi-telephone text-danger"
									viewBox="0 0 16 16">
									<path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
								</svg>
							</span>
							<span class="ms-2 text-danger">(000) 123-XXXX</span>
						</div>
					</div>
					<div class="col-lg-7 col-md-6">
						<div class="pb-4 border-bottom">
							<h4 class="mb-3">Bagaimana cara melamar di PT Mitra Sendang Kemakmuran?</h4>
							<p class="mb-0">Semua proses lamaran hanya dilakukan melalui website resmi ini. Pastikan Anda mengisi data dengan lengkap dan benar sesuai instruksi.</p>
						</div>
						<div class="py-4 border-bottom">
							<h4 class="mb-3">Apakah ada jalur lain untuk melamar selain website ini?</h4>
							<p class="mb-0">Tidak. PT Mitra Sendang Kemakmuran hanya menerima lamaran yang diajukan melalui website resmi ini. Kami tidak bertanggung jawab atas lamaran yang dikirim melalui pihak ketiga.</p>
						</div>
						<div class="py-4 border-bottom">
							<h4 class="mb-3">Bagaimana saya mengetahui lowongan yang tersedia?</h4>
							<p class="mb-0">Daftar lowongan yang tersedia selalu diperbarui di halaman ini. Silakan periksa secara berkala untuk informasi terbaru.</p>
						</div>
						<div class="py-4 border-bottom">
							<h4 class="mb-3">Apakah ada biaya untuk proses rekrutmen?</h4>
							<p class="mb-0">Tidak. Seluruh proses rekrutmen di PT Mitra Sendang Kemakmuran gratis tanpa dipungut biaya apa pun.</p>
						</div>
					</div>					
				</div>
			</div>
		</section>
	</div>
</div>
<!--Have question end-->

@endsection