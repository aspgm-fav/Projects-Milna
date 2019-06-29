<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body>
@include('layouts.nav')
<div class="wrapper">
    @include('layouts.navsidebar')    
        <div class="container-fluid">
            <div class="p-2 bd-highlight" >
                <br>
                <h4>@yield('title')</h4>
                <hr>
                @yield('content')
            </div>
        </div>
</div>
@include('layouts.script')
@include('layouts.alert')
@include('layouts.footer')
</body>
</html>