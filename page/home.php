 <!-- ▼CONTENT▼ -->
<div id="content" class="col-md-9">                   
    <?php if(!empty($hotArr['data'])){ 
    foreach ($hotArr['data'] as $value) {      
      $parent_id = $value['parent_id'] == 0 ? $value['id'] : $value['parent_id'];
      $cate_id = $value['parent_id'] > 0 ? $value['id'] : 0;
      $arrDataProduct = $model->getListProduct($cate_type_id, $parent_id, $cate_id, 0, 4);    
    ?>
    <section class="product-gird">
                        
      <div class="title-section"><h1 class="title-inner"><?php echo $value['name_'.$lang]; ?></h1></div>  
                         
      <div class="body-main">                
        <ul class="item-list clearfix">
          <?php if(!empty($arrDataProduct)){ 
            foreach ($arrDataProduct as $value) {                    
          ?>
          <li class="col-md-3 col-sm-4 col-xs-6 item">
            <div class="item-inner">
              <div class="thumb">                            
                <a href="<?php echo $model->getAliasById('cate', $value['cate_id'], $lang); ?>/<?php echo $value['alias_'.$lang]; ?>-<?php echo $value['id']; ?>.html">
                  <img class="lazy" data-original="<?php echo $value['image_url']; ?>" alt="<?php echo $value['name_'.$lang]; ?>" >
                </a>                         
              </div>
              <div class="caption">
                <h2 class="pro-title">
                  <a href="<?php echo $model->getAliasById('cate', $value['cate_id'], $lang); ?>/<?php echo $value['alias_'.$lang]; ?>-<?php echo $value['id']; ?>.html">
                  <?php echo $value['name_'.$lang]; ?>
                  </a>
                </h2>
                <div class="clearfix">
                  <p class="price"><?php echo ($value['price'] > 0) ? number_format($value['price']) : ""; ?> đ</p>
                </div>
                <div><a href="<?php echo $model->getAliasById('cate', $value['cate_id'], $lang); ?>/<?php echo $value['alias_'.$lang]; ?>-<?php echo $value['id']; ?>.html" class="btn btn-detail">Xem chi tiết</a></div>
              </div>
            </div>
          </li><!-- end item -->
          <?php } } ?>

        </ul>
      </div>
    </section><!-- End Section -->  
    <?php } } ?>                                  
    <section class="product-gird product-sale-block">
                        
      <div class="title-section"><h1 class="title-inner">Khuyến mãi</h1></div>  
                         
      <div class="body-main">                
        <ul id="product-sale-block" class="item-list clearfix">
          <?php 
          $arrDataHot = $model->getListProduct($cate_type_id, -1, -1,array('is_sale' => 1), 0, 10);
          ?>
          <?php if(!empty($arrDataHot)){ 
            foreach ($arrDataHot as $value) {              
          ?>
          <li class="item">
            <div class="item-inner">
              <div class="thumb">                            
                <a href="<?php echo $model->getAliasById('cate', $value['cate_id'], $lang); ?>/<?php echo $value['alias_'.$lang]; ?>-<?php echo $value['id']; ?>.html">
                  <img src="<?php echo $value['image_url']; ?>" alt="<?php echo $value['name_'.$lang]; ?>">
                </a>
              </div>
              <div class="caption">
                <h2 class="pro-title">
                  <a href="<?php echo $model->getAliasById('cate', $value['cate_id'], $lang); ?>/<?php echo $value['alias_'.$lang]; ?>-<?php echo $value['id']; ?>.html">
                    <?php echo $value['name_'.$lang]; ?>
                  </a>
                </h2>
                <div class="clearfix">
                  <p class="price-old"><?php echo ($value['price'] > 0) ? number_format($value['price']) : ""; ?> đ</p>
                  <p class="price"><?php echo ($value['price_sale'] > 0) ? number_format($value['price_sale']) : ""; ?> đ</p>
                </div>
                <div>
                  <a href="<?php echo $model->getAliasById('cate', $value['cate_id'], $lang); ?>/<?php echo $value['alias_'.$lang]; ?>-<?php echo $value['id']; ?>.html" class="btn btn-detail">
                  Xem chi tiết
                  </a>
                </div>
              </div>
            </div>
          </li><!-- end item -->
         <?php } } ?>
        </ul>
      </div>
      <?php if(!empty($arrDataHot)){ ?>
      <div class="customNavigation">
        <span class="btn owl-prev"><i class="fa fa-chevron-left"></i></span>
        <span class="btn owl-next"><i class="fa fa-chevron-right"></i></span>
      </div>
      <?php } ?>
    </section><!-- End Section -->      
</div><!-- End #content -->   