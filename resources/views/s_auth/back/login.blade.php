@extends('layouts.back')
@section('content')
    <main>
      <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div class="d-flex justify-content-center py-4">
                  <a href="/" class="logo d-flex align-items-center w-auto">
                    <img src=" {{ asset('/backCssJsFonts/assets/img/logo.png') }} " alt="">
                    <span class="d-none d-lg-block">{{ env('APP_NAME')}}</span>
                  </a>
                </div>
                @foreach ($errors->all() as $error)
                        <div class="alert alert-success">
                          {{ $error }}
                        </div>
                @endforeach
                @if(Session::has('error'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('error') }}</p>
                @endif
                @if(Session::has('success'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
                @endif
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="pt-4 pb-2">
                      <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                      <p class="text-center small">Enter your email & password to login</p>
                    </div>

                    <form class="row g-3 needs-validation" method="post" action="{{route('postLoginBack')}}" novalidate @submit.prevent="">
                      <div class="col-12 ">
                        <label for="yourEmail" class="form-label">Email</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend">@</span>
                          <input type="text" name="email" class="form-control" id="email" required>
                        </div>
                        <div id="error-email"></div>
                      </div>
                      @csrf
                      <div class="col-12 ">
                        <label for="yourPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                        <div id="error-password"></div>
                      </div>
                      <div class="col-12">
                        <button class="btn btn-primary btn-send w-100" @click="login">Login</button>
                      </div>
                        <div class="col-12">
                            <p class="small mb-0">Don't have account? <a href="{{ route('postRegisterBack')}}">Create an account</a></p>
                        </div>
                        <div class="col-12">
                            <p class="small mb-0">Forgot password? <a href="{{ route('forgotPasswordBack')}}">Reset Password</a></p>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>
@endsection
