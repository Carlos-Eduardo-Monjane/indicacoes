@extends('layout.app')

@section('body')

<div class="container-fluid py-4 ">
  <div class="row">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
      <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
        <h6 class="text-white text-capitalize ps-3">MEU PLANO </h6>
      </div>
    </div>
    <div class="col-lg-8 mt-3">
      <div class="row">
        <div class="col-xl-6 mb-xl-0 mb-4">
          <div class="card bg-transparent shadow-xl">
            <div class="overflow-hidden position-relative border-radius-xl">
              <img src="../assets/img/illustrations/pattern-tree.svg" class="position-absolute opacity-2 start-0 top-0 w-100 z-index-1 h-100" alt="pattern-tree">
              <span class="mask bg-gradient-dark opacity-10"></span>
              <div class="card-body position-relative z-index-1 p-3">
                {{-- <i class="material-icons text-white p-2">wifi</i> --}}
                <h5 class="text-white mt-4 mb-5 pb-2">4562&nbsp;&nbsp;&nbsp;1122&nbsp;&nbsp;&nbsp;4594&nbsp;&nbsp;&nbsp;7852</h5>
                <div class="d-flex">
                  <div class="d-flex">
                    <div class="me-4">
                      <p class="text-white text-sm opacity-8 mb-0">Card Holder</p>
                      <h6 class="text-white mb-0">Luciano Lima</h6>
                    </div>
                    <div>
                      <p class="text-white text-sm opacity-8 mb-0">Expires</p>
                      <h6 class="text-white mb-0">11/22</h6>
                    </div>
                  </div>
                  <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                    <img class="w-60 mt-2" src="../assets/img/logos/visa.png" alt="logo">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="row">
            <div class="col-md-6 col-6">
              <div class="card">
                <div class="card-header mx-4 p-3 text-center">
                  <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                    <i class="material-icons opacity-10">account_balance</i>
                  </div>
                </div>
                <div class="card-body pt-0 p-3 text-center">
                  <h6 class="text-center mb-0">Anual</h6>
                  <span class="text-xs">Taxa Anual</span>
                  <hr class="horizontal dark my-3">
                  <h5 class="mb-0">R$2000</h5>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-6">
              <div class="card">
                <div class="card-header mx-4 p-3 text-center">
                  <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                    <i class="material-icons opacity-10">account_balance_wallet</i>
                  </div>
                </div>
                <div class="card-body pt-0 p-3 text-center">
                  <h6 class="text-center mb-0">Mensal</h6>
                  <span class="text-xs">Taxa Mensal</span>
                  <hr class="horizontal dark my-3">
                  <h5 class="mb-0">R$235.00</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 mb-lg-0 mb-4">
          <div class="card mt-4">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">Método de Pagamento</h6>
                </div>
                <div class="col-6 text-end">
                  <a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Pagar agora</a>
                </div>
              </div>
            </div>
            <div class="card-body p-3">
              <div class="row">
                <div class="col-md-6 mb-md-0 mb-4">
                  <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                    <img class="w-10 me-3 mb-0" src="../assets/img/logos/mastercard.png" alt="logo">
                    <h6 class="mb-0">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;7852</h6>
                    <i class="material-icons ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card">edit</i>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                    <img class="w-10 me-3 mb-0" src="../assets/img/logos/visa.png" alt="logo">
                    <h6 class="mb-0">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;5248</h6>
                    <i class="material-icons ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card">edit</i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 mt-3">
      <div class="card h-100">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Minhas faturas</h6>
            </div>
            <div class="col-6 text-end">
              <button class="btn btn-outline-primary btn-sm mb-0">Ver todas</button>
            </div>
          </div>
        </div>
        <div class="card-body p-3 pb-0">
          <ul class="list-group">
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex flex-column">
                <h6 class="mb-1 text-dark font-weight-bold text-sm">March, 01, 2020</h6>
                <span class="text-xs">#MS-415646</span>
              </div>
              <div class="d-flex align-items-center text-sm">
                $180
                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="material-icons text-lg position-relative me-1">picture_as_pdf</i> Imprimir</button>
              </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex flex-column">
                <h6 class="text-dark mb-1 font-weight-bold text-sm">February, 10, 2022</h6>
                <span class="text-xs">#RV-126749</span>
              </div>
              <div class="d-flex align-items-center text-sm">
                $250
                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="material-icons text-lg position-relative me-1">picture_as_pdf</i> Imprimir</button>
              </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex flex-column">
                <h6 class="text-dark mb-1 font-weight-bold text-sm">April, 05, 2022</h6>
                <span class="text-xs">#FB-212562</span>
              </div>
              <div class="d-flex align-items-center text-sm">
                $560
                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="material-icons text-lg position-relative me-1">picture_as_pdf</i> Imprimir</button>
              </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex flex-column">
                <h6 class="text-dark mb-1 font-weight-bold text-sm">June, 25, 2022</h6>
                <span class="text-xs">#QW-103578</span>
              </div>
              <div class="d-flex align-items-center text-sm">
                $120
                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="material-icons text-lg position-relative me-1">picture_as_pdf</i> Imprimir</button>
              </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
              <div class="d-flex flex-column">
                <h6 class="text-dark mb-1 font-weight-bold text-sm">March, 01, 2022</h6>
                <span class="text-xs">#AR-803481</span>
              </div>
              <div class="d-flex align-items-center text-sm">
                $300
                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="material-icons text-lg position-relative me-1">picture_as_pdf</i> Imprimir</button>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  
  
</div>


@endsection