$(document).ready(function () {
    let table_layout = '.ajax-table';
    let weather_layout = '.ajax-weather';
    let tab_link = '.ajax-tab';
    let paginator_layout = '.ajax-paginator';
    let paginator_link = '.ajax-pagination-link';

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

    function getWeather(){

        $.ajax({
            url: $(weather_layout).data('url'),
            type: 'GET',
        })
            .done(function (data) {
                console.log(data.html);
                $(weather_layout).html(data.html);
            });
    }

    $(document).on('click', paginator_link, function(){
        event.preventDefault();
        getList($(this).attr('href'));
    });

    $(document).on('click', tab_link, function(){
        event.preventDefault();
        $('.nav-tabs>li').removeClass("active");
        $(this).parents('li').addClass("active");
        getList($(this).attr('href'));
    });

    let default_url = $('.nav-tabs>li.active>a').attr('href');
    if(default_url){
        getList(default_url);
    }

    getWeather();
});