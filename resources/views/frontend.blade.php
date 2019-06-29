<!DOCTYPE html>
<html lang="en">
<head>

    @include('layouts.head')
</head>
<body>
@include('layouts.nav')            
<div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header">
        </div>
        <ul class="list-unstyled components">
            <div class="hr-sect">Kategori</div>
            @foreach($category as $c)
            <div class="row">
                <div class="col-9">
                    <button onClick="route({{$c->id}})" name="categorysearch" style="text-decoration:none" class="btn btn-link text-dark" value="{{$c->id}}">{{$c->title}}</button>
                </div>
                <div class="col">
                    <span class="badge badge-secondary">{{$c->product()->count()}}</span>
                </div>
            </div>
            @endforeach
        </ul>
    </nav>
    <div class="container block">
        <div class="row ml-2 mt-3">
            <div class="  mr-auto">
                <select name="sorting" id="sorting" class=" form-control-sm">
                    <option hidden> - - - Urutkan - - -</option>
                    <option value="terbaik">Rating Tertinggi</option>
                    <option value="terbaru">Terbaru</option>
                    <option value="terlaris">Terlaris</option>
                    <option value="termurah">Termurah</option>
                    <option value="termahal">Termahal</option>
                    <option value="look">Terbanyak Dilihat</option>
                </select>
            </div>
        </div>
        
        @yield('content')
    </div>
</div>
@include('layouts.script')
@include('layouts.alert')
@include('layouts.footer')
</body>
</html>