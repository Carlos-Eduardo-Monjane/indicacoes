@extends('layout.app')

@section('body')

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">GERENCIAMENTO DE OFERTAS</h6>
          </div>
        </div>
       
        <div class="card-body px-0 pb-2">
          @if($msg=="success")
          <div class="alert alert-success alert-dismissible text-white" role="alert">
            <span class="text-sm">Operação feita sucesso.</span>
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          {{-- inicio --}}
          {{-- INDICACOES CLIENTE  --}}
          @if(Auth::user()->user_type_id == 4)
          <div class="row">
            <div class="col-lg-9">
              <div class="row">
                <div class="col-md-12 mb-lg-0 mb-4">
                  <div class="card px-0 pb-2">
                    <div class="card-header pb-0 px-3">
                      <div class="row">
                        <div class="col-md-6">
                          <h6 class="mb-0">Ofertas</h6>
                        </div>
                        <div class="col-6 text-end">
                          <a href="{{ url('pro.oferta.model_store_index') }}" class="btn bg-gradient-dark mb-0"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Nova Oferta </a>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="table-responsive p-0 card-body">
                      <table id="datatable-produtos" class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Categoria</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Preço</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantidade</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>

                          </tr>
                        </thead>
                        <tbody>
                          @foreach($ofertas as $item)
                          <tr>
                            <td>
                              <div class="d-flex px-2 py-1">
                                <div>
                                  <img src="{{ URL::asset('storage/'.$item->photo) }}" class="avatar avatar-sm me-3 border-radius-lg" alt="produto">
                              </div>
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm">{{$item->name}}</h6>
                                  <p class="text-xs text-secondary mb-0">{{$item->code}}</p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0">{{$item->category->name}}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <span class="badge badge-sm bg-gradient-success">R${{$item->price}}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold">{{$item->quantity}}</span>
                            </td>
                            <td>
                              <a href="{{ url('produtos-editar-produto') }}?shop_id={{Auth::user()->shop_id}}&idproduto={{$item->id}}" class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2" title="Editar">edit</i></a>
                              <a  href="{{ url('produtos-deletar-produto') }}?shop_id={{Auth::user()->shop_id}}&idproduto={{$item->id}}" class="btn btn-link text-danger text-gradient px-3 mb-0" ><i class="material-icons text-sm me-2" title="Apagar">delete</i></a>
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

            {{-- Categorias  --}}
            <div class="col-lg-3">
              <div class="card h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">CATEGORIAS</h6>
                    </div>
                    <div class="col-6 text-end">
                      <a href="{{ url('produtos-cadatrar-categoria') }}?shop_id={{Auth::user()->shop_id}}" class="btn btn-outline-dark btn-sm mb-0"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Nova </a>
                    </div>
                  </div>
                  <hr>
                </div>
                <div class="card-body p-3 pb-0">
                  <ul class="list-group">
                   
                    {{-- forech comeca  --}}
                    @foreach($categorias as $item)
                      <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex flex-column">
                          <p class="text-dark mb-1 text-sm">{{$item->name}}</p>
                        </div>
                        <div class="d-flex align-items-center text-sm">
                        
                          <a  href="{{ url('produtos-deletar-categoria') }}?shop_id={{Auth::user()->shop_id}}&idcategoria={{$item->id}}" class="btn btn-link text-danger text-gradient px-3 mb-0" ><i class="material-icons text-sm me-2" title="Apagar">delete</i></a>
                        </div>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
          @endif
          {{-- fim --}}


                    {{-- INDICACOES Profissional  --}}
                    @if(Auth::user()->user_type_id == 3)
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-md-12 mb-lg-0 mb-4">
                            <div class="card px-0 pb-2">
                              <div class="card-header pb-0 px-3">
                                <div class="row">
                                  <div class="col-md-6">
                                    <h6 class="mb-0">Ofertas ativa</h6>
                                  </div>
                                  <div class="col-6 text-end">
                                    @if (count($ofertas) == 0)
                                    <a href="{{ url('pro.oferta.model_store') }}" class="btn bg-gradient-dark mb-0"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Nova Oferta </a>
                                    @endif
                                 </div>
                                </div>
                              </div>
                              <hr>
                              <div class="table-responsive p-0 card-body">
                                <table id="datatable-produtos" class="table align-items-center mb-0">
                                  <thead>
                                    <tr>
                                      <th class="text-center  text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                      <th class="text-center  text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Título</th>
                                      <th class="text-center  text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Descrição</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data de validade</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data de criação</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
          
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($ofertas as $key => $item)
                                    <tr>
                                      <td class="align-middle text-center">
                                        <p class="text-center text-xs font-weight-bold ">{{$key}}</p>
                                      </td>
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
  
                                      <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$item->describe}}</p>
                                      </td>

                                      @php($date_validate = \Carbon\Carbon::parse($item->validate))
                                      @php($date_created_at = \Carbon\Carbon::parse($item->created_at))
                                      <td class="align-middle text-center text-sm">

                                        @if($date_validate->isPast())
                                        <span class="badge badge-sm bg-gradient-warning">{{$date_validate->format('d/m/Y')}}</span>
                                        @else
                                        <span class="badge badge-sm bg-gradient-success">{{$date_validate->format('d/m/Y')}}</span>
                                        @endif
                                        
                                      </td>
                                      <td class="align-middle text-center">
                                        <span class="badge badge-sm bg-gradient-dark">{{$date_created_at->format('d/m/Y')}}</span>
                                      </td>

                                      <td class="align-middle text-center">
                                        <a href="{{ url('pro.oferta.model_edit') }}/{{$item->id}}" class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2" title="Editar">edit</i></a>
                                        <a  href="{{ url('pro.oferta.model_delete') }}/{{$item->id}}" class="btn btn-link text-danger text-gradient px-3 mb-0" ><i class="material-icons text-sm me-2" title="Apagar">delete</i></a>
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
          
                    </div>
                    @endif
                    {{-- fim --}}
         
        </div>
      </div>
    </div>
  </div>

  <!-- Modal editar produto-->
  @if ($msg == 'model_edit')

  <div >
      <div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-notify modal-info" role="document">
              <!--Content-->
              <div class="modal-content text-center">
                  <!--Header-->
                  <div class="modal-header d-flex justify-content-center">
                      <h5 class="heading">
                          Editar a oferta
                      </h5>
                  </div>
                  <form action="{{ url('pro.oferta.edit') }}"  method="post" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                  <div class="modal-body">

                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Título </label>
                    <input type="text" name="title" value="{{ $oferta->title }}" autocomplete="off"  class="form-control">
                  </div>

                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Descrição da oferta </label>
                    <input type="text" name="describe" value="{{ $oferta->describe }}" autocomplete="off"  class="form-control">
                  </div>

                  <div class="input-group input-group-outline mb-3">
                    <input type="file" name="photo_oferta" value="{{ $oferta->photo }}" autocomplete="off" placeholder="Imagem da oferta" class="form-control">
                  </div>

                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Validade da oferta </label>
                    <input type="date" name="validate" value="{{ $oferta->validate }}" autocomplete="off"  class="form-control">
                  </div>

                  <input type="hidden" value="{{$oferta->id}}" name="id">

          </div>
  
                  <div class="modal-footer flex-center">
                      <a type="button" id="closemodal" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</a>
                      <button class="btn btn-outline-info waves-effect" type="submit" title="Confirmar">Salvar</button>
                  </div>
                  </form>
              </div>
              <!--/.Content-->
          </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script>
          $(window).on('load',function(){
              $('#modalPush').modal('show');
          });
          $('#closemodal').click(function() {
              $('#modalPush').modal('hide');
          });
      </script>
  </div>
  @endif
  {{-- Fim modal editar produto --}}
  

