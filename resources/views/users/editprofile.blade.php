@extends('users.desingakun')
@section('title') Edit Profil @endsection
@section('content')
<style>
.group            { 
  position:relative; 
  margin-bottom:20px; 
}
input[type=number] ,input[type=text] {
  font-size:15px;
  padding:5px 5px 10px 14px;
  background:transparent;  
  width:540px;
  border:none;
  border-bottom:1px solid #757575;
}
input:focus {
  outline:none; }

.labelz{
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

input:focus ~.labelz, input:valid ~ .labelz,  :disabled ~ .labelz      {
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

.labels{
	display: block;
  word-wrap: break-word;
	color: #1a4756;
}
.hidden, #uploadImg:not(.hidden) + label{
	display: none;
}
#file{
	display: none;
}
#upload{
	display: block;
	padding: 10px 25px;
	border: 0;
	letter-spacing: 0.05em;
	cursor: pointer;
	background: #216e69;
	color: #fff;
	outline: none;
	transition: .3s ease-in-out;
	}
  #upload:hover, #upload:focus{
		background: #1AA39A;
	}
	#upload:active{
		background: #13D4C8;
		transition: .1s ease-in-out;
	}
    img{
    }
    </style>
    
        <div class="container-fluid">
        <div class="alert alert-info alert-dismissable"> <a class="panel-close close" data-dismiss="alert">×</a>
                You Can <strong>Edit</strong> Profile
                </div>
        </div>

        
<div class="row m-y-2">
        <!-- edit form column -->
    <div class="col-lg-4 text-lg-center"></div>
    <div class="col-lg-8"></div>
        <div class="col-lg-4 pull-lg-8 text-xs-center">
        <form enctype="multipart/form-data" action="{{route('user.update', ['id'=>Auth::user()->id])}}" method="POST">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <input type="hidden" value="{{$user->id}}" name="id">
            <div class="container upld">    
                    <label class="labels" for="inputs" id="inputs">
                    @if(Auth::user()->image)
                    <img src="{{url('storage/', Auth::user()->image)}}" style="width:100px">
                    @else
                    <img src="{{url('img/profile.png')}}" height="100px" class="">
                    @endif
                    </label>
                <br>
                <div class="inputs">
                    <input name="image" id="file" type="file">
                </div>
            </div>
        </div>
        <div class="col-lg-8 push-lg-4 personal-info">
                                <div class="group mt-3">      
                                <input type="text" value="{{$user->name}}" name="name" />
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="labelz">Name</label>
                                </div>
                                <div class="group">      
                                <input type="text" value="{{$user->username}}" disabled/>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="labelz">Username</label>
                                </div>

                                <div class="group">      
                                <input type="text" value="{{$user->email}}" disabled/>                        
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="labelz">E-Mail Address</label>
                                </div>
                                <div class="group">      
                                <input type="number" value="{{$user->phone}}" name="phone" />
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="labelz">Phone Number</label>
                                </div>

                                <div class="group">      
                                <input type="text" value="{{$user->address}}" name="address">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="labelz">Alamat</label>
                                </div>
                                <div class="group">      
                                <input type="text" value="{{$user->sub_district}}" name="sub_district">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="labelz">Kec</label>
                                </div>
                                <div class="group">      
                                <input type="text" value="{{$user->city}}" name="city">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="labelz">Kota / Kab</label>
                                </div>
                                <div class="group">      
                                <input type="text" value="{{$user->province}}" name="province">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="labelz">Provinsi</label>
                                </div>
                                <div class="group">      
                                <input type="number" value="{{$user->zip_code}}" name="zip_code">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="labelz">Kode Pos</label>
                                </div>
                <div class="form-group row">
                    <label class="col-form-label form-control-label"></label>
                    <div class="col-1 mr-3">
                        <button type="submit" class="btn btns"> Simpan </button>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('ringksn') }}" class="btn btn-secondary"> Cancel </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

