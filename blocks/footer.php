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
              <h3 class="title"><?php echo $arrText[5]['text_'.$lang]; ?></h3>
              <div class="body-box">
                <ul class="fnav-col">
                  <li><a href="#">Giới thiệu</a></li>
                  <li><a href="#">Tin tức</a></li>
                  <li><a href="#">Tuyển dụng</a></li>
                  <li><a href="#">Cách chăm sóc hoa</a></li>
                  <li><a href="#">Liên hệ</a></li>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="col-md-3 col-sm-6">
            <div class="footer-block">
              <h3 class="title"><?php echo $arrText[4]['text_'.$lang]; ?></h3>
              <div class="body-box">
                <ul class="fnav-col">
                  <li><a href="#">Thắc mắc và khiếu nại</a></li>
                  <li><a href="#">Cam kết hài lòng 100%</a></li>
                  <li><a href="#">Hướng dẫn thanh toán</a></li>
                  <li><a href="#">Chính sách và điều khoản</a></li>
                  <li><a href="#">Câu hỏi thường gặp (FAQs)</a></li>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="col-md-3 col-sm-6">
            <div class="footer-block">
              <h3 class="title"><?php echo $arrText[3]['text_'.$lang]; ?></h3>
              <div class="body-box">
                <ul class="fsocial-list">
                  <li><a href="#"><img src="images/ico-facebook.png" class="imghover" alt="" width="32" height="32"></a></li>
                  <li><a href="#"><img src="images/ico-google.png" class="imghover" alt="" width="32" height="32"></a></li>
                  <li><a href="#"><img src="images/ico-twitter.png" class="imghover" alt="" width="32" height="32"></a></li>
                  <li><a href="#"><img src="images/ico-skype.png" class="imghover" alt="" width="32" height="33"></a></li>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="col-md-3 col-sm-6">
            <div class="footer-block">
              <h3 class="title"><?php echo $arrText[2]['text_'.$lang]; ?></span></h3>
              <div class="body-box">
                <div class="fcontact-info">
                  <p><i class="fa fa-home"></i> <?php echo $arrText[11]['text_'.$lang]; ?></p>
                  <p class="hotline"><i class="fa fa-mobile"></i> <?php echo $arrText[12]['text_'.$lang]; ?></p>
                  <p><i class="fa fa-reply"></i> <?php echo $arrText[13]['text_'.$lang]; ?></p>
                  <p><i class="fa fa-external-link-square"></i> <?php echo $arrText[14]['text_'.$lang]; ?></p>
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