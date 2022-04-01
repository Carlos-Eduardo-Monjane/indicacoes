@extends('layout.app')

@section('body')

<div class="container-fluid py-4">
  <div class="row">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
      <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
        <h6 class="text-white text-capitalize ps-3">CONTROLE DE FATURAÇÃO</h6>
      </div>
    </div>
    <div class="col-md-7 mt-4">
      <div class="card">
        <div class="card-header pb-0 px-3">
          <div class="row">
            <div class="col-md-6">
              <h6 class="mb-0">Gerir os Pedidos</h6>
            </div>
            <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
              <i class="material-icons me-2 text-lg">date_range</i>
              <small>Ver todos</small>
            </div>
          </div>
        </div>
        <div class="card-body pt-4 p-3">
          <ul class="list-group">
            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
              <div class="d-flex flex-column">
                <h6 class="mb-3 text-sm">Oliver Liam</h6>
                <span class="mb-2 text-xs">Nome: <span class="text-dark font-weight-bold ms-sm-2">Viking Burrito</span></span>
                <span class="mb-2 text-xs">Email: <span class="text-dark ms-sm-2 font-weight-bold">oliver@burrito.com</span></span>
                <span class="text-xs">Pedido: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
              </div>
              <div class="ms-auto text-end">
                {{-- <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2">delete</i>Delete</a> --}}
                <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fa fa-eye"></i> Ver mais</a>
              </div>
            </li>
            <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
              <div class="d-flex flex-column">
                <h6 class="mb-3 text-sm">Lucas Harper</h6>
                <span class="mb-2 text-xs">Nome: <span class="text-dark font-weight-bold ms-sm-2">Stone Tech Zone</span></span>
                <span class="mb-2 text-xs">Email: <span class="text-dark ms-sm-2 font-weight-bold">lucas@stone-tech.com</span></span>
                <span class="text-xs">Pedido: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
              </div>
              <div class="ms-auto text-end">
                {{-- <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2">delete</i>Delete</a> --}}
                <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fa fa-eye"></i> Ver mais</a>
              </div>
            </li>
            <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
              <div class="d-flex flex-column">
                <h6 class="mb-3 text-sm">Ethan James</h6>
                <span class="mb-2 text-xs"> Nome: <span class="text-dark font-weight-bold ms-sm-2">Fiber Notion</span></span>
                <span class="mb-2 text-xs">Email: <span class="text-dark ms-sm-2 font-weight-bold">ethan@fiber.com</span></span>
                <span class="text-xs">Pedido: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
              </div>
              <div class="ms-auto text-end">
                {{-- <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2">delete</i>Delete</a> --}}
                <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fa fa-eye"></i> Ver mais</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-5 mt-4">
      <div class="card h-100 mb-4">
        <div class="card-header pb-0 px-3">
          <div class="row">
            <div class="col-md-6">
              <h6 class="mb-0">Histórico de Pagamentos</h6>
            </div>
            <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
              <i class="material-icons me-2 text-lg">date_range</i>
              <small>Ver todos</small>
            </div>
          </div>
        </div>
        <div class="card-body pt-4 p-3">
          <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Hoje</h6>
          <ul class="list-group">
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex align-items-center">
                <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">Angelino Fernando</h6>
                  <span class="text-xs">27 January 2022, at 12:30 PM</span>
                </div>
              </div>
              <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                - $ 2,500
              </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex align-items-center">
                <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">Carlos Eduardo</h6>
                  <span class="text-xs">27 January 2022, at 04:30 AM</span>
                </div>
              </div>
              <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                + $ 2,000
              </div>
            </li>
          </ul>
          <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Últimos dias</h6>
          <ul class="list-group">
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex align-items-center">
                <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">Sara Angelino</h6>
                  <span class="text-xs">January 2022, at 13:45 PM</span>
                </div>
              </div>
              <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                + $ 750
              </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex align-items-center">
                <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">António Ferreira</h6>
                  <span class="text-xs">26 January 2022, at 12:30 PM</span>
                </div>
              </div>
              <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                + $ 1,000
              </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex align-items-center">
                <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">Mario Tontos</h6>
                  <span class="text-xs">26 January 2022, at 08:30 AM</span>
                </div>
              </div>
              <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                + $ 2,500
              </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex align-items-center">
                <button class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">priority_high</i></button>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">Terciolo Daniel</h6>
                  <span class="text-xs">26 January 2022, at 05:00 AM</span>
                </div>
              </div>
              <div class="d-flex align-items-center text-dark text-sm font-weight-bold">
                Pending
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
 
</div>


@endsection