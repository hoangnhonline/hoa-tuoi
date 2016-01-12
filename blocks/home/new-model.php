<section class="category-home-block">
        
        <div class="container">
            <h1 class="head-title"><i class="fa fa-hand-o-right"></i> Mẫu hoa mới</h1>
            <ul class="item-list">
              <?php if(!empty($newArr['data'])){ 
              foreach ($newArr['data'] as $value) {                
            ?>
            <li class="col-md-2 col-sm-4 col-xs-6 item">
                <div class="item-inner">
                  <figure class="thumb">
                    <a href="#" title=""><img class="lazy" data-original="<?php echo $value['image_url']; ?>" alt="<?php echo $value['name_'.$lang]; ?>"></a>
                  </figure>
                  <h2 class="tit"><a href="#" title="<?php echo $value['name_'.$lang]; ?>"><?php echo $value['name_'.$lang]; ?></a></h2>
                </div>
              </li><!-- end item -->           
            <?php } } ?>

              
            </ul>
        </div><!-- End /.container -->
      </section><!-- End Section -->