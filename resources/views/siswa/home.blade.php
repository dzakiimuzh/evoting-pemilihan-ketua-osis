@php
use App\voting;
use App\HasilVoting;
@endphp

@extends('layouts.app')

@section('title')
Pemilihan
@endsection

@section('css')
<link rel="stylesheet" href="/css/homeSiswa.css">
@endsection

@section('content')
@include('sweetalert::alert')
<section class="bg-primary mt-n4">
    <div class="container">
        <div class="row judul mx-auto">
            <div class="col-md-7 mt-5">
                <h1 class="text-white">Pilih Osis Kesayanganmu</h1>
                @if( count(HasilVoting::all()) >= 1 )
                <a href="/hasilVote" class="btn btn-success ml-1 mt-2 btnpaslon w-25">Hasil Vote</a>
                @endif
            </div>
        </div>
        @foreach( $data as $d )
        <div class="row d-flex justify-content-between mx-auto row-card">
            <div class="col-md-12">
                <div class="card mx-auto">
                    <div class="card-header d-flex justify-content-center align-items-center">
                        <p>No Urut {{ $d->no_urut_paslon }}</p>
                    </div>
                    <div class="row mx-auto">
                        <div class="col-md-6 mt-4">
                            <div class="card-body d-flex flex-column justify-content-center">
                                <img src="/img_ketua/{{ $d->img_ketua }}" width="180" height="180"
                                    class="mx-auto mt-n4 rounded-circle">
                                <div class="nama mt-4">
                                    <h3 class="text-center">{{ $d->ketua_paslon }}</h3>
                                    <p class="text-center mt-n1">Ketua</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-4">
                            <div class="card-body d-flex flex-column justify-content-center">
                                <img src="/img_wakil/{{ $d->img_wakil }}" width="180" height="180"
                                    class="mx-auto mt-n4 rounded-circle">
                                <div class="nama mt-4">
                                    <h3 class="text-center">{{ $d->wakil_paslon }}</h3>
                                    <p class="text-center mt-n1">Wakil</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-auto rowOpsi">
                        <div class="col-md-12 d-flex justify-content-center">
                            <div class="opsi">
                                <a href="/detail/{{ $d->id }}" class="btn btn-outline-success mr-1">Detail Paslon</a>
                                @php
                                $id_user = Auth::user()->id;
                                @endphp
                                @if( voting::where('id_user', $id_user)->first() )

                                <a href="/pilihPaslon/{{ $d->id }}" class="btn btn-success ml-1 shadow disabled">Pilih
                                    Paslon</a>

                                @else

                                <a href="/pilihPaslon/{{ $d->id }}"
                                    class="btn btn-success ml-1 shadow {{ ( count(HasilVoting::all()) >= 1 ) ? 'disabled' : '' }}">Pilih
                                    Paslon</a>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection