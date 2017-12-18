
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
                id: 1,
                name: '市民大道承德路路口',
                green: 75,
                red: 125,
                offset: 0,
            },
            {
                id: 2,
                name: '錦州街',
                green: 30,
                red: 90,
                offset: 0,
            },
            {
                id: 3,
                name: '汀州路',
                green: 45,
                red: 75,
                offset: 0,
            }
        ]
};
var intersect = new Vue({
    el: '#intersect',
    data: data,
    methods: {
        changeGreen: function (event) {
            console.log(this.intersecions[0]);
        },
        resetInterval: function () {
            var vm = this;
            clearInterval(this.interval);
            this.interval = setInterval(function () {
            }, this.updateInterval);
        }
    }
});
