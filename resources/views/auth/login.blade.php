@extends('auth.design')
@section('content')
<style>
.group            { 
  position:relative; 
  margin-bottom:20px; 
}
input[type=password] ,input[type=email] {
  font-size:15px;
  padding:5px 5px 10px 14px;
  background:transparent;  
  width:540px;
  border:none;
  border-bottom:1px solid #757575;
}
input:focus {
  outline:none; }

label{
  color:#000; 
  font-size:15px;
  font-weight:normal;
  position:absolute;
  pointer-events:none;
  left:5px;
  top:10px;
  transition:0.2s ease all; 
  -moz-transition:0.2s ease all; 
  -webkit-transition:0.2s ease all;
}

input:focus ~label, input:valid ~ label,  :disabled ~ label      {
  top:-20px;
  font-size:12px;
  color:#1AA39A;
}

/* BOTTOM BARS ================================= */
.bar    { position:relative; display:block; width:540px; }
.bar:before, .bar:after     {
  content:'';
  height:2px; 
  width:0;
  bottom:1px; 
  position:absolute;
  background:#1AA39A; 
  transition:0.2s ease all; 
  -moz-transition:0.2s ease all; 
  -webkit-transition:0.2s ease all;
}
.bar:before {
  left:50%;
}
.bar:after {
  right:50%; 
}

/* active state */
input:focus ~ .bar:before, input:focus ~ .bar:after {
  width:50%;
}

/* HIGHLIGHTER ================================== */
.highlight {
  position:absolute;
  height:60%; 
  width:100px; 
  top:25%; 
  left:0;
  pointer-events:none;
  opacity:0.5;
}

/* active state */
input:focus ~ .highlight {
  -webkit-animation:inputHighlighter 0.3s ease;
  -moz-animation:inputHighlighter 0.3s ease;
  animation:inputHighlighter 0.3s ease;
}

/* ANIMATIONS ================ */
@-webkit-keyframes inputHighlighter {
    from { background:transparent; }
  to    { width:0; background:transparent; }
}
@-moz-keyframes inputHighlighter {
    from { background:transparent; }
  to    { width:0; background:transparent; }
}
@keyframes inputHighlighter {
    from { background:transparent; }
  to    { width:0; background:transparent; }
}
</style>
<div class="container">
<div class="row justify-content-center mt-4 mb-4">
        <a class="navbar-brand" href="{{ url('/') }}">
        <image src="{{url('img/icon.png')}}" height="50px" class="ml-4 rounded-circle">
        <h2><strong>Milna</strong></h2>
        </a>
</div>
<div class="row justify-content-center mt-4 mb-4">
<div class="container">
<form method="POST" action="{{ route('login') }}">
                        @csrf                        
                        <div class="form-group row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <div class="group">      
                                <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>E-Mail Address</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="group">      
                                <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="current-password" >
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6 ">
                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <div class="form-check-label  " for="remember">
                                            Ingatkan saya
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                @if (Route::has('password.request'))
                                    <a class="  btn-sm btn btn-link" href="{{ route('password.request') }}">
                                        Lupa Password?
                                    </a>
                                @endif                                
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 ">
                                <button type="submit" class="btn btn-block btns">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">                            
                            <div class="hr-sect">Atau</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                            <button class="btn btn-xs btn-google btn-block" type="submit"><i class="fab fa-google mr-2"></i> Login with Google</button>
                            <button class="btn btn-xs btn-facebook btn-block" type="submit"><i class="fab fa-facebook-f mr-2"></i> Login with Facebook</button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                               <div for="" class=" "> Belum punya akun? <a href="{{route('register')}}" class=" btn-link ">  Daftar </a></div>
                            </div>
                        </div>

</div>
</div>
</div>
@endsection