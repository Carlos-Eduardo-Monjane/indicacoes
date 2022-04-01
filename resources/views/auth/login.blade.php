@extends('layouts.app')

		@section('content')
            <section class="section">
                <div class="page-header align-items-start min-vh-100" style="background-image: url('assets/img/Logo-Social-Media.jpg'); background-size: 90% 100%; background-repeat: no-repeat;">
                    <span class="mask bg-gradient-dark opacity-6"></span>
                    <div class="container my-auto">
                      <div class="row">
                        <div class="col-lg-4 col-md-8 col-12 mx-auto">
                          <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">LOGIN</h4>
                                {{-- <div class="row ">
                                  <div class="col-12 text-center ms-auto">
                                    <a class="btn btn-link " href="javascript:;">
                                      <img src="assets/img/Logo-On-Health-PNG-Preta.png" width='120px' height="90px"/>
                                    </a>
                                  </div>
                                </div> --}}
                              </div>
                            </div>
                            <div class="card-body">
                              <form role="form" action="{{ route('login') }}" method="post" novalidate=""  class="text-start needs-validation">
                                @csrf
                                <div class="input-group input-group-outline my-3">
                                  <label class="form-label">Email</label>
                                  <input type="email" class="form-control   @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="exampleInputEmail1" aria-describedby="emailHelp" >
                                  @error('email')
                                  <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                               
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Password</label>
                                  <input type="password" name="password" id="exampleInputPassword1" class="form-control">
                                  @error('password')
                                  <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                   </span>
                                  @enderror
                                </div>
                                <div class="form-check form-switch d-flex align-items-center mb-3">
                                  <input class="form-check-input" type="checkbox" id="rememberMe">
                                  <label class="form-check-label mb-0 ms-2" for="rememberMe">Lembrar-me</label>
                                </div>
                                <div class="text-center">
                                  <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Entrar</button>
                                </div>
                                <p class="mt-4 text-sm text-center">
                                    Ainda não possui conta?
                                  <a href="{{ route('register') }}" class="text-primary  font-weight-bold">Cadastre-se</a>
                                </p>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- <footer class="footer position-absolute bottom-2 py-2 w-100">
                      <div class="container">
                        <div class="row align-items-center justify-content-lg-between">
                          <div class="col-12 col-md-6 my-auto">
                            <div class="copyright text-center text-sm text-white text-lg-start">
                              © <script>
                                document.write(new Date().getFullYear())
                              </script>,
                              made with <i class="fa fa-heart" aria-hidden="true"></i> by
                              <a href="https://www.creative-tim.com" class="font-weight-bold text-white" target="_blank">Creative Tim</a>
                              for a better web.
                            </div>
                          </div>
                          <div class="col-12 col-md-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                              <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-white" target="_blank">Creative Tim</a>
                              </li>
                              <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-white" target="_blank">About Us</a>
                              </li>
                              <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-white" target="_blank">Blog</a>
                              </li>
                              <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-white" target="_blank">License</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </footer> --}}
                  </div>
            </section>
		@endsection
