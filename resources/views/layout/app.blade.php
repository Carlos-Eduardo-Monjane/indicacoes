<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Minhas Indicações</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="icon" href="{{ asset('assets/img/favicon.png')}}" type="image/png"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link rel="stylesheet" href="{{ asset('assets/css/nucleo-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/nucleo-svg.css')}}">
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
  
  <script src="{{ url('./node_modules/jquery') }}"></script> 
  <script src="{{ url('./node_modules/datatables.net') }}"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.0.0')}}" rel="stylesheet" />

{{-- Select com PEsquisa --}}
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


</head>
<body class="g-sidenav-show  bg-gray-200">

    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
          <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
          <a class="navbar-brand m-0" href="#" >
            <img src="./assets/img/tecnonetz_logo.png" width="100%" class="navbar-brand-img h-100" alt="main_logo">
            {{-- <span class="col-md-2 font-weight-bold text-white">Olá, {{ strlen(Auth::user()->name) >= 10 ? substr(Auth::user()->name,0,10).'...' : Auth::user()->name}}</span> --}}
          </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
          <ul class="navbar-nav">

            {{-- ADMIN MASTER --}}
            @if(Auth::user()->user_type_id == 1)
            <li class="nav-item">
              <a class="nav-link text-white active bg-gradient-primary" href="{{ url('/') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">dashboard</i>
                </div>
                <span class="nav-link-text ms-1">Início</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white " href="{{ url('admin.afiliados') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">face</i>
                </div>
                <span class="nav-link-text ms-1">Clientes</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white " href="{{ url('admin.profissional') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">manage_accounts</i>
                </div>
                <span class="nav-link-text ms-1">Profissionais</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-white " href="{{ url('admin.indicacoes') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">settings_ethernet</i>
                </div>
                <span class="nav-link-text ms-1">Indicações</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-white " href="{{ url('admin.perfil') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">person</i>
                </div>
                <span class="nav-link-text ms-1">Minha Conta</span>
              </a>
            </li>

            @endif
 
            {{--  PROFISSIONAL (INDICACOES --}}
                @if(Auth::user()->user_type_id == 3)
                <li class="nav-item">
                  <a class="nav-link text-white active bg-gradient-primary" href="{{ url('/') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Início</span>
                  </a>
                </li>

                
                <li class="nav-item">
                  <a class="nav-link text-white " href="{{ url('pro.indicar.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons opacity-10">settings_ethernet</i>
                    </div>
                    <span class="nav-link-text ms-1">Indicações</span>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link text-white " href="{{ url('pro.oferta.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons opacity-10">card_giftcard</i>
                    </div>
                    <span class="nav-link-text ms-1">Ofertas</span>
                  </a>
                </li>

                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('perfil') }}">
                      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                      </div>
                      <span class="nav-link-text ms-1">Perfil</span>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">login</i>
                        {{-- <i class="material-icons opacity-10">assignment</i> --}}
                      </div>
                      <span class="nav-link-text ms-1">Sair</span>
                    </a>
  
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                    style="display: none;">
                    @csrf
                </form>
                  </li>


                @endif
                
                
              
{{-- AFILIADO --}}
                @if(Auth::user()->user_type_id == 2 || Auth::user()->status == 'nao-autorizado')  
                {{-- Conta de profissinal ou conta nao autorizada --}}
                <li class="nav-item">
                  <a class="nav-link text-white active bg-gradient-primary" href="{{ url('/') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Início</span>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link text-white " href="{{ url('cliente.indicar.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons opacity-10">settings_ethernet</i>
                    </div>
                    <span class="nav-link-text ms-1">Indicações</span>
                  </a>
                </li>


                <li class="nav-item">
                  <a class="nav-link text-white " href="{{ url('cliente.pro.favorito.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons opacity-10">stars</i>
                    </div>
                    <span class="nav-link-text ms-1">Profissional Favorito</span>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link text-white " href="{{ url('perfil') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Perfil</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white " href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons opacity-10">login</i>
                      {{-- <i class="material-icons opacity-10">assignment</i> --}}
                    </div>
                    <span class="nav-link-text ms-1">Sair</span>
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  style="display: none;">
                  @csrf
              </form>
                </li>
                @endif
          </ul>
        </div>
      </aside>
    


   
   
      <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
              <nav aria-label="breadcrumb">
                {{-- <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                  <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                  <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                </ol> --}}
                <h6 class="font-weight-bolder mb-0">MEU PAINEL DE GESTÃO</h6>
              </nav>
              <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                  <div class="input-group input-group-outline">
                    {{-- <label class="form-label">Pesquisar...</label>
                    <input type="text" class="form-control"> --}}
                  </div>
                </div>
                <ul class="navbar-nav  justify-content-end">
                  <li class="nav-item d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                      <i class="fa fa-user me-sm-1"></i>
                      <span class="d-sm-inline d-none">Olá, {{Auth::user()->name}}</span>
                    </a>
                  </li>
                  <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                      <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                      </div>
                    </a>
                  </li>
                  <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0">
                      {{-- <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i> --}}
                    </a>
                  </li>
                  
                  {{-- <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-bell cursor-pointer"></i>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                      <li class="mb-2">
                        <a class="dropdown-item border-radius-md" href="javascript:;">
                          <div class="d-flex py-1">
                            <div class="my-auto">
                              <img src="./assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="text-sm font-weight-normal mb-1">
                                <span class="font-weight-bold">New message</span> from Laur
                              </h6>
                              <p class="text-xs text-secondary mb-0">
                                <i class="fa fa-clock me-1"></i>
                                13 minutes ago
                              </p>
                            </div>
                          </div>
                        </a>
                      </li> 
                      <li class="mb-2">
                        <a class="dropdown-item border-radius-md" href="javascript:;">
                          <div class="d-flex py-1">
                            <div class="my-auto">
                              <img src="./assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="text-sm font-weight-normal mb-1">
                                <span class="font-weight-bold">Novos pedidos</span> 
                              </h6>
                              <p class="text-xs text-secondary mb-0">
                                <i class="fa fa-clock me-1"></i>
                                12
                              </p>
                            </div>
                          </div>
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item border-radius-md" href="javascript:;">
                          <div class="d-flex py-1">
                            <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                              <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>credit-card</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                  <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                      <g transform="translate(453.000000, 454.000000)">
                                        <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                        <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </svg>
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="text-sm font-weight-normal mb-1">
                                Pagamentos
                              </h6>
                              <p class="text-xs text-secondary mb-0">
                                <i class="fa fa-clock me-1"></i>
                                22
                              </p>
                            </div>
                          </div>
                        </a>
                      </li>
                    </ul>
                  </li> --}}
                  <li class="nav-item px-3 d-flex align-items-center" title="Sair do sistema">
                    <a class="nav-link text-body p-0" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="material-icons opacity-10">login</i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                      @csrf
                    </form>
                  </li>

                </ul>
              </div>
            </div>
          </nav>
          <!-- End Navbar -->


        
        
          <section class="content">

            @yield('body')

        </section>


        <!-- </div>				 -->
        <footer class="footer _rodapeh">
            <div class="container-fluid">
                <nav class="copyright ml-auto">
                    <ul class="nav">
                        <li class="nav-item">
                            {{-- <a class="nav-link"  target="_blank" href="http://www.actecn.com">
                                Desenvolvido por: ACtech
                            </a> --}}
                        </li>
                    </ul>
                </nav>
            </div>
        </footer>
        <!-- </div> -->
    </main>


<!-- Datatables -->
<script src="{{ asset('template/assets/js/plugin/datatables/datatables.min.js')}}"></script>


<script >
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
        });

        $('#multi-filter-select').DataTable( {
            "pageLength": 5,
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select class="form-control"><option value=""></option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        });

        // Add Row
        $('#add-row').DataTable({
            "pageLength": 5,
        });

        var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $('#addRowButton').click(function() {
            $('#add-row').dataTable().fnAddData([
                $("#addName").val(),
                $("#addPosition").val(),
                $("#addOffice").val(),
                action
            ]);
            $('#addRowModal').modal('hide');

        });
    });
</script>

  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/popper.min.js')}}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{ asset('assets/js/plugins/chartjs.min.js')}}"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Seg", "Ter", "Qua", "Qui", "Sex", "Sáb", "Dom"],
        datasets: [{
          label: "Indicações",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
          data: [{{ $rSegunda }}, 
          {{ $rTerca }}, 
          {{ $rQuarta }}, 
          {{ $rQuinta }}, 
          {{ $rSexta }}, 
          {{ $rSabado }}, 
          {{ $rDomingo }}],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        datasets: [{
          label: "Indicações",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [{{ $rJan }}, 
          {{ $rFev }}, 
          {{ $rMar }}, 
          {{ $rAbr }}, 
          {{ $rMai }}, 
          {{ $rJun }}, 
          {{ $rJul }}, 
          {{ $rAgo }}, 
          {{ $rSet }}, 
          {{ $rOut }}, 
          {{ $rNov }}, 
          {{ $rDez }}],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="{{ asset('assets/js/material-dashboard.min.js?v=3.0.0')}}"></script>
  {{-- <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script> --}}
  

</body>
</html>
