@extends('users.designindex')
@section('content')            
    @if(!$check->isEmpty())
    <section class="page" id="page">
        <div class="block">
            <table class="table-hover table-condensed table">
                <tbody>
                    <div class="row mt-3" id="result">
                    @foreach($check as $co)            
                        <tr>
                            <td>
                            <div class="row">
                                <div class="col">
                                    <label style="font-size:10px">No Transaksi</label>
                                </div>
                                <div class="col">
                                    <label  style="font-size:10px">Total Harga</label>
                                </div>
                                <div class="col mr-auto">
                                    <a href="{{route('check.show',$co->id)}}" class="btn btn-sm btn-outline-danger">Lihat Detail</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="ml-3">
                                    {{$co->id}}
                                    </div>
                                </div>
                                <div class="col">
                                    Rp. {{number_format($co->totalprice,2)}}
                                </div>
                                <div class="col">
                                
                                </div>
                            </div>
                            <div class="row">
                                <div class="col" style="font-size:10px">
                                    {{$co->created_at}}
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col ml-3 mt-3">
                                    <div class="row"style="font-size:10px">
                                    Nama Barang
                                    </div>
                                    @foreach($co->checkout as $cp)
                                    <div class="row">{{$cp->product->title}}</div>
                                    @endforeach
                                </div>
                                <div class="col ml-3 mt-3">
                                    <div class="row"style="font-size:10px">
                                    jumlah Barang
                                    </div>
                                    <div class="row">
                                    {{$co->checkout->count()}}
                                    </div>
                                </div>
                                <div class="col">
                                    <label  style="font-size:10px">Status Pembelian</label>
                                    <br>
                                    @if($co->status == 'proses')
                                        <span class="badge bg-danger text-light"> Sedang dikirim</span>
                                    @else
                                        <span class="badge bg-success text-light"> Barang diterima</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col"></div>
                            </div>
                            </td>    
                        </tr>       
                    @endforeach
                    </div>
                </tbody>
            </table>  
            <div class="pagination pagination-sm justify-content-end">
                {{$check->appends(Request::all())->links()}}
            </div>
        </div>
    @else
        <p>Belum ada transaksi</p>
    </section>
    @endif        
@endsection