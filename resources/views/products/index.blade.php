@extends('products.designss')
@section('content')
    @if(!$product->isEmpty())
    <section class="page" id="page">
    <div class="block">
        <table class="table table-hover">
            <tbody>
                <div class="ml-4 checkbox">
                    <button class="btn btns delete-all" data-url="" type="submit">Set Tidak Dijual</button>
                    <label>
                    <input type="checkbox" class="chuck"id="checkAll"> Pilih Semua
                    </label>
                </div>
                <div class="row mt-3" id="result">
                @foreach($product as $p)
                    <tr >
                        <td id="tr_{{$p->id}}">
                            <div class="checkbox mt-4">         
                                <label>
                                    <input type="checkbox" class="chuck" name="checked[]" data-id="{{$p->id}}">
                                </label>
                            </div>
                            
                            <td>
                                <a href="{{route('product.show', $p->id)}}" class="text-dark" style="text-decoration:none;" title="View">
                                <img style="width:75px;height:75px;" alt="{{ asset('/images/'. $p->image()->get()[0]->image) }}" src="{{ asset('/images/'. $p->image()->get()[0]->image) }}">
                                </a>
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

                            </td>
                            <td>
                                <a href="{{route('product.show', $p->id)}}" class="text-dark ml-3" title="View">
                                <strong>{{$p->title}}</strong>
                                </a>
                                @if($p->status == "draft")
                                <span class="badge bg-dark text-white">{{$p->status}}</span>
                                @else 
                                @endif
                            </td>
                        </td>
                        <td>
                            <div class="form-group row">
                                <div class="input-group col-sm-11">
                                    <div class="input-group-prepend">
                                    <label for="inlineFormInputGroupUsername" class="col-sm col-form-label col-form-label-sm">Harga</label>
                                    <div class="input-group-text form-control form-control-sm">Rp.</div>
                                    </div>
                                    <input type="text" class="bg-light form-control form-control-sm" id="inlineFormInputGroupUsername" placeholder="{{ number_format($p->price, 2) }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="input-group col-sm-11">
                                    <div class="input-group-prepend">
                                        <label for="inlineFormInputGroupUsername" class="col-sm mr-2 col-form-label col-form-label-sm">Stok</label>
                                    </div>
                                    @if($p->stock == 0)
                                    <input type="text" class="fontz bg-light form-control form-control-sm" id="inlineFormInputGroupUsername" placeholder="Stok Habis" disabled>
                                    @elseif($p->stock < 5)
                                    <input type="text" class="fontz bg-light form-control form-control-sm" id="inlineFormInputGroupUsername" placeholder="{{$p->stock}}" disabled>
                                    @else
                                    <input type="text" class="bg-light form-control form-control-sm" id="inlineFormInputGroupUsername" placeholder="{{$p->stock}}" disabled>
                                    @endif
                                </div>                                    
                            </div>
                                <div class="input-group col-sm-11">
                                <div class="input-group-prepend">
                                <label for="inlineFormInputGroupUsername" class="col-sm mr-1 col-form-label col-form-label-sm">
                                <i class="fa fa-eye mt-1"></i>
                                </label>
                                </div>
                                    <input type="text" class="bg-light form-control form-control-sm" disabled placeholder="{{$p->look}}">
                                </div>

                        </td>
                        <td>
                            <div class="form-group row mt-4">
                                <button class="btn btn-sm btns" data-toggle="modal" data-target="#editProductModal{{$p->id}}">Edit</button>
                                    <div class="modal fade" id="editProductModal{{$p->id}}" >
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                            <form action="{{route('product.update', $p->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                                <div class="modal-header">
                                                    <h4>Ubah Barang</h4>
                                                    <button type="button" class="close"data-dismiss="modal">&times </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row ">
                                                        <div class="col-6">
                                                            @foreach($p->image()->get() as $img)
                                                            <img src="{{asset('/images/'. $img->image)}}" style="width:70px; height:70px;">
                                                            @endforeach
                                                            <div class="form-group row mt-4 ml-1 mr-5 inputDnD">
                                                            <p class="text-light"> Kosongkan foto jika tidak ingin mengubah</p>
                                                            <input name="image[]" type="file" class="form-control-sm form-control-file font-weight-bold" id="inputFile" accept="img_src/*" onchange="readUrl(this)" data-title="Click or Drag and drop a image Max 5" multiple>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-group row">
                                                                <div class="col">
                                                                    <input type="text" placeholder="Title" name="title" class="form-control" value="{{$p->title}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col">
                                                                    <select class="form-control" name="categories" id="categories" required> 
                                                                        <option value="{{$p->category()->first()->id}}"hidden>{{$p->category()->first()->title}}</option>
                                                                        @foreach($category as $c)
                                                                        <option value="{{$c->id}}">{{$c->title}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col">
                                                                    <input type="number" placeholder="Price" name="price" class=" form-control" value="{{ $p->price}}">
                                                                </div>
                                                                <div class="col">
                                                                    <select class="form-control" name="condition"> 
                                                                        <option hidden>{{$p->condition}}</option>
                                                                        <option value="New" class="form-control">Baru</option>
                                                                        <option value="Second">Bekas</option>
                                                                    </Select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col">
                                                                <input type="number" name="stock" class="form-control" placeholder="Stock" value="{{$p->stock}}">
                                                                </div>
                                                                <div class="col">
                                                                <input type="number" name="weight" class="form-control" placeholder="Weight" value="{{$p->weight}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col">
                                                                <textarea placeholder="Deskripsi Barang" name="description" cols="30" rows="3" class="wkwk form-control"required>{{$p->description}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    @if($p->status == 'dijual')
                                                    <button class="btn btns" name="save_action" value="dijual">Simpan</button>
                                                    @else
                                                    <button class="btn btns" name="save_action" value="dijual">Jual</button>
                                                    @endif
                                                    <a href="{{route('product.index')}}" class="btn btn-secondary">Cancel</a>
                                                </div>
                                            </form>

                                            </div>
                                        </div>
                                    </div>
                                <form action="{{route('product.destroy', $p->id)}}" method="POST" onsubmit="return confirm('Yakin barang tidak akan dijual?')">
                                    @csrf 
                                    @method('delete')
                                    <input type="submit" class="ml-2 btn btnd btn-sm" value="Set Tidak dijual">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </div>
            </tbody>
        </table>  
        <div class="pagination pagination-sm justify-content-end">
            {{$product->appends(Request::all())->links()}}
        </div>
    </div>
    @else
    <p>Belum ada produk kamu</p>
    </section>
    @endif
@endsection