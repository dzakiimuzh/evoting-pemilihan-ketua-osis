@extends('layouts.app')
@section('title')
Hasil Vote
@endsection
@section('css')
<link rel="stylesheet" href="/css/hasilVote.css">
@endsection
@section('content')

<section class="bg-primary mt-n4">
    <div class="container">
        <div class="row judul mx-auto">
            <div class="col-md-5 mt-5">
                <h1 class="text-white">Hasil Vote</h1>
            </div>
        </div>
        <div class="row mx-auto rowCard d-flex justify-content-center mt-4">
            @foreach( $data as $d )
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-center align-items-center">
                        <p>Paslon No {{ $d->no_urut_paslon }}</p>
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <h1 class="hasil">{{ $d->jumlah_vote }}</h1>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ ( Auth::user()->role == 'admin' ) ? '/dashboard' : '/home' }}"
                    class="btn btn-danger mx-auto d-block mt-5 btnKembali">Kembali</a>
            </div>
        </div>
    </div>
</section>

@endsection
