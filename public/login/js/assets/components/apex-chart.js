(function() {
    'use strict';

    

    //Chart #3
    var options = {
        chart: {
            height: 350,
            type: 'bar',
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        series: [{
            name: 'Total Investment Amount',
            data: [144, 155, 457, 956, 761, 558, 363, 560, 686,990,220]
        }],
        xaxis: {
            categories: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec'],
        },
        yaxis: {
            title: {
                text: 'USD'
            }
        },
        fill: {
            opacity: 1

        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " USD"
                }
            }
        }
    }

    var chart = new ApexCharts(
        document.querySelector("#month-wise-investment"),
        options
    );

    chart.render();

  
//Chart #3
var options = {
    chart: {
        height: 350,
        type: 'bar',
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    series: [
       {
        name: 'No Of Investments',
        data: [144, 155, 457, 956, 761, 558, 363, 560, 686,990,220]
    }],
    xaxis: {
        categories: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec'],
    },
    yaxis: {
        title: {
            text: 'Thousands'
        }
    },
    fill: {
        opacity: 1

    },
    tooltip: {
        y: {
            formatter: function (val) {
                return val + " Thousands"
            }
        }
    }
}

var chart = new ApexCharts(
    document.querySelector("#additional-investment-bar-chart"),
    options
);

chart.render();
// Number Of New Investments
Morris.Bar({
    element: 'new-investment-bar-chart',
    data: [
        { y: 'Jan', a: 10},
        { y: 'Feb', a: 75},
        { y: 'Mar', a: 50},
        { y: 'Apl', a: 75},
        { y: 'May', a: 50},
        { y: 'June', a: 75},
        { y: 'July', a: 40},
        { y: 'Aug', a: 45},
        { y: 'Sep', a: 40},
        { y: 'Oct', a: 40},
        { y: 'Nov', a: 20},
        { y: 'Dec', a: 47}
    ],
    xkey: 'y',
    ykeys: ['a'],
    labels: ['No Of Investment'],
    lineColors: ['#637CF9'],
    barColors: ['#ffcc66'],
    lineWidth: '2px',
    resize: true,
    redraw: true
});
// pie chart source of income
Morris.Donut({
    element: 'donut-chart',
    data: [
        {value: 70, label: 'Personal Saving / Salary'},
        {value: 15, label: 'Business Income'},
        {value: 10, label: 'Dividends from other entry'},
        {value: 5, label: 'Transactions '},
        {value: 2, label: 'Others'},
    ],
    labelColor: '#637CF9',
    colors: [
        '#ff6666',
        'Orange',
        '#ffcc66',
        '#00cc00',
        '#00a3cc',
        '#cc3300',
    ],
    resize:true,
    formatter: function (x) { return x + "%"}
});
 
    
})(jQuery);
