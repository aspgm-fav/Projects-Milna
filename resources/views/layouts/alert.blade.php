

@include('sweet::alert')

@if ($message = Session::get('success'))
@endif


@if(session('status'))
<div class="alert alert-success">
{{session('status')}}
</div>
@else
<div class="alert  bg-transparent" role="alert">
    
</div>
@endif
