@extends('layout.app')

@section('content')


@section('body')
 


  {{-- MAIN DO ADMIN MASTER --}}
  @if(Auth::user()->user_type_id == 1)
  <div class="container-fluid py-4">
    <div class="row">

      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">account_circle</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Total AFILIADOS</p>
              <h4 class="mb-0">{{ $usersAfiliados }}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder"> </span></p>
          </div>
        </div>
      </div>


      

      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">badge</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Total PROFISSIONAIS</p>
              <h4 class="mb-0">{{ $usersProfissionais }}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span></p>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">settings_ethernet</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Total INDICAÇÕES</p>
              <h4 class="mb-0">{{ $total_indicacoes }}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder"> </span></p>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-warning shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons me-2 text-lg">blur_off</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Total SEM CONTATO</p>
              <h4 class="mb-0">{{ $total_indicacoes_sem_contacto }}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder"> </span></p>
          </div>
        </div>
      </div>



      
      


      
    </div>

    <div class="row mt-4">
      <div class="col-lg-6 col-md-6 mt-4 mb-4">
        <div class="card z-index-2 ">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
              <div class="chart">
                <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
              </div>
            </div>
          </div>
          <div class="card-body">
            <h6 class="mb-0 ">Produção Semanal</h6>
            <p class="text-sm ">Análise semanal das indicações </p>
            <hr class="dark horizontal">
            <div class="d-flex ">
              <i class="material-icons text-sm my-auto me-1">schedule</i>
              <p class="mb-0 text-sm"> Semana em curso... </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 mt-4 mb-4">
        <div class="card z-index-2  ">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
              <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
              </div>
            </div>
          </div>
          <div class="card-body">
            <h6 class="mb-0 "> Produção Anual </h6>
            <p class="text-sm "> Análise anual das indicações  </p>
            <hr class="dark horizontal">
            <div class="d-flex ">
              <i class="material-icons text-sm my-auto me-1">schedule</i>
              <p class="mb-0 text-sm"> Ano em curso... </p>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div> 

  @endif


  {{-- MAIN DO PARCEIRO --}}
  @if(Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 3)
        {{--  NAO AUTORIZADO--}}
        @if(Auth::user()->status == 'nao-autorizado')
            <h1>NAO AUTORIZADO</h1>

        @else 
        {{-- AUTORIZADO --}}
        <div class="container-fluid py-4">
          <div class="row">

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
                <div class="card-header p-3 pt-2">
                  <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">verified_user</i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Total NEGÓCIO FECHADO</p>
                    <h4 class="mb-0">{{ $total_indicacoes_neg_fechado }}</h4>
                  </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                  <p class="mb-0"><span class="text-success text-sm font-weight-bolder"> </span></p>
                </div>
              </div>
            </div>


            

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
                <div class="card-header p-3 pt-2">
                  <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">blur_on</i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Total em NEGOCIAÇÃO</p>
                    <h4 class="mb-0">{{ $total_indicacoes_em_negociacao }}</h4>
                  </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                  <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span></p>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
                <div class="card-header p-3 pt-2">
                  <div class="icon icon-lg icon-shape bg-gradient-warning shadow-success text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons me-2 text-lg">blur_off</i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Total SEM CONTATO</p>
                    <h4 class="mb-0">{{ $total_indicacoes_sem_contacto }}</h4>
                  </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                  <p class="mb-0"><span class="text-success text-sm font-weight-bolder"> </span></p>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
                <div class="card-header p-3 pt-2">
                  <div class="icon icon-lg icon-shape bg-gradient-danger shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">settings_ethernet</i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Total SEM INTERESSE</p>
                    <h4 class="mb-0">{{ $total_indicacoes_sem_interesse }}</h4>
                  </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                  <p class="mb-0"><span class="text-success text-sm font-weight-bolder"> </span></p>
                </div>
              </div>
            </div>

            
            

  
            
          </div>
      
          <div class="row mt-4">
            <div class="col-lg-6 col-md-6 mt-4 mb-4">
              <div class="card z-index-2 ">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                  <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                    <div class="chart">
                      <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <h6 class="mb-0 ">Produção Semanal</h6>
                  <p class="text-sm ">Análise semanal das indicações </p>
                  <hr class="dark horizontal">
                  <div class="d-flex ">
                    <i class="material-icons text-sm my-auto me-1">schedule</i>
                    <p class="mb-0 text-sm"> Semana em curso... </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 mt-4 mb-4">
              <div class="card z-index-2  ">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                  <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                    <div class="chart">
                      <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <h6 class="mb-0 "> Produção Anual </h6>
                  <p class="text-sm "> Análise anual das indicações  </p>
                  <hr class="dark horizontal">
                  <div class="d-flex ">
                    <i class="material-icons text-sm my-auto me-1">schedule</i>
                    <p class="mb-0 text-sm"> Ano em curso... </p>
                  </div>
                </div>
              </div>
            </div>
            {{-- <div class="col-lg-4 mt-4 mb-3">
              <div class="card z-index-2 ">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                  <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                    <div class="chart">
                      <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <h6 class="mb-0 ">Completed Tasks</h6>
                  <p class="text-sm ">Last Campaign Performance</p>
                  <hr class="dark horizontal">
                  <div class="d-flex ">
                    <i class="material-icons text-sm my-auto me-1">schedule</i>
                    <p class="mb-0 text-sm">just updated</p>
                  </div>
                </div>
              </div>
            </div> --}}





          </div>

                       {{-- News  --}}
                       {{-- <div class="row mt-4">
                        <div class="col-lg-12">
                          <div class="row">
                            <div class="col-md-12 mb-lg-0 mb-4">
                              <div class="card px-0 pb-2">
                              
                                <div class="card-header pb-0 px-3">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <h6 class="mb-0">Top 5 Profissionais</h6>
                                    </div>
                                    <div class="col-6 text-end">
                                    </div>
                                  </div>
                                </div>
                                <hr>
                                <div class="table-responsive p-0 card-body">
                                  <table id="datatable-produtos" class="table align-items-center mb-0">
                                    <thead>
                                      <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Título</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Mensagem</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
            
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($news as $item)
                                      <tr>
                                        <td>
                                          <div class="d-flex px-2 py-1">
                                            <div>
                                              <img src="{{ URL::asset('storage/'.$item->photo) }}" class="avatar avatar-sm me-3 border-radius-lg" alt="produto">
                                          </div>
                                            <div class="d-flex flex-column justify-content-center">
                                              <h6 class="mb-0 text-sm">{{$item->title}}</h6>
                                            </div>
                                          </div>
                                        </td>
            
                                        <td class="align-middle text-center">
                                          <span class="text-secondary text-xs font-weight-bold">{{$item->message}}</span>
                                        </td>
                                                                    <td class="align-middle text-center text-sm">
                                          <span class="badge badge-sm bg-gradient-success">{{$item->created_at}}</span>
                                        </td>
                                        <td>
                                          <a href="{{ url('news.modal.editar') }}/{{$item->id}}" class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2" title="Editar">edit</i></a>
                                          
                                          
                                          <a  href="{{ url('news.modal.deletar') }}/{{$item->id}}" class="btn btn-link text-danger text-gradient px-3 mb-0" ><i class="material-icons text-sm me-2" title="Apagar">delete</i></a>
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
            
                      </div> --}}
                      {{-- fim --}}
      

        </div> 

        @endif



  @endif



  <script>
    //datatable
      $(document).ready( function () {
          $('#datatable-conversas').DataTable();
      } );
  
      $(document).ready( function () {
          $('#datatable-categorias').DataTable();
      } );
  </script>


@endsection
@endsection
