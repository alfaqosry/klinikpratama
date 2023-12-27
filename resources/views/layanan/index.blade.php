@extends('layouts.dashboard-layout')
@section('layanan', 'active')
@section('title', 'Daftar layanan')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home /</span>@yield('title')</h4>

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
        <a href="{{ route('layanan.create') }}" class="btn btn-primary">Tambah Layanan</a>
        <!-- Basic Bootstrap Table -->
        <div class="card mt-4">
            <h5 class="card-header">@yield('title')</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Layanan</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                        @foreach ($layanan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a
                                        href="{{ route('treatment.index', $item->id) }}"><strong>{{ $item->layanan }}</strong></a>

                                </td>


                                <td>
                                    @if ($item->active == 'Ya')
                                        <span class="badge bg-label-success me-1">Aktif</span>
                                    @else
                                        <span class="badge bg-label-danger me-1">Tidak aktif</span>
                                    @endif

                                </td>

                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('layanan.edit', $item->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal" data-bs-layanan="{{ $item->layanan }}"
                                                data-bs-id="{{ $item->id }}"
                                                data-bs-link="{{ route('layanan.delete', $item->id) }}"><i
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
                    <h5 class="modal-title" id="exampleModalLabel1">Hapus Layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda ingin menghapus layanan ini ?</p>
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
            const data = button.getAttribute('data-bs-layanan')
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
