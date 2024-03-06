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
    
    if (!navigator.clipboard) {
      var $temp = $("<input>").appendTo("body"); // Create a temporary input field and append to body
      
      $temp.val($("#upi-id").text()).select(); // Set the value of the input field to the text inside the div
      
      document.execCommand("copy"); // Execute the copy command - Old School Method (Support All type of Browser But Deprecated)

      // Remove the temporary input field
      $temp.remove();
    }

    else{
      navigator.clipboard.writeText($("#upi-id").text()) // Execute the copy command - New Method (Does Not Support All type of Browser)
    }
    
    $('.copy-info').html('Copied');
    $('.copy-btn').addClass('visited');

  });

  
  $('.copy-btn').mouseout(function() {
    $('.copy-btn').removeClass('visited')
    $('.copy-info').html('Copy')
  });

  $(".donate-btn").click(function() {
    $(".donate-section").addClass("active")
  });

  $(".close-btn").click(function() {
    $(".donate-section").removeClass("active")
  });
    
})(window.jQuery);


