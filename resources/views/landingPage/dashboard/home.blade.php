@extends('landingPage.master')
@section('konten')

<section class="py-lg-7 py-5 bg-light-subtle">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="d-flex align-items-center mb-4 justify-content-center justify-content-md-start">
                <img src="{{ asset('assets/images/users/userDefault.png') }}" alt="avatar" class="avatar avatar-lg rounded-circle" />
                <div class="ms-3">
                    <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                    <small>{{ Auth::user()->role }}</small>
                </div>
                </div>
            <div class="d-md-none text-center d-grid">
                <button
                    class="btn btn-light mb-3 d-flex align-items-center justify-content-between"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseAccountMenu"
                    aria-expanded="false"
                    aria-controls="collapseAccountMenu">
                    Account Menu
                    <i class="bi bi-chevron-down ms-2"></i>
                </button>
            </div>
            <div class="collapse d-md-block" id="collapseAccountMenu">
                <ul class="nav flex-column nav-account">
                    <li class="nav-item">
                        <a class="nav-link" href="account-home.html">
                            <i class="align-bottom bx bx-home"></i>
                            <span class="ms-2">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="account-profile.html">
                            <i class="align-bottom bx bx-user"></i>
                            <span class="ms-2">Profile</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">
                            <i class="align-bottom bx bx-log-out"></i>
                            <span class="ms-2">Sign Out</span>
                        </a>
                    </li>
                </ul>
            </div>

            </div>
            <div class="col-lg-9 col-md-8">
            <div class="mb-4">
                <h1 class="mb-0 h3">Halo, {{ Auth::user()->name }}! Selamat datang di Dashboard Kandidat MSK.</h1>
            </div>
            <div class="mb-5">
                <h4 class="mb-1">Informasi Kandidat</h4>
                <p class="mb-0 fs-6">Unggah foto profil agar perusahaan dapat mengenali Anda dengan mudah.</p>
            </div>
            <div class="row mb-5 g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                        <span>Status Lamaran</span>
                        <h3 class="mb-0 mt-4">0 Lamaran Dikirim</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <h4 class="mb-0">Langkah Selanjutnya</h4>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                        <div class="mb-4">
                            <i class="bi bi-person-vcard text-warning" style="font-size:24px;"></i>
                        </div>
                        <div class="mb-4">
                            <h5 class="mb-2">Lengkapi Profil</h5>
                            <p class="mb-0 pe-xl-7">Lengkapi data pribadi dan pengalaman kerja Anda.</p>
                        </div>
                        <a href="#" class="icon-link icon-link-hover text-inherit">
                            Lengkapi Sekarang
                            <i class="bi bi-arrow-right"></i>
                        </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                        <div class="mb-4">
                            <i class="bi bi-gift-fill text-info" style="font-size:24px;"></i>
                        </div>
                        <div class="mb-4">
                            <h5 class="mb-2">Unggah CV</h5>
                            <p class="mb-0">Tambahkan Curiculum Vitae terbaru Anda.</p>
                        </div>
                        <a href="#" class="icon-link icon-link-hover text-inherit">
                            Unggah Sekarang
                            <i class="bi bi-arrow-right"></i>
                        </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                        <div class="mb-4">
                            <i class="bi bi-file-earmark-lock text-danger" style="font-size:24px;"></i>
                        </div>
                        <div class="mb-4">
                            <h5 class="mb-2">Lihat Lowongan Tersedia</h5>
                            <p class="mb-0">Jelajahi posisi yang sesuai dengan keahlian Anda.</p>
                        </div>
                        <a href="#" class="icon-link icon-link-hover text-inherit">
                            Cari Lowongan
                            <i class="bi bi-arrow-right"></i>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        </div>
    </div>
</section>

@endsection