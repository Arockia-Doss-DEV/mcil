(function($) {
    'use strict';
    $(function () {
        $("#example-basic2").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            autoFocus: true
        });

        var form = $("#example-form2");
        form.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            onStepChanging: function (event, currentIndex, newIndex)
            {
                console.log("Changed");
                return true;
            },
            onFinishing: function (event, currentIndex)
            {
                window.location.href = 'investors-dashboard.html';
                console.log("Changed hello");
            },
            onFinished: function (event, currentIndex)
            {
                alert("Submitted!");
            }
        });
        $("#example-vertical").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            stepsOrientation: "vertical"
        });
    });
})(jQuery);