@extends('frontend')
@section('content')
            <section class="page" id="page">
            <div class="row mt-3" id="result">
                @foreach($product as $p)
                <div class="col-md-2 mb-3 ">
                    <div class="card cardz" style="width: 10rem;">
                        <div class="card-header">
                            <img src="{{ asset('/images/'. $p->image()->first()->image) }}" class="imgs imgcrd img-fluid">
                            <a href="{{route('product.show', $p->id)}}" class=" btn btn-sm btn-light eyecard">Lihat Detail</a>
                                
                            @if($p->condition == 'Second')
                            <span class="badge badge-light hih">Bekas </span>
                            @else
                            @endif
                        </div>
                        <div class="card-body">
                            <a href="{{route('product.show', $p->id)}}" class="btn-link">
                            <strong class="text-dark">{{$p->title}}</strong>
                            </a>
                            <p class="card-text">Rp. {{ number_format($p->price, 2) }}
                            </p>
                            <div style="font-size:10px;">
                            @if($p->review->count(0))
                            <i class="text-warning fa fa-star"></i>
                            <i class="text-warning fa fa-star"></i>
                            <i class="text-warning fa fa-star"></i>
                            <i class="text-warning fa fa-star"></i>
                            <i class="text-warning fa fa-star"></i>
                            ({{$p->review->count()}} ulasan)
                            @endif
                            </div>
                        </div>
                        <div class="card-body ctn">
                            <div class="row">
                                <div class="col ml-2">
                                    <div style="font-size:12px;">
                                        <strong>{{$p->user->name}}</strong>
                                        <br>
                                        {{$p->user->city}}
                                        <br><br>
                                        <div class="text-secondary">(0 feedback)</div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            @auth
                            @if($p->user_id == Auth::user()->id)
                                @else
                                <a class="btn btns btn-sm btn-block" href="{{ route('check.edit', ['id'=>$p['id']]) }}">Beli</a>
                                @endif
                            @else
                            <a class="btn btns btn-sm btn-block" href="{{ route('cart.edit', ['id'=>$p['id']]) }}">Beli</a>
                            @endauth
                        </div>
                    </div>
                </div>     
                @endforeach
            </div>
                <div class="pagination pagination-sm justify-content-end mr-5">
                    {{$product->appends(Request::all())->links()}}
                </div>
            </section>
        
@endsection