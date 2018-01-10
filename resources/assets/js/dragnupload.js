let uploadPhotos = function(files) {

    // Read in file
    var file = files[0];
    previewfile(file);
    // Ensure it's an image
    if(file.type.match(/image.*/)) {

        // Load the image
        var reader = new FileReader();
        reader.onload = function (readerEvent) {
            var base64 = readerEvent.target.result.replace(/.*,/, '');
            $.ajax({
                url: 'https://api.imgur.com/3/image',
                headers: {
                    'Authorization': 'Client-ID a5314187be28198'
                },
                type: 'POST',
                data: {
                    'image': base64,
                    'type': 'base64'
                },
                xhr: function () {
                    var xhr = new XMLHttpRequest();
                    xhr.onload = function() {
                      progress.value = progress.innerHTML = 100;
                    };
                    xhr.upload.onprogress = function (event) {
                      if (event.lengthComputable) {
                        var complete = (event.loaded / event.total * 100 | 0);
                        progress.value = progress.innerHTML = complete;
                      }
                    };
                    return xhr;
                },
                success: function(ret, status) {
                    if ('success' != status) {
                        return;
                    }
                    var url = ret.data.link + '?' + ret.data.width + 'x' + ret.data.height;
                    $('#uploaded-url').val(url);
                    console.log(ret);
                }
            });
        }
        reader.readAsDataURL(file);
    }
}

var holder = document.getElementById('holder'),
    tests = {
        filereader: typeof FileReader != 'undefined',
        dnd: 'draggable' in document.createElement('span'),
        formdata: !!window.FormData,
        progress: "upload" in new XMLHttpRequest
    },
    support = {
        filereader: document.getElementById('filereader'),
        formdata: document.getElementById('formdata'),
        progress: document.getElementById('progress')
    },
    acceptedTypes = {
        'image/png': true,
        'image/jpeg': true,
        'image/gif': true
    },
    progress = document.getElementById('uploadprogress'),
    fileupload = document.getElementById('upload');

"filereader formdata progress".split(' ').forEach(function (api) {
    if (tests[api] === false) {
        support[api].className = 'fail';
    } else {
        // FFS. I could have done el.hidden = true, but IE doesn't support
        // hidden, so I tried to create a polyfill that would extend the
        // Element.prototype, but then IE10 doesn't even give me access
        // to the Element object. Brilliant.
        support[api].className = 'hidden';
    }
});

function previewfile(file) {
    if (tests.filereader === true && acceptedTypes[file.type] === true) {
        var reader = new FileReader();
        reader.onload = function (event) {
            var image = new Image();
            image.src = event.target.result;
            image.width = holder.offsetWidth - 20; // border
            holder.appendChild(image);
        };

        reader.readAsDataURL(file);
    }    else {
        holder.innerHTML += '<p class="bg-danger">你上傳的檔案: "' + file.name + '" 不是圖檔喔</p>';
    }
}

if (tests.dnd) {
    holder.ondragover = function () { this.className = 'hover'; return false; };
    holder.ondragend = function () { this.className = ''; return false; };
    holder.ondrop = function (e) {
        this.className = '';
        e.preventDefault();
        uploadPhotos(e.dataTransfer.files);
    }
}
fileupload.querySelector('input').onchange = function (e) {
    uploadPhotos(this.files);
}
document.onpaste = function(event){
    var items = (event.clipboardData || event.originalEvent.clipboardData).items;
    for (index in items) {
        var item = items[index];
        if (item.kind === 'file') {
            var blob = item.getAsFile();
            uploadPhotos([blob]);
        }
    }
}

var createImageBlock = function (url, tags) {
    var div = document.createElement('div'),
        row = document.createElement('div'),
        thumbnail = document.createElement('div'),
        img = document.createElement('img'),
        caption = document.createElement('div'),
        ul = document.createElement('ul'),
        input = document.createElement('input'),
        urlInput = document.createElement('input'),
        result = document.getElementById('result');
    row.setAttribute('class', 'row');
    div.setAttribute('class', 'col-md-12');
    thumbnail.setAttribute('class', 'thumbnail');
    img.src = url;
    urlInput.value = url;
    urlInput.setAttribute('class', 'form-control');
    urlInput.addEventListener('click', function (e) {
        e.target.setSelectionRange(0, e.target.value.length);
    });
    ul.setAttribute('class', 'tag-list');
    input.value = tags.join(',');
    input.setAttribute('class', 'form-control');
    input.setAttribute('placeholder', '新增標籤');
    caption.setAttribute('class', 'caption');
    caption.appendChild(urlInput);
    caption.appendChild(ul);
    caption.appendChild(input);
    thumbnail.appendChild(img);
    div.appendChild(thumbnail);
    div.appendChild(caption);
    new TagInput(ul, input);
    row.append(div);
    result.appendChild(row);
    result.append(document.createElement('hr'));
};
