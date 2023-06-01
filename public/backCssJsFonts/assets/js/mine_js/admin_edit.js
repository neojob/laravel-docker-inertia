$( document ).ready(function() {

    $(".kv-file-remove").click(function(){
        var id = $(this).data('key');
        // var url = '/admin/articles/removeImg/' + id;


        if($('.main-form').hasClass('prod')){
            var url = '/admin/products/removeImg/' + id;
        }else if($('.main-form').hasClass('customer')){
            var url = '/admin/customers/removeImg/' + id;
        }else if($('.main-form').hasClass('lot')){
            var url = '/admin/lots/removeImg/' + id;
        }else{
            var url = '/admin/articles/removeImg/' + id;
        }



        $.ajax({
            type : 'get',
            url  : url,
            success:function(data){
                if(data == 'ok'){
                    location.reload();
                }else{
                    alert('Something wrong!');
                }
            }
        });
    });

    $(".set-main").click(function(){
        var id = $(this).data('key');

        if($('.main-form').hasClass('prod')){
            var prodId = $('.main-form').data('id');
            var url = '/admin/products/mainImg/' + id + '/' + prodId;
        }else if($('.main-form').hasClass('customer')){
            var prodId = $('.main-form').data('id');
            var url = '/admin/customers/mainImg/' + id + '/' + prodId;
        }else{
            var artId = $('.main-form').data('id');
            var url = '/admin/articles/mainImg/' + id + '/' + artId;
        }



        $.ajax({
            type : 'get',
            url  : url,
            success:function(data){
                if(data == 'ok'){
                     location.reload();
                }else{
                    alert('Something wrong!');
                }
            }
        });
    });




});
