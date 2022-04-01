@extends('layout.app')

@section('body')

<div class="container-fluid py-4 ">
  @if($msg == 'my_pro' || $msg == 'my_pro_success' || $msg = 'modal_store_inv')
  <div class="row">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
      <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
        <h6 class="text-white text-capitalize ps-3 text-uppercase">SUA LISTA DE PROFISSIONAIS FAVORITOS </h6>
        
      </div>

      @if($msg=="my_pro_success_delete")
      <div class="alert alert-success alert-dismissible text-white" role="alert">
        <span class="text-sm">Operação feita sucesso.</span>
        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif


      
    </div>
    <div class="col-md-12 mb-lg-0 mb-4">
      <div class="card mt-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Deseja adicionar um novo profissional?</h6>
            </div>
            <div class="col-6 text-end">
              <a class="btn bg-gradient-dark mb-0" href="{{ url('cliente.pro.favorito.new') }}"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Adicionar Profissional</a>
            </div>
            
          </div>
        </div>
        <br/>
      </div>
      
    </div>
    
    <div class="col-lg-12 mt-3">
      @if($msg == 'my_pro' || $msg == 'my_pro_success')
      <div class="row">
      
    
          @if($msg=="my_pro_success")
          <div class="alert alert-success alert-dismissible text-white" role="alert">
            <span class="text-sm">Operação feita sucesso.</span>
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          
     
        
    
        @foreach ($profissionais as $item)
    
      <div class="col-lg-4 mt-4 mb-3">
        <div class="card z-index-2 ">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            @php
            $article = $item->pro_favorito->photo;
            @endphp
    
         @if($item->pro_favorito->photo != NULL)
         <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1 " style="background-image:  url('{{ URL::asset('storage/'.$article) }}');   background-repeat: no-repeat;
         background-size: 100% 100%;">
          @else
          <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1 " style="background-image: url('../assets/img/logo-ct-dark.png');   background-repeat: no-repeat;
          background-size: 100% 100%;">
        @endif
    
              <div class="chart">
                
                <canvas  height="120"></canvas>
              </div>
            </div>
          </div>
          <div class="card-body">
            <h6 class="mb-0 ">{{ $item->pro_favorito->name }}</h6>

            <hr>
    
            <div class="d-flex ">
              <div class="my-auto me-3 col-auto ">
                <div class="avatar avatar-xl position-relative">
                  @php
                     $article = $item->pro_favorito->shop->photo;
                  @endphp
                  @if($item->pro_favorito->shop->photo != NULL)
                  <img src="{{ URL::asset('storage/'.$article) }}" class="w-100 border-radius-lg shadow-sm" alt="Foto de perfil" title="Foto de perfil">
                  @else
                  <img src="../assets/img/logo-ct-dark.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                  @endif
                </div>
              </div>
              
    
              <div class="mb-0 text-sm">
    
                <p class="text-sm mb-0 "><strong class="text-dark ">Empresa:</strong> &nbsp;{{$item->pro_favorito->shop->name}}</p>
                <p class="text-sm mb-0"><strong class="text-dark">Categoria:</strong> &nbsp;{{$item->pro_favorito->specialty->name}}</p>
                <p class="text-sm mb-0"><strong class="text-dark">Subcategoria:</strong> &nbsp;{{$item->pro_favorito->subspecialty->name}}</p>
              
              </div>
            </div>

            {{-- Oferta --}}
            @isset($item->pro_favorito->oferta_do_profissinal->photo)
              
    
            <hr>
    
            <div class="d-flex ">
              <div class="my-auto me-3 col-auto ">
                <div class="avatar avatar-xl position-relative">
                  @php
                     $article = $item->pro_favorito->oferta_do_profissinal->photo;
                  @endphp
                  @if($item->pro_favorito->oferta_do_profissinal->photo != NULL)
                  <img src="{{ URL::asset('storage/'.$article) }}" class="w-100 border-radius-lg shadow-sm" alt="Foto de perfil" title="Foto de perfil">
                  @else
                  <img src="../assets/img/logo-ct-dark.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                  @endif
                </div>
              </div>
              
    
              <div class="mb-0 text-sm">
    
                <p class="text-sm mb-0 "><strong class="text-dark "><i class="material-icons text-sm my-auto me-1">card_giftcard</i></strong> &nbsp;{{$item->pro_favorito->oferta_do_profissinal->title}}</p>
                <p class="text-sm mb-0"><strong class="text-dark"><i class="material-icons text-sm my-auto me-1">timer</i></strong> &nbsp;{{$item->pro_favorito->oferta_do_profissinal->validate}}</p>
                <p class="text-sm mb-0"><strong class="text-dark"><i class="material-icons text-sm my-auto me-1">receipt_long</i></strong> &nbsp;{{$item->pro_favorito->oferta_do_profissinal->describe}}</p>
              
              </div>
            </div>
    
            @endisset
    
            <hr/>
            <div class="d-flex ">
              <i class="material-icons text-sm my-auto me-1">mail</i>
              <p class="mb-0 text-sm">{{$item->pro_favorito->shop->email}}</p>
            </div>
            <div class="d-flex ">
              <i class="material-icons text-sm my-auto me-1">call</i>
              <p class="mb-0 text-sm">{{$item->pro_favorito->shop->phone}}</p>
            </div>
            <div class="d-flex ">
              <i class="material-icons text-sm my-auto me-1">place</i>
              <p class="mb-0 text-sm">{{$item->pro_favorito->shop->address}}</p>
            </div>
    
            <hr/>
            <div class="text-center">
              <div class="d-flex text-center">
                <p class="me-5 ">
                  <a class="btn bg-gradient-danger mb-0" href="{{ url('cliente.pro.favorito.delete') }}/{{ $item->id }}"><i class="material-icons text-sm">delete</i>&nbsp;&nbsp;Remover</a>
           
              </p>
                <p class="text-end">
                    <a class="btn bg-gradient-info mb-0" href="{{ url('cliente.indicar.model_store_inv') }}/{{ $item->profissional_id }}"><i class="material-icons text-sm">share</i>&nbsp;&nbsp;Indicar</a>
             
                </p>
              
              </div>
    
           
            </div>
          </div>
        </div>
      </div> 
      
    @endforeach
        
    
      </div>
    </div>
      @endif
    

  </div>
           <!-- Modal cadastrar indicacao-->
