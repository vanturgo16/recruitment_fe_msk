@extends('landingPage.master')
@section('konten')

<section class="bg-muted">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 py-lg-7 py-2">
                <div class="d-flex align-items-center mb-4 justify-content-center justify-content-md-start">
                    <img src="{{ asset('assets/images/users/userDefault.png') }}" alt="avatar" class="avatar avatar-lg rounded-circle" />
                    <div class="ms-3">
                        <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                        <small>{{ Auth::user()->role }}</small>
                    </div>
                </div>
                <div class="d-md-none text-center d-grid mb-0">
                    <button
                        class="btn btn-light mb-3 d-flex align-items-center justify-content-between"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseAccountMenu"
                        aria-expanded="false"
                        aria-controls="collapseAccountMenu">
                        Menu
                        <i class="bi bi-chevron-down ms-2"></i>
                    </button>
                </div>
                <div class="collapse d-md-block" id="collapseAccountMenu">
                    <ul class="nav flex-column nav-account">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                <i class="align-bottom bx bx-grid-alt"></i>
                                <span class="ms-2">Dashboard</span>
                            </a>
                        </li>
                        <hr style="color: black">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile*') ? 'active' : '' }}" href="{{ route('profile') }}">
                                <i class="align-bottom bx bx-user"></i>
                                <span class="ms-2">Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('job-apply*') ? 'active' : '' }}" href="{{ route('jobApply') }}">
                                <i class="align-bottom bx bx-file"></i>
                                <span class="ms-2">Lamaran</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#logout">
                                <i class="align-bottom bx bx-log-out"></i>
                                <span class="ms-2">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 mb-4">
                @yield('contentDashboard')
            </div>
        </div>
    </div>
</section>
@endsection