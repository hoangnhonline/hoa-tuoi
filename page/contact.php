<!-- ▼CONTENT▼ -->
<div id="content" class="col-md-9">                

    <section class="breadcrumb">
      <ul class="clearfix">
        <li><a href="#">Trang chủ</a></li>
        <li><a href="#">Liên hệ</a></li>
      </ul>
    </section>
    
    <section class="contact-page">
      <div class="info-contact">
        <?php echo $detailArr['content_'.$lang]; ?>
      </div>
      
      <div class="row clearfix">
        <div class="col-md-5">
          <form class="form-horizontal form-contact" method="" action="" name="" id="">
            <div class="form-group">
              <input type="text" class="form-control" minlength="" id="" name="" placeholder="Họ và tên" value="">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" minlength="" id="" name="" placeholder="Địa chỉ email" value="">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" minlength="" id="" name="" placeholder="Số điện thoại" value="">
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="7" id="" name="" placeholder="Nội dung..." style="height:173px;"></textarea>
            </div>
            <div class="form-group">
              <div class="btn-group">
                <button type="submit" class="btn btn-primary" name="btnSubmitContact">Gởi liên hệ</button>
              </div>
            </div>
          </form><!-- end Form -->
        </div>
        <div class="col-md-7">
          <div class=" map-contact">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4356493892356!2d106.69123241527451!3d10.777907462112363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f375558bf5f%3A0x44ef8827baec5097!2zTmd1eeG7hW4gVGjhu4sgTWluaCBLaGFpLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1450256600847" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
      
    </section><!-- End Section Article Page -->
         
</div><!-- End #content -->   
<!-- ▼SIDEBAR▼ -->
<aside id="sidebar" class="col-md-3">
    
   
    <ul class="sbnr-list">
      <?php
      if(!empty($adsArr1)){           
      foreach($adsArr1 as $img){                
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
        <img class="lazy" data-original="<?php echo $img['image_url']; ?>" alt="<?php echo $img['name_'.$lang]; ?>"/>
        <?php if($link_url!=""){ ?></a><?php } ?>
      </li>
      <?php } } ?>
    </ul>
</aside><!-- End #sidebar -->