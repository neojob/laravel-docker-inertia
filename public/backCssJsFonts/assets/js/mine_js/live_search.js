$( document ).ready(function() {
    /****************Live Search*********************/
    $('#search').on('keyup',function(){
        var value = $(this).val();
        var url = $(this).data('url');
        if(url == '/admin/subcategories/liveSearch' || url == '/admin/categories/liveSearch'  ){
            var col = 7;
        }else if(url == '/admin/branches/liveSearch'){
            col = 8;
        }else if(url == '/admin/cities/liveSearch'){
            col = 7;
        }else{
            col = 5;
        }
        $.ajax({
            type : 'get',
            url  : url,
            data : {'search': value},
            success:function(data){
                if(data != 'none'){
                    $('#load > tbody').empty();
                    $('tbody').html(data);
                    $('.pagination-numbers-list').show();
                }else{
                    $('#load > tbody').empty();
                    $('tbody').html("<tr><td colspan='" + col + "'><div class='content-live-search'><div class='alert alert-danger'><strong> Empty Result </strong></div></div></td></tr>");
                    $('.pagination-numbers-list').hide();
                }
            }
        });
    });



/****************SELECT 2*********************/
    $(".js-example-placeholder-single").select2({
        placeholder: "Select a state",
        allowClear: true
    });
});