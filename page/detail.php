<!-- ▼CONTENT▼ -->
<?php $urlShare = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];   
?>
<div id="content" class="col-md-9">                

    <section class="breadcrumb">
      <ul class="clearfix">
        <li><a href="<?php echo "http://".$_SERVER['SERVER_NAME']; ?>">Trang chủ</a></li>
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
    
    <section class="product-detail">
    
    <div class="row product-detail-top">
      <div class="col-md-6">
        <div class="box-fl">
          <div class="product-thumb">
            <div class="thumb-big" style="text-align:center">
              <img src="<?php echo $detail['image_url']; ?>" alt="<?php echo $detail['name_'.$lang]; ?>" class="thumb">
            </div>
          </div>
          <div class="product-info">
            <div class="row-gird code">
              <label class="lbl">Mã SP: </label>
              <span class="code-num">RBS001</span>
            </div>
            <?php if($detail['is_sale'] > 0 && $detail['price_sale'] > 0){ ?>
            <div class="row-gird">
              <label class="lbl">Giá cũ: </label>
              <span class="price-old"><?php echo number_format($detail['price']); ?> đ</span>
            </div>
            <div class="row-gird">
              <label class="lbl">Giá mới: </label>
              <span class="price"><?php echo number_format($detail['price_sale']); ?> đ</span>
            </div>
            <?php }else{ ?>
            <div class="row-gird">
              <label class="lbl">Giá: </label>
              <span class="price"><?php echo number_format($detail['price']); ?> đ</span>
            </div>
            <?php } ?>
            <div class="row-gird">
              <button type="submit" id="" class="btn btn-addtocart btn-primary">Mua ngay</button>
            </div>
          </div>
        </div>
        
      </div><!-- end col -->
      
      <div class="col-md-6">
        <h1 class="product-name"><?php echo $model->getNameById('cate', $cate_id, $lang); ?> - <?php echo $detail['name_'.$lang]; ?></h1>
        <div class="product-desc"><?php echo $detail['description_'.$lang]; ?></div>        
        <?php if($detail['gift_'.$lang]!=''){ ?>
        <div class="promotion">
          <h4 class="tit">Khuyến mãi***</h4>
          <p><?php echo $detail['gift_'.$lang]; ?></p>
        </div>
        <?php } ?>
        <?php if($detail['note_'.$lang]!=''){ ?>
        <div id="ctl00_cphContent_ucItemDetails_pnlLimited" class="sub_desc even">
          <h4>Lưu ý: Hoa chỉ có ở Hồ Chí Minh</h4>
          <p>Sản phẩm hoa tươi bạn đang chọn là sản phẩm được thiết kế đặc biệt!</p>
          <p>Hiện nay, Nguyen Tin Flower chỉ thử nghiệp cung cấp cho thị trường <strong>Tp. Hồ Chí Minh</strong></p>
        </div>
        <?php } ?>
        <ul class="benefit">
          <li>Tặng thiệp miễn phí</li>
          <li>Giảm ngay 20.000đ khi mua online</li>
          <li>Giảm tiếp 3% cho đơn hàng thứ 2, 5% cho đơn hàng thứ 6 và 10% cho đơn hàng thứ 12&nbsp;<em>(Chỉ áp dụng Tp. HCM)</em></li>
          <li>Giao miễn phí nội thành 63/63 tỉnh</li>
          <li>Giao gấp trong vòng 2 giờ</li>
          <li>Cam kết 100% hoàn lại tiền nếu không hài lòng</li>
          <li>Cam kết hoa tươi trên 3 ngày</li>
        </ul>
        
        <ul class="social-list">
          <li><a class="fb" title="Facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $urlShare; ?>&amp;t=<?php echo $detail['name_'.$lang]; ?>&p[images][0]=http://<?php echo $_SERVER['SERVER_NAME']?>/<?php echo $detail['image_url']; ?>" target="_blank">Facebook</a></li>
          <li><a class="tw" title="Twitter" href="https://twitter.com/intent/tweet?source=webclient&amp;text=<?php echo $detail['name_'.$lang]; ?> <?php echo $urlShare; ?>" target="_blank">Twitter</a></li>
          <li><a class="g" title="Google +" href="https://plus.google.com/share?url=<?php echo $urlShare; ?>" target="_blank">Google +</a></li>
        </ul>
        
      </div><!-- end cold -->
    </div><!-- end row -->
    
    <div class="tabs-customize">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#thongtinchitiet" aria-controls="thongtinchitiet" role="tab" data-toggle="tab">Thông tin chi tiết</a></li>
        <li role="presentation"><a href="#huongdanthanhtoan" aria-controls="huongdanthanhtoan" role="tab" data-toggle="tab">Hướng dẫn thanh toán</a></li>
        <li role="presentation"><a href="#chinhsachvadieukhoan" aria-controls="chinhsachvadieukhoan" role="tab" data-toggle="tab">Chính sách và điều khoản</a></li>
      </ul>
    
      <!-- Tab panes -->
      <div class="tab-content product-content-detail" style="overflow: hidden;">
        <div role="tabpanel" class="tab-pane fade in active content-detail" id="thongtinchitiet">
          <?php echo $detail['content_'.$lang];  ?>    
        </div><!-- end /.tab-pane --> 
        <div role="tabpanel" class="tab-pane fade in content-detail" id="huongdanthanhtoan">
          huongdanthanhtoan
        </div><!-- end /.tab-pane --> 
        <div role="tabpanel" class="tab-pane fade in content-detail" id="chinhsachvadieukhoan">
          chinhsachvadieukhoan
        </div><!-- end /.tab-pane --> 
                             
      </div><!-- end /.tab-content -->
    </div><!-- end /.tabs-customize -->
    
  </section><!-- end Section -->
  
  <section class="product-gird">
                        
      <div class="title-section"><h1 class="title-inner">Sản phẩm cùng loại</h1></div>  
                         
      <div class="body-main">                
        <ul class="item-list clearfix">
          <?php 
          $productOtherArr = $model->getListProductOther($product_id, $cate_type_id, $parent_id, $cate_id, 0, 8); 
          ?>
           <?php if(!empty($productOtherArr)){ 
            foreach ($productOtherArr as $value) {                    
          ?>
          <li class="col-md-3 col-sm-4 col-xs-6 item">
            <div class="item-inner">
              <div class="thumb">                            
                <a href="<?php echo $model->getAliasById('cate', $value['cate_id'], $lang); ?>/<?php echo $value['alias_'.$lang]; ?>-<?php echo $value['id']; ?>.html">
                  <img src="<?php echo $value['image_url']; ?>" alt="<?php echo $value['name_'.$lang]; ?>" class="imghover">
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
          <?php } } ?>
        </ul>
      </div>
    </section><!-- End Section -->
         
</div><!-- End #content --> 