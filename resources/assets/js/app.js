
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

var data = {
        intersecions: [
            {
                id: 0,
                name: '市民大道中山北路路口',
                green: 65,
                red: 115,
                offset: 0,
                countDown: 0,
                width: [],
            },
            {
                id: 1,
                name: '市民大道承德路路口',
                green: 75,
                red: 125,
                offset: 0,
                countDown: 0,
                width: [],
            },
            {
                id: 2,
                name: '錦州街',
                green: 30,
                red: 90,
                offset: 0,
                countDown: 0,
                width: [],
            },
            {
                id: 3,
                name: '汀州路',
                green: 45,
                red: 75,
                offset: 0,
                countDown: 0,
                width: [],
            },
            {
                id: 4,
                name: '基隆辛亥路口基隆路南下',
                green: 120,
                red: 120,
                offset: -101,
                countDown: 0,
                width: [],
            },
            {
                id: 5,
                name: '基隆辛亥路口辛亥路南下',
                green: 50,
                red: 190,
                offset: -45,
                countDown: 0,
                width: [],
            },
            {
                id: 6,
                name: '羅斯福路辛亥路路口',
                green: 57,
                red: 93,
                offset: 0,
                countDown: 0,
                width: [],
            }
        ],
        updateInterval: 500,
        interval: []
};
var intersect = new Vue({
    el: '#intersect',
    data: data,
    methods: {
        changeSetting: function (id, type) {
            this.resetInterval(id);
        },
        resetInterval: function (id) {
            var vm = this;
            let year = (new Date).getFullYear(),
                month = (new Date).getMonth() + 1,
                day = (new Date).getDate(),
                phaseBegin = Date.parse(year + '/' + month + '/' + day + ' 00:00:00') / 1000 + 1;
            clearInterval(vm.interval[id]);
            vm.interval[id] = setInterval(function () {
                var green = parseInt(vm.intersecions[id].green),
                    red = parseInt(vm.intersecions[id].red),
                    period = green + red,
                    offset = parseInt(vm.intersecions[id].offset),
                    now = (new Date).getTime() / 1000,
                    width = [],
                    phase = Math.floor((now - phaseBegin + offset) % period);
                width[0] = (phase <= green) ? phase : 0;
                width[1] = ((phase + red) <= period) ? red : (phase + red - period);
                width[2] = (phase <= green) ? (green - phase) : green;
                width[3] = ((phase + red) <= period) ? 0 : (period - phase);
                vm.intersecions[id].countDown = (width[3]) ? period - width[0] - width[1] - width[2] : period - width[0] - width[1];
                $('#offset-' + id).prop('min', - parseInt(period / 2));
                $('#offset-' + id).prop('max', parseInt(period / 2));
                let max = 100;
                for (let i = 3; i >= 0; i--) {
                    if (max > width[i]) {
                        vm.intersecions[id].width[i] = width[i];
                        max = max - width[i];
                    } else {
                        vm.intersecions[id].width[i] = max;
                        max = 0;
                    }
                }
            }, vm.updateInterval);
        }
    },
    mounted: function () {
        var vm = this;
        this.$nextTick(function () {
            let length = vm.intersecions.length;
            for (let i = 0; i < length; i++) {
                vm.resetInterval(vm.intersecions[i].id);
            }
        });
    }
});
