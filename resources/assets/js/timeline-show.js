var chart = c3.generate({
    bindto: '#timeline',
    size: {
        height: 800
    },
    data: {
        xFormat: '%Y-%m',
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
            height: 200,
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
