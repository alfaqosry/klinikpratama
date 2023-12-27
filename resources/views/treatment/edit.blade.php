@extends('layouts.dashboard-layout')
@section('layanan', 'active')
@section('title', 'Edit treatment')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-2 "><span class="text-muted fw-light">Home/</span> @yield('title')</h4>

        <div class="demo-inline-spacing mb-4">
            <a href="{{ route('treatment.index', $treatment->layanan_id) }}"
                class="btn rounded-pill btn-warning d-none d-sm-inline-block">
                <span class="tf-icons bx bx-left-arrow-alt"></span>&nbsp; Kembali
            </a>
            {{-- <button type="button" class="btn rounded-pill btn-secondary">
                <span class="tf-icons bx bx-bell"></span>&nbsp; Secondary
            </button> --}}
        </div>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">@yield('title') {{ $treatment->treatment }} </h5>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('treatment.update', $treatment->id) }}" method="POST">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label class="form-label" for="treatment">Treatment</label>
                                <input type="text" class="form-control" id="treatment"
                                    value="{{ $treatment->treatment }}" name="treatment" />
                                @error('treatment')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="harga">Harga</label>
                                <input type="text" class="form-control" id="harga" value="{{ $treatment->harga }}"
                                    name="harga" />
                                @error('harga')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>



                            <div class="mb-3">
                                <label class="form-label" for="keterangan">Keterangan</label>
                                <div class="input-group input-group-merge">

                                    <textarea id="keterangan" class="form-control" aria-label="Hi, Do you have a moment to talk Joe?"
                                        aria-describedby="keterangan2" name="keterangan">{{ $treatment->keterangan }}</textarea>

                                    @error('active')
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
