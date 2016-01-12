<section class="section-block-top2">
  <div class="container">
  
    <div class="search-for-price">
      <h4 class="tit">Tư vấn chọn hoa tươi</h4>
      <form method="" action="" name="" class="searchForm">
        <div class="clearfix">
          <div class="pull-left">
            <label>Chủ đề</label>
            <select name="" class="input">
              <option>Tất cả</option>
            </select>
          </div>
          <div class="pull-left">
            <label>Chọn mức giá</label>
            <select name="" class="input">
              <option>Tất cả</option>
            </select>
          </div>
          <div class="pull-left">
            <input type="submit" class="btnSubmit" id="" name="" value="Tìm kiếm">
          </div>
        </div>        
        
        <p class="txt">* Bạn có thể gọi nhanh cho chúng tôi theo số <span class="tel">0908.303.680</span> để đặt hoa theo thiết kế riêng </p>     
        
      </form>
    </div>

    <div class="box-fl clearfix">
      <div class="support-top">
        <?php
        if(!empty($bannerArr1)){           
        foreach($bannerArr1 as $img){                
          $link_url = "";
          if($img['type_id'] == 2){
              $link_url = "su-kien/".$img['name_'.$lang]."-".$img['id'].".html";
          }
          if($img['type_id'] == 3){
              $link_url = $img['link_url'];
          }
        ?>
          <?php if($link_url!=""){ ?><a href="<?php echo $link_url;?>"><?php } ?>
          <img class="lazy" data-original="<?php echo $img['image_url']; ?>" alt="<?php echo $img['name_'.$lang]; ?>" class="img-responsive"/>
          <?php if($link_url!=""){ ?></a><?php } ?>
   
        <?php } } ?>        
      </div>

      <div class="payment-top">
        <?php
        if(!empty($bannerArr2)){           
        foreach($bannerArr2 as $img){                
          $link_url = "";
          if($img['type_id'] == 2){
              $link_url = "su-kien/".$img['name_'.$lang]."-".$img['id'].".html";
          }
          if($img['type_id'] == 3){
              $link_url = $img['link_url'];
          }
        ?>
          <?php if($link_url!=""){ ?><a href="<?php echo $link_url;?>"><?php } ?>
          <img class="lazy" data-original="<?php echo $img['image_url']; ?>" alt="<?php echo $img['name_'.$lang]; ?>" class="img-responsive"/>
          <?php if($link_url!=""){ ?></a><?php } ?>
   
        <?php } } ?>   
      </div>
    </div>

  </div><!-- End /.container -->
</section><!-- End Section -->