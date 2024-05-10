(function() {
    'use strict';
    //Bar chart
    Morris.Bar({
        element: 'bar-chart',
        data: [
            { y: 'Jan', a: '100k'},
            { y: 'Feb', a: '100k'},
            { y: 'Mar', a: '200k'},
            { y: 'Apl', a: '300k'},
            { y: 'May', a: '400k'},
            { y: 'June',a: '400k'},
            { y: 'July',a:'600k'},
            { y: 'Aug', a: '900k'},
            { y: 'Sep', a: '800k'},
            { y: 'Oct', a: '700k'},
            { y: 'Nov', a: '300k'},
            { y: 'Dec', a: '400k'}
        ],
        xkey: 'y',
        ykeys: ['a'],
        
        labels: ['No Of Investment'],
        lineColors: ['#637CF9'],
        barColors: ['#637CF9'],
        lineWidth: '2px',
        resize: true,
        redraw: true
    });
    // additional
    Morris.Bar({
        element: 'additional-investment-bar-chart',
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
        barColors: ['#cc3300'],
        lineWidth: '2px',
        resize: true,
        redraw: true
    });
      // new
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

    //admin pie chart
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
