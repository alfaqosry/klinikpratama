@extends('layouts.dashboard-layout')
@section('user', 'active')
@section('title', 'Tambah User')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home/</span> @yield('title')</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">@yield('title')</h5>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="{{ Storage::url($user->foto) }}" alt="user-avatar"
                                    class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                <div class="button-wrapper">
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="upload" class="account-file-input" value="{{$user->foto}}" name="foto"
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
                                    value="{{$user->username}}" autofocus />
                                @error('username')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{$user->name}}"  />
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tgl" class="form-label">Tanggal Lahir</label>
                                <input class="form-control" type="date" name="tgl_lahir" id="tgl" value="{{$user->tgl_lahir}}">
                                @error('tgl_lahir')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>




                            <div class="mb-3">
                                <label for="jkelamin" class="form-label">Jenis Kelamin</label>
                                <select id="jkelamin" name="jkelamin" class="form-select">
                                    <option >{{$user->jkelamin}}</option>
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
                                    value="{{$user->pekerjaan}}" />
                                @error('pekerjaan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>



                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{$user->email}}"/>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="no-hp" class="form-label">No Telepon/HP</label>
                                <input type="text" id="basic-default-phone" class="form-control phone-mask"
                                  value="{{$user->no_hp}}" name="no_hp" id="no-hp">
                                @error('no_hp')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="pekerjaan" class="form-label">Alamat</label>
                                <textarea id="basic-default-message" class="form-control" placeholder="Masukan alamat" name="alamat">{{$user->alamat}}</textarea>
                                @error('alamat')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="bio" class="form-label">Bio</label>
                                <textarea id="basic-default-message" class="form-control" placeholder="Masukan bio" name="bio">{{$user->bio}}</textarea>
                                @error('$bio')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select id="role" name="role" class="form-select">
                                    <option >{{$user->role}}</option>
                                    <option value="Admin">Dokter</option>
                                    <option value="Pasien">Pasien</option>

                                </select>
                                @error('role')
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


                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
