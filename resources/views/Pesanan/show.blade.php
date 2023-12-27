@extends('layouts.dashboard-layout')
@section('pesanan', 'active')
@section('title', 'Pesanan Homecare')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home /</span>@yield('title')</h4>

        <div class="demo-inline-spacing mb-4">
            <a onclick="history.back()" class="text-white btn rounded-pill btn-warning d-none d-sm-inline-block">
                <span class="tf-icons bx bx-left-arrow-alt"></span>&nbsp; Kembali
            </a>
        </div>

        @if (session('sukses'))
            <div class="alert alert-secondary" role="alert">
                {{ session('sukses') }}
            </div>
        @endif
        @if (session('gagal'))
            <div class="alert alert-warning" role="alert">
                {{ session('gagal') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-6">
                <div class="card mt-4">
                    <h5 class="card-header">Data pelanggan</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless border-bottom">

                            <tbody>
                                <tr>
                                    <td class="text-nowrap">Nama</td>
                                    <td>
                                        {{ $pelanggan->name }}
                                    </td>

                                </tr>
                                <tr>
                                    <td class="text-nowrap">Jenis Kelamin</td>
                                    <td>
                                        {{ $pelanggan->jkelamin }}
                                    </td>

                                </tr>
                                <tr>
                                    <td class="text-nowrap">Email</td>
                                    <td>
                                        {{ $pelanggan->email }}
                                    </td>

                                </tr>
                                <tr>
                                    <td class="text-nowrap">No Telepon</td>
                                    <td>
                                        {{ $pelanggan->no_hp }}
                                    </td>

                                </tr>
                                <tr>
                                    <td class="text-nowrap">Alamat</td>
                                    <td>
                                        {{ $pelanggan->alamat }}
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <div class="card mt-4">
                    <h5 class="card-header">Treament pesanan {{ $pelanggan->name }}</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>

                                <tr>
                                    <th>No</th>
                                    <th>Treatment</th>
                                    <th>Harga</th>

                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">

                                @foreach ($treatment as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong>{{ $item->treatment->treatment }}</strong></td>
                                        <td>Rp{{ $item->treatment->harga }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th> Total</th>
                                    <th></th>
                                    <th>
                                        <h4 class="text-primary">Rp.{{ $total }}</h4>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
