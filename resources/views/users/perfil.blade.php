@extends('layout.app')

@section('body')

<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-1" style="background-image: url('../assets/img/Logo-Social-Media.jpg');   background-repeat: no-repeat;
    background-size: 50% 100%;">
      <span class="mask  bg-gradient-primary  opacity-6" ></span>
     
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
      @if($msg=="success")
      <div class="alert alert-success alert-dismissible text-white" role="alert">
        <span class="text-sm">Operação feita sucesso.</span>
        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      

      <div class="row gx-4 mb-2">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            @php
               $article = Auth::user()->photo;
            @endphp
            @if(Auth::user()->photo != NULL)
            <img src="{{ URL::asset('storage/'.$article) }}" class="w-100 border-radius-lg shadow-sm" alt="Foto de perfil" title="Foto de perfil">
            @else
            <img src="../assets/img/logo-ct-dark.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            @endif
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
              {{Auth::user()->name}}
            </h5>
            <p class="mb-0 font-weight-normal text-sm">

              @if(Auth::user()->user_type_id == 1)
                Administrador
              @elseif(Auth::user()->user_type_id == 2)
                Afiliado
              @elseif(Auth::user()->user_type_id == 3)
              {{ Auth::user()->shop != null ? Auth::user()->shop->name:"Empresa não registada"}}
              @endif
              
            </p>
          </div>
        </div>
        {{-- MOSTRA FOTO DA LOJA D+SE FOR PARCEIRO --}}
        @if(Auth::user()->user_type_id == 3)
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            @php
               $article = Auth::user()->shop != null ? Auth::user()->shop->photo: "Sem Photo";
            @endphp
            @if(Auth::user()->shop->photo != NULL)
            <img src="{{ URL::asset('storage/'.$article) }}" class="w-100 border-radius-lg shadow-sm" alt="Foto de perfil" title="Foto de perfil">
            @else
            <img src="../assets/img/logo-ct-dark.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            @endif
          </div>
        </div>
        @endif

        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
          <div class="nav-wrapper position-relative end-0">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">

              <li class="nav-item">
                <a href="{{ url('perfil.editar') }}" class="nav-link mb-0 px-0 py-1 "  >
                  <i class="material-icons text-lg position-relative">edit</i>
                  <span class="ms-1">Editar perfil</span>
                </a>
              </li> 
            @if(Auth::user()->user_type_id == 3)
            @if($user->shop_id != '')
            <li class="nav-item">
              <a href="{{ url('parceiro-perfil-editar-conta') }}" class="nav-link mb-0 px-0 py-1 " >
                <i class="material-icons text-lg position-relative">store</i>
                <span class="ms-1">Editar a empresa</span>
              </a>
            </li>
          @endif
            @endif

            </ul>
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="row">
          <div class="col-12 col-xl-6">
            <div class="card card-plain h-100">
              <div class="card-header pb-0 p-3">
                <div class="row">
                  <div class="col-md-8 d-flex align-items-center">
                    <h6 class="mb-0">DADOS PESSOAIS</h6>
                  </div>
                  
                </div>
              </div>
              <div class="card-body p-3">
                @if(Auth::user()->user_type_id == 3)
                <p class="text-sm">
                  {{Auth::user()->biography}}
                </p>
                @endif
                <hr class="horizontal gray-light my-4">
                <ul class="list-group">
                  <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nome Completo:</strong> &nbsp;{{Auth::user()->name}}</li>
                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Contato:</strong> &nbsp; {{Auth::user()->phone}}</li>
                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">E-mail:</strong> &nbsp; {{Auth::user()->email}}</li>
                  @if(Auth::user()->user_type_id == 3)
                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Categoria:</strong> &nbsp; {{Auth::user()->specialty->name}}</li>
                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Sub-categoria:</strong> &nbsp; {{Auth::user()->subspecialty->name}}</li>
                  @endif
                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Estado da conta:</strong> &nbsp; {{Auth::user()->status  == 'autorizado'? 'Autorizado':'Não autorizado'}}</li>
                  
                </ul>
              </div>
            </div>
          </div>
          
          {{-- PARCEIRO --}}
          @if(Auth::user()->user_type_id == 3) 

              @if($user->shop_id != NULL)
              <div class="col-12 col-xl-6">
                <div class="card card-plain h-100">
                  <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">DADOS DA EMPRESA</h6>
                  </div>
                  <div class="card-body p-3">
                    <p class="text-sm">
                      {{Auth::user()->shop->description}}
                    </p>
                    <hr class="horizontal gray-light my-4">
                    <ul class="list-group">
                      <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nome:</strong> &nbsp;{{Auth::user()->shop->name}}</li>
                      <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Contato:</strong> &nbsp; {{Auth::user()->shop->phone}}</li>
                      <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">E-mail:</strong> &nbsp; {{Auth::user()->shop->email}}</li>
                      <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Endereço:</strong> &nbsp; {{Auth::user()->shop->address}}</li>
                      
                      {{-- <li class="list-group-item border-0 ps-0 pb-0">
                        <strong class="text-dark text-sm">Social:</strong> &nbsp;
                        <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                          <i class="fab fa-facebook fa-lg"></i>
                        </a>
                        <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                          <i class="fab fa-twitter fa-lg"></i>
                        </a>
                        <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                          <i class="fab fa-instagram fa-lg"></i>
                        </a>
                      </li> --}}
                    </ul>
                  </div>
                </div>
              </div>
              @else
              <div class="col-12 col-xl-6">
                <div class="card card-plain h-100">
                  <div class="card-header pb-0 p-3">

                    

                    {{-- <h5 class="mb-0">Caro usuário, a sua conta ainda não está configurada. <a style="color: red" href="{{ url('parceiro-perfil-criar-conta') }}">Clique aqui</a> para configurar.</h5> --}}
                  
                    <a href="{{ url('parceiro-perfil-criar-conta') }}" class="nav-link mb-0 px-0 py-1 " >
                      <i class="material-icons text-lg position-relative">store</i>
                      <span class="ms-1">Registrar a minha empresa</span>
                    </a>
                  </div>
                </div>
              </div>
              @endif

          @endif

          {{-- ADMIN || PROFISSIONAL --}}
          @if(Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2) 

          <div class="col-12 col-xl-6">
            <div class="card card-plain h-100">
              <div class="card-header pb-0 p-3">
                <h6 class="mb-0">Biografia</h6>
              </div>
              <div class="card-body p-3">
                <p class="text-sm">
                  {{Auth::user()->biography}}
                </p>
                <hr class="horizontal gray-light my-4">
      
              </div>
            </div>
          </div>
          
          @endif


          
        </div>
      </div>
    </div>


    <!-- Modal cadastrar conta-->
