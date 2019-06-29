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
                <h4>Transaksi</h4>
                <hr>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                            </div>
                            <div class="col">
                            <form action="{{route('check.index')}}">
                            <select name="sortBy" id="sortBy" class="form-control">
                                <option hidden> - - - Urutkan - - -</option>
                                <option value="diterima">Barang diterima</option>
                                <option value="proses">Sedang dikirim</option>
                            </select>
                            </form>
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