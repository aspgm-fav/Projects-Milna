<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body> 
@include('layouts.nav')
<div class="wrapper">
    <!-- Sidebar -->
    @include('layouts.navsidebar')
        <div class="container-fluid">
            <div class="p-2 bd-highlight" >
            <br>
            <h4>Produk Aku</h4>
            <hr>
            <ul class="nav nav-tabs " role="tablist">
                <li class="nav-item">
                    <a class="nav-link {{Request::get('status') == NULL && Request::path() == 'product' ? 'active' : ''}}" href="{{route('product.index')}}">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::get('status') == 'dijual' ? 'active' : '' }}" href="{{route('product.index', ['status' => 'dijual'])}}">Barang Dijual</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{Request::get('status') == 'draft' ? 'active' : '' }}" href="{{route('product.index', ['status' => 'draft'])}}">Draft Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::path() == 'BarangTidakDijual' ? 'active' : ''}}" href="{{route('product.trash')}}" >Tidak Dijual</a>
                </li>
            </ul>
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm ml-auto">
                        <form action="{{route('product.trash')}}">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control"  placeholder="Cari Produk Aku" value="{{Request::get('title')}}" name="title" >
                                <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">
                                    <i class="fa fa-search"></i>
                                </button>
                                </div>
                            </div>
                        </form>
                        </div>
                        <div class="col-sm text-center">
                        </div>
                        <div class="col-sm mr-auto text-right">
                        </div>
                    </div>
                </div>
                <br>
            @yield('content')
            </div>
        </div>
        </div>
        </div>
</div>
@include('layouts.script')
@include('layouts.alert')
@include('layouts.footer')
</body>
</html>