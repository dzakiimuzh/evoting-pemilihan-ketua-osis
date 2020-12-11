@php
use App\HasilVoting;
@endphp
@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('css')
<link rel="stylesheet" href="/css/dashboard.css">
@endsection

@section('content')

<section class="bg-primary mt-n4">
    <div class="container">
        <div class="row">
            @include('sweetalert::alert')
            <div class="col-md-12 mt-5">
                <div class="header">
                    <h1 class="text-white">Data Paslon</h1>
                </div>
                <div class="card mt-3">
                    <div class="card-body mx-auto" style="width: 95%">
                        <div class="row">
                            <div class="col-md-12 colBtn">
                                <a href="/tambah" class="btn btn-success mt-2 btnpaslon">Tambah Paslon</a>
                                <a href="/voteSelesai"
                                    class="btn btn-outline-secondary ml-1 mt-2 btnSelesai btnpaslon {{ ( count(HasilVoting::all()) >= 1 ) ? 'disabled' : '' }}">Vote
                                    Selesai</a>
                                <div class="dropdown float-right mt-2">
                                    <button class="btn btnpaslon btn-success dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Register Siswa
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a href="/user/importSiswa" class="dropdown-item">Import Excel</a>
                                        <a class="dropdown-item" href="/registerSiswa">Manual Register</a>
                                    </div>
                                </div>
                                @if( count(HasilVoting::all()) >= 1 )
                                <a href="/hasilVote"
                                    class="btn btn-primary mr-1 float-right btnHasil mt-2 btnpaslon">Hasil Vote</a>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 p-0">
                            <table class="table table-bordered mx-auto mt-3 table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="9%">No Urut</th>
                                        <th class="text-center" width="23%">Nama Ketua</th>
                                        <th class="text-center" width="23%">Nama Wakil</th>
                                        <th class="text-center" width="25%">Aksi</th>
                                    </tr>
                                </thead>
                                @if( count($data) == 0 )
                                <tbody>
                                    <tr>
                                        <td colspan="6" align="center">Tidak Ada Paslon</td>
                                    </tr>
                                </tbody>
                                @else
                                <tbody>
                                    @foreach ($data as $d)
                                    <tr>
                                        <td class="text-center">{{ $d->no_urut_paslon }}</td>
                                        <td class="text-center">{{ $d->ketua_paslon }}</td>
                                        <td class="text-center">{{ $d->wakil_paslon }}</td>
                                        <td class="text-center">
                                            <a href="/edit/{{ $d->id }}" class="btn btn-primary btnaksi">Edit</a>
                                            <a href="/detailPaslon/{{ $d->id }}"
                                                class="btn btn-success btnDetail btnaksi">Detail</a>
                                            <a href="/hapus/{{ $d->id }}" class="btn btn-danger btnaksi"
                                                onclick="return confirm('Yakin Ingin Di Hapus?')">Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection