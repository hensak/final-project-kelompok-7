@extends('layouts.app')

@section('content')
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center bg-light">
        <a href="/" class="h1"><b>Admin</b>LTE</a>
      </div>
      <div class="card-body bg-primary">
        <p class="login-box-msg">Register a new membership</p>

        <form action="{{ route('register') }}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            @error('username')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>

          <div class="input-group mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>

          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Retype password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            @error('email')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>

          <div class="input-group mb-3">
            <input type="text" class="form-control" id="umur" name="umur" placeholder="Umur">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            @error('umur')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>

          <div class="input-group mb-3">
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            @error('alamat')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          </div>

          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                 I agree to the <a href="#" class="text-light">terms</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-success btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
@endsection
