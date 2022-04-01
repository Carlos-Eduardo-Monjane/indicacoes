@extends('layouts.app')

@section('content')
<section class="section">
    <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('assets/img/Logo-Social-Media.jpg'); background-size: 100% 100%; background-repeat: no-repeat; background-size: fill;">
                <span class="mask  bg-gradient-primary  opacity-5" ></span>
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header card-body">
                  <h4 class="font-weight-bolder">CADASTRO</h4>
                  {{-- <p class="mb-0">Restrito a Parceiros e profissionais </p> --}}
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nome Completo</label>
                      <input type="text" required autocomplete="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">

                      @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>

                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">E-mail</label>
                      <input type="email" required name="email" value="{{ old('email') }}"  autocomplete="email"  class="form-control @error('email') is-invalid @enderror">
                      @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                    </div>


                    <div class="input-group input-group-outline mb-3" >
                      <select name="state" required class="form-control" >
                        <option  value="">Selecione o estado:</option>
                      </select>
                    </div>

                    <div class="input-group input-group-outline mb-3" >
                      <select name="city" required class="form-control">
                        <option value="">Selecione cidade: </option>
                      </select>
                    </div>


                    <div class="input-group input-group-outline mb-3" >
                      <select name="user_type_id" required class="form-control" onchange="showDiv(this)">
                        <option value="">Selecione o tipo de usuário:</option>
                        <option value="3">Profissional</option>
                        <option value="2">Cliente</option>
                      </select>
                    </div>

                    <div id="especialidade_div" class="input-group input-group-outline mb-3" style="display:none;">
                      <select name="category_id"  class="form-control">
                        <option value="">Selecione a Categoria:</option>
                        @foreach($profissional_categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div id="subespecialidade_div" class="input-group input-group-outline mb-3" style="display:none;">
                      <select name="subcategory_id"  class="form-control">
                        <option value="">Selecionar Subcategoria:</option>
                        @foreach($profissional_subcategories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div id="biography_div" class="input-group input-group-outline mb-3" style="display:none;">
                      <label class="form-label">Sua biografia</label>
                      <textarea type="text" autocomplete="biography" name="biography" value="{{ old('biography') }}" class="form-control @error('biography') is-invalid @enderror"></textarea>

                      @error('biography')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                    
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Password</label>
                      <input id="password" type="password"
                      class="form-control @error('password') is-invalid @enderror" name="password"
                      required autocomplete="new-password">

                      @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror

                    </div>

                    <div class="input-group input-group-outline mb-3">
                      <label for="password-confirm" class="form-label">Confirmar Password</label>
                      <input id="password-confirm" type="password" class="form-control"
                      name="password_confirmation" required autocomplete="new-password">

                      @error('password_confirmation')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror

                    </div>



                    <div class="form-check form-check-info text-start ps-0">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                      <label class="form-check-label" for="flexCheckDefault">
                        Eu concordo com os <a href="javascript:;" class="text-dark font-weight-bolder">Termos e Condições</a>
                      </label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Cadastrar</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Já possui uma conta?
                    <a href="{{ route('login') }}" class="text-primary font-weight-bold">Login</a>
                  </p>
                </div>
              </div>
            </div>

          
          </div>
        </div>
      </div>

                          {{-- Script que oculta os campos se nao for um profissional --}}
  <script type="text/javascript">

  $(document).ready(function () {
    $.getJSON('https://servicodados.ibge.gov.br/api/v1/localidades/estados/', {id: 10, }, function (json) {
 
 var options = '<option value="">Selecione o estado: </option>';

 for (var i = 0; i < json.length; i++) {

     options += '<option data-id="' + json[i].id + '" value="' + json[i].nome + '" >' + json[i].nome + '</option>';

 }

 $("select[name='state']").html(options);

});



});


$("select[name='state']").change(function () {

 if ($(this).val()) {
     $.getJSON('https://servicodados.ibge.gov.br/api/v1/localidades/estados/'+$(this).find("option:selected").attr('data-id')+'/municipios', {id: $(this).find("option:selected").attr('data-id')}, function (json) {

         var options = '<option value="">Selecione a cidade:</option>';

         for (var i = 0; i < json.length; i++) {
             options += '<option value="' + json[i].nome + '" >' + json[i].nome + '</option>';
         }

         $("select[name='city']").html(options);
     });

 } else {
     $("select[name='city']").html('<option value="">–  –</option>');
 }

});

    function showDiv(select){
      
        if(select.value==3){
    
        document.getElementById('especialidade_div').style.display = "";
        document.getElementById('subespecialidade_div').style.display = "";
        document.getElementById('biography_div').style.display = "";
        } else{
        document.getElementById('especialidade_div').style.display = "none";
        document.getElementById('subespecialidade_div').style.display = "none";
        document.getElementById('biography_div').style.display = "none";
      
        }
    } 


    </script>


</section>
@endsection
