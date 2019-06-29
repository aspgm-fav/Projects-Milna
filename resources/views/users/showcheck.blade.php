@extends('layouts.app')
@section('title')
Transaksi
@endsection
@section('content')
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                Daftar Pembelian
            </div>
            <div class="card-body">
                <div class="card-header">
                    <div class="row">
                        <div class="col" style="font-size:11px">
                        No Transaksi
                        </div>
                        <div class="col" style="font-size:11px">
                        
                        </div>
                        <div class="col" style="font-size:11px">
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        {{$checkout->id}}
                        </div>
                        <div class="col">
                        
                        </div>
                    </div>
            <br>
                    <div class="row">
                        <div class="col" style="font-size:11px">
                        Catatan untuk Pelapak
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        --
                        </div>
                    </div>
            <br>
            @foreach($checkout->checkout as $orderItem)
                
                    <div class="row ml-1">
                        <img src="{{ asset('/images/'. $orderItem->product->image->first()->image) }}" width="70" height="70" class="image-responsive">
                        <div class="col mt-2">
                            {{ $orderItem->product->title }}
                     <br>
                            <div style="font-size:11px"> 
                                Jumlah barang : {{ $orderItem->quantity }}
                            </div>
                            <div style="font-size:11px"> 
                                Berat : {{ $orderItem->product->weight }} gram
                            </div>                    
                        </div>
                        <div class="col mt-2">
                            Rp. {{ number_format($orderItem->product->price,2) }}
                        </div>

                        <div class="col mt-2">
                        
                        @if($orderItem->cart->status =='proses')
                            @elseif($orderItem->give_rating == 'yes')
                                <button class="btn btnd" data-toggle="modal" data-target="#modalRating{{$orderItem->id}}">Ulas Barang
                                </button>
                                <div class="modal fade" id="modalRating{{$orderItem->id}}" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <form action="{{route('ulasan', $orderItem->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                            <input type="hidden" name="id_product" value="{{ $orderItem->product_id }}">
                                            <input type="hidden" name="id" value="{{ $orderItem->id }}">
                                            <input type="hidden" name="give_rating" value="no">

                                            <div class="modal-header">
                                                <h4>Berikan penilaian barang ini</h4>
                                                <a class="close" data-dismiss="modal" >&times </a>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="text-center">
                                                        <span class="star-rating star-5">
                                                        <input type="radio" name="rating" id="star1" value="1" required><i></i>
                                                        <input type="radio" name="rating" id="star2" value="2" required><i></i>
                                                        <input type="radio" name="rating" id="star3" value="3" required><i></i>
                                                        <input type="radio" name="rating" id="star4" value="4" required><i></i>
                                                        <input type="radio" name="rating" id="star5" value="5" required><i></i>
                                                        </span>
                                                    </div>
                                                    <br>
                                                    <div>
                                                        <label for="">Deskripsi</label>
                                                    </div>
                                                    <textarea class="wkwk" name="descrip" id="desc" cols="50" rows="3" required> </textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btns">Simpan</button>
                                                <button class="btn btn-secondary" onClick="reset();" data-dismiss="modal" >Cancel </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            @else($orderItem->give_rating == 'no')
                                <a href="{{route('product.show', $orderItem->product->id)}}" class="btn btns">Lihat Ulasan</a>
                        @endif
                        </div>
                    </div>
            @endforeach
            <br>
                @if($checkout->status =='proses')
                <form action="{{route('check.update',$checkout->id)}}" method="POST">
                    @csrf @method('patch')
                    <button type="submit" value="diterima" name="status" class="btn btns btn-block">Terima Barang</button>
                </form>
                @else
                @endif
                </div>
            </div>            
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="ml-3">
                <div class="row" style="font-size:11px">
                    Total Pembayaran
                </div>
                <div class="row">
                    Rp. {{number_format($checkout->totalprice,2)}}
                </div>
                <br>
                <div class="row" style="font-size:11px">
                    Status
                </div>
                <div class="row">
                        @if($checkout->status == 'proses')
                            <span class="badge bg-danger text-light"> Sedang dikirim</span>
                        @else
                            <span class="badge bg-success text-light"> Barang diterima</span>
                        @endif
                </div>
                <br>
                <div class="row " style="font-size:11px">
                    Alamat Pengiriman
                </div>
                <div class="row ">
                    <strong>{{$checkout->name_receiver}}</strong>
                </div>
                <div class="row">
                    {{$checkout->address}}
                </div>
                <div class="row">
                    {{$checkout->sub_district}}, {{$checkout->city}}
                </div>
                <div class="row">
                    {{$checkout->province}}, {{$checkout->zip_code}}
                </div>
                <div class="row">
                    No. Telepon : {{$checkout->phone}}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection