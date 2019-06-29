<!DOCTYPE html>
<html lang="en">
<head>

    @include('layouts.head')
</head>
<body> 

    @yield('content')
    @include('layouts.script')
    @include('layouts.alert')
    

@include('layouts.footer')
</body>
</html>
