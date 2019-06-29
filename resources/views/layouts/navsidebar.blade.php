<nav id="sidebar">
    <div class="sidebar-header">
    </div>
    <ul class="list-unstyled components">
        <li>
            <a class="btn btn-block btn-outline-secondary ml-1    " data-toggle="modal" data-target="#addProductModal">Jual Barang</a>
                <div class="modal fade" id="addProductModal" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="modal-header">
                                    <h4>Jual Barang</h4>
                                    <button type="button" class="close"data-dismiss="modal">&times </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <div class="col-2">
                                            <div class="container nm1">    
                                                <label class="labels1" for="input1"></label>
                                                <div class="input1">
                                                    <input name="image[]" id="file1" type="file" required>
                                                </div>
                                            </div>
                                            <div class="container nm2">    
                                                <label class="labels2" for="input2"></label>
                                                <div class="input2">
                                                    <input name="image[]" id="file2" type="file" required>
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="col-3">
                                            <div class="container nm3">    
                                                <label class="labels3" for="input3"></label>
                                                <div class="input3">
                                                    <input name="image[]" id="file3" type="file" required>
                                                </div>
                                            </div>
                                            <div class="container nm4">    
                                                <label class="labels4" for="input4"></label>
                                                <div class="input4">
                                                    <input name="image[]" id="file4" type="file" required >
                                                </div>
                                            </div>    
                                        </div>   
                                    
                                        <div class="col">
                                            <div class="mt-3 form-group">
                                                <input type="text" placeholder="Nama Barang" name="title" class="form-control" required >
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="categories" required > 
                                                <option hidden value="">Kategori</option>
                                                @foreach($category as $c)
                                                <option value="{{$c->id}}">{{$c->title}}</option>
                                                @endforeach
                                                </Select>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                    <div class="input-group-text form-control">Rp.</div>
                                                    </div>
                                                    <input type="number" name="price" class="form-control " id="inlineFormInputGroupUsername" placeholder="Harga" required>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col">
                                                    <select class="form-control" name="condition" required > 
                                                    <option hidden value="">Kondisi Barang</option>
                                                    <option value="Baru" class="form-control">Baru</option>
                                                    <option value="Bekas">Bekas</option>
                                                    </Select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col">
                                                    <input type="number" name="stock" id="stock" class="form-control" placeholder="Stok Barang" required>
                                                </div>
                                                <div class="col">
                                                    <input type="number" name="weight" id="weight" class="form-control" placeholder="Berat Barang" required>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <textarea placeholder="Deskripsi Barang" name="description" rows="3" class="wkwk" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div>
                                    <button class="btn btn-success" type="submit" name="save_action" value="dijual">Jual
                                    </button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel </button>
                                    </div>
                                    <button type="submit" name="save_action" value="draft" class="ml-auto btn btn-danger">Simpan ke draft </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </li><br>
        <li>
            <a href="{{route('product.index')}}"><i class="fa fa-store"></i> Produk aku</a>
        </li>
        <li>
            <a href="{{route('check.index')}}"><i class="fa fa-exchange-alt"></i> Transaksi</a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"><i class="fa fa-cog"></i> Akun</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="{{ route('ringksn') }}">Ringkasan Akun</a>
                </li>
                <li>
                    <a href="{{ route('verifikasi') }}">Email Verifikasi</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
