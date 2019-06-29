<nav class="navbar navbar-expand-sm sticky-top py-md-0 p-0 navbar-cstm shadow-sm">
    <div class="container-fluid" >
    <ul class="navbar-nav mr-auto">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{url('img/icon.png')}}" class="rounded-circle" height="25px">
            <strong>Milna</strong>
        </a>
        </ul>
        <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
                <a class="nav-link" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Category">
                    <span class="fa fa-bars"></span> Kategori   
                </a>
                <div class="dropdown-menu dropdown-menu-left " aria-labelledby="navbarDropdownMenuLink">
                @foreach($category as $c)
                <form action="">
                <button href="{{url('/')}}" name="categorysearch" value="{{$c->id}}" class="dropdown-item">{{$c->title}}</button>
                </form>
                @endforeach 
                </div>
                </li>
        </ul>
        <ul class="navbar-nav mr-auto">
            <form action="{{url('/')}}">
            <div class="hehe">
                <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control form-control-sm" placeholder="Aku mau belanja..." value="{{Request::get('search')}}" name="search" id="search">
                </div>
            </div>
            </form>
        </ul>

            

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{route('cart.index')}}" data-toggle="tooltip" data-placement="bottom" title="Keranjang">
                    <i class="fas fa-shopping-cart"> </i>
                    
                        @if(session('cart'))
                        <span class="badge badge-danger rounded-circle">
                            {{ count(session('cart')) }}
                        </span>
                        @else
                        @endif
                    
                    </a>
                </li>
                <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre title="Login">
                    Login
                </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-content szDown" aria-labelledby="navbarDropdown">
        <br>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-9">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-9">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="current-password" placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-9">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                </div>
                <div class="form-group row ">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-block btns">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
                <div class="form-group  row">
                    <div class="col text-center">
                        @if (Route::has('password.request'))
                            <a class="btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif  
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-9">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-9">
                    <button class="btn btn-xs btn-google btn-block" type="submit"><i class="fab fa-google mr-2"></i> Login with Google</button>
                    <button class="btn btn-xs btn-facebook btn-block" type="submit"><i class="fab fa-facebook-f mr-2"></i> Login with Facebook</button>
                </div>
            </div>
            <br>
        </div>
    </li>

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                <li class="nav-item">
                    <a href="" class="nav-link" data-placement="bottom" title="Saldo">
                    Rp.  0.00</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('cart.index')}}" data-toggle="tooltip" data-placement="bottom" title="Keranjang">
                    <i class="fas fa-shopping-cart"> </i>
                    
                        @if(session('cart'))
                        <span class="badge badge-danger rounded-circle">
                            {{ count(session('cart')) }}
                        </span>
                        @else
                        @endif
                    
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a id="inbox" class="nav-link" href="#" role="button" title="Pesan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre ><i class="fas fa-comments"></i>
                    <span class="badge badge-danger rounded-circle">
                            1
                    </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="inbox">
                    <a href="" class="nav-link">
                        @auth
                        <div style="font-size:11px">
                        Selamat bergabung <strong>{{ Auth::user()->username }}</strong>, nikmati berbelanja murah hanya di Milna
                        </div>
                        @endauth
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a id="notif" class="nav-link " href="#" role="button" title="Pemberitahuan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fas fa-bell"></i>
                    
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notif">
                    <a href="" class="nav-link">
                        @if(Auth::user()->email_verified_at)
                            <div style="font-size:11px">Email kamu telah diverikasi, yuk nikmati belanja di Milna</div><br>
                        @endif
                        @if(Auth::user()->email_verified == '')
                            <div style="font-size:11px">Email kamu belum diverikasi</div>
                        @endif
                        </a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a id="transaksi" class="nav-link" href="#" role="button" data-toggle="dropdown" title="Transaksi" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa fa-exchange-alt"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="transaksi">
                        <a href="{{route('check.index')}}" class="dropdown-item">Semua Transaksi</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a id="store" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre title="Produk">
                        <i class="fa fa-store"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="store">
                        <a href="{{route('product.index')}}" class="dropdown-item">Produk aku</a>
                    </div>
                </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre title="Profil">
                            @if(Auth::user()->image)
                            
                            <img src="{{url('storage', Auth::user()->image)}}" class="rounded-circle" style="width:22px; height:22px;" alt="{{asset('img', Auth::user()->image )}}">
                            @else
                            <img src="{{asset('img/profile.png' )}}" style="width:22px; height:22px;">
                            @endif

                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <div class="form-group row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-5">
                                Hay,
                                <br>
                                <b>
                                {{ Auth::user()->username }} 
                                </b>
                            </div>
                        </div>
                        <a href="{{route('user.index')}}" class="dropdown-item">Akun</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
    </div>
    </nav>