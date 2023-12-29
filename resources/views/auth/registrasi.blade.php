@extends('layouts.auth-layout')
@section('resgister', 'show')
@section('content')

    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register Card -->
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
                        @if (session('sukses'))
                            <div class="alert alert-success" role="alert"> {{ session('sukses') }}</div>
                        @endif
                        @if (session('gagal'))
                            <div class="alert alert-danger" role="alert"> {{ session('gagal') }}</div>
                        @endif
                        <!-- /Logo -->
                        <h4 class="mb-2">Klinik Pratama Kesehatan dan Kecantikan</h4>
                        <p class="mb-4">Solusi penampilan anda!</p>

                        <form id="formAuthentication" class="mb-3" action="{{ route('registrasi.store') }}"
                            method="POST">
                            {{ csrf_field() }}

                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="{{ asset('sneat/assets/img/avatars/1.png') }}" alt="user-avatar"
                                    class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                <div class="button-wrapper">
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="upload" class="account-file-input" name="foto"
                                            hidden accept="image/png, image/jpeg" />
                                    </label>
                                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Reset</span>
                                    </button>


                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Masukan username" autofocus />
                                @error('username')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Masukan nama" autofocus />
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tgl" class="form-label">Tanggal Lahir</label>
                                <input class="form-control" type="date" name="tgl_lahir" id="tgl">
                                @error('tgl_lahir')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>




                            <div class="mb-3">
                                <label for="jkelamin" class="form-label">Jenis Kelamin</label>
                                <select id="jkelamin" name="jkelamin" class="form-select">
                                    <option disabled>Pilih</option>
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>

                                </select>
                                @error('jkelamin')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                                    placeholder="Masukan pekerjaan" autofocus />
                                @error('pekerjaan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>



                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Masukan email" />
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="no-hp" class="form-label">No Telepon/HP</label>
                                <input type="text" id="basic-default-phone" class="form-control phone-mask"
                                    placeholder="0812 3456 7891" name="no_hp" id="no-hp">
                                @error('no_hp')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="pekerjaan" class="form-label">Alamat</label>
                                <textarea id="basic-default-message" class="form-control" placeholder="Masukan alamat" name="alamat"></textarea>
                                @error('alamat')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
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
                                    <input class="form-check-input" type="checkbox" id="terms-conditions"
                                        name="terms" />
                                    <label class="form-check-label" for="terms-conditions">
                                        I agree to
                                        <a href="javascript:void(0);">privacy policy & terms</a>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary d-grid w-100">Daftar</button>
                        </form>

                        <p class="text-center">
                            <span>Sudah memiliki akun?</span>
                            <a href="{{ route('login') }}">
                                <span>Login</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>
@endsection
