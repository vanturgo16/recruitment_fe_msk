@extends('layouts.master')
@section('konten')

<section id="home">
	<!--Autoplaying carousel -->
	<div data-cue="fadeIn" class="bg-dark py-3 background-section">
		<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@php
					$totalSlides = $jobBanner->isEmpty() ? 3 : 2 + $jobBanner->count();
				@endphp
				@for ($i = 0; $i < $totalSlides; $i++)
					<button type="button"
							data-bs-target="#carouselExampleAutoplaying"
							data-bs-slide-to="{{ $i }}"
							class="{{ $i === 0 ? 'active' : '' }}"
							aria-current="{{ $i === 0 ? 'true' : 'false' }}"
							aria-label="Slide {{ $i + 1 }}">
					</button>
				@endfor
			</div>
			<div class="carousel-inner">
				{{-- WELCOME BANNER --}}
				<div class="carousel-item active">
					<section data-cue="fadeIn">
						<div class="container">
							<a href="#!">
								<div class="py-lg-10 rounded-3 px-lg-8 py-md-8 px-md-6 p-4 image-blur bg-company">
									<div class="row g-0">
										{{-- <div class="col-xxl-6 col-xl-7 col-lg-12">
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
														<a href="#career" class="btn btn-danger">Lihat Kesempatan</a>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xxl-6 col-xl-5 col-lg-4 d-none d-lg-block text-end d-flex flex-column justify-content-end" data-cue="zoomIn">
											<img src="{{ asset('assets/images/figureMSK.png') }}" alt="Person Standing" class="img-fluid" style="max-height: 400px;">
										</div> --}}
										<div class="col-12">
											<div class="d-flex flex-column gap-5" data-cue="zoomIn">
												<div>
													<span class="badge bg-danger border border-white text-white-stable px-3 py-2 fw-medium rounded-pill fs-8">RECRUITMENT MITRA SENDANG KEMAKMURAN</span>
												</div>
												<div class="d-flex flex-column gap-6">
													<div class="d-flex flex-column gap-3">
														<h1 class="mb-0 text-white-stable">Mari Bertumbuh Bersama <br class="d-none d-lg-block"> PT. Mitra Sendang Kemakmuran</h1>
														<p class="mb-0 text-white-stable">
														Buka lembaran baru dalam perjalanan karier Anda bersama MSK - Main Dealer Distribusi Sepeda Motor Honda wilayah Banten minus Tangerang yang semakin terus berkembang. Kami mencari individu berbakat dan berdedikasi untuk bergabung dalam tim profesional kami. Raih kesempatan untuk berkembang, berkontribusi, dan sukses bersama kami.
														</p>
													</div>
													<div class="d-flex align-items-center">
														<a href="#career" class="btn btn-danger">Lihat Kesempatan</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>
					</section>
				</div>

				{{-- VIDEO BANNER --}}
				{{-- <div class="carousel-item">
					<section data-cue="fadeIn">
						<div class="container">
							<a href="#!">
								<div class="py-lg-10 rounded-3 px-lg-8 py-md-8 px-md-6 p-4">
									<div class="row g-0">
										<video class="w-100" autoplay muted loop style="object-fit: cover; object-position: top;" playsinline>
											<source src="{{ asset('assets/images/sampleVideo.mp4') }}" type="video/mp4" />
										</video>
										<div class="col-xxl-6 col-xl-7 col-lg-8">
											<br><br><br><br><br><br><br><br>
											<br><br><br><br><br><br><br><br><br>
										</div>
									</div>
								</div>
							</a>
						</div>
					</section>
				</div> --}}

				{{-- IMAGE BANNER --}}
				@php
					// $banners = ['Banner1.jpg', 'Banner2.jpg'];
					$banners = ['Slide2_1550x720px.jpg'];
				@endphp
				@foreach ($banners as $banner)
					<div class="carousel-item">
						<section data-cue="fadeIn">
							<div class="container">
								<a href="#!">
									<div class="py-lg-10 rounded-3 px-lg-8 py-md-8 px-md-6 p-4"
										style="background-image: url('{{ asset("assets/images/banner/$banner") }}');
											background-repeat: no-repeat;
											background-position: center;
											background-size: cover;
											min-height: 81vh;">
									</div>
								</a>
							</div>
						</section>
					</div>
				@endforeach

				{{-- JOB BANNER 2 FIRST --}}
				@if($jobBanner->count() > 0)
					@foreach($jobBanner as $banner)
						<div class="carousel-item">
							<section>
								<div class="container">
									<a href="#!">
										<div class="py-lg-10 rounded-3 px-lg-8 py-md-8 px-md-6 p-4 image-blur bg-company">
											<div class="row g-0">
												<div class="col-xxl-6 col-xl-7 col-lg-8">
													<div class="d-flex flex-column gap-5" data-cue="zoomIn">
														<div>
															<span class="badge bg-danger border border-white text-white-stable px-3 py-2 fw-medium rounded-pill fs-8">LOWONGAN TERSEDIA</span>
														</div>
														<div class="d-flex flex-column gap-6">
															<div class="d-flex flex-column gap-3">
																<h1 class="mb-0 text-white-stable">{{ $banner->position_name }}</h1>
																<h3 class="mt-n3 text-white-stable">{{ $banner->dept_name }}</h3>
																<div class="card">
																	<div class="card-body shadow">
																		<div class="career-requirements row mb-0 text-dark">
																			<div class="career-degree col-md-6">
																				<div class="d-flex">
																					<i class="career-icon bi bi-calendar-check me-2 align-self-start"></i>
																					<div>
																						<div class="fw-bold">Periode Pendaftaran</div>
																						<div>
																							{{ \Carbon\Carbon::parse($banner->rec_date_start)->translatedFormat('d M Y') }}
																							@if ($banner->rec_date_end)
																								- {{ \Carbon\Carbon::parse($banner->rec_date_end)->translatedFormat('d M Y') }}
																							@endif
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="career-degree col-md-6">
																				<div class="d-flex">
																					<i class="career-icon bi bi-mortarboard-fill me-2 align-self-start"></i>
																					<div>
																						<div class="fw-bold">Pendidikan</div>
																						<div>{{ $banner->min_education ?? '-' }}</div>
																					</div>
																				</div>                            
																			</div>
																			<div class="career-degree col-md-6">
																				<div class="d-flex">
																					<i class="career-icon bi bi-briefcase-fill me-2 align-self-start"></i>
																					<div>
																						<div class="fw-bold">Pengalaman</div>
																						<div>
																							@if (!is_null($banner->min_yoe))
																								> {{ $banner->min_yoe }} tahun
																							@else
																								-
																							@endif
																						</div>                                        
																					</div>
																				</div>
																			</div>
																			<div class="career-degree col-md-6">
																				<div class="d-flex">
																					<i class="career-icon bi bi-person-fill me-2 align-self-start"></i>
																					<div>
																						<div class="fw-bold">Umur</div>
																						<div>
																							@if (!is_null($banner->min_age))
																								> {{ $banner->min_age }} tahun
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
															</div>
															<div class="d-flex align-items-center">
																<a href="{{ route('job.detail', encrypt($banner->id)) }}" class="btn btn-danger">Detail Lowongan</a>
															</div>
														</div>
													</div>
												</div>
												<div class="col-xxl-6 col-xl-5 col-lg-4 d-none d-lg-block text-end d-flex flex-column justify-content-end" data-cue="zoomIn">
													<img src="{{ asset('assets/images/lowongan.png') }}" alt="Person Standing" class="img-fluid" style="max-height: 400px;">
												</div>
											</div>
										</div>
									</a>
								</div>
							</section>
						</div>
					@endforeach
				@else
					<div class="carousel-item">
						<section data-cue="fadeIn">
							<div class="container">
								<a href="#!">
									<div class="py-lg-10 rounded-3 px-lg-8 py-md-8 px-md-6 p-4 image-blur bg-company">
										<div class="row g-0">
											<div class="col-xxl-6 col-xl-7 col-lg-8">
												<div class="d-flex flex-column gap-5" data-cue="zoomIn">
													<div>
														<span class="badge bg-danger border border-white text-white-stable px-3 py-2 fw-medium rounded-pill fs-8">LOWONGAN BELUM TERSEDIA</span>
													</div>
													<div class="d-flex flex-column gap-6">
														<div class="d-flex flex-column gap-3">
															<h1 class="mb-0 text-white-stable"><i class='bx bx-folder-open'></i></h1>
															<p class="mb-0 text-white-stable">
																Maaf Saat Ini Belum Ada Lowongan Tersedia, Silahkan Kunjungi Kembali Halaman Ini
															</p>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xxl-6 col-xl-5 col-lg-4 d-none d-lg-block text-end d-flex flex-column justify-content-end">
												<img src="{{ asset('assets/images/lowongan.png') }}" alt="Person Standing" class="img-fluid" style="max-height: 400px;">
											</div>
										</div>
									</div>
								</a>
							</div>
						</section>
					</div>
				@endif
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev" title="Previous">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden"></span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next" title="Next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden"></span>
			</button>
		</div>
	</div>
