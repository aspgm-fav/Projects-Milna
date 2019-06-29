<script src="{{asset('js/bootstrap4.js')}}"></script>
<script src="{{asset('js/sweetalert.js')}}"></script>
<script src="{{asset('js/ajax.js')}}"></script>
<script src="{{asset('js/ajax-library.js')}}"></script>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/ux/jquery.blockUI.js')}}"></script>
<script type="text/javascript">
    $('#btn-rates').click(function () {
        $('#btn-rating').val("rates");
        $('#clearForm').trigger("reset");
        $('#rateModal').modal('show');
    });    
    $("#btn-rating").click(function (e) {
        e.preventDefault();
        var rating_id = $('#rating_id').val();
        var rate = $("input[name=rating]:checked").val();
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'POST',
            url: '{{route('give-review')}}',
            data: {
                product_id: $('#pd_id').val(),
                rating: rate,
                desc: $('#descusReview').val()
            },
            success: function(data){
                $('#ratings-list').html(data);
                $('#clearForm').trigger("reset");
                $('#rateModal').hide();
                $('.modal-backdrop').hide();
                swal("","Kamu berhasil memberikan ulasan","success");
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    tinymce.init({ 
        selector:'.wkwk',
    });
    $(document).ready(function(){
        $(document).on('click', '.pagination a', function(e){
            e.preventDefault();
            $('#result').append('');
            var url = $(this).attr('href');
            getPage(url);
            window.history.pushState("", "", url);
        });
        function getPage(url) {
            $.ajax({
                url:url,
                beforeSend:function(){
                    $('body').block({ 
                        message: '<img src="{{asset("img/loading.gif")}}" width="150"/>',
                        overlayCSS:  {  
                            backgroundColor: 'white',  
                            opacity:0.7
                        },
                        css: { 
                            border: 'none', 
                            padding: '5px',
                            background: 'transparent', 
                            '-webkit-border-radius': '10px', 
                            '-moz-border-radius': '10px', 
                            color: 'transparent'
                        },
                    });
                },
                success: function(data) {
                    $('.page').html(data);
                    $('body').unblock();
                },
                error: function(err) {
                    $('body').unblock({ 
                        onUnblock: function(){ alert(err); window.location = url; } 
                        // ini function callback ketika error otomatis reload page
                    });
                    console.log(err);
                }
            });
        }
    });
    function reset() {
        alert('reset');
        $('#desc').val('');
        $('input[name=rating]').attr('checked',false);
    }
    function route(id){
        $.ajax({
            type: 'GET',
            url: '{{url('/')}}',
            data: {'categorysearch':id},
            beforeSend:function(){
                $('body').block({ 
                    message: '<img src="{{asset("img/loading.gif")}}" width="150"/>',
                    overlayCSS:  {  
                        backgroundColor: 'white',  
                        opacity:0.7
                    },
                    css: { 
                        border: 'none', 
                        padding: '5px',
                        background: 'transparent', 
                        '-webkit-border-radius': '10px', 
                        '-moz-border-radius': '10px', 
                        color: 'transparent' 
                        
                    }
                });
            },
            success: function(data){
                $('.page').html(data);
                $('body').unblock();
            },
            error:function(err){
                $('body').unblock({ 
                    onUnblock: function(){ alert(err); window.location = "{{url('/')}}"; } 
                });
                console.log(err);
            }
        });
    };
    $('#category').click(function(e){
        e.preventDefault();
        var src = $(this).val();
        $.ajax({
            type: 'GET',
            url: '{{url('/')}}',
            data: {'categorysearch':src},
            beforeSend:function(){
                $('body').block({ 
                    message: '<img src="{{asset("img/loading.gif")}}" width="150"/>',
                    overlayCSS:  {  
                        backgroundColor: 'white',  
                        opacity:0.7
                    },
                    css: { 
                        border: 'none', 
                        padding: '5px',
                        background: 'transparent', 
                        '-webkit-border-radius': '10px', 
                        '-moz-border-radius': '10px', 
                        color: 'transparent' 
                        
                    }
                });
            },
            success: function(data){
                $('.page').html(data);
                $('body').unblock();
            },
            error:function(err){
                $('body').unblock({ 
                    onUnblock: function(){ alert(err); window.location = "{{url('/')}}"; } 
                });
                console.log(err);
            }
        });
    });
    $('#sortby').change(function(){
        sortBy = $(this).val();
        $.ajax({
            type: 'GET',
            url: '{{route('check.index')}}',
            data: {'sortBy':sortBy},
            beforeSend:function(){
                $('body').block({ 
                    message: '<img src="{{asset("img/loading.gif")}}" width="150"/>',
                    overlayCSS:  {  
                        backgroundColor: 'white',  
                        opacity:0.7
                    },
                    css: { 
                        border: 'none', 
                        padding: '5px',
                        background: 'transparent', 
                            '-webkit-border-radius': '10px', 
                            '-moz-border-radius': '10px', 
                        color: 'transparent' 
                    }
                });
            },
            success: function(data){
                $('.page').html(data);
                $('body').unblock();
            },
            error: function(err) {
                console.log(err);
            }
        });
    });
    $('#sort').change(function(){
        sort = $(this).val();
        $.ajax({
            type: 'GET',
            url: '{{route('product.index')}}',
            data: {'sort':sort},
            beforeSend:function(){
                $('body').block({ 
                    message: '<img src="{{asset("img/loading.gif")}}" width="150"/>',
                    overlayCSS:  {  
                        backgroundColor: 'white',  
                        opacity:0.7
                    },
                    css: { 
                        border: 'none', 
                        padding: '5px',
                        background: 'transparent', 
                        '-webkit-border-radius': '10px', 
                        '-moz-border-radius': '10px', 
                        color: 'transparent' 
                        
                    }
                });
            },
            success: function(data){
                $('.page').html(data);
                $('body').unblock();
            },
            error: function(err) {
                console.log(err);
            }
        });
    });
    $('#sorting').change(function(){
        sorting = $(this).val();
        $.ajax({
            type: 'GET',
            url: '{{url('/')}}',
            data: {'sorting':sorting},
            beforeSend:function(){
                $('body').block({ 
                    message: '<img src="{{asset("img/loading.gif")}}" width="150"/>',
                    overlayCSS:  {  
                        backgroundColor: 'white',  
                        opacity:0.7
                    },
                    css: { 
                        border: 'none', 
                        padding: '5px',
                        background: 'transparent', 
                        '-webkit-border-radius': '10px', 
                        '-moz-border-radius': '10px', 
                        color: 'transparent' 
                        
                    }
                });
            },
            success: function(data){
                $('.page').html(data);
                // unblock hanya untuk div tertentu
                $('body').unblock();
                // unblock seluruh halaman
                // $.unblockUI();
            },
            error: function(err) {
                $('body').unblock({ 
                    onUnblock: function(){ alert(err); window.location = "{{url('/')}}"; } 
                    // ini function callback ketika error otomatis reload page
                });
                console.log(err);
            }
        });
    });
    $('#title').on('keyup',function(){
        src = $(this).val();
        $.ajax({
            type:'GET',
            url: '{{route('product.index')}}',
            data: {'title':src},
            // beforeSend:function(){
            //     $('body').block({ 
            //         message: '<img src="{{asset("img/loading.gif")}}" width="150"/>',
            //         overlayCSS:  {  
            //             backgroundColor: 'white',  
            //             opacity:0.7
            //         },
            //         css: { 
            //             border: 'none', 
            //             padding: '5px',
            //             background: 'transparent', 
            //             '-webkit-border-radius': '10px', 
            //             '-moz-border-radius': '10px', 
            //             color: 'transparent' 
                        
            //         }
            //     });
            // },
            success: function(data){
                $('.page').html(data);
                // $('body').unblock();
            },
            error: function(err) {
                console.log(err);
            }
        });
    });
    $(".update-cart").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            type: "patch",
            url: '{{route('carts.store')}}',
            data: {_token: '{{ csrf_token() }}', 
            id: ele.attr("data-id"), 
            quantity: ele.parents("tr").find(".quantity").val()},
            success: function (data) {
                window.location.reload();
                
            }
        });
    });
    $(".remove-from-cart").click(function(e) {
        e.preventDefault();
        var ele = $(this);
        if(confirm("Yakin mau hapus barangnya?")) {
            $.ajax({
                url: "{{ route('carts.remove') }}",
                method: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: ele.attr("data-id")
                },
                success: function(data) {
                    window.location.reload();
                }
            });
        }
    });

    $(function () {
        $(document).scroll(function () {
            var $nav = $(".sticky-top");
            $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
        });
    });
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() >= 50) {
                $('#return-to-top').fadeIn(200);
            } else {
                $('#return-to-top').fadeOut(200);
            }
        });
        $('#return-to-top').click(function() {
            $('body,html').animate({
                scrollTop : 0 }, 500);
        });
    });
    $(document).ready(function(){
        var container = $('.upld'), inputFile = $('#file'), img, btn, txt = 'Browse';
        if(!container.find('#upload').length){
            container.find('.inputs').append('<input type="button" value="'+txt+'" id="upload">');
            btn = $('#upload');
            container.prepend('<img src="" class="hidden" alt="Uploaded file" id="uploadImg" width="100">');
            img = $('#uploadImg');
        }
                
        btn.on('click', function(){
            img.animate({opacity: 0}, 300);
            inputFile.click();
        });

        inputFile.on('change', function(e){
            container.find('label').html( inputFile.val() );
            var i = 0;
            for(i; i < e.originalEvent.srcElement.files.length; i++) {
                var file = e.originalEvent.srcElement.files[i], 
                    reader = new FileReader();
                reader.onloadend = function(){
                    img.attr('src', reader.result).animate({opacity: 1}, 700);
                }
                reader.readAsDataURL(file);
                img.removeClass('hidden');
            }

        });
    });
    // upload
    $(document).ready(function(){
        var container = $('.nm1'), inputFile = $('#file1'), img, btn, txt = 'Browse';
        if(!container.find('#upload1').length){
            container.find('.input1').append('<img src="{{url('img/utama.png')}}" value="'+txt+'" id="upload1" height="100" width="100">');
            btn = $('#upload1');
            container.prepend('<img src="" class="hidden" alt="Uploaded file" id="uploadImg1" width="100" height="100">');
            img = $('#uploadImg1');
        }
        btn.on('click', function(){
            img.animate({opacity: 0}, 300);
            inputFile.click();
        });
        inputFile.on('change', function(e){
            container.find('#upload1').html( inputFile.val() );
            var i = 0;
            for(i; i < e.originalEvent.srcElement.files.length; i++) {
                var file = e.originalEvent.srcElement.files[i], 
                    reader = new FileReader();
                reader.onloadend = function(){
                    btn.attr('src', reader.result).animate({opacity: 1}, 700);
                }
                reader.readAsDataURL(file);
                btn.removeClass('hidden');
            }
        });
    });
    $(document).ready(function(){
        var container = $('.nm2'), inputFile = $('#file2'), img, btn, txt = 'Browse';
        if(!container.find('#upload2').length){
            container.find('.input2').append('<img src="{{url('img/upload.png')}}" value="'+txt+'" id="upload2"  width="100" height="100">');
            btn = $('#upload2');
            container.prepend('<img src="" class="hidden" alt="Uploaded file" id="uploadImg2"  width="100" height="100">');
            img = $('#uploadImg2');
        }
        btn.on('click', function(){
            img.animate({opacity: 0}, 300);
            inputFile.click();
        });
        inputFile.on('change', function(e){
            container.find('#upload2').html( inputFile.val() );
            var i = 0;
            for(i; i < e.originalEvent.srcElement.files.length; i++) {
                var file = e.originalEvent.srcElement.files[i], 
                    reader = new FileReader();
                reader.onloadend = function(){
                    btn.attr('src', reader.result).animate({opacity: 1}, 700);
                }
                reader.readAsDataURL(file);
                btn.removeClass('hidden');
            }
        });
    });
    $(document).ready(function(){
        var container = $('.nm3'), inputFile = $('#file3'), img, btn, txt = 'Browse';
        if(!container.find('#upload3').length){
            container.find('.input3').append('<img src="{{url('img/upload.png')}}" value="'+txt+'" id="upload3"  width="100" height="100">');
            btn = $('#upload3');
            container.prepend('<img src="" class="hidden" alt="Uploaded file" id="uploadImg3"  width="100" height="100">');
            img = $('#uploadImg3');
        }
        btn.on('click', function(){
            img.animate({opacity: 0}, 300);
            inputFile.click();
        });
        inputFile.on('change', function(e){
            container.find('#upload3').html( inputFile.val() );
            var i = 0;
            for(i; i < e.originalEvent.srcElement.files.length; i++) {
                var file = e.originalEvent.srcElement.files[i], 
                    reader = new FileReader();
                reader.onloadend = function(){
                    btn.attr('src', reader.result).animate({opacity: 1}, 700);
                }
                reader.readAsDataURL(file);
                btn.removeClass('hidden');
            }
        });
    });
    $(document).ready(function(){
        var container = $('.nm4'), inputFile = $('#file4'), img, btn, txt = 'Browse';
        if(!container.find('#upload4').length){
            container.find('.input4').append('<img src="{{url('img/upload.png')}}" value="'+txt+'" id="upload4" width="100" height="100">');
            btn = $('#upload4');
            container.prepend('<img src="" class="hidden" alt="Uploaded file" id="uploadImg4"  width="100" height="100">');
            img = $('#uploadImg4');
        }
        btn.on('click', function(){
            img.animate({opacity: 0}, 300);
            inputFile.click();
        });
        inputFile.on('change', function(e){
            container.find('#upload4').html( inputFile.val() );
            var i = 0;
            for(i; i < e.originalEvent.srcElement.files.length; i++) {
                var file = e.originalEvent.srcElement.files[i], 
                    reader = new FileReader();
                reader.onloadend = function(){
                    btn.attr('src', reader.result).animate({opacity: 1}, 700);
                }
                reader.readAsDataURL(file);
                btn.removeClass('hidden');
            }
        });
    });
    $(document).ready(function(){
        var container = $('.nm1edit'), inputFile = $('#file1edit'), img, btn, txt = 'Browse';
        if(!container.find('#upload1edit').length){
            container.find('.input1edit').append('<input type="button" value="'+txt+'" id="upload1edit">');
            btn = $('#upload1edit');
            container.prepend('<img src="" class="hidden" alt="Uploaded file" id="uploadImg1edit" width="100">');
            img = $('#uploadImg1edit');
        }
                
        btn.on('click', function(){
            img.animate({opacity: 0}, 300);
            inputFile.click();
        });

        inputFile.on('change', function(e){
            container.find('label').html( inputFile.val() );
            var i = 0;
            for(i; i < e.originalEvent.srcElement.files.length; i++) {
                var file = e.originalEvent.srcElement.files[i], 
                    reader = new FileReader();
                reader.onloadend = function(){
                    img.attr('src', reader.result).animate({opacity: 1}, 700);
                }
                reader.readAsDataURL(file);
                img.removeClass('hidden');
            }

        });
    });
    $(document).ready(function(){
        $('#checkAll').on('click', function(e) {
         if($(this).is(':checked',true))  {
            $(".chuck").prop('checked', true);  
         } else {  
            $(".chuck").prop('checked',false);  
         }  
        });
         $('.chuck').on('click',function(){
            if($('.chuck:checked').length == $('.chuck').length){
                $('#checkAll').prop('checked',true);
            }else{
                $('#checkAll').prop('checked',false);
            }
         });
        $('.delete-all').on('click', function(e) {
            var checkedArr = [];  
            $(".chuck:checked").each(function() {  
                checkedArr.push($(this).attr('data-id'));
            });
            if(checkedArr.length <=0)  {  
                swal("","Pilih salah satu","error");  
            }  else {
                if(confirm("Yakin tidak akan dijual?")){  
                    var strChecked = checkedArr.join(","); 
                    $.ajax({
                        url: "{{ route('product.selectAll') }}",
                        type: 'GET',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'checked=' +strChecked,
                        beforeSend:function(){
                            $('body').block({ 
                                message: '<img src="{{asset("img/loading.gif")}}" width="150"/>',
                                overlayCSS:  {  
                                    backgroundColor: 'white',  
                                    opacity:0.7
                                },
                                css: { 
                                    border: 'none', 
                                    padding: '5px',
                                    background: 'transparent', 
                                    '-webkit-border-radius': '10px', 
                                    '-moz-border-radius': '10px', 
                                    color: 'transparent' 
                                    
                                }
                            });
                        },
                        success: function (data) {
                            $('body').unblock();
                            if (data['status']==true) {
                                $(".chuck:checked").each(function() {  
                                    $(this).parents("td").remove();
                                    window.location.reload();
                                });
                                
                                    swal("","Produk tidak dijual","info");
                                } else {
                                swal("","Terjadi Kesalahan","error");
                            }
                                // unblock hanya untuk div tertentu
                                
                                
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });
                }  
            }  
        });
    });
    $(document).ready(function(){
        $('#checkAllre').on('click', function(e) {
         if($(this).is(':checked',true))  {
            $(".chucks").prop('checked', true);  
         } else {  
            $(".chucks").prop('checked',false);  
         }  
        });
         $('.chucks').on('click',function(){
            if($('.chucks:checked').length == $('.chucks').length){
                $('#checkAllre').prop('checked',true);
            }else{
                $('#checkAllre').prop('checked',false);
            }
         });
        $('.delete-alls').on('click', function(e) {
            var checkedArr = [];  
            $(".chucks:checked").each(function() {  
                checkedArr.push($(this).attr('data-id'));
            });
            if(checkedArr.length <=0)  {  
                alert("pilih salah satu");  
            }else{
                if(confirm("Produk akan dijual ?")){  
                    var strChecked = checkedArr.join(","); 
                    $.ajax({
                        url: "{{ route('product.selectAll.re') }}",
                        type: 'GET',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'checked=' +strChecked,
                        beforeSend:function(){
                            $('body').block({ 
                                message: '<img src="{{asset("img/loading.gif")}}" width="150"/>',
                                overlayCSS:  {  
                                    backgroundColor: 'white',  
                                    opacity:0.7
                                },
                                css: { 
                                    border: 'none', 
                                    padding: '5px',
                                    background: 'transparent', 
                                    '-webkit-border-radius': '10px', 
                                    '-moz-border-radius': '10px', 
                                    color: 'transparent' 
                                    
                                }
                            });
                        },
                        success: function (data) {
                            $('body').unblock();
                            if (data['status']==true) {
                                $(".chucks:checked").each(function() {  
                                    window.location.reload();
                                    $(this).parents("td").remove();
                                });
                                swal("","Produk kamu dijual","success");
                                
                                } else {
                                    swal("","Terjadi Kesalahan","error");
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });
                }  
            }  
        });
    });
</script>
@stack('script')