<!-- Modal deletar categoria-->
@if ($msg == 'modal_delete_categoria')

<div >
    <div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-info" role="document">
            <!--Content-->
            <div class="modal-content text-center">
                <!--Header-->
                <div class="modal-header d-flex justify-content-center">
                    <h5 class="heading">
                        Deseja apagar <strong>{{$categoria->name}}</strong>?
                    </h5>
                </div>
                <form action="{{ url('produtos-confirmar-apagar-categoria') }}"  method="post" >
                    {!! csrf_field() !!}
                <div class="modal-body">
                  <p>Todos os dados relacionados serão eliminados.</p>
                  <input type="hidden" name="shop_id" value="{{Auth::user()->shop_id}}" autocomplete="off"  class="form-control">
                  <input type="hidden" name="idcategoria" value="{{$categoria->id}}" autocomplete="off"  class="form-control">
                </div>

                <div class="modal-footer flex-center">
                    <a type="button" id="closemodal" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</a>
                    <button class="btn btn-outline-info waves-effect" type="submit" title="Confirmar">Confirmar</button>
                </div>
                </form>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script>
        $(window).on('load',function(){
            $('#modalPush').modal('show');
        });
        $('#closemodal').click(function() {
            $('#modalPush').modal('hide');
        });
    </script>