@if ($msg == 'criar_conta')

<div >
    <div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-info" role="document">
            <!--Content-->
            <div class="modal-content text-center">
                <!--Header-->
                <div class="modal-header d-flex justify-content-center">
                    <h5 class="heading">
                        Criação da empresa
                    </h5>
                </div>
                <form action="{{ route('parceiro-perfil-criar-conta-confirmar') }}"  method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="user_admin" value="{{Auth::user()->id}}" autocomplete="off"  class="form-control">
                    <input type="hidden" name="id" value="{{Auth::user()->id}}" autocomplete="off"  class="form-control">
                <div class="modal-body">
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Nome </label>
                    <input type="text" name="name" autocomplete="off"  class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" autocomplete="off"  class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Contato</label>
                    <input type="text" name="phone" autocomplete="off" placeholder="+55 ..."  class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Endereço</label>
                    <input type="text" name="address" autocomplete="off"  class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Descrição</label>
                    <textarea type="text" rows="8" name="description" autocomplete="off"  class="form-control"></textarea>
                  </div>
                </div>

                <div class="modal-footer flex-center">
                    <a type="button" id="closemodal" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</a>
                    <button class="btn btn-outline-info waves-effect" type="submit" title="Cadastrar">Confirmar</button>
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
{{-- Fim modal cadastro conta --}}

   <!-- Modal editar conta-->
   @if ($msg == 'editar_conta')

   <div >
       <div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-notify modal-info" role="document">
               <!--Content-->
               <div class="modal-content text-center">
                   <!--Header-->
                   <div class="modal-header d-flex justify-content-center">
                       <h5 class="heading">
                           Edição da conta
                       </h5>
                   </div>
                   <form action="{{ url('shop.actualizar.confirmar') }}"  method="post" enctype="multipart/form-data">
                       {!! csrf_field() !!}
                       <input type="hidden" name="user_admin" value="{{Auth::user()->id}}" autocomplete="off"  class="form-control">
                       <input type="hidden" name="id" value="{{Auth::user()->id}}" autocomplete="off"  class="form-control">
                       <input type="hidden" name="shop_id" value="{{Auth::user()->shop_id}}" autocomplete="off"  class="form-control">
                   <div class="modal-body">
                    <div class="input-group input-group-outline mb-3">
                      <input type="file" name="photo_shop" autocomplete="off" value="{{Auth::user()->shop->photo}}"  placeholder="Imagem da Empresa" class="form-control">
                    </div>
                     <div class="input-group input-group-outline mb-3">
                       {{-- <label class="form-label">Nome da Conta</label> --}}
                       <input type="text" name="name" autocomplete="off" value="{{$shop->name}}"  placeholder="Nome da Empresa" class="form-control">
                     </div>
                     <div class="input-group input-group-outline mb-3">
                       {{-- <label class="form-label">Contato</label> --}}
                       <input type="text" name="phone" autocomplete="off" placeholder="+55 xxx..." value="{{$shop->phone}}"  class="form-control">
                     </div>
                     <div class="input-group input-group-outline mb-3">
                      {{-- <label class="form-label">Endereço</label> --}}
                      <input type="email" name="email" placeholder="E-mail" autocomplete="off"  value="{{$shop->email}}" class="form-control">
                    </div>
                     <div class="input-group input-group-outline mb-3">
                       {{-- <label class="form-label">Endereço</label> --}}
                       <input type="text" name="address" placeholder="Endereço" autocomplete="off"  value="{{$shop->address}}" class="form-control">
                     </div>
                     <div class="input-group input-group-outline mb-3">
                       {{-- <label class="form-label">Descrição</label> --}}
                       <textarea type="text" rows="8" name="description" value="{{Auth::user()->shop->description}}"  autocomplete="off"  class="form-control">{{$shop->description}}</textarea>
                     </div>
                   </div>
   
                   <div class="modal-footer flex-center">
                       <a type="button" id="closemodal" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</a>
                       <button class="btn btn-outline-info waves-effect" type="submit" title="Cadastrar">Confirmar</button>
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
   {{-- Fim modal editar conta --}}
   
    <!-- Modal editar Dapos pessoais-->
    @if ($msg == 'editar_dados')

    <div >
        <div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-notify modal-info" role="document">
                <!--Content-->
                <div class="modal-content text-center">
                    <!--Header-->
                    <div class="modal-header d-flex justify-content-center">
                        <h5 class="heading">
                            Edição de dados pessoais
                        </h5>
                    </div>
                    <form action="{{ url('perfil.actualizar.confirmar') }}"  method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="hidden" name="user_admin" value="{{Auth::user()->id}}" autocomplete="off"  class="form-control">
                        <input type="hidden" name="id" value="{{Auth::user()->id}}" autocomplete="off"  class="form-control">
                    <div class="modal-body">
                      <div class="input-group input-group-outline mb-3">
                        <input type="file" name="photo_perfil" autocomplete="off" value="{{$user->photo}}"  placeholder="Foto de perfil" class="form-control">
                      </div>
                      <div class="input-group input-group-outline mb-3">
                        {{-- <label class="form-label">Nome da Conta</label> --}}
                        <input type="text" name="name" autocomplete="off" value="{{$user->name}}"  placeholder="Nome completo" class="form-control">
                      </div>
                      <div class="input-group input-group-outline mb-3">
                        {{-- <label class="form-label">Contato</label> --}}
                        <input type="text" name="phone" autocomplete="off" placeholder="DDDxxx..." value="{{$user->phone}}"  class="form-control">
                      </div>
                      <div class="input-group input-group-outline mb-3">
                        {{-- <label class="form-label">Endereço</label> --}}
                        <input type="text" name="email" placeholder="Email" autocomplete="off"  value="{{$user->email}}" class="form-control">
                      </div>

                      @if(Auth::user()->user_type_id == 3)

                      <div id="especialidade_div" class="input-group input-group-outline mb-3" >
                        <select name="category"  class="form-control">
                          <option value="{{Auth::user()->specialty->id}}">{{Auth::user()->specialty->name}}</option>
                          @foreach($profissional_categories as $item)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                          @endforeach
                        </select>
                      </div>

                      <div id="especialidade_div" class="input-group input-group-outline mb-3" >
                        <select name="subcategory"  class="form-control">
                          <option value="{{Auth::user()->subspecialty->id}}">{{Auth::user()->subspecialty->name}}</option>
                          @foreach($profissional_subcategories as $item)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                          @endforeach
                        </select>
                      </div>

                      @endif

                      <div class="input-group input-group-outline mb-3">
                        {{-- <label class="form-label">Descrição</label> --}}
                        <textarea type="text" rows="8" name="biography" value="{{$user->biography}}"  autocomplete="off"  class="form-control">{{$user->biography}}</textarea>
                      </div>
                    </div>
    
                    <div class="modal-footer flex-center">
                        <a type="button" id="closemodal" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</a>
                        <button class="btn btn-outline-info waves-effect" type="submit" title="Cadastrar">Confirmar</button>
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
    {{-- Fim modal editar Dapos pessoais --}}
    

  </div>   




@endsection