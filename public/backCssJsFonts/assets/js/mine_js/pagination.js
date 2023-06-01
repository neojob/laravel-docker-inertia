    $(function() {
        $('body').on('click', '.pagination a', function(e) {
            e.preventDefault();

            $('#load a').css('color', '#dfecf6');
            $('#load').append('<img style="position: absolute; width: 150px; left: 40%; top: 10%; z-index: 100000;" ' + 'src="/backCssJsFonts/assets/img/loading_pagination.gif" />');

            var url = $(this).attr('href');
            getArticles(url);
            window.history.pushState("", "", url);
        });

        function getArticles(url) {
            $.ajax({
                url : url
            }).done(function (data) {
                $('.content').html(data);
            }).fail(function () {
                alert('Data could not be loaded.');
            });
        }
    });


