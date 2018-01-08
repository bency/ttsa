$(document).ready(function(){
    var list = document.getElementById('tag-list');
    var input = document.getElementById('tag-input');
    var tagInput = new TagInput(list, input);

    $(document).on('click', '#save', function () {
        var url = $('#uploaded-url').val(),
            taglist = tagInput.getList(),
            data = {url: url, tags: taglist};
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.post('/api/imagetag', data).done(function (ret) {
            createImageBlock(url, taglist);
        });
    });
});
