@extends('auth.design')
@section('content')

@include('auth.input')    
<br>        
    <div class="row justify-content-center">
        <a class="navbar-brand" href="{{ url('/') }}">
        <image src="{{url('img/icon.png')}}" height="50px" class="ml-4 rounded-circle">
        <h2><strong>Milna</strong></h2>
        </a>
    </div>
    <div class="row mt-2 ml-3">
        <div class="col-3 mr-5">
        </div>
        <div class="col-6">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="group">      
                        <input id="name" type="text" class=" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Name</label>
                        </div>

                        <div class="group">      
                        <input id="phone" type="number" class=" @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Phone Number</label>
                        </div>

                        <div class="group">      
                        <input id="username" type="text" class="  @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Username</label>
                        </div>

                        <div class="group">      
                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>E-Mail Address</label>
                        </div>

                        <div class="row">
                        <div class="col">
                            <div class="group">      
                            <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Password</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="group">      
                            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Confirm Password</label>
                            </div>
                        </div>
                        </div>
                        <div class="form-group mt-4 row mb-0">
                            <div class="col">
                                <button type="submit" class="  btn btn btn-block btns">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            <div class="col mt-2">
                                Sudah punya akun? <a href="{{route('login')}}" class="btn-link">Login</a>
                            </div>
                        </div>
                    </form>
            
        </div>
    </div><br><br><br>
@endsection
