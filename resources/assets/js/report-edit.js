CKEDITOR.replace('content', {
    language: 'zh_TW'
});
var evt = new Event(),
    m = new Magnifier(evt);
m.attach({
    thumb: '#thumb',
    large: document.getElementById('thumb').src,
    mode: 'inside',
    zoomable: true,
    zoom: 2
});
