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
                      <span class="d-none d-lg-block">{{ env('APP_NAME') }}</span>
                    </a>
                  </div><!-- End Logo -->

                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                        <p class="text-center small">Enter your personal details to create account</p>
                      </div>

                        <div class="alert alert-success hide" id='success-register'>

                        </div>

                      <form class="row g-3 needs-validation" @submit.prevent="" novalidate>

                        <div class="col-12">
                            <label for="yourName" class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" id="first-name" required>
                            <div id="error-first-name"></div>
                        </div>
                        <div class="col-12">
                            <label for="yourName" class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="last-name" required>
                            <div id="error-last-name"></div>
                        </div>

                        @csrf
                        <div class="col-12">
                          <label for="yourEmail" class="form-label">Email</label>
                          <input type="email" name="email" class="form-control" id="email" required>
                          <div id="error-email"></div>
                        </div>

                        <div class="col-12">
                            <label for="yourPassword" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                            <div id="error-password"></div>
                        </div>
                        <div class="col-12">
                          <label for="yourPassword" class="form-label">Password confirm</label>
                          <input type="password" name="password_confirm" class="form-control" id="password-confirm" required>
                          <div id="error-password-confirm"></div>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="yourPassword" class="form-label">Position</label>
                            <div class="col-sm-12">
                                <select class="form-select" id="position" aria-label="Default select example">
                                    <option selected="">Open this select menu</option>
                                    @foreach ($roles as $role)
                                        @if($role->status == 1)
                                                <option value="{{$role->id}}">{{ $role->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div id="error-position"></div>
                        </div>
                        <div class="col-12">
                          <button class="btn btn-primary w-100 btn-send" @click="register">Create Account</button>
                        </div>
                        <div class="col-12">
                          <p class="small mb-0">Already have an account? <a href="{{ route('loginBack')}}">Log in</a></p>
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
