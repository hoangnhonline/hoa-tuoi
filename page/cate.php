<!-- ▼CONTENT▼ -->
  <div id="content" class="col-md-9">
      <section class="breadcrumb">
        <ul class="clearfix">
          <li><a href="<?php echo "http://".$_SERVER['SERVER_NAME']; ?>"><?php echo $arrText[16]['text_'.$lang]; ?></a></li>
          <?php 
          if($parent_id > 0){
          ?>
          <li><a href="<?php echo $model->getAliasById('cate', $parent_id, $lang);?>.html"><?php echo $model->getNameById('cate', $parent_id, $lang); ?></a></li>
          <?php } ?>
          <?php 
          if($cate_id > 0){
            $link = "";
            if($parent_id > 0) $link.=$model->getAliasById('cate', $parent_id, $lang)."/";
            $link.=$model->getAliasById('cate', $cate_id, $lang).".html";
          ?>
          <li><a href="<?php echo $link; ?>"><?php echo $model->getNameById('cate', $cate_id, $lang); ?></a></li>
          <?php } ?>
        </ul>
      </section>
      <?php if(!empty($productArr['data'])){ ?>
      <div class="product-filter-option">
        <label>Sắp xếp theo</label>
        <div class="btn-group" role="group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Mặt định
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="#">Giá từ thấp tới cao</a></li>
            <li><a href="#">Giá từ cao tới thấp</a></li>
            <li><a href="#">Tên: A -> Z</a></li>
            <li><a href="#">Tên: Z -> A</a></li>
          </ul>
        </div>
      </div>
      <?php } ?>
      <section class="product-gird">
                           
        <div class="body-main">
        <?php if(!empty($productArr['data'])){ ?>                
          <ul class="item-list clearfix" id="product-list-ajax">
            <?php foreach ($productArr['data'] as $value) { ?>
            <li class="col-md-3 col-sm-4 col-xs-6 item">
              <div class="item-inner">
                <div class="thumb">                            
                  <a href="<?php echo $model->getAliasById('cate', $value['cate_id'], $lang); ?>/<?php echo $value['alias_'.$lang]; ?>-<?php echo $value['id']; ?>.html">
                    <img class="lazy" data-original="<?php echo $value['image_url']; ?>" alt="<?php echo $value['name_'.$lang]; ?>">
                  </a>
                </div>
                <div class="caption">
                  <h2 class="pro-title">
                    <a href="<?php echo $model->getAliasById('cate', $value['cate_id'], $lang); ?>/<?php echo $value['alias_'.$lang]; ?>-<?php echo $value['id']; ?>.html">
                      <?php echo $value['name_'.$lang]; ?>
                    </a>
                  </h2>
                  <div class="clearfix">
                    <?php if($value['is_sale'] > 0 && $value['price_sale'] > 0){ ?>
                    <p class="price-old"><?php echo number_format($value['price']); ?> đ</p>
                    <p class="price"><?php echo number_format($value['price_sale']); ?> đ</p>
                    <?php }else{ ?>
                    <p class="price"><?php echo number_format($value['price']); ?> đ</p>
                    <?php } ?>
                  </div>
                  <div>
                    <a href="<?php echo $model->getAliasById('cate', $value['cate_id'], $lang); ?>/<?php echo $value['alias_'.$lang]; ?>-<?php echo $value['id']; ?>.html" class="btn btn-detail">
                      Xem chi tiết
                    </a>
                  </div>
                </div>
              </div>
            </li><!-- end item -->
            <?php } ?>
          </ul>
          <?php } ?>
        </div>
      </section><!-- End Section -->
      <?php if(!empty($productArr['data']) ){ ?>
      <input type="hidden" id="total_record" value="<?php echo $arrTotal['total']; ?>">
      <?php $cate_id_show = $cate_id == 0 ? $parent_id : $cate_id; ?>
      <?php if($arrTotal['total'] > $phantrang){ ?>
      <div class="load-more-item">
        <a data-page="<?php echo $page; ?>" data-catetype="<?php echo $cate_type_id; ?>" data-parent="<?php echo $parent_id; ?>" data-cate="<?php echo $cate_id; ?>" data-total="<?php echo $phantrang; ?>" id="load_more" href="javascript:void(0);" class="block btn btn-success fs18 text-uppercase">
          Xem thêm, còn
          <input type="hidden" id="conlai" value="<?php echo ($arrTotal['total'] - $phantrang); ?>"> 
          <span id="span_conlai"><?php echo number_format($arrTotal['total'] - $phantrang); ?></span> sản phẩm <?php echo $model->getNameById('cate', $cate_id_show, $lang); ?> 
          <i class="fa fa-arrow-down"></i></a>
        </div>
        <?php } ?>
           <?php }else{
            echo "<h3 style='margin-top:30px;text-align:center'>Chưa có sản phẩm nào!</h3>";
           } ?>
  </div><!-- End #content -->
