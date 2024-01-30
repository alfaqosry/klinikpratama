@extends('layouts.dashboard-layout')
@section('layanan', 'active')
@section('title', 'Daftar treatment')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Home /</span>@yield('title')</h4>

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
        <div class="demo-inline-spacing mb-4">
            <a href="{{ route('layanan.index') }}" class="btn rounded-pill btn-warning d-none d-sm-inline-block">
                <span class="tf-icons bx bx-left-arrow-alt"></span>&nbsp; Kembali
            </a>
            <a href="{{ route('treatment.create', $layanan->id) }}" class="btn rounded-pill btn-primary">
                <span class="tf-icons bx bx-plus"></span>&nbsp; Tambah Treatment
            </a>
        </div>

        <!-- Basic Bootstrap Table -->
        <div class="card mt-4">
            <h5 class="card-header">Daftar Treatment Layanan {{ $layanan->layanan }}</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Treatment</th>
                            <th>Harga</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                        @foreach ($treatment as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><strong>{{ $item->treatment }}</strong>

                                </td>


                                <td>
                                   {{"Rp " . number_format($item->harga, 2, ",", ".")}} 

                                </td>

                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('treatment.edit', $item->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal" data-bs-treatment="{{ $item->treatment }}"
                                                data-bs-id="{{ $item->id }}"
                                                data-bs-link="{{ route('treatment.delete', $item->id) }}"><i
                                                    class="bx bx-trash me-1"></i>
                                                Hapus
                                            </button>
                                        </div>



                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Hapus treatnent</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda ingin menghapus treatnent ini ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <a href="" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        const deleteModal = document.getElementById('deleteModal')
        deleteModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            const recipient = button.getAttribute('data-bs-id')
            const link = button.getAttribute('data-bs-link')
            const data = button.getAttribute('data-bs-treatment')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            const modalTitle = deleteModal.querySelector('.modal-title')
            const modalBodyInput = deleteModal.querySelector('.modal-footer a')
            modalTitle.textContent = 'Hapus ' + data
            modalBodyInput.href = link
            console.log(modalTitle.h1);
        });
    </script>
@endsection
