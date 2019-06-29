@extends('products.showdesign')
@section('content')
<div class="container mt-4 mb-4" id="rate-list">
        <div id="ratings-list" name="ratings-list">
                    @foreach($product->review as $pr)
                    <div class="card" id="rating{{$pr->id}}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="img">
                                        @if($pr->user->image)
                                        <img src="{{url('storage', $pr->user->image)}}" class="img img-rounded rounded-circle  mx-auto d-block img-fluid" style="width:50px;height:50px;"/>
                                        @else
                                        <img src="{{url('img/profile.png')}}" class="img img-rounded rounded  mx-auto d-block img-fluid" style="width:50px;height:50px;"/>
                                        @endif
                                    </div>            
                                    <p class="nav-item text-center">{{$pr->created_at}}</p>
                                </div>
                                <div class="col-md-10">
                                    <p><a href=""><strong>{{$pr->user->username}}</strong></a>
                                    @if($pr->rating == 5)
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    @elseif($pr->rating == 4)
                                    <span class="float-right"><i class="text-warning far fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    @elseif($pr->rating == 3)
                                    <span class="float-right"><i class="text-warning far fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning far fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    @elseif($pr->rating == 2)
                                    <span class="float-right"><i class="text-warning far fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning far fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning far fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    @elseif($pr->rating == 1)
                                    <span class="float-right"><i class="text-warning far fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning far fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning far fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning far fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>

                                    @endif
                                    </p>
                                    <p>{!!$pr->desc !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                </div>
@endsection
@section('btn')
<button data-toggle="modal" data-target="#rateModal" class="ml-5 btn btns mb-2">Berikan Ulasan Barang ini?</button>
  
  <div class="modal fade" id="rateModal" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="rateModalLabel">Ulas Barang ini?</h4>
                  <a class="close" data-dismiss="modal" >&times </a>
              </div>
              <div class="modal-body">
                <div class="container">
                  <form id="clearForm" name="clearForm" class="form-horizontal" novalidate="">
                  <input type="hidden" value="{{$product->id}}" name="product_id" id="pd_id">
                      <div class="form-group row justify-content-center">
                        <span class="star-rating star-5">
                            <input type="radio" name="rating" id="star1" value="1" required><i></i>
                            <input type="radio" name="rating" id="star2" value="2" required><i></i>
                            <input type="radio" name="rating" id="star3" value="3" required><i></i>
                            <input type="radio" name="rating" id="star4" value="4" required><i></i>
                            <input type="radio" name="rating" id="star5" value="5" required><i></i>
                        </span>
                      </div>
                      <div class="form-group row justify-content-center">
                        <label class="">Deskripsi</label>
                        <input type="text" row="3" class="form-control" id="descusReview" name="desc" required>
                      </div>
                  </form>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btns mr-auto" id="btn-rating" value="rates">Simpan
                  </button>
                  <input type="hidden" id="rating_id" name="rating_id" value="0">
              </div>
          </div>
      </div>
  </div>
  
@endsection
