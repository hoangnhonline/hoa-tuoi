<section class="category-home-block">        
    <div class="container">
        <h1 class="head-title"><i class="fa fa-hand-o-right"></i> <?php echo $arrText[7]['text_'.$lang]; ?></h1>
        <ul class="item-list">
          <?php if(!empty($newArr['data'])){ 
          foreach ($newArr['data'] as $value) {
            $link = '';
            if($value['parent_id'] > 0) $link.=$model->getAliasById('cate', $value['parent_id'], $lang)."/";
            $link.=$model->getAliasById('cate', $value['id'], $lang).".html"; 
        ?>
        <li class="col-md-2 col-sm-4 col-xs-6 item">
            <div class="item-inner">
              <figure class="thumb">
                <a href="<?php echo $link; ?>" title="<?php echo $value['name_'.$lang]; ?>">
                  <img class="lazy" data-original="<?php echo $value['image_url']; ?>" alt="<?php echo $value['name_'.$lang]; ?>">
                </a>
              </figure>
              <h2 class="tit">
                <a href="<?php echo $link; ?>" title="<?php echo $value['name_'.$lang]; ?>">
                  <?php echo $value['name_'.$lang]; ?>
                </a>
              </h2>
            </div>
          </li><!-- end item -->           
        <?php } } ?>

          
        </ul>
    </div><!-- End /.container -->
  </section><!-- End Section -->