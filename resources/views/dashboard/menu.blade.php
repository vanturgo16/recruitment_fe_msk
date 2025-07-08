@extends('layouts.master')
@section('konten')

<!-- DATATABLES CSS-->
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.5.0/css/rowReorder.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.dataTables.css">
<!-- JQUERY SCRIPT -->
<script type="text/javascript" src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
{{-- SUMMERNOTE --}}
<link href="{{ asset('assets/css/summernote-bs4.min.css') }}" rel="stylesheet">
<script src="{{ asset('assets/js/summernote-bs4.min.js') }}"></script>
<!-- BOOTSTRAP ICON -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<section class="bg-muted">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 py-lg-7 py-2 bg-white">
                <div class="d-flex align-items-center mb-4 justify-content-center justify-content-md-start">
                    @if($globalSelfPhotoUrl)
                        <img src="{{ url($globalSelfPhotoUrl) }}" alt="Foto Profil" class="avatar avatar-lg rounded-circle border border-danger shadow">
                    @else
                        <img src="{{ asset('assets/images/users/defaultUser.jpg') }}" alt="Default Avatar" class="avatar avatar-lg rounded-circle border border-danger shadow">
                    @endif
                    <div class="ms-3">
                        <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                        <small>{{ Auth::user()->role }}</small>
                    </div>
                </div>
                <div class="d-md-none text-center d-grid mb-0">
                    <button
                        class="btn btn-secondary mb-3 d-flex align-items-center justify-content-between"
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

<!-- DATATABLE -->
<script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.5.0/js/dataTables.rowReorder.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.5.0/js/rowReorder.dataTables.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.dataTables.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#tableEducation').DataTable({
            paging: true,
            searching: false,
            lengthChange: false,
            responsive: true,
            rowReorder: {
                selector: 'td:nth-child(2)'
            }
        });
    });
    $(document).ready(function() {
        var table = $('#tableExperience').DataTable({
            paging: true,
            searching: false,
            lengthChange: false,
            responsive: true,
            rowReorder: {
                selector: 'td:nth-child(2)'
            }
        });
    });
    $(document).ready(function() {
        var table = $('#tableJobApply').DataTable({
            paging: true,
            searching: true,
            lengthChange: true,
            responsive: true,
            rowReorder: {
                selector: 'td:nth-child(2)'
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.summernote-editor').each(function() {
            $(this).summernote();
        });
    });
</script>

@endsection