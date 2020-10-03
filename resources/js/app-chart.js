require('chart.js');

module.exports = function drawVisitsGraph() {
    var
        dataEl = $('.chart'),
        labelsStr,
        valuesStr,
        labelsArr,
        valuesArr;

    labelsStr = dataEl.data('labels');
    labelsStr = labelsStr.toString();
    valuesStr = dataEl.data('values');
    valuesStr = valuesStr.toString();
    if (labelsStr !== '') {
        labelsArr = labelsStr.split(',');
    }
    if (valuesStr !== '') {
        valuesArr = valuesStr.split(',');
    }
    if (!$.isArray(labelsArr) || !$.isArray(valuesArr)) {
        return;
    }

    var data = {
        labels: labelsArr,
        datasets: [
            {
                label: 'Сотрудник',
                fill: true,
                lineTension: 0.1,
                backgroundColor: 'rgba(75,192,192,0.4)',
                borderColor: 'rgba(75,192,192,1)',
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: 'rgba(75,192,192,1)',
                pointBackgroundColor: '#fff',
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: 'rgba(75,192,192,1)',
                pointHoverBorderColor: 'rgba(220,220,220,1)',
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: valuesArr,
                spanGaps: false
            }
        ]
    };

    new Chart(document.getElementById('chart'), {
        type: 'line',
        data: data,
        width: 300,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        stepSize: 1
                    }
                }]
            },
            legend: {
                display: false
            }
        }
    });
}
