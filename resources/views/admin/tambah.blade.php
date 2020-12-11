@extends('layouts.app')

@section('title')
    Tambah Paslon
@endsection

@section('css')
<link rel="stylesheet" href="/css/Tambah.css">
@endsection

@section('content')

<section class="bg-primary mt-n4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="judul">
                    <h1 class="text-white mt-5">Upload Paslon</h1>
                </div>
                <div class="card mt-4 mb-5">
                    <div class="card-body">
                        <form action="/proses_tambah" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3 rowInput">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No Urut</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Masukkan No Urut Paslon" name="no_urut_paslon"
                                            value="{{ old('no_urut_paslon') }}" required>

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
                                            value="{{ old('ketua_paslon') }}" required>

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
                                            value="{{ old('wakil_paslon') }}" required>

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
                                            name="visi_paslon" required>{{ old('visi_paslon') }}</textarea>

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
                                            name="misi_paslon" required>{{ old('misi_paslon') }}</textarea>

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
                                    <label for="gambarKetua">Gambar Ketua</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambarKetua"
                                                aria-describedby="inputGroupFileAddon01" name="img_ketua"
                                                value="{{ old('img_ketua') }}" onchange="previewImage()" required>
                                            <label class="custom-file-label d-flex" id="label" for="gambarKetua">
                                                <p id="filenameKetua">Choose file</p>
                                            </label>   
                                        </div>
                                    </div>
                                    @if( $errors->has('img_ketua') )
                                    <div class="text-danger mt-n2">
                                        {{ $errors->first('img_ketua') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="gambarWakil">Gambar Wakil</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambarWakil"
                                                aria-describedby="inputGroupFileAddon01" name="img_wakil"
                                                value="{{ old('img_wakil') }}" onchange="previewImage()" required>
                                            <label class="custom-file-label" for="gambarWakil">
                                                <p id="filenameWakil">Choose file</p>
                                            </label>
                                        </div>
                                    </div>
                                    @if( $errors->has('img_wakil') )
                                    <div class="text-danger mt-n2">
                                        {{ $errors->first('img_wakil') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row mt-4 mb-3 rowInput">
                                <div class="col-md-12">
                                    <a href="/dashboard" class="btn btn-danger">Kembali</a>
                                    <button type="submit" class="btn btn-primary m-auto">Upload Paslon</button>
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
