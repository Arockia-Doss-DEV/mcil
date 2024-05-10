"use strict";
/*
 * jQuery plugin to show images and pdf files preview
 * https://github.com/guillermodiazga/EZView
 *
 * Copyright 2017, Guillermo Diaz
 *
 * Licensed under the MIT license:
 * https://opensource.org/licenses/MIT
 */
var $ = jQuery;

if (!$){
    window.console.log('jQuery is requiered');
}

$.fn.EZView = function(){
    var self    = this,
        iFramesSupported = true,
        arIndex = [],
        index   = 0,
        icons   = {
            'eznext'     : SITE_URL+'/img/media/right-arrow.png',
            'ezback'     : SITE_URL+'img/media/left-arrow.png',
            'download' : SITE_URL+'img/media/download-file.png',
            'zoomin'   : SITE_URL+'img/media/zoom-in.png',
            'zoomout'  : SITE_URL+'img/media/zoom-out.png',
            'ezclose'  : SITE_URL+'img/media/close.png',
        };
        
        var $EZView = null;
        
        if ($('#EZView').length) {
            $('#EZView').remove();
        }
        
    self.createContainer = function(){

        if (!$('#EZView').length) {

            var tools =
                '<div class="tools-container">'+
                    '<span class="name"><b></b></span>'+
                    '<span class="tools">'+
                        '<a class="zoomin EZViewHighlight" href="">'+
                        '<img src="'+icons.zoomin+'" alt="Zoomin" /></a>'+
                        '<a class="zoomout EZViewHighlight" href="">'+
                        '<img src="'+icons.zoomout+'" alt="Zoomout" /></a>'+
                    '</span>'+
                    '<a class="ezclose EZViewHighlight" href="">'+
                    '<img src="'+icons.ezclose+'"/></a>'+
                '</div>',
                container = '<div class="object"/>'+
                        '<a class="ezback EZViewHighlight"><img src="'+icons.ezback+'" alt="Back" /></a>'+
                        '<a class="eznext EZViewHighlight"><img src="'+icons.eznext+'" alt="Next" /></a>'+
                        tools,
                template = '<div id="EZView" class="hide row m-0" style="display: flex; align-items: center; justify-content: center">'+container+'</div>';

            $('body').append(template);

            $EZView = $('#EZView');

            self.addEvents();
        }
    };

    self.isImg = function(imgIndex){
        return arIndex[imgIndex].isImg;
    };

    self.showOrHideControls = function(imgIndex){
        var href = arIndex[imgIndex].href,
            name = arIndex[imgIndex].name;

       if (self.isImg(imgIndex)) {
            $('.zoomin, .zoomout').fadeIn(200);
        }else{
            $('.zoomin, .zoomout').fadeOut(200);
        }

        $('.download').attr('href', href);

        $('.name>b').html(name);

        if (imgIndex > 0) {
            $('.ezback').fadeIn(200);
        }else{
            $('.ezback').fadeOut(200);
        }

        if (imgIndex < arIndex.length-1) {
            $('.eznext').fadeIn(200);
        }else{
            $('.eznext').fadeOut(200);
        }
    };

    self.builtObjectTemplate = function(index){
        var src   = arIndex[index].href,
            isPdf = src.match('.pdf');

        // Content to show
        var content = '<img index-render="'+index+'" src="'+src+'" class="content" />';

        // To show pdf files
        if (isPdf) {
            content = '<iframe frameborder="0" index-render="'+index+'" height="'+$(window).height()*0.95+'" width="'+$(window).width()*0.9+
                '" src="'+src+'" type="application/pdf"><p>Your browser does not support iframes.</p>'+
                '<script type="text/javascript">iFramesSupported = false; alert(iFramesSupported)</script><iframe/>';

            arIndex[index].isImg = false;
        }

        return [content, index];
    };

    self.setObjectTemplate = function(object){

        // Append object to body
         $EZView.find('.object').append(object[0])

         // Stop propagation
        .find('.download, img').click(function(e){
            // Avoid trigger remove action
            e.stopPropagation();
        });

        // If no and image show unsuported msg
        $('[index-render='+object[1]+']').on( "error",function() {
            $(this).replaceWith('<h1 index-render="'+index+'" style="padding: 10px; border-radius: 10px; background-color: rgba(255,255,255,0.6)">Unsupported preview</h1>');
            arIndex[index].isImg = false;
        });


        self.setStyles();

        self.showOrHideControls(object[1]);
    };

    self.setStyles = function(){
        // Set Styles
        $EZView.css({
            'background-color': 'rgba(0, 0, 0, 0.62)',
            'height':           '100%',
            'width':            '100%',
            'z-index':          '10000',
            'position':         'fixed',
            'top':              '0',
            'left':             '0',
            'cursor':           'default',
            'aling-items':      'center',
            'margin':           'auto',
        })
        .find('.content').css({
            'max-width':  $(window).width()*0.7,
            'max-height': $(window).height()*0.9,
            'z-index':    '10001',
        }).end()
        .find('.name').css({
            'display': 'flex',
            'align-items': 'center',
            'justify-content': 'center',
            'padding':  '7px',
            'color':  '#fff',
        }).end()
        .find('.ezclose').css({
            'top':      '0',
            'right':    '0',
            'position': 'absolute',
        }).end()
        .find('.ezback>img').css({
            'top': $(window).height()*0.5,
            'left': '0',
            'position': 'fixed',
        }).end()
        .find('.eznext>img').css({
            'top': $(window).height()*0.5,
            'right': '0',
            'position': 'fixed',
        }).end()
        .find('.tools-container').css({
            'background-color': 'rgba(0, 0, 0, 0.62)',
            'height':           '50px',
            'width':            '100%',
            'position':         'absolute',
            'top':              '0',
            'left':             '0',
            'padding':          '3px',
            'padding-top':       '10px',
            'z-index':          '100000'
        }).end()
        .find('.tools-container>a').css({
            'margin' : '10px',
        }).end()
        .find('.tools').css({
            'top':      '0',
            'left':    '0',
            'position': 'fixed',
        }).end()
        .find('.EZViewHighlight>img').css({
            'padding': '10px',
            'height':  'auto',
            'width':   'auto',
            'z-index': '100000',
            'cursor':  'pointer',
        }).end()
        .find('.EZViewHighlight>img').hover(
            function(){
                $(this).css({
                    'border-radius':    '100%',
                    'background-color': 'rgba(255,255,255,0.5)',
                    'z-index':          '100000'
                });
            },
            function(){
                $(this).css({
                    'background-color': '',
                    'border-radius':    '',
                });
            }
        );
    };

    self.keyupEvents = function(e){
        var keyCode = e.keyCode;

        switch(keyCode){
        // Esc
        case 27:
            self.close();
            break;

        // Next
        case 39:
            self.eznext();
            break;

        // Back
        case 37:
            self.ezback();
            break;

        // zoomin
        case 107:
            self.zoom(true);
            break;

        // zoomout
        case 109:
            self.zoom();
            break;
        }
    };

    self.close = function (){
        // Hide EZView elements
        $EZView.hide(200).find('[index-render]').hide();

        // Remove keyup events
        $(window).off('keyup', null, self.keyupEvents);
    };

    self.zoom = function (increment){
        if (!self.isImg(index)) {
            return;
        }

         var $img   = $('[index-render='+index+']', '#EZView'),
             height = parseInt($img.css('height')),
             width  = parseInt($img.css('width'));

        // Avoid lose imng proportions on zoom in
        $img.css({
            'max-width': '',
            'max-height': '',
        });

        // Enable drag
        if ($.fn.draggable) {
            $img.draggable()
            .css({'cursor': 'move'});
        }

        // Increase or decrease size
        if (increment) {
            height+=height*0.2;
            width+=width*0.2;
        }else{
            height-=height*0.2;
            width-=width*0.2;
        }

        $img.animate({
            'height': (height)+'px',
            'width': (width)+'px'
        }, 200);
    };

    self.addEvents = function(){

        // Main container
        $EZView

        // Add close Event
        .click(function(e){
            e.stopPropagation();
            e.preventDefault();

            self.close();
        })

        // Add close Event
        .find('.ezclose>img').click(function(e){
            e.preventDefault();
            e.stopPropagation();
            self.close();
        }).end()

        // Stop propagation
        .find('.download, img, .tools').click(function(e){
            // Avoid trigger remove action
            e.stopPropagation();
        }).end()

        // Add back event
        .find('.ezback>img').click(function(e){
            e.stopPropagation();
            e.preventDefault();
            self.ezback();
        }).end()

        // Add next event
        .find('.eznext>img').click(function(e){
            e.stopPropagation();
            e.preventDefault();
            self.eznext();
        }).end()

        // Add prevent default
        .find('.zoomin, .zoomout, .ezclose').click(function(e){
            e.stopPropagation();
            e.preventDefault();
        }).end()

        // Add zoomin event
        .find('.zoomin>img').click(function(e){
            e.stopPropagation();
            e.preventDefault();
            self.zoom(true);
        }).end()

        // Add zoomout event
        .find('.zoomout>img').click(function(e){
            e.stopPropagation();
            e.preventDefault();
            self.zoom();
        }).end();
    };

    self.eznext = function(){
        var newIndex = index+1;

        // Check if the element exists
        if(!$('[index='+newIndex+']:visible').length && newIndex < arIndex.length){
            $('[index-render='+index+']').hide();
            index += 1;
            return self.next();
        }

       self.goTo(newIndex);
    };

    self.ezback = function(){
        var newIndex = index-1;

        // Check if the element exists
        if(!$('[index='+newIndex+']:visible').length  && newIndex > 0){
            $('[index-render='+index+']').hide();
            index -= 1;
            return self.back();
        }

        self.goTo(newIndex);
    };

    self.goTo = function(newIndex){

        if (arIndex[newIndex]) {

            if (arIndex[newIndex].isRender) {
                $('[index-render='+index+']').slideUp();
                $('[index-render='+newIndex+']').slideDown();
                self.showOrHideControls(newIndex);
            }else{
                $('[index-render='+index+']').slideUp();
                self.setObjectTemplate(self.builtObjectTemplate(newIndex));
                $('[index-render='+newIndex+']').hide().slideDown();
                arIndex[newIndex].isRender = true;
            }

            index = newIndex;
        }
    };

    self.init = function(e){
        //Create main container if not exists
        self.createContainer();

        index = parseInt($(e.target).attr('index'));
        self.showOrHideControls(index);

        if (arIndex[index].isRender) {
            $('[index-render='+index+']').show();
        }else{
            self.setObjectTemplate(self.builtObjectTemplate(index));
            arIndex[index].isRender = true;
            $('[index-render='+index+']').show();
        }

        // Add keyup events
        $(window).off('keyup', null, self.keyupEvents).keyup(self.keyupEvents);

        // Show EZView
        $EZView.show(200);
    };

    // Iterate each element and set the click event
    return $(this).each(function(i, el){
        var $el = $(el);

        // Get data requiered to navigate between elements
        arIndex[i]          = [];
        arIndex[i].href     = $el.attr('href')   || $el.attr('src');
        arIndex[i].name     = $.trim($el.html()).substring(0,30) || $el.attr('alt').substring(0,30) || '';
        arIndex[i].isRender = false;
        arIndex[i].isImg    = true;

        // Set index on each element
        $el.attr('index', i);

        // Add cursor pointer
        $el.css({cursor: 'pointer'});

        // Add events to each elements
        $(this).click(function(e){
            e.preventDefault();
            e.stopPropagation();

            self.init(e);

        });
    });
};

