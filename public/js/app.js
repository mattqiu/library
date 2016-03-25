$(function(){
    $('#isbn').on('change', function(){
        var bookTitle = $(this).next();
        $.get('/contributions/query/' + $(this).val(), function(response) {
            bookTitle.text(response.title);
        }, 'json');
    });
});