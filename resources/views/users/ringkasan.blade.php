@extends('layouts.app')
@section('title') Akun @endsection
@section('content')
@if(Auth::user())
<div class="card">
    <div class="card-body">
    <div class="row">
        <h3 class="ml-3">Profil</h3>
        <a class="nav-link" href="{{route('user.edit',['id'=>Auth::user()->id])}}"> Edit</a>
    </div>
        <div class="row">
            <div class="col">
            @if(Auth::user()->image)
                <img src="{{url('storage', Auth::user()->image)}}" width="100px" alt="{{url('storage', Auth::user()->image)}}"/>
            @else
            <img src="{{url('img/profile.png')}}" style="width:75px" alt="">
            @endif
            </div>
            <div class="col">
                <strong>Name</strong>
                <div class="row">
                    <div class="col justify-content-center">
                    {{Auth::user()->name}}
                    </div> 
                </div>
            </div>
            <div class="col">
                <strong>Username</strong>
                <div class="row">
                    <div class="col justify-content-center">
                    {{Auth::user()->username}}
                    </div>
                </div>
            </div>            
            <div class="col">
                <strong>Email</strong>
                <div class="row">
                    <div class="col justify-content-center">
                    {{Auth::user()->email}}
                    </div>
                </div>
            </div>
            <div class="col">
                <strong>Phone</strong>
                <div class="row">
                    <div class="col justify-content-center">
                    {{Auth::user()->phone}}
                    </div>
                </div>
            </div>
            <div class="col">
                <strong>Alamat</strong>
                <div class="row ">
                    <div class="col justify-content-center" style="font-size:12px;">
                    @if(empty(Auth::user()->address))
                    @else
                    {{Auth::user()->address}} <br>
                    {{Auth::user()->sub_district}},
                    {{Auth::user()->city}},
                    {{Auth::user()->province}} <br>
                    {{Auth::user()->zip_code}}
                    @endif
                    
                    </div>
                </div>
            </div>
        </div> 
        <hr>
        <div class="row">
                <h3 class="ml-3">Saldo</h3>
                
        </div>
        <div class="row">
            <div class="col">
            Rp. 0.00
            </div>
        </div>
        <hr>
    </div>
</div>
@endif

@endsection