@extends('layouts.auth-layout')
@section('login', 'show')
@section('content')


    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="{{ asset('sneat/assets/img/favicon/logo.png') }}" width="50px"
                                        alt="">
                                </span>
                                <span class="app-brand-text demo text-body fw-bolder">Klinik dr.Dini Zulanda</span>
                            </a>

                        </div>
                        <!-- /Logo -->
                        @if (session('sukses'))
                            <div class="alert alert-success" role="alert"> {{ session('sukses') }}</div>
                        @endif
                        @if (session('gagal'))
                            <div class="alert alert-danger" role="alert"> {{ session('gagal') }}</div>
                        @endif
                        <h4 class="mb-2">Selamat datang 👋</h4>
                        <p class="mb-4">Solusi penampilan anda</p>

                        <form id="formAuthentication" class="needs-validation" novalidate action="{{ route('login.post') }}"
                            method="POST">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="username" class="form-label">Email or Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Enter your email or username" autofocus
                                    @error('username')
                                    is-invalid
                                  @enderror />
                                @error('username')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                    <a href="auth-forgot-password-basic.html">
                                        <small>Forgot Password?</small>
                                    </a>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />

                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>

                                </div>
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me" />
                                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <span>New on our platform?</span>
                            <a href="{{ route('registrasi') }}">
                                <span>Create an account</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- / Content -->
@endsection
