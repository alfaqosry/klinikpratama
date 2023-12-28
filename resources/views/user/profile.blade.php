@extends('layouts.tampa-menu')
@section('profile', 'show')
@section('title', 'profile')
@section('content')


    <div class="row">
        <div class="col-md-12">

            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <!-- Account -->
                <form action="{{ route('profile.update', auth()->user()->id) }}" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">

                            @if (auth()->user()->foto == null)
                                <img src="{{ asset('sneat/assets/img/avatars/1.png') }}" alt="user-avatar"
                                    class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            @else
                                <img src="{{ Storage::url(auth()->user()->foto) }}" alt="user-avatar"
                                    class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            @endif
                            <div class="button-wrapper">

                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" name="foto" hidden
                                        accept="image/png, image/jpeg" />
                                </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>

                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input class="form-control" type="text" id="name" name="name"
                                    value="{{ $user->name }}" autofocus />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control" type="text" id="email" name="email"
                                    value="{{ $user->email }}" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="country">Jenis Kelamin</label>
                                <select id="country" class="select2 form-select" name="jkelamin">
                                    <option>{{ $user->jkelamin }}</option>
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>

                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="tgl" class="form-label">Tanggal Lahir</label>
                                <input class="form-control" type="date" name="tgl_lahir" id="tgl"
                                    value="{{ $user->tgl_lahir }}">
                                @error('tgl_lahir')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="no_hp">No Telepon</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">IND (+62)</span>
                                    <input type="text" id="no_hp" name="no_hp" class="form-control"
                                        value="{{ $user->no_hp }}" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                                    value="{{ $user->pekerjaan }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="{{ $user->alamat }}" />
                            </div>

                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                </form>
            </div>
            <!-- /Account -->
        </div>

    </div>
    </div>







@endsection
