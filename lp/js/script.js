jQuery(document).ready(function () {


//■ハンバーガー
jQuery(function(){
  jQuery('.humb').on('click', function() {
	jQuery('html, body').toggleClass('lock');
    jQuery(this).toggleClass('opened');
    jQuery('#modalmenu').toggleClass('active');
    return false;
  });
});

jQuery('#modalmenu a').on('click', function() {
    jQuery('.humb').removeClass('opened');
    jQuery('#modalmenu').removeClass('active');
	jQuery('html, body').removeClass('lock');
});

jQuery('#modalmenu').on('click', function() {
    jQuery('#modalmenu').removeClass('active');
    jQuery('.humb').removeClass('opened');
	jQuery('html, body').removeClass('lock');
});


//■CTA/GOTOPボタンの出現
var pagetop = jQuery('.fadeup');
	if (window.innerWidth >= 799) {
jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 100) {
        pagetop.fadeIn();
    } else {
        pagetop.fadeOut();
    }
 });
}
});



//■スムーズスクロール
jQuery(function () {
	if (window.innerWidth <= 799) {
	var headerHight = 40;
	} else {
	var headerHight = 75;
	}
jQuery("a[href^='#']").click(function(){
    var href= jQuery(this).attr("href");
    var target = jQuery(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top-headerHight;
    jQuery("html, body").animate({scrollTop:position}, 550, "swing");
    return false;
  });
});