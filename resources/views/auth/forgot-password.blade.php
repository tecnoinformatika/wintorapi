@extends('layouts/fullLayoutMaster')

@section('title', 'Forgot Password')

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@section('content')
  <div class="auth-wrapper auth-basic px-2">
    <div class="auth-inner my-2">
      <!-- Forgot Password basic -->
      <div class="card mb-0">
        <div class="card-body">
            <a href="#" class="brand-logo">
                <a href="#" class="brand-logo">
                    <img src="/images/logo/logo.png" width="150px" alt="">
                  </a>

              </a>


          <h4 class="card-title mb-1">Olvidaste tu contraseña? 🔒</h4>
          <p class="card-text mb-2">Ingresa tu email y te enviaremos una nueva</p>

          @if (session('status'))
            <div class="mb-1 text-success">
              {{ session('status') }}
            </div>
          @endif

          <form class="auth-forgot-password-form mt-2" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-1">
              <label for="forgot-password-email" class="form-label">Email</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="forgot-password-email"
                name="email" value="{{ old('email') }}" placeholder="john@example.com"
                aria-describedby="forgot-password-email" tabindex="1" autofocus />
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100" tabindex="2">Enviar link de reestablecimiento</button>
          </form>

          <p class="text-center mt-2">
            @if (Route::has('login'))
              <a href="{{ route('login') }}"> <i data-feather="chevron-left"></i> Volver a iniciar sesión </a>
            @endif
          </p>
        </div>
      </div>
      <!-- /Forgot Password basic -->
    </div>
  </div>
@endsection
