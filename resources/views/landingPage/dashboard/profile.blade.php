@extends('landingPage.dashboard.menu')
@section('contentDashboard')

<!-- DATATABLES CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"/>
<!-- JQUERY SCRIPT -->
<script type="text/javascript" src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>

<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <div class="page-title-left">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a class="text-danger" href="{{ route('home') }}">..</a></li>
                        <li class="breadcrumb-item active"> Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card p-3" style="min-height: 70vh;">
    <div class="card shadow mb-3">
        <div class="card-header p-3 bg-secondary">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="text-bold">Biodata</h4>
                </div>
                <div class="col-lg-6">
                    <div class="text-end">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#editMainProfile">
                            <i class='bx bx-edit label-icon'></i> Edit
                        </button>
                        {{-- Modal Edit --}}
                        <div class="modal fade" id="editMainProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-top" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="formLoad" action="#" id="formadd" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body text-start">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Identitas</label> <label class="text-danger">*</label>
                                                        <textarea name="message" rows="8" cols="50" class="form-control" placeholder="Input Identitas.." required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger"><i class='bx bx-refresh'></i> Perbaharui</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                
            </div>
        </div>
    </div>

    <div class="card shadow mb-3">
        <div class="card-header p-3 bg-secondary">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="text-bold">Pendidikan</h4>
                </div>
                <div class="col-lg-6">
                    <div class="text-end">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#addEducation">
                            <i class='bx bx-plus label-icon'></i> Tambah
                        </button>
                        {{-- Modal Add --}}
                        <div class="modal fade" id="addEducation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-top" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h5 class="modal-title" id="staticBackdropLabel">Tambah</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="formLoad" action="#" id="formadd" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body text-start">
                                            <div class="row">
                                                <div class="col-12">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger"><i class='bx bx-plus'></i> Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <table class="table table-bordered table-hover table-stripped dt-responsive w-100" id="tableEducation" style="font-size: small">
                    <thead class="table-light">
                        <tr>
                            <th class="align-middle text-center">#</th>
                            <th class="align-middle text-center">Grade</th>
                            <th class="align-middle text-center">Institusi</th>
                            <th class="align-middle text-center">Kota</th>
                            <th class="align-middle text-center">Major</th>
                            <th class="align-middle text-center">Period</th>
                            <th class="align-middle text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eduInfo as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-3">
        <div class="card-header p-3 bg-secondary">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="text-bold">Pengalaman</h4>
                </div>
                <div class="col-lg-6">
                    <div class="text-end">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#addExperience">
                            <i class='bx bx-plus label-icon'></i> Tambah
                        </button>
                        {{-- Modal Add --}}
                        <div class="modal fade" id="addExperience" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-top" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h5 class="modal-title" id="staticBackdropLabel">Tambah</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="formLoad" action="#" id="formadd" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body text-start">
                                            <div class="row">
                                                <div class="col-12">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger"><i class='bx bx-plus'></i> Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <table class="table table-bordered table-hover table-stripped dt-responsive w-100" id="tableExperience" style="font-size: small">
                    <thead class="table-light">
                        <tr>
                            <th class="align-middle text-center">#</th>
                            <th class="align-middle text-center">Institusi / Perusahaan</th>
                            <th class="align-middle text-center">Kota</th>
                            <th class="align-middle text-center">Posisi</th>
                            <th class="align-middle text-center">Period</th>
                            <th class="align-middle text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eduInfo as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- DATATABLE -->
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#tableEducation').DataTable({
            info: true,
            lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            responsive: true,
            searching: true,
            paging: true,
        });
    });
    $(document).ready(function() {
        var table = $('#tableExperience').DataTable({
            info: true,
            lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            responsive: true,
            searching: true,
            paging: true,
        });
    });
</script>


@endsection