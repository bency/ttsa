$(document).ready(function(){
    $('.fetch').on('click', function () {
        let id = $(this).data('id');
        $.get('/facebook/fetch/' + id);
    });
})
