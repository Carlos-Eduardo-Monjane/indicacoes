@extends('layout.app')

@section('body')

    <div class="container-fluid py-4">

        @if ($msg == 'afiliado')
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">{{ $user_type }}</h6>
                            </div>
                        </div>

                        <div class="card-body px-0 pb-2">
                            @if ($msg == 'success')
                                <div class="alert alert-success alert-dismissible text-white" role="alert">
                                    <span class="text-sm">Operação feita sucesso.</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            {{-- inicio --}}
                            {{-- Produtos --}}
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-md-12 mb-lg-0 mb-4">
                                            <div class="card px-0 pb-2">

                                                <hr>
                                                <div class="table-responsive p-0 card-body">
                                                    <table id="datatable-users" class="table align-items-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Foto/Nome</th>
                                                                <th
                                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Telefone</th>
                                                                <th
                                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Email</th>
                                                                    <th
                                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Data de inscrição</th>
                                                                <th
                                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Biografia</th>
                                                                {{-- <th
                                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Ações</th> --}}

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($lista as $item)
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex px-2 py-1">

                                                                            <div>
                                                                              @php
                                                                              $article = $item->photo;
                                                                          @endphp
                                                                                    @if ($item->photo != null)
                                                                          <img src="{{ URL::asset('storage/' . $article) }}"
                                                                              class="avatar avatar-sm me-3 border-radius-lg"
                                                                              alt="Foto de perfil"
                                                                              title="Foto de perfil">
                                                                      @else
                                                                          <img src="../assets/img/logo-ct-dark.png"
                                                                              alt="profile_image"
                                                                              class="avatar avatar-sm me-3 border-radius-lg">
                                                                      @endif
                                                                    
                                                                            </div>


                                                                            <div
                                                                                class="d-flex flex-column justify-content-center">
                                                                                <h6 class="mb-0 text-sm">
                                                                                    {{ $item->name }}</h6>
                                                                                @if ($item->user_type_id == 3)
                                                                                    @php
                                                                                        $user = App\User::find($item->id)->shop;
                                                                                    @endphp
                                                                                    <p class="text-xs text-secondary mb-0">
                                                                                        {{ $user->name }}</p>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="align-middle text-center">
                                                                        <span
                                                                            class="text-secondary text-xs font-weight-bold">{{ $item->phone }}</span>
                                                                    </td>
                                                                    <td class="align-middle text-center">
                                                                        <span
                                                                            class="text-secondary text-xs font-weight-bold">{{ $item->email }}</span>
                                                                    </td>

                                                                    <td class="align-middle text-center">
                                                                      <span
                                                                          class="badge badge-sm bg-gradient-dark">{{ $item->created_at }}</span>
                                                                  </td>
                                                                    
                                                                    <td class="align-middle text-center">
                                                                        <textarea class="align-middle text-center text-secondary text-xs " readonly
                                                                            value="{{ $item->biography }}">{{ $item->biography }}</textarea>
                                                                    </td>
                                                                    {{-- <td>
                                                                        <a href="{{ url('admin.user.deletar') }}/{{ $item->user_type_id }}/{{ $item->id }}"
                                                                            class="btn btn-link text-danger text-gradient px-3 mb-0"><i
                                                                                class="material-icons text-sm me-2"
                                                                                title="Apagar">delete</i></a>
                                                                    </td> --}}
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
                            {{-- fim --}}

                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($msg == 'pro')
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">{{ $user_type }}</h6>
                            </div>
                        </div>

                        <div class="card-body px-0 pb-2">
                            @if ($msg == 'success')
                                <div class="alert alert-success alert-dismissible text-white" role="alert">
                                    <span class="text-sm">Operação feita sucesso.</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            {{-- inicio --}}
                            {{-- Produtos --}}
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-md-12 mb-lg-0 mb-4">
                                            <div class="card px-0 pb-2">

                                                <hr>
                                                <div class="table-responsive p-0 card-body">
                                                    <table id="datatable-users" class="table align-items-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Foto/Nome</th>
                                                                <th
                                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Telefone</th>
                                                                <th
                                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Email</th>
                                                                    <th
                                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Data de inscrição</th>
                                                                <th
                                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Biografia</th>
                                                                {{-- <th
                                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Ações</th> --}}

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($lista as $item)
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex px-2 py-1">
                                                                            <div>
                                                                              @php
                                                                              $article = $item->photo;
                                                                          @endphp
                                                                                    @if ($item->photo != null)
                                                                          <img src="{{ URL::asset('storage/' . $article) }}"
                                                                              class="avatar avatar-sm me-3 border-radius-lg"
                                                                              alt="Foto de perfil"
                                                                              title="Foto de perfil">
                                                                      @else
                                                                          <img src="../assets/img/logo-ct-dark.png"
                                                                              alt="profile_image"
                                                                              class="avatar avatar-sm me-3 border-radius-lg">
                                                                      @endif
                                                                            </div>
                                                                            <div
                                                                                class="d-flex flex-column justify-content-center">
                                                                                <h6 class="mb-0 text-sm">
                                                                                    {{ $item->name }}</h6>

                                                                                @if ($item->user_type_id == 3)
                                                                                    @php
                                                                                        $user = App\User::find($item->id)->shop;
                                                                                    @endphp
                                                                                    @if ($user != null)
                                                                                        <p
                                                                                            class="text-xs text-secondary mb-0">
                                                                                            {{ $user->name }}</p>
                                                                                    @endif
                                                                                @endif



                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="align-middle text-center">
                                                                        <span
                                                                            class="text-secondary text-xs font-weight-bold">{{ $item->phone }}</span>
                                                                    </td>
                                                                    <td class="align-middle text-center">
                                                                        <span
                                                                            class="text-secondary text-xs font-weight-bold">{{ $item->email }}</span>
                                                                    </td>

                                                                    

                                                                    <td class="align-middle text-center">
                                                                      <span
                                                                          class="badge badge-sm bg-gradient-dark">{{ $item->created_at }}</span>
                                                                  </td>
                                                                    
                                                                    <td class="align-middle text-center">
                                                                        <textarea class="align-middle text-center text-secondary text-xs " readonly
                                                                            value="{{ $item->biography }}">{{ $item->biography }}</textarea>
                                                                    </td>
                                                                    {{-- <td>
                                                                        <a href="{{ url('admin.user.deletar') }}/{{ $item->user_type_id }}/{{ $item->id }}"
                                                                            class="btn btn-link text-danger text-gradient px-3 mb-0"><i
                                                                                class="material-icons text-sm me-2"
                                                                                title="Apagar">delete</i></a>
                                                                    </td> --}}
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
                            {{-- fim --}}

                        </div>
                    </div>
                </div>
            </div>
        @endif


        @if ($msg == 'indicar')
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">{{ $user_type }}</h6>
                            </div>
                        </div>

                        <div class="card-body px-0 pb-2">
                            @if ($msg == 'success')
                                <div class="alert alert-success alert-dismissible text-white" role="alert">
                                    <span class="text-sm">Operação feita sucesso.</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            {{-- inicio --}}
                            {{-- Produtos --}}
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-md-12 mb-lg-0 mb-4">
                                            <div class="card px-0 pb-2">

                                                <hr>
                                                <div class="table-responsive p-0 card-body">
                                                    <table id="datatable-users1" class="table align-items-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th
                                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    ID</th>
                                                                <th
                                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Profissional</th>
                                                                <th
                                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Afiliado</th>
                                                                <th
                                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Status</th>
                                                                <th
                                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Data</th>
                                                                <th
                                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Manual</th>
                                                                 {{-- <th
                                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Ações</th>  --}}

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($lista as $key => $item)
                                                                <tr>
                                                                    <td class="align-middle text-center text-sm">
                                                                        <p class="text-xs font-weight-bold mb-0">
                                                                            {{ $key }}</p>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex px-2 py-1">

                                                                            <div>

                                                                                @php
                                                                                    $article = $item->pro_indicado->photo;
                                                                                @endphp

                                                                                @if ($item->pro_indicado->photo != null)
                                                                                    <img src="{{ URL::asset('storage/' . $article) }}"
                                                                                        class="avatar avatar-sm me-3 border-radius-lg"
                                                                                        alt="Foto de perfil"
                                                                                        title="Foto de perfil">
                                                                                @else
                                                                                    <img src="../assets/img/logo-ct-dark.png"
                                                                                        alt="profile_image"
                                                                                        class="avatar avatar-sm me-3 border-radius-lg">
                                                                                @endif

                                                                            </div>
                                                                            <div
                                                                                class="d-flex flex-column justify-content-center">
                                                                                <h6 class="mb-0 text-sm">
                                                                                    {{ $item->pro_indicado->name }}</h6>
                                                                                <p class="text-xs text-secondary mb-0">
                                                                                    {{ $item->pro_indicado->phone }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                      <div class="d-flex px-2 py-1">

                                                                        <div>

                                                                            @php
                                                                                $article = $item->afiliado_indicador->photo;
                                                                            @endphp

                                                                            @if ($item->afiliado_indicador->photo != null)
                                                                                <img src="{{ URL::asset('storage/' . $article) }}"
                                                                                    class="avatar avatar-sm me-3 border-radius-lg"
                                                                                    alt="Foto de perfil"
                                                                                    title="Foto de perfil">
                                                                            @else
                                                                                <img src="../assets/img/logo-ct-dark.png"
                                                                                    alt="profile_image"
                                                                                    class="avatar avatar-sm me-3 border-radius-lg">
                                                                            @endif

                                                                        </div>
                                                                        <div
                                                                            class="d-flex flex-column justify-content-center">
                                                                            <h6 class="mb-0 text-sm">
                                                                                {{ $item->afiliado_indicador->name }}</h6>
                                                                            <p class="text-xs text-secondary mb-0">
                                                                                {{ $item->afiliado_indicador->phone }}</p>
                                                                        </div>
                                                                    </div>
                                                                      
                                                                       
                                                                    </td>


                                                                    <td class="align-middle text-center text-sm">

                                                                        @if ($item->status == 'SEM CONTATO')
                                                                            <span
                                                                                class="badge badge-sm bg-gradient-info">{{ $item->status }}</span>
                                                                        @endif
                                                                        @if ($item->status == 'EM NEGOCIAÇÃO')
                                                                            <span
                                                                                class="badge badge-sm bg-gradient-warning">{{ $item->status }}</span>
                                                                        @endif
                                                                        @if ($item->status == 'NEGÓCIO FECHADO')
                                                                            <span
                                                                                class="badge badge-sm bg-gradient-success">{{ $item->status }}</span>
                                                                        @endif
                                                                        @if ($item->status == 'NÃO TEVE INTERESSE')
                                                                            <span
                                                                                class="badge badge-sm bg-gradient-danger">{{ $item->status }}</span>
                                                                        @endif
                                                                    </td>

                                                                    <td class="align-middle text-center">
                                                                        @php($date_created_at = \Carbon\Carbon::parse($item->created_at))
                                                                        <span
                                                                            class="badge badge-sm bg-gradient-dark">{{ $date_created_at->format('d/m/y') }}</span>
                                                                    </td>
                                                                   

                                                                
                                                                      <td class="align-middle text-center">
                                                                        @if ($item->manual)
                                                                            <span
                                                                                class="text-xs font-weight-bold ">SIM</span>
                                                                        @else
                                                                            <span
                                                                                class="text-xs font-weight-bold">NÃO</span>
                                                                        @endif

                                                                    </td>

                                                                    {{-- <td class="align-middle text-center">
                                                                        @if ($item->status == 'SEM CONTATO')
                                                                            <a href="{{ url('cliente.indicar.model_edit') }}/{{ $item->id }}"
                                                                                class="btn btn-link text-dark px-3 mb-0"
                                                                                href="javascript:;"><i
                                                                                    class="material-icons text-sm me-2"
                                                                                    title="Editar">edit</i></a>
                                                                            <a href="{{ url('cliente.indicar.model_delete') }}/{{ $item->id }}"
                                                                                class="btn btn-link text-danger text-gradient px-3 mb-0"><i
                                                                                    class="material-icons text-sm me-2"
                                                                                    title="Apagar">delete</i></a>
                                                                        @endif
                                                                    </td> --}}
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
                            {{-- fim --}}

                        </div>
                    </div>
                </div>
            </div>
        @endif




        <!-- Modal deletar produto-->
        @if ($msg == 'modal_delete_produto')
            <div>
                <div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-notify modal-info" role="document">
                        <!--Content-->
                        <div class="modal-content text-center">
                            <!--Header-->
                            <div class="modal-header d-flex justify-content-center">
                                <h5 class="heading">
                                    Deseja apagar <strong>{{ $produto->name }}</strong>?
                                </h5>
                            </div>
                            <form action="{{ route('produtos-confirmar-apagar-produto') }}" method="post">
                                {!! csrf_field() !!}
                                <div class="modal-body">
                                    <p>Todos os dados relacionados serão eliminados.</p>
                                    <input type="hidden" name="shop_id" value="{{ Auth::user()->shop_id }}"
                                        autocomplete="off" class="form-control">
                                    <input type="hidden" name="idproduto" value="{{ $produto->id }}" autocomplete="off"
                                        class="form-control">
                                </div>

                                <div class="modal-footer flex-center">
                                    <a type="button" id="closemodal" class="btn btn-outline-danger"
                                        data-dismiss="modal">Cancelar</a>
                                    <button class="btn btn-outline-info waves-effect" type="submit"
                                        title="Confirmar">Confirmar</button>
                                </div>
                            </form>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                                crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                                crossorigin="anonymous"></script>
                <script>
                    $(window).on('load', function() {
                        $('#modalPush').modal('show');
                    });
                    $('#closemodal').click(function() {
                        $('#modalPush').modal('hide');
                    });
                </script>
            </div>
        @endif
        {{-- Fim modal delete produto --}}

    </div>
    <script>
        //datatable
        $(document).ready(function() {
            $('#datatable-users').DataTable();
            $('#datatable-users1').DataTable();
            $('#datatable-users2').DataTable();
        });
    </script>


@endsection
