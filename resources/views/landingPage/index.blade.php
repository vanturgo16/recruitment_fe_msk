@extends('landingPage.master')
@section('konten')

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

<!--Who we are start-->
<section class="my-xl-9 my-5">
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

                <a href="./about.html" class="icon-link icon-link-hover text-danger my-link">
                    Selengkapnya
                    <svg xmlns="http://www.w3.org/2000/svg" width="14"
                        height="14" fill="currentColor"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                    </svg>
                </a>
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
<section>
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

@endsection