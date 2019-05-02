$(document).ready(function () {
    let table_layout = '.ajax-table';
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

    getList('http://localhost/ajax/orders-all');
});