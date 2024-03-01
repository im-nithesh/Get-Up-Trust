(function ($) {
  
  "use strict";

  // // COUNTER NUMBERS
  // jQuery('#main .counter-thumb').appear(function() {
  //   jQuery('#main .counter-number').countTo();
  // });
  
  // CUSTOM LINK
  $('.smoothscroll').click(function(){
    var el = $(this).attr('href');
    var elWrapped = $(el);
    var header_height = $('.navbar').height();

    scrollToDiv(elWrapped,header_height);
    return false;

    function scrollToDiv(element,navheight){
      var offset = element.offset();
      var offsetTop = offset.top;
      var totalScroll = offsetTop-navheight;

      $('body,html').animate({
      scrollTop: totalScroll
      }, 300);
    }
  });

  $(".copy-btn").click(function() {
    // Create a temporary input field
    var $temp = $("<input>");
    $("body").append($temp);

    // Set the value of the input field to the text inside the div
    $temp.val($("#upi-id").text()).select();

    // Execute the copy command
    document.execCommand("copy");

    // Remove the temporary input field
    $temp.remove();
  });

  $(".donate-btn").click(function() {
    $(".donate-section").addClass("active")
  });

  $(".close-btn").click(function() {
    $(".donate-section").removeClass("active")
  });
    
})(window.jQuery);


