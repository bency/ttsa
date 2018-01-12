$.get('/api/report/' + location.pathname.split('/')[2]).done(function (ret) {
    var data = new Array();
    for (i in ret) {
        data.push({
            time: new Date(ret[i].time),
            name: ret[i].name
        });
    }
    var chart = new d3KitTimeline('#timeline', {
        direction: 'right',
        initialHeight: 2250,
        layerGap: 100,
        margin: {left: 100, right: 150},
        labelPadding: {
            left: 20
        },
        scale: d3.time.scale(),
        labella: {
            algorithm: 'simple',
            stubWidth: 100,
        },
        timeFn: function (d) {
            return d.time;
        },
        textFn: d => d.time.getFullYear() + '-' + (d.time.getMonth()) + '-' + d.time.getDate() + ' ' + d.name
    });
    chart.data(data).visualize().resizeToFit();
});
