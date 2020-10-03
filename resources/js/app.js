require('./bootstrap');
require('flatpickr');
require('inputmask');
var drawVisitsGraph = require('./app-chart.js');

(function () {
    'use strict';

    flatpickr('#date', {});

    var phoneInput = document.getElementById('phone');
    if (phoneInput) {
        var im = new Inputmask('9-999-999-9999');
        im.mask(phoneInput);
    }

    if ($('#chart').length) {
        drawVisitsGraph();
    }
})();
