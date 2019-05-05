$(document).ready(function () {
    let table_layout = '.ajax-table';
    let weather_layout = '.ajax-weather';
    let tab_link = '.ajax-tab';
    let paginator_layout = '.ajax-paginator';
    let paginator_link = '.ajax-pagination-link';

    /*
     * get ajax list
     */
    function getList(url){
        $.ajax({
            url: url,
            type: 'GET',
        })
        .done(function (data) {
            $(table_layout).html(data.html);
            $(paginator_layout).html(data.paginate);
            $('.pagination>li>a').addClass("ajax-pagination-link");
        });
    }

    /*
     * get and display weather
     */
    function getWeather(){

        $.ajax({
            url: $(weather_layout).data('url'),
            type: 'GET',
        })
            .done(function (data) {
                $(weather_layout).html(data.html);
            });
    }

    /*
    * paginator links
     */
    $(document).on('click', paginator_link, function(){
        event.preventDefault();
        getList($(this).attr('href'));
    });

    /*
     * tabs links
     */
    $(document).on('click', tab_link, function(){
        event.preventDefault();
        $('.nav-tabs>li').removeClass("active");
        $(this).parents('li').addClass("active");
        getList($(this).attr('href'));
    });

    /*
     * product price change popover
     */
    $('.js-popover')
        .popover({
            placement : 'top',
            title: 'Enter new price',
            html: true,
            content: function() {
                var _this = this;
                $.ajax({
                    url: $(this).data('form'),
                    type: 'GET',
                    success: function(data){
                        $(_this).attr('data-content',data.html);
                        $(_this).popover('show');
                    }
                });
            }
        });

    /*
     * form change price submit
     * change price in row after submit
     */
    formPrice ='.js-price-update';

    $(document).on('submit', formPrice, function(event){
        event.preventDefault();
        let form = $(this);
        let url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
                $('[data-price-id='+data.id+']').text(data.price);
                $('.js-popover').popover('hide');
            }
        });
    });



    /*
     * load default sorting for orders
     */
    let default_url = $('.nav-tabs>li.active>a').attr('href');
    if(default_url){
        getList(default_url);
    }

    getWeather();
});