@if ($msg == 'modal_store_inv')

<div >
    <div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-info" role="document">
            <!--Content-->
            <div class="modal-content text-center">
                <!--Header-->
                <div class="modal-header d-flex justify-content-center">
                    <h5 class="heading">
                      Quem você irá adicionar como indicação?
                    </h5>
                </div>
             
                <form action="{{url('pro.indicar.store') }}"  method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                
                <div class="modal-body">
                  <hr/>
                  <p class="col-12 small sm text-sm text-small">Preencha as informações de quem deseja adicionar.</p>
                  <hr/>

                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Nome completo </label>
                    <input type="text" name="cliente_nome" autocomplete="off"  class="form-control">
                  </div>

                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Email </label>
                    <input type="email" name="cliente_email" autocomplete="off"  class="form-control">
                  </div>

                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Telefone </label>
                    <input type="tel" name="cliente_phone" autocomplete="off"  class="form-control">
                  </div>

                  <div class="input-group input-group-outline mb-3">
                    <textarea type="text" name="obs" autocomplete="off"  class="form-control">Observações</textarea>
                  </div>

                  <hr/>

                  @if (Auth::user()->user_type_id == 2)
                  <p class="col-12 small sm text-sm text-small">Preencha as informações do profissional.</p>
                  <hr/>

                  <div class="input-group input-group-outline mb-3" >
                    <select id="afiliados" name="profissional_id"  class="form-control afiliados">
                          <option value="{{ $profissional_invest->id }}">{{ $profissional_invest->name }}</option>
                    </select>
                  </div>
                  @endif

                </div>

                <div class="modal-footer flex-center">
                    <a type="button" id="closemodal" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</a>
                    <button class="btn btn-outline-info waves-effect" type="submit" title="Confirmar">Concluir a indicação</button>
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

