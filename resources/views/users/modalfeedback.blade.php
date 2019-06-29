<!-- feedback -->
<div class="modal" id="feedback" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{route('check.update', $orderItem->id)}}" method="post">
            @csrf
            @method('put')
            <input type="text" value="{{$orderItem->product->user->id}}">
            <input type="hidden" name="id_product" value="{{ $orderItem->product_id }}">
                <input type="hidden" name="id" value="{{ $orderItem->id }}">
                <input type="hidden" name="give_rating" value="no">
                <div class="modal-header">
                    <h4>Feedback</h4>
                    <button type="button" class="close"data-dismiss="modal">&times </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                    
                        <div>
                        <input type="radio" name="give_feedback" value="yes" required>
                        <i class="far fa-thumbs-up"></i>
                        <input type="radio" name="give_feedback" value="no" required>
                        <i  class="far fa-thumbs-down "></i>
                        </div>
                        <br>
                        Deskripsi
                        <textarea name="desc" id="" cols="30" rows="3" required></textarea>
                        </div>
                    </div>
                <div class="modal-footer">
                    <div>
                    <button value="success" name="status" type="submit"  class="mr-auto btn btn-success">Kirim Feedback </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


