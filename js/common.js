
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

  
  $(document).ready(function() {
   var maxHeight = -1;

   $('.product-gird .item').each(function() {
     maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
   });

   $('.product-gird .item').each(function() {
     $(this).height(maxHeight);
   });
 });
 
 //auto height
	$.fn.tile = function(columns) {
		var tiles, max, c, h, last = this.length - 1, s;
		if(!columns) columns = this.length;
		this.each(function() {
			s = this.style;
			if(s.removeProperty) s.removeProperty("height");
			if(s.removeAttribute) s.removeAttribute("height");
		});
		return this.each(function(i) {
			c = i % columns;
			if(c == 0) tiles = [];
			tiles[c] = $(this);
			h = tiles[c].height();
			if(c == 0 || h > max) max = h;
			if(i == last || c == columns - 1)
				$.each(tiles, function() { this.height(max); });
		});
	};
	$(window).load(function(){
		$('.product-gird .item').tile(4);
	});
  
  
});