</section>
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
						PT. Mitra Sendang Kemakmuran adalah jaringan resmi Honda di Banten yang melayani penjualan motor, layanan bengkel, dan penyediaan suku cadang asli Honda.
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
<section id="home">
    <div class="container">
        <div class="row border-top border-bottom">
			<div class="col-md-4 border-end-md border-bottom border-bottom-md-0">
				<div class="text-center py-lg-5 p-4">
					<div class="mb-4">
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-people-fill text-danger" viewBox="0 0 16 16">
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
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-trophy-fill text-danger" viewBox="0 0 16 16">
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
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-stars text-danger" viewBox="0 0 16 16">
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

{{-- CAREER SECTION --}}
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
        <!-- Search Box -->
        <div class="row">
            <form method="GET" action="{{ route('home') }}" id="search-form" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Cari dengan kata kunci..">
                    <button type="submit" class="btn btn-danger">Cari</button>
                </div>
            </form>
        </div>
        <!-- Jobs and Pagination Wrapper -->
        <div id="joblist-container">
            @include('jobList.index')
        </div>
    </div>
</section>
<hr>

{{-- TNC --}}
<section id="tnc">
	<div class="container">
		<div class="row mb-4">
			<div class="col-xl-8 offset-xl-2 col-12">
				<div class="d-flex flex-column gap-2 mx-lg-8 text-center">
					<h2 class="mb-0">Ketentuan Umum Pendaftaran</h2>
				</div>
			</div>
		</div>
        <div class="row g-4">
            <div class="col-12">
                <div class="card p-3 mb-2">
					<div class="d-flex">
						<h4 class="mt-n1">
							<span class="me-2 align-self-start badge bg-danger text-white">1</span>
						</h4>
						<span>
							Setiap pelamar hanya dapat memilih <span class="fw-bold">1 (satu) lowongan</span> dari lowongan yang tersedia.
						</span>
					</div>	
				</div>
				<div class="card p-3 mb-2">
					<div class="d-flex">
						<h4 class="mt-n1">
							<span class="me-2 align-self-start badge bg-danger text-white">2</span>
						</h4>
						<span>
							Pastikan data pada Daftar Riwayat Hidup telah diisi dengan benar.
						</span>
					</div>	
				</div>
				<div class="card p-3 mb-2">
					<div class="d-flex">
						<h4 class="mt-n1">
							<span class="me-2 align-self-start badge bg-danger text-white">3</span>
						</h4>
						<span>
							Seluruh tahapan rekrutmen <span class="fw-bold">tidak dipungut biaya apapun</span>. Apabila ada pihak yang meminta biaya/menjanjikan sesuatu/menawarkan bantuan atas proses rekrutmen dapat melaporkan ke <i><span class="fw-bold">Human Resource</span></i> MSK.
						</span>
					</div>	
				</div>
				<div class="card p-3 mb-2">
					<div class="d-flex">
						<h4 class="mt-n1">
							<span class="me-2 align-self-start badge bg-danger text-white">4</span>
						</h4>
						<span>
							Seluruh informasi dan proses rekrutmen hanya dapat di akses melalui portal <i><span class="fw-bold"> {{ $rules['domainWeb'] ?? '-' }} </span></i> dan email resmi.
						</span>
					</div>	
				</div>
				<div class="card p-3 mb-2">
					<div class="d-flex">
						<h4 class="mt-n1">
							<span class="me-2 align-self-start badge bg-danger text-white">5</span>
						</h4>
						<span>
							Seluruh biaya akomodasi dan transportasi selama proses rekrutmen dan seleksi menjadi tanggungan pelamar.
						</span>
					</div>	
				</div>
				<div class="card p-3 mb-2">
					<div class="d-flex">
						<h4 class="mt-n1">
							<span class="me-2 align-self-start badge bg-danger text-white">6</span>
						</h4>
						<span>
							Tim <i><span class="fw-bold">Human Resource</span></i> MSK berhak sepenuhnya menetapkan daftar kandidat yang dinilai memenuhi kualifikasi pada setiap tahapan seleksi.
						</span>
					</div>	
				</div>
				<div class="card p-3 mb-2">
					<div class="d-flex">
						<h4 class="mt-n1">
							<span class="me-2 align-self-start badge bg-danger text-white">7</span>
						</h4>
						<span>
							Hasil keputusan <i><span class="fw-bold">Human Resource</span></i> MSK bersifat mutlak, mengikat, dan tidak dapat diganggu gugat.
						</span>
					</div>	
				</div>
				<div class="card p-3 mb-2">
					<div class="d-flex">
						<h4 class="mt-n1">
							<span class="me-2 align-self-start badge bg-danger text-white">8</span>
						</h4>
						<span>
							Pelamar harus mengisi data diri yang sesuai. Jika isian data diri tidak sesuai maka dapat mempengaruhi hasil seleksi administrasi.
						</span>
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
					<h2 class="mb-0">Tata Cara Melamar</h2>
				</div>
			</div>
		</div>
		<div class="card p-3 mb-2">
			<div class="row g-4">
				<div class="col-xl-8 offset-xl-2 col-12">
					<div class="alur-steps-wrapper p-4 bg-white rounded-3 text-center mb-2">
						<div class="d-flex flex-wrap justify-content-center gap-2 mb-4" id="alurSteps">
							<button class="btn btn-danger alur-step-button active" data-step="1">Tahap 1</button>
							<button class="btn btn-light alur-step-button" data-step="2">Tahap 2</button>
							<button class="btn btn-light alur-step-button" data-step="3">Tahap 3</button>
							<button class="btn btn-light alur-step-button" data-step="4">Tahap 4</button>
							<button class="btn btn-light alur-step-button" data-step="5">Tahap 5</button>
						</div>
						<hr>

						<div class="alur-step-content">
							<div class="alur-step-text" data-content="1">
								<h3 class="text-danger fw-bold mb-4">Membaca Seluruh Informasi</h3>
								<p>
									Membaca seluruh informasi ketentuan dan persyaratan yang berada di situs web ini.
								</p>
							</div>
							<div class="alur-step-text d-none" data-content="2">
								<h3 class="text-danger fw-bold mb-4">Pendaftaran & Aktivasi Akun</h3>
								<p>
									Pastikan Pelamar sudah mengunjungi Laman Karir, menentukan Lowongan yang ingin dipilih. 
									Berikutnya Pelamar dapat menekan tombol Daftar. 
									Kemudian Pelamar dapat Masuk dengan <em>email</em> dan <em>password</em> yang telah didaftarkan. 
									Aktivasi <em>email</em> dilakukan secara otomatis.
								</p>
							</div>
							<div class="alur-step-text d-none" data-content="3">
								<h3 class="text-danger fw-bold mb-4">Melengkapi Daftar Riwayat Hidup</h3>
								<p>
									Pelamar wajib melengkapi Daftar Riwayat Hidup sesuai persyaratan pada menu Daftar Riwayat Hidup.
								</p>
							</div>
							<div class="alur-step-text d-none" data-content="4">
								<h3 class="text-danger fw-bold mb-4">Melamar pada Posisi</h3>
								<p>
									Pelamar dapat melihat lowongan yang tersedia pada menu karir. Peserta hanya dapat melamar pada satu posisi saja.
								</p>
							</div>
							<div class="alur-step-text d-none" data-content="5">
								<h3 class="text-danger fw-bold mb-4">Selesai</h3>
								<p>
									Pelamar dapat memantau proses lamaran, detail jadwal, dan pengumuman pada halaman Lamaran Saya atau email resmi yang akan dikirimkan.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Script -->
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const stepButtons = document.querySelectorAll('.alur-step-button');
			const stepContents = document.querySelectorAll('.alur-step-text');

			stepButtons.forEach(button => {
				button.addEventListener('click', function () {
					// Remove active state from all buttons
					stepButtons.forEach(btn => {
						btn.classList.remove('btn-danger', 'active');
						btn.classList.add('btn-light');
					});

					// Hide all contents
					stepContents.forEach(content => content.classList.add('d-none'));

					// Activate clicked button
					this.classList.remove('btn-light');
					this.classList.add('btn-danger', 'active');

					// Show corresponding content
					const step = this.getAttribute('data-step');
					document.querySelector(`.alur-step-text[data-content="${step}"]`).classList.remove('d-none');
				});
			});
		});
	</script>
	
	<hr>
</section>

{{-- LIFE AT MSK --}}
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
		<div class="my-xl-7 py-5">
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

{{-- FAQ --}}
<section id="faq">
	<div class="card">
		<div class="card-body">
			<div class="py-xl-9 py-5 bg-gray-100">
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
								<a href="mailto:{{ $rules['emailHR'] ?? '#' }}" class="btn btn-outline-danger">
									Human Resource
								</a>
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
			</div>
		</div>
	</div>
</section>

@endsection