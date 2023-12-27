@extends('layouts.dashboard-layout')
@section('layanan', 'active')
@section('title', 'Edit Layanan')
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
                        <form action="{{ route('layanan.update', $layanan->id) }}" method="POST">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label class="form-label" for="layanan">Layanan</label>
                                <input type="text" class="form-control" id="layanan" value="{{ $layanan->layanan }}"
                                    name="layanan" />
                                @error('layanan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="active">Company</label>
                                <select id="active" name="active" class="form-select">
                                    <option>{{ $layanan->active }}</option>
                                    <option>Ya</option>
                                    <option>Tidak</option>

                                </select>
                                @error('active')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="keterangan">Keterangan</label>
                                <div class="input-group input-group-merge">

                                    <textarea id="keterangan" class="form-control" aria-label="Hi, Do you have a moment to talk Joe?"
                                        aria-describedby="keterangan2" name="keterangan">{{ $layanan->keterangan }}</textarea>

                                    @error('keterangan')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
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
