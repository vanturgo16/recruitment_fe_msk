@extends('landingPage.dashboard.menu')
@section('contentDashboard')

<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <div class="page-title-left">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a class="text-danger" href="{{ route('home') }}">..</a></li>
                        <li class="breadcrumb-item active"> Lamaran</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card p-3" style="min-height: 70vh;">
</div>

@endsection