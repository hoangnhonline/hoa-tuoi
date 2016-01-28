<?php 
session_start();
date_default_timezone_set ('Asia/Saigon');

require_once 'routes.php';
require_once "models/Home.php";
$model = new Home;

//$mod = isset($_GET['mod']) && in_array($_GET['mod'], array('home', 'detail', 'list','news', 'news-detail')) ? $_GET['mod'] : 'home';
?>
<!doctype html>
<!--[if lt IE 7 ]><html dir="ltr" lang="en-US" class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html dir="ltr" lang="en-US" class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="en-US" class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="en-US" class="no-js ie ie9 lte9"><![endif]-->
<!--[if IE 10 ]><html dir="ltr" lang="en-US" class="no-js ie ie10 lte10"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html>
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home page</title>
<base href="http://<?php echo $_SERVER['SERVER_NAME']; ?>" />
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="robots" content="index,follow" />

<!-- Loading Google Web fonts-->
<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic+SC' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Roboto:200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css' />

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-select.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/font.css" rel="stylesheet">
<link href="css/reset.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/gnav.css" rel="stylesheet">

<link href="css/flexslider.css" rel="stylesheet" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
  <!-- ▼WRAPPER▼ -->
	<div id="wrapper">
   <?php include "blocks/header.php"; ?>
    
    <!-- ▼MAIN▼ -->
    <div id="main-panel">
      <?php if($mod == "home"){ ?>
      <?php include "blocks/home/menu-slide.php"; ?>
      
      <?php include "blocks/home/filter-ads.php"; ?>
      
      <?php include "blocks/home/new-model.php"; ?>
      <?php } ?>
      <section class="main-content">
        <div class="container">      
          <div class="row">
    
              <?php include "page/".$mod.".php"; ?>
              
              <?php include "blocks/sidebar.php"; ?>
              
            </div><!-- End /.row -->
          </div><!-- End /.container -->   
                	            
      </section><!-- End /.main-content --> 
    </div><!-- End #main-panel -->
    
    <div class="page-top">
      <a href="javascript:void(0);"><img src="images/ico-top.png"  alt="page top" width="45" height="45"></a>
    </div><!-- End /.page-top -->
    
  </div><!-- End #wrapper -->

  <?php include "blocks/footer.php"; ?>

<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<!-- Owl Carousel Assets -->
<link href="css/owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="css/owl-carousel/owl.theme.default.min.css" rel="stylesheet">
<script src="js/owl-carousel/owl.carousel.min.js"></script>
<script src="js/lazy.js"></script>
<script>
  new WOW().init();
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('a.lang').click(function(){
      $.ajax({
            url: "process/lang.php",
            type: "POST",
            async: true,           
            data: {
                lang : $(this).attr('data-value')
            },
            success: function(data){
                location.href="http://<?php echo $_SERVER['SERVER_NAME']; ?>";
            }
        });
    });
    $('#load_more').click(function(){
      var obj = $(this);
      var phantrang = <?php echo $phantrang; ?>;
      var total = $('#total_record').val();
      var page_current = obj.attr('data-page');
      var parent_id = obj.attr('data-parent');
      var cate_type_id = obj.attr('data-catetype');
      var total_current = obj.attr('total_current');
      var cate_id = obj.attr('data-cate');
      var conlai = $('#conlai').val();
      $.ajax({
            url: "process/product.php",
            type: "POST",
            async: true,
            dataType : 'json',
            data: {
                cate_type_id : cate_type_id,
                parent_id : parent_id,
                cate_id : cate_id,
                page : parseInt(page_current) + 1,
                conlai : conlai                
            },
            success: function(data){
                $('#product-list-ajax').append(data.html);
                $('#conlai').val(data.conlai);
                $('#span_conlai').html(data.spanconlai);
                obj.attr('data-page', parseInt(page_current) + 1);
                obj.attr('data-total', parseInt(total_current) + parseInt(data.total));
                $("img.lazy").lazyload({
                    effect : "fadeIn"
                });
                if(data.total == 0 || data.conlai == 0){                  
                  $('.load-more-item').hide();
                }
            }
        });
    });
  });
  </script>
<script>

$(document).ready(function() {
  $("img.lazy").lazyload({
      effect : "fadeIn"
  });

  var owl = $('#product-sale-block');
  owl.owlCarousel({
      items:4,
      loop:true,
      margin:0,
      autoplay:true,
      autoplayTimeout:1000,
      autoplayHoverPause:true,
      autoplaySpeed:5000,
      nav:false,
      responsive:{
        0:{
            items:1
        },
        480:{
            items:2
        },
        900:{
            items:3
        },
        1000:{
            items:4
        }
      }
  });
  
  // Go to the next item
  $('.owl-next').click(function() {
      owl.trigger('next.owl.carousel');
  })
  // Go to the previous item
  $('.owl-prev').click(function() {
      owl.trigger('prev.owl.carousel', [300]);
  })

});

</script>
<script src="js/common.js"></script> 
</body>
</html>
