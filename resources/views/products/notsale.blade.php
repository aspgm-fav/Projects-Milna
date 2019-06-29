@extends('products.designs')

@section('content')
@if(!$deleted_product->isEmpty())
    <section class="page" id="page">
        <table class="table table-hover">
            <tbody>
            <div class="ml-4 checkbox">
                <button class="btn btns delete-alls" data-url="" type="submit">Set Dijual</button>
                <label>
                    <input type="checkbox" class="chucks" id="checkAllre"> Pilih Semua
                </label>
            </div>
                <div class="row mt-3" id="result">
                    @foreach($deleted_product as $p)
                        <tr id="tr_{{$p->id}}">
                            <td>
                                <div class="checkbox mt-4">         
                                    <label>
                                        <input type="checkbox" class="chucks" name="checked[]" data-id="{{$p->id}}">
                                    </label>
                                </div>
                                <td>
                                    <img style="width:75px;height:75px;" alt="{{ asset('/images/'. $p->image()->get()[0]->image) }}" src="{{ asset('/images/'. $p->image()->get()[0]->image) }}">
                                    <label for="" class="ml-2">{{$p->title}}</label>
                                </td>
                            </td>
                            <td>
                                <div class="col-sm my-1 form-group row">
                                    <div class="input-group col-sm-9">
                                    <label for="inlineFormInputGroupUsername" class="col-sm-5 col-form-label col-form-label-sm">Price</label>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text form-control form-control-sm">Rp.</div>
                                        </div>
                                        <input type="text" class="bg-light form-control form-control-sm" id="inlineFormInputGroupUsername" placeholder="{{ number_format($p->price, 2) }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm my-1 form-group row">
                                    <div class="input-group col-sm-9">
                                        <label for="inlineFormInputGroupUsername" class="col-sm-5 col-form-label col-form-label-sm">Stock</label>
                                        <div class="input-group-prepend">
                                        </div>
                                        <input type="text" class="bg-light form-control form-control-sm" id="inlineFormInputGroupUsername" placeholder="{{$p->stock}}" disabled>
                                    </div>
                                </div>
                            </td>
                            <td><br>
                            <div class="row">
                                <a href="{{route('product.restore', $p->id)}}"  class="btn btns btn-sm ">Set dijual</a>
                                <form class="d-inline" action="{{route('product.delete-permanent', $p->id)}}"method="POST" onsubmit="return confirm('Yakin mau hapus produk ini ?')">
                                    @csrf 
                                    <input type="hidden" name="_method" value="DELETE"/>
                                    <button type="submit" class="btn btnd btn-sm">Hapus</button>
                                </form>
                            </div>
                            </td>
                        </tr>
                    @endforeach
                </div>
            </tbody>
        </table>  
        <div class="pagination pagination-sm justify-content-end">
            {{$deleted_product->appends(Request::all())->links()}}
        </div>
    </section>
        @else
            <p>Belum ada produk kamu</p>
    @endif
@endsection