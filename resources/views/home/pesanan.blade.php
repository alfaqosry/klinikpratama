@extends('layouts.tampa-menu')
@section('login', 'show')
@section('content')

    <div class="row">





    @if (session('sukses'))
            <div class="alert alert-success" role="alert">
                {{ session('sukses') }}
            </div>
        @endif
        @if (session('gagal'))
            <div class="alert alert-warning" role="alert">
                {{ session('gagal') }}
            </div>
        @endif


        <div class="col-xl-12">
                  <h6 class="text-muted">Pesanan</h6>
                  <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                      <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home" aria-selected="false">
                          <i class="tf-icons bx bx-home"></i> Pesanan
                          <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger">{{$totaldiproses}}</span>
                        </button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-profile" aria-controls="navs-pills-justified-profile" aria-selected="false">
                          <i class="tf-icons bx bx-list-check"></i> Diterima
                          <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger">{{$totalterima}}</span>
                        </button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link " role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-messages" aria-controls="navs-pills-justified-messages" aria-selected="true">
                          <i class="tf-icons bx bx-message-square"></i> Selesai & Ditolak
                          <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger">{{$totalselesai}}</span>
                          
                        </button>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane fade active show" id="navs-pills-justified-home" role="tabpanel">
                      <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>

                                <tr>
                                    <th>No</th>
                                    <th>Treatment</th>
                                    <th>Status</th>
                                    <th>Boking</th>
                                    
                                    
                                    <th>Harga</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">

                                @foreach ($diproses as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong>{{ $item->treatment->treatment }}</strong></td>
                                        <td>{{$item->status}}</td>
                                        <td>{{$item->boking}}</td>
                                        <td>Rp{{ $item->treatment->harga }}</td>
                                        <td>

                                        @if($item->status == "Diproses")

                                        <a href="{{route('home.pesanandelete',$item->id)}}" class="btn btn-sm btn-danger">Batalkan</a>

                                        @endif
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                           
                        </table>
                    </div>
                      </div>



                      <div class="tab-pane fade " id="navs-pills-justified-profile" role="tabpanel">
                      <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>

                                <tr>
                                    <th>No</th>
                                    <th>Treatment</th>
                                    <th>Status</th>
                                    <th>Harga</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">

                                @foreach ($diterima as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong>{{ $item->treatment->treatment }}</strong></td>
                                        <td>{{$item->status}}</td>
                                        <td>Rp{{ $item->treatment->harga }}</td>
                                        <td>

                                        @if($item->status == "Diproses")

                                        <a href="{{route('home.pesanandelete',$item->id)}}" class="btn btn-sm btn-danger">Batalkan</a>

                                        @endif
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                           
                        </table>
                    </div>
                      </div>
                      <div class="tab-pane fade " id="navs-pills-justified-messages" role="tabpanel">
                      <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>

                                <tr>
                                    <th>No</th>
                                    <th>Treatment</th>
                                    <th>Status</th>
                                    <th>Harga</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">

                                @foreach ($selesai as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong>{{ $item->treatment->treatment }}</strong></td>
                                        <td>{{$item->status}}</td>
                                        <td>Rp{{ $item->treatment->harga }}</td>
                                        <td>

                                        @if($item->status == "Diproses")

                                        <a href="{{route('home.pesanandelete',$item->id)}}" class="btn btn-sm btn-danger">Batalkan</a>

                                        @endif
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                           
                        </table>
                    </div>
                      </div>
                    </div>
                  </div>
                </div>

        <!-- Basic Bootstrap Table -->
        





    </div>

    <!-- <script>
        const checkboxes = document.querySelectorAll('input[type=checkbox]');
        const output = document.querySelector('.runningTotal');

        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                const runningTotal =
                    Array.from(checkboxes)
                    .filter(i => i.checked) // remove unchecked checkboxes.
                    .map(i => i.dataset.amount ??= 0) //extract the amount, or 0
                    .reduce((total, item) => {
                        return total + parseFloat(item)
                    }, 0)

                console.log(runningTotal)
                output.innerHTML = "Rp." +
                    runningTotal;

            })
        });
    </script> -->
@endsection
