@extends('layouts.app')

@section('title')
Import Siswa
@endsection

@section('css')
<link rel="stylesheet" href="/css/importSiswa.css">
@endsection

@section('content')

@include('sweetalert::alert')
<section class="bg-primary mt-n4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="judul">
                    <h1 class="text-white mt-5">Import Siswa</h1>
                </div>
                <div class="card mt-4 mb-5 mx-auto">
                    <div class="card-body">
                        <form action="/user/import_excel" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3 rowInput">
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="fileExcel"
                                                aria-describedby="inputGroupFileAddon01" name="file_excel"
                                                value="{{ old('img_wakil') }}" onchange="previewFile()" required>
                                            <label class="custom-file-label" for="gambarWakil">
                                                <p id="filenameExcel">Choose file</p>
                                            </label>
                                        </div>
                                    </div>
                                    @if( $errors->has('file_excel') )
                                    <div class="text-danger mt-n2">
                                        {{ $errors->first('file_excel') }}
                                    </div>
                                    @endif
                                </div>

                            </div>
                            <div class="row mt-4 mb-3 rowInput">
                                <div class="col-md-12">
                                    <a href="/dashboard" class="btn btn-danger">Kembali</a>
                                    <button type="submit" class="btn btn-primary m-auto">Import Siswa</button>
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