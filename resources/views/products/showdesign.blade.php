<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body>
    @include('layouts.nav')  
    
<style type="text/css">
    #carousel-thumb {
        width: 100%;
    }
    #carousel-thumb .carousel-indicators {
        margin: 20px 0 0;
        overflow: auto;
        position: static;
        overflow-y:hidden;

    }
    #carousel-thumb .carousel-indicators li {
        background-color: transparent;
        display: inline-block;
        width:100%;
        height:100%;
    }
    #carousel-thumb .carousel-indicators li img {
        display: block;
        opacity: 0.3;
    }
    #carousel-thumb .carousel-indicators li.active img {
        opacity: 1;
    }
    #carousel-thumb .carousel-indicators li:hover img {
        opacity: 0.75;
    }
    #carousel-thumb .carousel-outer {
        position: relative;
    }
</style>

<br>
<div class="container-fluid">
    <div class="row">   
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">    
                            <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel" data-interval="false" data-pause="hover" >
                                <div class="carousel-inner" role="listbox">
                                    @foreach($product->image()->get() as $item)
                                    <div class="carousel-item {{ $loop->first ? ' active' : '' }}">
                                        <img alt="{{ asset('/images/'.$item->image) }}" src="{{ asset('/images/'.$item->image) }}" class="img-responsive ml-4"  style="width:200px;height:175px;">
                                    </div>
                                    @endforeach
                                </div>
                                <ol class="carousel-indicators">
                                    @foreach($product->image()->get() as $item)
                                    <li data-target="#carousel-thumb" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? ' active' : '' }} ">
                                    <img class="d-block w-100 img-fluid" src="{{ asset('/images/'.$item->image) }}" style="width:100px; height:50px;">
                                    </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                        <div class="col">
                            <h3><strong> {{ $product->title }} </strong></h3>
                                    @if($product->review->count(0))
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    ({{$product->review->count()}} ulasan)
                                    @endif
                            <hr>
                            <h4>Rp. {{ number_format($product->price, 2) }}</h4>
                            <div class="alert alert-info">
                                Belanja terus di <a href="" class=""><strong> Milna </strong></a> dan dapatkan hadiah menarik
                            </div>
                            @auth
                            @if($product->user_id == Auth::user()->id)
                            <a href="{{route('product.edit', $product->id)}}" class="mt-2 btn btn-sm btn-warning " style="width:350px;">Edit</a>
                            <form class="d-inline" action="{{route('product.destroy', $product->id)}}" method="POST" onsubmit="return confirm('Yakin barang tidak akan dijual?')">
                                    @csrf 
                                    <input type="hidden" value="DELETE" name="_method">
                                    <input type="submit" class="btn btn-danger mt-2 btn-sm" style="width:247px;" value="Set Tidak dijual">                            
                                </form>
                            
                                @else
                                    @if($product->stock ==0)
                                    <button class="mt-2 btn btn-sm btn-danger " style="width:350px;">Stok Habis</button>
                                    <a href="" class="btn mt-2 btn-sm btn-primary " style="width:247px;">Chat</a>
                                    @else
                                    <a href="{{ route('check.edit', ['id'=>$product['id']]) }}" class="btn btn-success btn-block"> Beli Sekarang </a>
                                    <a href="{{ route('cart.edit', ['id'=>$product['id']]) }}" class="mt-2 btn btn-sm btn-secondary " style="width:350px;">Tambahkan ke Keranjang</a>
                                    <a href="" class="btn mt-2 btn-sm btn-primary " style="width:247px;">Chat</a>
                                    @endif
                                @endif
                            @else
                            <a href="{{ route('login') }}" class="mt-2 btn btn-sm btn-secondary " style="width:350px;">Tambahkan ke Keranjang</a>
                            <a href="" class="btn mt-2 btn-sm btn-primary " style="width:247px;">Chat</a>	
                            @endauth    
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <ul class="nav nav-tabs " role="tablist">
                <li class="nav-item">
                    <a class="active nav-link" href="#dsc" role="tab" data-toggle="tab">Detail</a>
                </li>
                <li class="nav-item">
                    <a class=" nav-link " href="#" role="tab" data-toggle="tab">Cek Ongkir</a>
                </li>
                <li class="nav-item">
                    <a class=" nav-link " href="#feedback" role="tab" data-toggle="tab">Feedback</a>
                </li>
                <li class="nav-item">
                    <a class=" nav-link " href="#review" role="tab" data-toggle="tab">
                    @if($product->review->count()==0)
                    @else
                    {{$product->review->count()}}
                    @endif
                    Ulasan Barang</a>
                </li>
            </ul>
            <div class="card" >
                <div class="tab-content" >
                    <div class="tab-pane fade in active show" id="dsc" role="tabpanel">
                    <div class="container" style=" margin:70px 5px;">
                            <div class="row">
                                <div class="col-sm-2">
                                    Informasi
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col-sm-4">
                                        <i class="fa fa-shopping-cart"></i> Stok
                                        <br>
                                        <i class="fab fa-bandcamp"></i> Kondisi
                                        <br>
                                        <i class="far fa-eye"></i> Dilihat
                                        </div>
                                        <div class="col">
                                        {{ $product->stock }}
                                        <br>
                                        {{ $product->condition }}
                                        <br>
                                        {{$product->look}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col-sm-4">
                                        <i class="fa fa-check-circle"></i> Terjual
                                        <br>
                                        <i class="fa fa-heart"></i> Difavoritkan
                                        <br>
                                        <i class="fa fa-clock"></i> Diperbarui
                                        </div>
                                        <div class="col">
                                        {{$product->sold_out}}
                                        <br>
                                        
                                        <br>
                                        {{$product->updated_at}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2">
                                    Spesifikasi
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col-sm-4">
                                        Kategori
                                        
                                        <br>
                                        Berat
                                        </div>
                                        <div class="col">
                                        {{$product->category()->first()->title}}
                                        <br>
                                        
                                        {{ $product->weight }} gram
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                </div>
                            </div>
                            <hr style="text-align:left;width:100%;">
                            <div class="row">
                                <div class="col-sm-2">
                                    Deskripsi
                                </div>
                                <div class="col">
                                {!! $product->description !!}
                                </div>
                                <div class="col">
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="tab-pane fade" id="feedback" role="tabpanel">
                            <div class="container mt-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="img">
                                                <img src="{{url('img/profile.png')}}" class="img img-rounded rounded  mx-auto d-block img-fluid" style="width:50px;height:50px;"/>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <i class="fa fa-thumbs-up" style="color:green"></i>
                                            <p><a href=""><strong>Ufo</strong></a>
                                            1 Years Ago</p>
                                            <p>Recomended Seller, Fast Respect</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="review" role="tabpanel">
                            <div class="container">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        @yield('content')
                                        @auth
                                        @if($product->user_id == Auth::user()->id)
                                            biarkan user lain yang memberikan ulasan yaa
                                        @else
                                        @yield('btn')
                                        @endif
                                        @else
                                        Login jika ingin mengulas barang ini
                                        @endauth
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>

        <div class="col">
            <a class="mb-2 ahuy hm1 mr-2" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{route('product.show', ['id' => $product['id']]) }}" title="Share with Facebook">
                <i class="fab fa-facebook fa-2x" aria-hidden="true"></i>
            </a>
            <a  class="mb-2 ahuy hm6 " target="_blank" href="https://lineit.line.me/share/ui?url={url}&text={{route('product.show', ['id' => $product['id']]) }}" title="Share with Line">
                <i class="fab fa-line fa-2x" aria-hidden="true"></i>
            </a>
            <a class="mb-2 ahuy hm2 mr-2" target="_blank" href="https://twitter.com/intent/tweet?text=my share text&amp;url={{route('product.show', ['id' => $product['id']]) }}" title="Share with Twitter">
                <span class="fab fa-twitter fa-2x"></span>
            </a>
            <a  class="mb-2 ahuy hm3 mr-2" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('product.show', ['id' => $product['id']]) }}&amp;title=my share text&amp;summary=dit is de linkedin summary" title="Share with Linked In">
                <i class="fab fa-linkedin-in fa-2x" aria-hidden="true"></i>
            </a>
            <a  class="mb-2 ahuy hm4 mr-2" target="_blank" href="https://plus.google.com/share?url={{ route('product.show', ['id' => $product['id']]) }}&text={{ route('product.show', ['id' => $product['id']]) }}&hl={language_code}" title="Share with Google">
                <i class="fab fa-google-plus-square fa-2x" aria-hidden="true"></i>
            </a>
            <a  class="mb-2 ahuy hm5 mr-2 " target="_blank" href="https://wa.me/?text={{ route('product.show', ['id' => $product['id']]) }}" title="Share with Whatsapp">
                <i class="fab fa-whatsapp fa-2x" aria-hidden="true"></i>
            </a>
            <br>
                <label for="" class="mt-2">Pelapak</label>
                <br>
                <div class="row">
                    <div class="col-sm-3">
                        @if($product->user->image)
                        
                        <img src="{{url('storage', $product->user->image)}}"  class="rounded-circle" style="width:70px;">
                        @else
                        <img src="{{asset('img/profile.png' )}}" class="img rounded-circle" style="width:70px;">
                            
                        @endif
                    </div>
                    <div class="col">
                        <strong class="">{{$product->user->name}}</strong>
                        <br><a href="" class="">(0 feedback)</a> <br>
                        <i class="fa fa-map-marker-alt" style="color:black"></i> <a href="" class=""> {{$product->user->city}}</a>
                    </div>
                </div>
                <hr style="background:white;">
                <div class="">
                    <h5><i class="fa fa-medal fa-1x"></i> Seller Premium</h5>
                </div>
                <hr style="background:white;">

            <div class="card">
                <div class="card-body">
                    <strong>Pengiriman mulai</strong><br>
                        16:00 WIB <br>
                    <strong>Bergabung</strong><br>
                    {{$product->user->created_at}}
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>
@include('layouts.script')
@include('layouts.alert')
@include('layouts.footer')
</body>
</html>
