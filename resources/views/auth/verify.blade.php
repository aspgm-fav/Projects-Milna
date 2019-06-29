@extends('layouts.app')
@section('title') Verifikasi Email
@endsection
@section('content')

<div class="card">
    <div class="card-body">
        @auth
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Link verifikasi sudah dikirim silahkan cek <strong>Email</strong> kamu
                        </div>
                    @else                 
                    @endif
            <div class="row">
                <div class="col">
                    {{Auth::user()->email}}    
                </div>
                <div class="col">
                    @if(Auth::user()->email_verified_at == '')
                        Belum verifikasi (<a href="{{ route('verification.resend') }}" class="btn-link text-danger">Verifikasi sekarang</a>)
                    @else
                        sudah diverikasi
                    @endif
                </div>
            </div>
        @endauth
    </div>
</div>
@endsection
