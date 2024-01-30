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

<div class="row">

<h3>Profile dr. Dini Oktafianti, DIPL,CIBTAC</h3>

<div class="col-6">
                  <div class="card mb-3">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img class="card-img card-img-left" src="{{ asset('sneat/assets/img/avatars/dokter.jpeg') }}" alt="Card image">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">dr. Dini Oktafianti, DIPL,CIBTAC</h5>
                          <p class="card-text">
                        
Universitas Islam Sumatera Utara (Fak. Kedokteran)
Basic Medical Advance Medical Aesthetic and Cosmetology Program (Lembaga Estetika Medik 2013)
Dipl. Ciptac Treadlift Program (Carla Aesthetic Institute 2018)
Intensive 40 Hour Profesional Aesthetic Medic Treatment Course (Estetico Derma Institute 2018)
                          </p>
                       
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
        <div class="col-xl-6">
                      <div class="card">
                        <h5 class="card-header">Akun Sosial Media</h5>
                        <div class="card-body">
                        
                          <!-- Social Accounts -->
                          <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                              <img src="{{ asset('sneat/assets/img/icons/brands/facebook.png') }}" alt="facebook" class="me-3" height="30">
                            </div>
                            <div class="flex-grow-1 row">
                              <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                                <h6 class="mb-0">Facebook</h6>
                                   <a href="#" target="_blank">Praktek Dokter Dini Zulanda</a>
                              </div>
                              <div class="col-4 col-sm-5 text-end">
                                <button type="button" class="btn btn-icon btn-outline-secondary">
                                  <i class="bx bx-link-alt"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                          
                          <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                              <img src="{{ asset('sneat/assets/img/icons/brands/instagram.png') }}" alt="instagram" class="me-3" height="30">
                            </div>
                            <div class="flex-grow-1 row">
                              <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                                <h6 class="mb-0">instagram</h6>
                                <a href="https://www.instagram.com/dini.aesthetica/" target="_blank">@dini.aesthetica</a>
                              </div>
                              <div class="col-4 col-sm-5 text-end">
                                <button type="button" class="btn btn-icon btn-outline-secondary">
                                <i class="bx bx-link-alt"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                          <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                              <img src="{{ asset('sneat/assets/img/icons/brands/whatsapp-logo-24.png') }}" alt="dribbble" class="me-3" height="30">
                            </div>
                            <div class="flex-grow-1 row">
                              <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                                <h6 class="mb-0">Whatsapp</h6>
                                <p >+6285174398979</p>
                              </div>
                              <div class="col-4 col-sm-5 text-end">
                                <a href="https://wa.link/rvsf8l" class="btn btn-icon btn-outline-secondary">
                                <i class="bx bx-link-alt"></i>
</a>
                              </div>
                            </div>
                          </div>
                          <div class="d-flex">
                            <div class="flex-shrink-0">
                              <img src="{{ asset('sneat/assets/img/icons/brands/envelope-regular-24.png') }}" alt="behance" class="me-3" height="30">
                            </div>
                            <div class="flex-grow-1 row">
                              <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                                <h6 class="mb-0">Email</h6>
                                <p >Klinik.pratama37@gmail.com </p>
                              </div>
                              <div class="col-4 col-sm-5 text-end">
                                <button type="button" class="btn btn-icon btn-outline-secondary">
                                  <i class="bx bx-link-alt"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                          <!-- /Social Accounts -->
                        </div>
                      </div>
          
                      </div>


</div>

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
