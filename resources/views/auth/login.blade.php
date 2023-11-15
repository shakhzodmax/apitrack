@extends('layouts.app')
@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center flex-column">
                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 pr-md-0">
                                    <div class="auth-left-wrapper">

                                    </div>
                                </div>
                                <div class="col-md-8 pl-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="/" class="noble-ui-logo d-block mb-2">ICT<span> Davaktiv</span></a>
                                        @if(session('error'))
                                            <div class="alert alert-icon-danger" role="alert">
                                                <i class="link-icon" data-feather="alert-circle"></i>
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                        <form class="forms-sample" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="username">Login</label>
                                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username') }}">
                                                @error('username')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Parol</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" autocomplete="current-password" value="{{ old('password') }}">
                                                @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Tizimga kirish</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-muted text-center text-md-left" style="position: absolute; bottom: 0; padding-bottom: 15px;">Copyright © 2023 <a href="https://davaktiv.uz" target="_blank">ICT Davaktiv</a>. All rights reserved</p>
            </div>
        </div>
    </div>
@endsection
