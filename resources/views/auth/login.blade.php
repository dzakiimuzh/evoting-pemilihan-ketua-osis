@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="/css/login.css">
@endsection
@section('content')

<div class="container container1 mt-5">
    @include('sweetalert::alert')
    <div class="row">
        <div class="col-md-6 mt-2 mx-auto">
            <div class="card">
                <div class="card-header d-flex justify-content-center align-items-center flex-column bg-primary">
                    <h1>Pilketos BM3</h1>
                    <img src="/img/logo.png" width="100">
                </div>
                <div class="card-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="col-md-9 mt-5 mx-auto">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">{{ __('Username') }}</label>
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" required autocomplete="username" autofocus
                                    placeholder="Masukkan Username">

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-9 mt-3 mx-auto">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" placeholder="Masukkan Password"
                                    value="{{ old('password') }}">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-9 mx-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-9 mx-auto mt-4 mb-3">
                            <button type="submit" class="btn btn-primary w-25 btnLogin">{{ __('Log In') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection