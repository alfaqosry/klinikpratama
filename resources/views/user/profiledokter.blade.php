@extends('layouts.tampa-menu')
@section('profile', 'show')
@section('title', 'Profile Dokter')
@section('content')


    <div class="row">
        <div class="col-md-12">

            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <!-- Account -->
          
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">

                            @if ($dokter->foto == null)
                                <img src="{{ asset('sneat/assets/img/avatars/1.png') }}" alt="user-avatar"
                                    class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            @else
                                <img src="{{ Storage::url($dokter->foto) }}" alt="user-avatar"
                                    class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            @endif
                          
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input class="form-control" type="text" id="name" name="name"
                                    value="{{ $dokter->name }}" disabled/>
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="country">Jenis Kelamin</label>
                                <input class="form-control" type="text" id="jkelamin" name="jkelamin"
                                    value="{{$dokter->jkelamin }}" disabled />
                             
                            </div>
                         
                          
                       
                            <div class="mb-3 col-md-6">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                                    value="{{ $dokter->pekerjaan }}" disabled />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="{{ $dokter->alamat }}" disabled />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="bio" class="form-label">Bio</label>
                                <textarea id="basic-default-message" class="form-control" placeholder="Masukan bio" name="bio" disabled>{{ $dokter->bio }}</textarea>
                              
                            </div>

                        </div>
    
            </div>
            <!-- /Account -->
        </div>

    </div>
    </div>







@endsection
