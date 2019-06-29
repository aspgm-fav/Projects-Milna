@extends('users.design')
@section('content')
<br>
    <div class="container-fluid">
    <div class="row">
        <div class="col">
        <div class="card"id="cart">
            <div class="card-body" >
            <table id="cart" class="table-hover table-condensed table">
            <tbody>
            
            <div class="row ml-3">
            @if(session('cart'))
            Total {{ count(session('cart')) }} Barang
            @else
            @endif
                        
            </div>
            <?php $total = 0 ?>
            @if(session('cart'))
            @foreach(session('cart') as $id => $product)
            <?php $total += $product['price'] * $product['quantity'] ?>

            <tr id="ini">
            <td data-th="Product">
                <div class="row">
                    <div class="col-3">
                    <img src="{{ asset('/images/'.$product['image_url']) }}" class="img-thumbnail img-fluid" style="width:75px;height:75px;" />
                    </div>
                    <div class="col">
                        <h6 class="nomargin">{{ $product['name'] }}
                        <br>
<!-- <div class="input-group input-group-sm" style="width:90px;">
    <div class="input-group-prepend">
        <button class="btn btns" type="button">
        <i class="fa fa-minus"></i></button>
    </div>
        <input id="qtt" disabled min="1" max="{{ $product['stock'] }}" value="{{ $product['quantity'] }}" class="form-control bg-transparent"/>
    <div class="input-group-prepend">
        <button onClick="plus({{$id}})" class="btn btns" type="button">
        <i class="fa fa-plus"></i> </button>
    </div>
</div>
<script>
function plus(id){
    alert(id);
}
</script> -->


                            <br>
                            

                            <div class="input-group-sm input-group"style="width:90px;">                            
                            <input  type="number" min="1" max="{{ $product['stock'] }}" value="{{ $product['quantity'] }}" class="form-control quantity" />
                            <div class="input-group-append">
                            <button class="btns btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-pen"></i></button>
                            </div>
                            </div>
                        </h6>
                    </div>
                </div>
            </td>
            <td data-th="Price">
                Rp. {{ number_format($product['price'], 2) }}
            </td>
            <td> </td>
            <td>
            <button class="btn btn-sm remove-from-cart" data-token="{{ csrf_token() }}" style="background-color:transparent;" data-id="{{ $id }}">
                    <i class="fa fa-times fa-dark"></i>
            </button>
            </td>
            </tr>
            @endforeach
            @endif
            </tbody>
            </table>
   
            </div>
        </div>
        </div>
        <div class="col">
        <div class="card" id="crdfix">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                        Total belanja
                        </div>
                        <div class="col">
                        Rp. {{ number_format($total, 2) }}
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                    <a href="{{route('check.create')}}" class="btn btns btn-block">
                        Lanjutkan Pembayaran</a>
                    </div>
                </div>
        </div>
        </div>
        
    </div>
</div>
@endsection