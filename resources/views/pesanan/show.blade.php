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

        @php

      
// tanggal lahir
$tanggal = new DateTime($pelanggan->tgl_lahir);

// tanggal hari ini
$today = new DateTime('today');

// tahun
$y = $today->diff($tanggal)->y;

// bulan
$m = $today->diff($tanggal)->m;

// hari
$d = $today->diff($tanggal)->d;


        @endphp
        <div class="row">
            <div class="col-lg-4">
                <div class="card mt-4">
                    <h5 class="card-header">Data pasien</h5>
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
                                    <td class="text-nowrap">Tanggal Lahir</td>
                                    <td>
                                        {{ $pelanggan->tgl_lahir }}
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
                                <tr>
                                    <td class="text-nowrap">Umur</td>
                                    <td>
                                        {{  $y . " tahun " . $m . " bulan " . $d . " hari" }}
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div class="col-lg-8">
                <div class="card mt-4">
                    <h5 class="card-header">Treament pesanan {{ $pelanggan->name }}</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>

                                <tr>
                                    <th>No</th>
                                    <th>Treatment</th>
                                    <th>Jadwal Boking</th>

                                    <th>Status</th>
                                    <th>Harga</th>

                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">

                                @foreach ($treatment as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong>{{ $item->treatment->treatment }}</strong></td>
                                        <td>{{$item->boking}}</td>
                                        <td>{{$item->status}}</td>
                                        <td> {{"Rp " . number_format( $item->treatment->harga , 2, ",", ".")}}</td>
                                        <td>
                                            @if($item->status == "Diproses")
                                            <a href="{{route('pesanan.terima',$item->id)}}" class="btn btn-sm btn-primary">Terima Pesanan</a>

                                            @elseif($item->status == "Pesanan Diterima" )

                                            <a href="{{route('pesanan.selesai',$item->id)}}" class="btn btn-sm btn-success">Selesaikan Pesanan</a>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th> Total</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>
                                        <h4 class="text-primary"> {{"Rp " . number_format($total , 2, ",", ".")}} </h4>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="card-body">


                <div class="row">

                    <!-- <div class="mt-4">
                        <a href="{{route('pesanan.terimasemua',$pelanggan->id) }}" class="btn btn-primary me-2">Terima semua pesanan</a>
                       
                    </div> -->
                </div>
              
            </div>
                </div>

            </div>
        </div>

    </div>

@endsection
