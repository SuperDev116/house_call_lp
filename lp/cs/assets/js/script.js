//@prepros-prepend plugins/slick.min.js
//@prepros-prepend plugins/scrolla.min.js

// scrolla
$('.container, .animate').scrolla({
  mobile: true,
  once: true
});

// link in page
$(function () {
  var headerHight = 100; //ヘッダの高さ
  $("a[href^='#']").click(function(){
    var href= $(this).attr("href");
      var target = $(href == "#" || href == "" ? 'html' : href);
      var position = target.offset().top-headerHight; //ヘッダの高さ分位置をずらす
    $("html, body").animate({scrollTop:position}, 550, "swing");
      return false;
  });
});

// go to top
$(document).ready(function() {
  var pagetop = $('#go-to-top');
    $(window).scroll(function () {
       if ($(this).scrollTop() > 100) {
        pagetop.fadeIn();
       } else {
        pagetop.fadeOut();
        }
       });
       pagetop.click(function () {
         $('body, html').animate({ scrollTop: 0 }, 500);
          return false;
   });
});