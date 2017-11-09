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
                    var url = ret.data.link;
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
            image.width = 250; // a fake resize
            holder.appendChild(image);
        };

        reader.readAsDataURL(file);
    }    else {
        holder.innerHTML += '<p>Uploaded ' + file.name + ' ' + (file.size ? (file.size/1024|0) + 'K' : '');
        console.log(file);
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
