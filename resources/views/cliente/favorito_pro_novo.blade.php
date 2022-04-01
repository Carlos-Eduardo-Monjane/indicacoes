@extends('layout.app')

@section('body')

<div class="container-fluid py-4 ">

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

                    {{-- Oferta --}}
                    @isset($item->oferta_do_profissinal->photo)
              
    
                    <hr>
            
                    <div class="d-flex ">
                      <div class="my-auto me-3 col-auto ">
                        <div class="avatar avatar-xl position-relative">
                          @php
                             $article = $item->oferta_do_profissinal->photo;
                          @endphp
                          @if($item->oferta_do_profissinal->photo != NULL)
                          <img src="{{ URL::asset('storage/'.$article) }}" class="w-100 border-radius-lg shadow-sm" alt="Foto de perfil" title="Foto de perfil">
                          @else
                          <img src="../assets/img/logo-ct-dark.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                          @endif
                        </div>
                      </div>
                      
            
                      <div class="mb-0 text-sm">
            
                        <p class="text-sm mb-0 "><strong class="text-dark "><i class="material-icons text-sm my-auto me-1">card_giftcard</i></strong> &nbsp;{{$item->oferta_do_profissinal->title}}</p>
                        <p class="text-sm mb-0"><strong class="text-dark"><i class="material-icons text-sm my-auto me-1">timer</i></strong> &nbsp;{{$item->oferta_do_profissinal->validate}}</p>
                        <p class="text-sm mb-0"><strong class="text-dark"><i class="material-icons text-sm my-auto me-1">receipt_long</i></strong> &nbsp;{{$item->oferta_do_profissinal->describe}}</p>
                      
                      </div>
                    </div>
            
                    @endisset



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

  
</div>


@endsection