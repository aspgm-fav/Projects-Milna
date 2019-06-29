@extends('users.design')
@section('content')
<br>
<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col">
		<div class="card" id="almtcrd">
			<div class="card-header">
				<div class="row">
					<div class="col">
						Alamat
					</div>
					<div class="col-4">
						<a class="nav-item text-light" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
							+ Kirim ke alamat lain
						</a>
					</div>
				</div>
			</div> 
			<div class="card-body">
					<form action="{{route('check.store')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
								<input type="text" name="name_receiver" class="form-control-sm  form-control" placeholder="Nama Penerima" required>
						</div>
						<div class="form-group">
							<input type="number" name="phone" class="form-control-sm form-control" placeholder="Nomer Telepon">
						</div>
                        <div class="form-group">
							<textarea name="address" id="ckview" class="form-control-sm form-control" rows="2" placeholder="Alamat Penerima" required></textarea>
						</div>
						<div class="form-group form-row">
							<div class="col">
								<input type="text" name="sub_district" class="form-control-sm  form-control" placeholder="Kec" required>
							</div>
                            <div class="col">
								<input type="text" name="city" class="form-control-sm  form-control" placeholder="Kota / Kab" required>
							</div>
							<div class="col">
								<input type="text" name="province" class="form-control-sm  form-control" placeholder="Provinsi" required>
							</div>
							<div class="col">
								<input type="text" name="zip_code" class="form-control-sm  form-control" placeholder="Kode Pos" required>
							</div>
						</div>
				</div>
			</div>
	</div>
		
		<div class="col">
			<div class="card">
				<div class="card-header navbar-custom ">
				Pembayaran
				</div>
				<div class="card-body">
				<?php $total = 0 ?>
				@if(session('cart'))
				@foreach(session('cart') as $id => $product) 
				<?php $total += $product['price'] * $product['quantity'] ?>
                <div class="row">
                    <div class="col">
                    <img src="{{ asset('/images/'.$product['image_url']) }}" class="img-thumbnail img-fluid" style="width:75px;height:75px;" /> 
                    </div>
                    <div class="col mt-2">
                        <h6 class="nomargin">{{ $product['name'] }}</h6>
						<label style="font-size:12px;">Rp. {{ $product['price'] }}</label>
					</div>
					<div class="col mt-3">
					<h6 class="nomargin">x
						{{ $product['quantity'] }}
						</h6>
                    </div>
				<div class="col mt-3">
	                Rp. {{ number_format($product['price'] * $product['quantity'],2) }}
				</div>
				</div>
				<div class="form-group mt-2">
					<div class="col-8">
						<div class="input-group mb-2 mr-sm-2">
							<div class="input-group-prepend">
								<label class="mr-2 mt-1" style="font-size:12px;">Catatan</label>
							</div>
							<input type="text" placeholder="Contoh: warna, jenis, ukuran, dll" class="form-control form-control-sm">
						</div>
					</div>
				</div>
            @endforeach
            @endif
			<br>			
			<div class="container">
					<div class="input-group input-group-sm">
						<input type="text" class="col-4 form-control" placeholder="Voucher Code"aria-describedby="basic-addon2">
						<div class="input-group-append">
							<button class="btns" type="button">Apply</button>
						</div>
					</div>
					</div>
					<hr>
			<div class="row">
			<div class="col">
				
				</div>
				<div class="col">
				Total Bayar
				</div>
				<div class="col">
				
				</div>
				<div class="col"> 
				Rp. {{ number_format($total,2) }}
				</div>
			</div>
				<hr>
				<button type="submit" class="btn btns btn-block">Bayar Sekarang</button>
						</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection