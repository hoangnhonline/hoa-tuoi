<section class="section-top-home-block">
    <div class="container">
      <div class="row">
        
        <div class="col-sm-3 box-fl">
          <div class="category-nav">
            <h3 class="tit-box"><i class="fa fa-bars"></i> <?php echo $arrText[9]['text_'.$lang]; ?></h3>
            <ul class="list">
              <?php if(!empty($menuDocArr['data'])){ 
                  foreach ($menuDocArr['data'] as $value) {                
                ?>
              <li><a href="<?php echo $value['alias_'.$lang]; ?>.html"><?php echo $value['name_'.$lang]; ?></a></li>
              <?php }} ?>             
            </ul>
          </div><!-- End /.slideshow -->
          
        </div>
        
        <div class="col-sm-9 box-fr">
          <div class="slideshow-block">
            <div class="body-wrap">
              <div class="flexslider">
                 <ul class="slides">
                  <?php
                  if(!empty($slideShowArr)){           
                  foreach($slideShowArr as $img){                
                    $link_url = "";
                    if($img['type_id'] == 2){
                        $link_url = "su-kien/".$img['name_'.$lang]."-".$img['id'].".html";
                    }
                    if($img['type_id'] == 3){
                        $link_url = $img['link_url'];
                    }
                  ?>
                  <li>
                    <?php if($link_url!=""){ ?><a href="<?php echo $link_url;?>"><?php } ?>
                    <img src="<?php echo $img['image_url']; ?>" alt="<?php echo $img['name_'.$lang]; ?>"/>
                    <?php if($link_url!=""){ ?></a><?php } ?>
                  </li>
                  <?php } } ?>
                  
                 </ul>
              </div>
            </div>
          </div><!-- End /.slideshow-block -->
        </div>           
        
      </div>
    </div><!-- End /.container -->
  </section><!-- End Section -->