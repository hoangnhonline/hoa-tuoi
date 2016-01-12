 <!-- ▼HEADER▼ -->
  <header id="header-panel">
      
      <div class="header-top">
        <div class="container">
          <ul class="nav-top">
            <?php if(!empty($cateTypeArr['data'])){ 
              foreach ($cateTypeArr['data'] as $value) {                
            ?>
            <li>
              <a href="#" title="<?php echo $value['name_'.$lang]; ?>">
                <img class="lazy" data-original="<?php echo $value['icon_url']; ?>" alt="<?php echo $value['name_'.$lang]; ?>" width="26" height="26">
                <?php echo $value['name_'.$lang]; ?>
              </a>
            </li>
            <?php } } ?>
          </ul>
          
          <ul class="lang-flag">
            <li><a href="#" title="Vietnames"><img src="images/flag-vn.png" alt="" width="24" height="16"></a></li>
            <li><a href="#" title="English"><img src="images/flag-en.png" alt="" width="24" height="16"></a></li>
          </ul>
          
        </div><!-- End /.container -->
      </div><!-- end .header-top -->
      
      <div class="header-main">
        <div class="container">
          <h1 class="logo col-sm-2"><a href="#"><img class="imghover" src="images/logo.png" alt="Hoa Tươi Nguyễn Tín" width="150" height="100"></a></h1>
          
          <p class="logo-name col-sm-4"><img src="images/logo-name-nguyen-tin-flower.png" alt="Hoa Tươi Nguyễn Tín" width="412" height="40"></p>
          
          <div class="search-basic col-sm-4 row">
            <form method="" action="" name="" class="input-group">
              <input type="text" class="form-control" id="" name="" placeholder="Nhập từ khóa tìm kiếm...">
              <span class="input-group-btn">
                <button type="submit" class="btn" id="" name=""><i class="fa fa-search"></i></button>
              </span>
            </form>
          </div>
          
        </div><!-- End /.container -->
      </div><!-- end .header-main -->

      <div class="gnav-menu">
        <nav class="navbar navbar-default">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Menu</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>">Trang chủ</a></li>
                <?php if(!empty($menuNgangParentArr['data'])){ 
                  foreach ($menuNgangParentArr['data'] as $value) {                
                ?>
                <li class="dropdown">
                  <a href="<?php echo $value['alias_'.$lang]; ?>.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <?php echo $value['name_'.$lang]; ?>
                  </a>
                  <?php if(!empty($menuNgangChildArr[$value['id']])){ ?>
                  <ul class="dropdown-menu">
                    <?php foreach ($menuNgangChildArr[$value['id']] as $child) { ?>
                    <li><a href="<?php echo $value['alias_'.$lang]; ?>/<?php echo $child['alias_'.$lang]; ?>.html"><?php echo $child['name_'.$lang]; ?></a></li>
                    <?php } ?>
                  </ul>
                  <?php } ?>
                </li>
                <?php }}  ?>                
                <li><a href="y-nghia-hoa.html">Ý nghĩa hoa</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- End / .container -->
        </nav>
      </div><!--end navbar -->
	</header><!-- End #header-panel-->