
$(function() {
  
  /* scrollTo */
  
	$('.page-top > a').bind('click',function(){
		$('body,html').animate({ scrollTop: 0 }, 500);
	});
  
  $(window).scroll(function(){
    if ($(this).scrollTop() > 30) {
      $(".page-top").show();
    } else {
      $(".page-top").hide();
    }
  });
 
  
  /* Menu category */
  
  $('.category-nav .tit-box .fa').click(function() {
    $('.category-nav ul.list').slideToggle(300);      
  });
  
  /* Slideshow main */
  
  $('.flexslider').flexslider({
		animation: "slide",
		start: function(slider){
			$('body').removeClass('loading');
		}
	});
  
  
});