{{-- Fim modal cadastro indicacao --}}

  @endif


  {{-- --------------------------------------------------- --}}

  @if($msg == 'add_new_pro' || $msg == 'add_new_pro_error')
  <div class="row">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
      <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
        <h6 class="text-white text-capitalize ps-3 text-uppercase">ADICIONE UM PROFISSIONAL FAVORITO </h6>
        
      </div>
      
    </div>
    <div class="col-md-12 mb-lg-0 mb-4">
      <div class="card mt-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Adicione novos profissionais favoritos</h6>
            </div>
            <div class="col-6 text-end">
              <a class="btn bg-gradient-black mb-0" href="{{ url('cliente.pro.favorito.index') }}"><i class="material-icons text-sm">receipt_long</i>&nbsp;&nbsp;Ver os meus favoritos</a>
           
           </div>
            
          </div>
        </div>
        <br/>
      </div>
      
    </div>

    @if($msg=="add_new_pro_error")
    <div class="alert alert-danger alert-dismissible text-white" role="alert">
      <span class="text-sm">Esse profissional já está na lista dos seus favoritos.</span>
      <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    
    <div class="col-lg-12 mt-3">
      <div class="row">

@foreach ($profissionais as $item)

  <div class="col-lg-4 mt-4 mb-3">
    <div class="card z-index-2 ">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
        @php
        $article = $item->photo;
        @endphp

     @if($item->photo != NULL)
     <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1 " style="background-image:  url('{{ URL::asset('storage/'.$article) }}');   background-repeat: no-repeat;
     background-size: 100% 100%;">
      @else
      <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1 " style="background-image: url('../assets/img/logo-ct-dark.png');   background-repeat: no-repeat;
      background-size: 100% 100%;">
    @endif

          <div class="chart">
            
            <canvas  height="120"></canvas>
          </div>
        </div>
      </div>
      <div class="card-body">
        <h6 class="mb-0 ">{{ $item->name }}</h6>
        
        <hr>

        <div class="d-flex ">
          <div class="my-auto me-3 col-auto ">
            <div class="avatar avatar-xl position-relative">
              @php
                 $article = $item->shop;
              @endphp
              @if($item->shop->photo != NULL)
              <img src="{{ URL::asset('storage/'.$article) }}" class="w-100 border-radius-lg shadow-sm" alt="Foto de perfil" title="Foto de perfil">
              @else
              <img src="../assets/img/logo-ct-dark.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
              @endif
            </div>
          </div>

          <div class="mb-0 text-sm">

            <p class="text-sm mb-0 "><strong class="text-dark ">Empresa:</strong> &nbsp;{{$item->shop->name}}</p>
            <p class="text-sm mb-0"><strong class="text-dark">Categoria:</strong> &nbsp;{{$item->specialty->name}}</p>
            <p class="text-sm mb-0"><strong class="text-dark">Subcategoria:</strong> &nbsp;{{$item->subspecialty->name}}</p>
          
          </div>
        </div>



        <hr/>
        <div class="d-flex ">
          <i class="material-icons text-sm my-auto me-1">mail</i>
          <p class="mb-0 text-sm">{{$item->shop->email}}</p>
        </div>
        <div class="d-flex ">
          <i class="material-icons text-sm my-auto me-1">call</i>
          <p class="mb-0 text-sm">{{$item->shop->phone}}</p>
        </div>
        <div class="d-flex ">
          <i class="material-icons text-sm my-auto me-1">place</i>
          <p class="mb-0 text-sm">{{$item->shop->address}}</p>
        </div>

        <hr/>
        <div class="text-center">
          <p class="mb-0 text-sm">  
            <a class="btn bg-gradient-dark mb-0" href="{{ url('cliente.pro.favorito.new.add') }}/{{ Auth::user()->id}}/{{ $item->id }}"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Adicionar a favorito</a>
          </p>
        </div>
      </div>
    </div>
  </div> 
  
@endforeach

      </div>
    </div>

  </div>
  @endif
  
</div>


@endsection