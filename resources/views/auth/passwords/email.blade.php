@extends('auth.designs')
@section('content')
<br><br>

<style>
:root {
  background: #f5f6fa;
  color: #9c9c9c;
  font: 1rem "PT Sans", sans-serif;
}

a {
  color: inherit;
}
a:hover {
  color: #7f8ff4;
}

.container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.uppercase {
  text-transform: uppercase;
}

.btn {
  display: inline-block;
  background: transparent;
  color: inherit;
  font: inherit;
  border: 0;
  outline: 0;
  padding: 0;
  transition: all 200ms ease-in;
  cursor: pointer;
}
.btn--primary {
  background: #216e69;
  color: #fff;
  box-shadow: 0 0 10px 2px rgba(0, 0, 0, 0.1);
  border-radius: 2px;
  padding: 12px 36px;
}
.btn--primary:hover {
  background: #1AA39A;
}
.btn--primary:active {
  background: #13D4C8;
  box-shadow: inset 0 0 10px 2px rgba(0, 0, 0, 0.2);
}
.btn--inside {
  margin-left: -96px;
}

.form__field {
  width: 360px;
  background: #fff;
  color: #a3a3a3;
  font: inherit;
  box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.1);
  border: 0;
  outline: 0;
  padding: 22px 18px;
}
</style>
<div class="container">
<div class="row justify-content-center mt-4 mb-4">
        <a class="navbar-brand" href="{{ url('/') }}">
        <image src="{{url('img/icon.png')}}" height="50px" class="ml-4 rounded-circle">
        <h2><strong>Milna</strong></h2>
        </a>
</div>
	<div class="container__item">
    <form method="POST" action="{{ route('password.email') }}" class="form">@csrf         
    
        <input placeholder="E-Mail Address" id="email" type="email" class="form__field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
			<button type="submit" class="btn btn--primary btn--inside uppercase">Send Link</button>
      @include('layouts.script')
    
      @include('layouts.alert')
		</form>
	</div>
</div>
<br><br><br><br><br><br><br><br>
@endsection
