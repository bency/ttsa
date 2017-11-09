var intervalId = [0, 0, 0];
var start = function (id) {
    let year = (new Date).getFullYear(),
        month = (new Date).getMonth() + 1,
        day = (new Date).getDate(),
        phaseBegin = Date.parse(year + '/' + month + '/' + day + ' 00:00:00') / 1000 + 1;
    intervalId[id] = setInterval(function () {
        let green = parseInt($('#green-' + id).val()),
            red = parseInt($('#red-' + id).val()),
            period = green + red,
            offset = parseInt($('#offset-' + id).val()),
            now = (new Date).getTime() / 1000,
            phase = Math.floor((now - phaseBegin + offset) % period),
            progress1 = $('#progress-' + id + '-1'),
            progress2 = $('#progress-' + id + '-2'),
            progress3 = $('#progress-' + id + '-3'),
            progress4 = $('#progress-' + id + '-4'),
            width1 = (phase <= green) ? phase : 0,
            width2 = ((phase + red) <= period) ? red : (phase + red - period),
            width3 = (phase <= green) ? (green - phase) : green,
            width4 = ((phase + red) <= period) ? 0 : (period - phase),
            countDown = (width4) ? period - width1 - width2 - width3 : period - width1 - width2;
        $('#offset-' + id).prop('min', - parseInt(period / 2));
        $('#offset-' + id).prop('max', parseInt(period / 2));
        $('#show-red-' + id).text(red);
        $('#show-green-' + id).text(green);
        $('#show-offset-' + id).text(offset);
        $('#countdown-' + id).text(countDown);
        progress1.css("width", Math.floor(width1 * 100 / period) + '%');
        progress2.css("width", Math.floor(width2 * 100 / period) + '%');
        progress3.css("width", Math.floor(width3 * 100 / period) + '%');
        progress4.css("width", Math.floor(width4 * 100 / period) + '%');
    }, 100);
};

var startOver = function (i) {
    let id = 0;
    if (typeof i === 'object') {
        id = $(this).data('id');
    } else {
        id = i;
    }
    if (intervalId[id]) {
        clearInterval(intervalId[id]);
    }
    start(id);
};

var toggleForm = function () {
    let id = $(this).data('id');
    $('#form-' + id).toggle();
    $('#location-input-' + id).text($('#location-' + id).val());
    $('#location-label-' + id).toggle();
};

$('.progress').on('click', toggleForm);
$(document).on('change', '.period-control', startOver);
$(document).ready(function () {
    start(1);
    start(2);
});
