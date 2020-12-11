@extends('layouts.app')

@section('title')
Detail Paslon
@endsection

@section('css')
<link rel="stylesheet" href="/css/detail.css">
@endsection

@section('content')

<section class="bg-primary mt-n4">
    <div class="container">
        <div class="row judul mx-auto">
            <div class="col-md-5 mt-5">
                <h1 class="text-white">Detail Paslon No {{ $data->no_urut_paslon }}</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-between mx-auto">
            <div class="col-md-6">
                <div class="card mx-auto">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <img src="/img_ketua/{{ $data->img_ketua }}" width="180" height="180" class="mx-auto mt-n4 rounded-circle">
                        <div class="nama mt-4">
                            <h3 class="text-center">{{ $data->ketua_paslon }}</h3>
                            <p class="text-center mt-n1">Ketua</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mx-auto">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <img src="/img_wakil/{{ $data->img_wakil }}" width="180" height="180" class="mx-auto mt-n4 rounded-circle">
                        <div class="nama mt-4">
                            <h3 class="text-center">{{ $data->wakil_paslon }}</h3>
                            <p class="text-center mt-n1">Wakil</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-auto rowVisi">
            <div class="col-md-10">
                <div class="judul visi">
                    <h1>Visi Paslon</h1>
                </div>
                <div class="isiVisi ml-4">
                    <p>{{ $data->visi_paslon }}</p>
                </div>
            </div>
        </div>
        <div class="row mx-auto rowMisi">
            <div class="col-md-10">
                <div class="judul misi">
                    <h1>Misi Paslon</h1>
                </div>
                <div class="isiMisi ml-4">
                    @php
                    $misi = explode("\r\n", $data->misi_paslon);
                    @endphp
                    @foreach ($misi as $m)

                    <p>{{ $m }}</p>

                    @endforeach

                </div>
            </div>
        </div>
        <div class="row mx-auto mt-5">
            <div class="col-md-6">
                <a href="/dashboard" class="btn btn-danger btnKembali mb-5">Kembali</a>
            </div>
        </div>
    </div>
</section>

@endsection