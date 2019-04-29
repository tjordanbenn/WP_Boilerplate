/* ==========================================================================
   Avoid 'console' errors in browsers that lack a console.
   ========================================================================== */
(function() { var method; var noop = function () {}; var methods = [ 'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error', 'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log', 'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd', 'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn']; var length = methods.length; var console = (window.console = window.console || {}); while (length--) { method = methods[length]; if (!console[method]) { console[method] = noop; } } }());


jQuery(document).ready(function($){

	// Menu plus icons
  $('.main-navigation li ul').siblings('a').addClass('has-children').before('<a class="plus" href="#" />');
  $('.plus').on("click", function(e){
    var plus = $(this);
      plus.toggleClass('plus-cpen').siblings('ul').slideToggle('fast');
      plus.parent('li').toggleClass('open');
      e.preventDefault();
  });

  // Mobile menu toggle
  $('.menu-toggle').on('click',function(e){
      $(this).toggleClass('active');
      $('.site-navigation').slideToggle('fast');
      $(this).toggleClass('close');
      e.preventDefault();
  });

	// Open links with rel="external" in new window
  $('a[rel="external"]').on("click",function(e){
      window.open($(this).attr('href'));
      e.preventDefault();
  });

  // Smooth page scroll to an anchor on the same page.
  $(function() {
    $('a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });
  });

  // // Page background parallax
  // if($( window ).width() > 480) {
  // if($('.title-section').length) {
  //     var bg = $('.title-section').css('background-image');
  //         bg = bg.replace('url(','').replace(')','').replace(/\"/gi, "");

  //     $('.title-section').css('background', 'none').parallax({
  //         imageSrc: bg,
  //         speed: 0.4
  //     });
  // }}

  // Animations on scroll
  var $animation_elements = $('.animation-element');
  var $window = $(window);

  function check_if_in_view() {
    var window_height = $window.height();
    var window_top_position = $window.scrollTop();
    var window_bottom_position = (window_top_position + window_height);
   
    $.each($animation_elements, function() {
      var $element = $(this);
      var element_height = $element.outerHeight();
      var element_top_position = $element.offset().top;
      var element_bottom_position = (element_top_position + element_height);
   
      //check to see if this current container is within viewport
      if ((element_bottom_position >= window_top_position) &&
          (element_top_position <= window_bottom_position)) {
        $element.addClass('in-view');
      } 
      //else {
       // $element.removeClass('in-view');
      //}
    });
  }

  $window.on('scroll resize', check_if_in_view);
  $window.trigger('scroll');

});
