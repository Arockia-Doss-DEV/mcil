(function() {
    'use strict';
  
    //admin pie chart
    Morris.Donut({
        element: 'donut-chart',
        data: [
            {value: 70, label: 'Initial Investment'},
            {value: 15, label: 'Additional Investment'},
            
        ],
        labelColor: '#637CF9',
        colors: [
            '#ff6666',
            'Orange',
           
        ],
        resize:true,
        formatter: function (x) { return x + "%"}
    });
     
})(jQuery);
