var chart = c3.generate({
    bindto: '#timeline',
    size: {
        height: 400
    },
    data: {
        xFormat: '%Y-%m',
        onclick: function (data, element) {
            let date = data.x,
                yearMonth = date.getFullYear() + '-' + (date.getMonth() + 1),
                timeline_id = location.pathname.split('/')[2];
        },
        columns: []
    },
    zoom: {
        enabled: true,
        rescale: true
    },
    subchart: {
        show: true,
        labels: false,
        size: {
            height: 100,
        }
    },
    axis: {
        x: {
            type: "timeseries",
            tick: {
                fit: true,
                format: "%Y-%m"
            }
        },
        y: {
            label: '報導數量',
            min: 0,
        }
    },
    bar: {
        width: {
            ratio: 10
        }
    }
});
$.get('/api/report/' + location.pathname.split('/')[2]).done(function (ret) {
    chart.load(ret);
});