</div>
@endif
{{-- Fim modal delete categoria --}}

    <!-- Modal deletar produto-->
@if ($msg == 'modal_delete')

<div >
    <div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-info" role="document">
            <!--Content-->
            <div class="modal-content text-center">
                <!--Header-->
                <div class="modal-header d-flex justify-content-center">
                    <h5 class="heading">
                        Deseja apagar a oferta <strong>{{$oferta->title}}</strong>?
                    </h5>
                </div>
                <form action="{{ url('pro.oferta.delete') }}"  method="post">
                    {!! csrf_field() !!}
                <div class="modal-body">
                  <p>Todos os dados relacionados serão eliminados.</p>
                  <input type="hidden" name="id" value="{{$oferta->id}}" class="form-control">
               </div>

                <div class="modal-footer flex-center">
                    <a type="button" id="closemodal" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</a>
                    <button class="btn btn-outline-info waves-effect" type="submit" title="Confirmar">Confirmar</button>
                </div>
                </form>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script>
        $(window).on('load',function(){
            $('#modalPush').modal('show');
        });
        $('#closemodal').click(function() {
            $('#modalPush').modal('hide');
        });
    </script>
</div>
@endif
{{-- Fim modal delete produto --}}
 
  <!-- Modal cadastrar produto-->
@if ($msg == 'modal_store')

<div >
    <div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-info" role="document">
            <!--Content-->
            <div class="modal-content text-center">
                <!--Header-->
                <div class="modal-header d-flex justify-content-center">
                    <h5 class="heading">
                      Registro de oferta para os clientes
                    </h5>
                </div>
             
                <form action="{{url('pro.oferta.store') }}"  method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                
                <div class="modal-body">
                  
                  <p class="col-12 small sm text-sm text-small">Preencha os campos abaixo.</p>
                  <hr/>

                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Título </label>
                    <input type="text" name="title" autocomplete="off"  class="form-control">
                  </div>

                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Descrição da oferta </label>
                    <input type="text" name="describe" autocomplete="off"  class="form-control">
                  </div>

                  <div class="input-group input-group-outline mb-3">
                    <input type="file" name="photo_oferta" autocomplete="off" placeholder="Imagem da oferta" class="form-control">
                  </div>

                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Validade da oferta </label>
                    <input type="date" name="validate" autocomplete="off"  class="form-control">
                  </div>
             </div>

                <div class="modal-footer flex-center">
                    <a type="button" id="closemodal" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</a>
                    <button class="btn btn-outline-info waves-effect" type="submit" title="Confirmar">Salvar</button>
                </div>
                </form>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script>
        $(window).on('load',function(){
            $('#modalPush').modal('show');
        });
        $('#closemodal').click(function() {
            $('#modalPush').modal('hide');
        });
    </script>
</div>
@endif

{{-- Fim modal cadastro produto --}}


<!-- Modal cadastrar categoria-->
@if ($msg == 'modal_categories')

    <div >
        <div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-notify modal-info" role="document">
                <!--Content-->
                <div class="modal-content text-center">
                    <!--Header-->
                    <div class="modal-header d-flex justify-content-center">
                        <h5 class="heading">
                            Cadastro de Categoria
                        </h5>
                    </div>
                    <form action="{{ url('produtos-confirmar-cadatro-categoria') }}"  method="post">
                        {!! csrf_field() !!}
                    <div class="modal-body">
                      <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Nome da categoria</label>
                        <input type="text" name="name" autocomplete="off"  class="form-control">
                      </div>
                      <input type="hidden" name="shop_id" value="{{Auth::user()->shop_id}}" autocomplete="off"  class="form-control">
                    </div>

                    <div class="modal-footer flex-center">
                        <a type="button" id="closemodal" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</a>
                        <button class="btn btn-outline-info waves-effect" type="submit" title="Confirmar">Confirmar</button>
                    </div>
                    </form>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script>
            $(window).on('load',function(){
                $('#modalPush').modal('show');
            });
            $('#closemodal').click(function() {
                $('#modalPush').modal('hide');
            });
        </script>
    </div>
@endif
{{-- Fim modal cadastro categoria --}}


</div>
<script>
  //datatable
    $(document).ready( function () {
        $('#datatable-produtos').DataTable();
    } );

    $(document).ready( function () {
        $('#datatable-categorias').DataTable();
    } );
</script>


@endsection