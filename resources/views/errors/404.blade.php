@extends('layouts.master')
@section('konten')

<section class="bg-white">
    <div class="my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xl-8 text-center">
                    <img src="{{ asset('assets/images/pageNotFound.png') }}" alt="" class="img-fluid mx-auto d-block">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <h4 class="text-dark fw-bold mt-4">Maaf 🙏, Halaman yang anda tuju tidak ditemukan</h4>
                        <div class="mt-5 text-center">
                            <a class="btn btn-danger waves-effect waves-light" href="{{ route('home') }}">Kembali Ke Beranda</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection