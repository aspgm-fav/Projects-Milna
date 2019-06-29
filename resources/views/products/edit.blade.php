@extends('layouts.app')
@section('title') Edit Barang
@endsection
@section('content')
<div class="container-fluid">
    <form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-2">
            <div class="container nm1edit">    
                    <label class="labels1edit" for="input1edit">
                        <img src="{{asset('/images/'. $product->image()->get()[0]->image)}}"style="width:100px; height:100px;">
                    </label>
                <div class="input1edit">
                    <input name="image" id="file1edit" type="file">
                </div>
            </div>    
            <div class="container nm1edit">    
                    <label class="labels1edit" for="input1edit">
                        <img src="{{asset('/images/'. $product->image()->get()[1]->image)}}"style="width:100px; height:100px;">
                    </label>
                <div class="input1edit">
                    <input name="image" id="file1edit" type="file">
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="container nm1edit">    
                    <label class="labels1edit" for="input1edit">
                        <img src="{{asset('/images/'. $product->image()->get()[2]->image)}}"style="width:100px; height:100px;">
                    </label>
                <div class="input1edit">
                    <input name="image" id="file1edit" type="file">
                </div>
            </div>    
            <div class="container nm1edit">    
                    <label class="labels1edit" for="input1edit">
                        <img src="{{asset('/images/'. $product->image()->get()[3]->image)}}"style="width:100px; height:100px;">
                    </label>
                <div class="input1edit">
                    <input name="image" id="file1edit" type="file">
                </div>
            </div>
        </div>    
        <div class="col mt-2">
            <div class="form-group row">
                <div class="col">
                    <input type="text" placeholder="Title" name="title" class="form-control" value="{{$product->title}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <select class="form-control" name="categories" id="categories" required> 
                        <option value="{{$product->category()->first()->id}}"hidden>{{$product->category()->first()->title}}</option>
                        @foreach($category as $c)
                        <option value="{{$c->id}}">{{$c->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <input type="number" placeholder="Price" name="price" class=" form-control" value="{{ $product->price}}">
                </div>
                <div class="col">
                    <select class="form-control" name="condition"> 
                        <option hidden>{{$product->condition}}</option>
                        <option value="New" class="form-control">Baru</option>
                        <option value="Second">Bekas</option>
                    </Select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                <input type="number" name="stock" class="form-control" placeholder="Stock" value="{{$product->stock}}">
                </div>
                <div class="col">
                <input type="number" name="weight" class="form-control" placeholder="Weight" value="{{$product->weight}}">
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col ml-3">
            <textarea class="wkwk" name="description" rows="3">{{$product->description}}</textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-1 mr-auto ml-3 mt-2">
            @if($product->status == 'dijual')
            <button class="btn btns" name="save_action" value="dijual">Perbarui</button>
            @else
            <button class="btn btns" name="save_action" value="dijual">Jual</button>
            @endif
        </div>
        <div class="col mt-2">
            <a href="{{route('product.index')}}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
    </form>
</div>
@endsection