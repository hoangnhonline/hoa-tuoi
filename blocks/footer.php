<!-- ▼FOOTER▼ -->
  <footer id="footer-panel">
  
    <!--<div class="fnav">
      <div class="container">
        <div class="row">
          <ul>
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Giới thiệu</a></li>
            <li><a href="#">Sản phẩm</a></li>
            <li><a href="#">Tin tức</a></li>
            <li><a href="#">Tư vấn</a></a></li>
            <li><a href="#">Liên hệ</a> </li>
          </ul>          
        </div>
      </div>
    </div>
  -->

    <div class="footer-main">
      <div class="container">
        <div class="row">
        
          <div class="col-md-3 col-sm-6">
            <div class="footer-block">
              <?php 
              $block1Arr = $model->getListLinkFooter(2);
              if(!empty($block1Arr)){              
              ?>
               <h3 class="title"><?php echo $block1Arr[0]['block_name_'.$lang]; ?></h3>
              <div class="body-box">
                <ul class="fnav-col">
                  <?php foreach ($block1Arr as $key => $value) {

                   ?>
                  <li>
                    <a href="<?php if(!in_array($value['text_en'], array('News', 'Contact', 'Flowers care tips'))) { echo $lang == 'vi' ? "trang/" : "page/" ; }; ?><?php echo $value['link_url_'.$lang]; ?>"><?php echo $value['text_'.$lang]; ?></a></li>
                  <?php } ?>                  
                </ul>
              </div>
              <?php } ?>
            </div>
          </div>
          
          <div class="col-md-3 col-sm-6">
            <div class="footer-block">
              <?php 
              $block2Arr = $model->getListLinkFooter(1);
              if(!empty($block2Arr)){              
              ?>
              <h3 class="title"><?php echo $block2Arr[0]['block_name_'.$lang]; ?></h3>
              <div class="body-box">
                <ul class="fnav-col">
                  <?php foreach ($block2Arr as $key => $value) {
                  ?>
                  <li><a href="<?php echo $lang == 'vi' ? "trang/" : "page/" ;?><?php echo $value['link_url_'.$lang]; ?>"><?php echo $value['text_'.$lang]; ?></a></li>
                  <?php } ?>
                </ul>
              </div>
              <?php } ?>
            </div>
          </div>
          
          <div class="col-md-3 col-sm-6">
            <div class="footer-block">
              <h3 class="title"><?php echo $arrText[3]['text_'.$lang]; ?></h3>
              <div class="body-box">
                <ul class="fsocial-list">
                  <li><a href="<?php echo $arrText[23]['text_'.$lang]; ?>"><img src="images/ico-facebook.png" alt="" width="32" height="32"></a></li>
                  <li><a href="<?php echo $arrText[24]['text_'.$lang]; ?>"><img src="images/ico-google.png" alt="" width="32" height="32"></a></li>
                  <li><a href="<?php echo $arrText[25]['text_'.$lang]; ?>"><img src="images/ico-twitter.png" alt="" width="32" height="32"></a></li>
                  <li><a href="<?php echo $arrText[26]['text_'.$lang]; ?>"><img src="images/ico-skype.png" alt="" width="32" height="33"></a></li>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="col-md-3 col-sm-6">
            <div class="footer-block">
              <h3 class="title"><?php echo $arrText[2]['text_'.$lang]; ?></span></h3>
              <div class="body-box">
                <div class="fcontact-info">
                  <p><?php echo $arrText[11]['text_'.$lang]; ?></p>                  
                </div>
              </div>
            </div>
          </div>
          
        </div><!-- End /.row -->
        
        <div class="footer-text">
          <?php if(!empty($footerTextArr['data'])){  
            foreach ($footerTextArr['data'] as $value) {              
          ?>
          <h3 class="head-tit"><?php echo $value['name_'.$lang]; ?></h3>
          <p class="desc"><?php echo $value['content_'.$lang]; ?></p>
          <?php }} ?>          
        </div>
        
      </div><!-- End /.container -->
    </div><!-- End .footer-main -->
    
    <div class="f-copyright">
      <div class="container">
        <p class="copyright"><?php echo $arrText[10]['text_'.$lang]; ?></p>
      </div><!-- End /.container -->
    </div><!-- End .footer-copyright -->
  </footer> <!-- End #footer-panel -->