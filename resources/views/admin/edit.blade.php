@extends('layouts.app')

@section('title')
Edit Paslon
@endsection

@section('css')
<link rel="stylesheet" href="/css/edit.css">
@endsection

@section('content')

<section class="bg-primary mt-n4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="judul">
                    <h1 class="text-white mt-5">Edit Paslon</h1>
                </div>
                <div class="card mb-5 mt-4">
                    <div class="card-body">
                        <form action="/proses_edit/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row mt-3 rowInput">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No Urut</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Masukkan No Urut Paslon" name="no_urut_paslon"
                                            value="{{ ( $errors->all() ) ? old('no_urut_paslon') : $data->no_urut_paslon }}">

                                        @if( $errors->has('no_urut_paslon') )
                                        <div class="text-danger">
                                            {{ $errors->first('no_urut_paslon') }}
                                        </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Nama Ketua</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Masukkan Nama Ketua" name="ketua_paslon"
                                            value="{{ ( $errors->all() ) ? old('ketua_paslon') : $data->ketua_paslon }}">

                                        @if( $errors->has('ketua_paslon') )
                                        <div class="text-danger">
                                            {{ $errors->first('ketua_paslon') }}
                                        </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Nama Wakil</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Masukkan Nama Wakil" name="wakil_paslon"
                                            value="{{ ( $errors->all() ) ? old('wakil_paslon') : $data->wakil_paslon }}">

                                        @if( $errors->has('wakil_paslon') )
                                        <div class="text-danger">
                                            {{ $errors->first('wakil_paslon') }}
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 rowInput">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Visi</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                            name="visi_paslon">{{ ( $errors->all() ) ? old('visi_paslon') : $data->visi_paslon }}</textarea>

                                        @if( $errors->has('visi_paslon') )
                                        <div class="text-danger">
                                            {{ $errors->first('visi_paslon') }}
                                        </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Misi</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                            name="misi_paslon">{{ ( $errors->all() ) ? old('misi_paslon') : $data->misi_paslon }}</textarea>

                                        @if( $errors->has('misi_paslon') )
                                        <div class="text-danger">
                                            {{ $errors->first('misi_paslon') }}
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 rowInput">
                                <div class="col-md-6">
                                    <label for="img_ketua">Gambar Ketua</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambarKetua"
                                                aria-describedby="inputGroupFileAddon01" name="img_ketua" onchange="previewImage()">
                                            <label class="custom-file-label" for="gambarKetua">
                                                <p id="filenameKetua">{{ $data->img_ketua }}</p>
                                            </label>
                                        </div>
                                        @if( $errors->has('img_ketua') )
                                        <div class="text-danger">
                                            {{ $errors->first('img_ketua') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="gambarWakil">Gambar Wakil</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambarWakil"
                                                aria-describedby="inputGroupFileAddon01" name="img_wakil"
                                                value="{{ ( $errors->all() ) ? old('img_wakil') : $data->img_wakil }}"
                                                onchange="previewImage()">
                                            <label class="custom-file-label" for="gambarWakil">
                                                <p id="filenameWakil">{{ $data->img_wakil }}</p>
                                            </label>

                                            @if( $errors->has('img_wakil') )
                                            <div class="text-danger">
                                                {{ $errors->first('img_wakil') }}
                                            </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 mb-3 rowInput">
                                <div class="col-md-12">
                                    <a href="/dashboard" class="btn btn-danger">Kembali</a>
                                    <button type="submit" class="btn btn-primary m-auto">Edit Paslon</button>
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

@section('js')
    
    <script src="/js/preview.js"></script>

@endsection
