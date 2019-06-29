@extends('auth.design')
@section('content')
@include('auth.input')
<div class="container">
    <div class="row justify-content-center mt-4 mb-4">
        <a class="navbar-brand" href="{{ url('/') }}">
        <image src="{{url('img/icon.png')}}" height="50px" class="ml-4 rounded-circle">
        <h2><strong>Milna</strong></h2>
        </a>
    </div>
    <div class="row justify-content-center">
      <form method="POST" action="{{ route('password.update') }}">
                        @csrf
          <input type="hidden" name="token" value="{{ $token }}">
          <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" hidden>
                        <div class="group">      
                        <input value="{{ $email ?? old('email') }}" disabled>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>E-mail Address</label>
                        </div>
                        
                        <div class="group">      
                        <input id="password" type="password" class="  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" autofocus>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>New Password</label>
                        </div>

                        <div class="group">      
                        <input id="password-confirm" type="password" class=" " name="password_confirmation" required autocomplete="new-password">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Confirm Password</label>
                        </div>

                        <div class="form-group row mb-0">
                            <button type="submit" class="btn-block btn btns">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </form>
        </div>
    </div>
</div><br><br><br><br><br><br><br><br><br><br><br>
@endsection