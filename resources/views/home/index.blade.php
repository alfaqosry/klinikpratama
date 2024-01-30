@extends('layouts.tampa-menu')
@section('login', 'show')
@section('content')

    <div class="row">
        <div class="col-lg-12 mb-4 order-0">

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
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Klinik dr.Dini Zulanda</h5>
                            <p class="mb-4">
                            Praktek dr. Dini Zulanda merupakan pusat kesehatan yang melayani pengobatan umum dan perawatan kecantikan dan kesehatan khusus wanita dan keluarga. Untuk memaksimalkan pelayanan kami didukung oleh tenaga Dokter, perawat,beautician dan terapis profesional.
                            </p>
                            <p>Alamat : Jl. Melur No.37 Padang bulan, Kota Pekanbaru</p>
                            <p>Jadwal Operasional : 09:00 - 17:00 </p>

                            <a href="{{route('home.kontak')}}" class="btn btn-sm btn-outline-primary">Lihat Kontak</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('sneat/assets/img/illustrations/klinik.png') }}" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">

        <h3>Tenaga Ahli</h3>


        @foreach($dokter as $d)
                <div class="col-md col-6">
                  <div class="card mb-3">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img class="card-img card-img-left" src="{{ Storage::url($d->foto) }}" alt="Card image" />
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                        <a href="{{route('profiledokter',$d->id)}}"> <h5 class="card-title">{{$d->name}}</h5></a> 
                          <p class="card-text">
                           {{$d->pekerjaan}}
                          </p>
                         
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach

              








        <!--/ Total Revenue -->
        <div class="col-12 col-md-12 col-lg-12 order-3 order-md-2">
            <div class="row">
                <h3>Layanan kami</h3>

                @foreach ($layanan as $item)
                    <div class="col-6 col-lg-2 mb-4">

                        <div class="card text-center">

                            <div class="card-body">
                                <h5 class="card-title">{{ $item->layanan }}</h5>
                                <p class="card-text">{{ $item->keterangan }}</p>
                                <a href="{{ route('home.treatment', $item->id) }}" class="btn btn-primary">Pesan</a>
                            </div>

                        </div>
                    </div>
                @endforeach



            </div>
        </div>

    </div>


    </div>

@endsection
