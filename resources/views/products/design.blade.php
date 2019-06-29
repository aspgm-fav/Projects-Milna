<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body>
    @include('layouts.nav')  
    @yield('content')
<br>
<br>
@include('layouts.script')
@include('layouts.alert')
@include('layouts.footer')
</body>
</html>
