@extends('layouts.app')

@section('title')
Register Siswa
@endsection

@section('css')
<link rel="stylesheet" href="/css/registerSiswa.css">
@endsection

@section('content')

@include('sweetalert::alert')
<section class="bg-primary mt-n4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="judul">
                    <h1 class="text-white mt-5">Register Siswa</h1>
                </div>
                <div class="card mt-4 mb-5">
                    <div class="card-body">
                        <form action="/prosesRegisterSiswa" method="POST">
                            @csrf
                            <div class="row mt-3 rowInput">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username"
                                            placeholder="Masukkan Username Siswa" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                        @if( $errors->has('username') )
                                        <div class="text-danger">
                                            {{ $errors->first('username') }}
                                        </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Masukkan Email Siswa" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @if( $errors->has('email') )
                                        <div class="text-danger">
                                            {{ $errors->first('email') }}
                                        </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="text" class="form-control" id="password"
                                            placeholder="Masukkan Nama Wakil" name="password" value="{{ old('password') }}" required autocomplete="password">

                                        @if( $errors->has('password') )
                                        <div class="text-danger">
                                            {{ $errors->first('password') }}
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 mb-3 rowInput">
                                <div class="col-md-12">
                                    <a href="/dashboard" class="btn btn-danger">Kembali</a>
                                    <button type="submit" class="btn btn-primary m-auto">Register Siswa</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
