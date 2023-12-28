@extends('layouts.tampa-menu')
@section('login', 'show')
@section('content')

    <div class="row">





        <div class="card">
            <h5 class="card-header">{{ $layanan->layanan }}</h5>
            <div class="card-body">
                <span>Pilih Treatment yang ingin anda pesan

                    <div class="error"></div>
            </div>
            <div class="card-body">
                {{--
                <div class="table-responsive">
                    <table class="table table-striped table-borderless border-bottom">
                        <thead>
                            <tr>
                                <th class="text-nowrap ">Pilih</th>
                                <th class="text-nowrap">Treatment</th>
                                <th class="text-nowrap ">Harga</th>


                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{ route('pesan.store') }}" method="POST">
                                {{ csrf_field() }}
                                @foreach ($treatment as $item)
                                    <tr>
                                        <td class="text-nowra">
                                            <div class="form-check ">
                                                <input class="form-check-input" type="checkbox"
                                                    data-amount="{{ $item->harga }}" value="{{ $item->id }}"
                                                    name="treatment_id[]">

                                                <input type="hidden" name="harga_pesanan" value="{{ $item->harga }}">
                                            </div>
                                        </td>

                                        <td class="text-nowrap"><strong>{{ $item->treatment }}</strong></td>
                                        <td class="text-nowrap">Rp.{{ $item->harga }}</td>


                                    </tr>
                                @endforeach



                        </tbody>
                    </table>
                </div> --}}

                <form action="{{ route('pesan.store') }}" method="POST">
                    {{ csrf_field() }}
                    <!-- Checkbox -->
                    <div class="demo-inline-spacing" role="group" aria-label="Basic checkbox toggle button group">

                        @foreach ($treatment as $item)
                            <input type="checkbox" class="btn-check" id="{{ $item->id }}" autocomplete="off"
                                data-amount="{{ $item->harga }}" value="{{ $item->id }}" name="treatment_id[]" />
                            <label class="btn btn-sm btn-outline-primary " style="margin-top: 6px !important"
                                for="{{ $item->id }}">
                                {{ $item->treatment }}
                                <p>Rp.{{ $item->harga }}</p>
                            </label>
                            <input type="hidden" name="harga_pesanan" value="{{ $item->harga }}">
                        @endforeach


                    </div>

            </div>
            <div class="card-body">
                <h3 class="runningTotal text-primary"></h3>

                <div class="row">

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary me-2">Pesan</button>
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </div>
                </form>
            </div>


        </div>






    </div>

    </div>

    <script>
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
    </script>
@endsection
