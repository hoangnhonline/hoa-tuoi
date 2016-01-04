<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo STATIC_URL; ?>img/avatar5.png" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
            <p>Hello, <?php echo $_SESSION['email']; ?></p>  
        </div>
    </div>   
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
       <li class="treeview" data-link="cate-type">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Loại sản phẩm</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
                <a href="<?php echo BASE_URL; ?>cate-type&act=form" data-link="cate-type-form">
                    <i class="fa fa-circle-o"></i> <span>Tạo mới</span> <!--<small class="badge pull-right bg-green">new</small>-->            </a>
            </li>
            <li>
                <a href="<?php echo BASE_URL; ?>cate-type&act=list" data-link="cate-type-list">
                    <i class="fa fa-circle-o"></i> <span>Danh sách</span> <!--<small class="badge pull-right bg-green">new</small>-->            </a>
            </li>     
            
          </ul>
        </li>
       <li class="treeview" data-link="cate">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Danh mục</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
                <a href="<?php echo BASE_URL; ?>cate&act=form" data-link="cate-form">
                    <i class="fa fa-circle-o"></i> <span>Tạo mới</span> <!--<small class="badge pull-right bg-green">new</small>-->            </a>
            </li>
            <li>
                <a href="<?php echo BASE_URL; ?>cate&act=list" data-link="cate-list">
                    <i class="fa fa-circle-o"></i> <span>Danh sách</span> <!--<small class="badge pull-right bg-green">new</small>-->            </a>
            </li>     
            
          </ul>
        </li>
        <li class="treeview" data-link="product">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Sản phẩm</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
                <a href="<?php echo BASE_URL; ?>product&act=form" data-link="product-form">
                    <i class="fa fa-circle-o"></i> <span>Tạo mới</span> <!--<small class="badge pull-right bg-green">new</small>-->            </a>
            </li>
            <li>
                <a href="<?php echo BASE_URL; ?>product&act=list" data-link="product-list">
                    <i class="fa fa-circle-o"></i> <span>Danh sách</span> <!--<small class="badge pull-right bg-green">new</small>-->            </a>
            </li>     
            
          </ul>
        </li>
        <li class="treeview" data-link="cate-articles">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Danh mục tin tức</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
                <a href="<?php echo BASE_URL; ?>cate-articles&act=form" data-link="cate-articles-form">
                    <i class="fa fa-circle-o"></i> <span>Tạo mới</span> <!--<small class="badge pull-right bg-green">new</small>-->            </a>
            </li>
            <li>
                <a href="<?php echo BASE_URL; ?>cate-articles&act=list" data-link="cate-articles-list">
                    <i class="fa fa-circle-o"></i> <span>Danh sách</span> <!--<small class="badge pull-right bg-green">new</small>-->            </a>
            </li>     
            
          </ul>
        </li>
        <li class="treeview" data-link="articles">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Tin tức</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
                <a href="<?php echo BASE_URL; ?>articles&act=form" data-link="articles-form">
                    <i class="fa fa-circle-o"></i> <span>Tạo mới</span> <!--<small class="badge pull-right bg-green">new</small>-->            </a>
            </li>
            <li>
                <a href="<?php echo BASE_URL; ?>articles&act=list" data-link="articles-list">
                    <i class="fa fa-circle-o"></i> <span>Danh sách</span> <!--<small class="badge pull-right bg-green">new</small>-->            </a>
            </li>     
            
          </ul>
        </li>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Thông tin chung</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
                <a href="<?php echo BASE_URL; ?>text&act=list" data-link="text">
                    <i class="fa fa-circle-o"></i> <span>Text</span> <!--<small class="badge pull-right bg-green">new</small>-->            </a>
            </li>  
            <li>
                <a href="index.php?mod=banner&act=index" data-link="banner">
                    <i class="fa fa-circle-o"></i> Banner
                </a>
            </li>    
            <li>
                <a href="<?php echo BASE_URL; ?>addon&act=list">
                    <i class="fa fa-circle-o"></i> <span>Tiện ích</span> <!--<small class="badge pull-right bg-green">new</small>-->            </a>
            </li>
            <li>
                <a href="<?php echo BASE_URL; ?>convenient&act=list">
                    <i class="fa fa-circle-o"></i> <span>Tiện nghi</span> <!--<small class="badge pull-right bg-green">new</small>-->            </a>
            </li>     
            <li>
                <a href="<?php echo BASE_URL; ?>services&act=list">
                    <i class="fa fa-circle-o"></i> <span>Dịch vụ</span> <!--<small class="badge pull-right bg-green">new</small>-->            </a>
            </li> 
             <li>
                <a href="<?php echo BASE_URL; ?>direction&act=list">
                    <i class="fa fa-circle-o"></i> <span>Hướng nhà</span> <!--<small class="badge pull-right bg-green">new</small>-->            </a>
            </li>
            <li>
                <a href="<?php echo BASE_URL; ?>purpose&act=list">
                    <i class="fa fa-circle-o"></i> <span>Mục đích sử dụng</span> <!--<small class="badge pull-right bg-green">new</small>-->            </a>
            </li>              
            <li>
                <a href="<?php echo BASE_URL; ?>city&act=list">
                    <i class="fa fa-circle-o"></i> <span>Tỉnh / Thành</span> <!--<small class="badge pull-right bg-green">new</small>-->            </a>
            </li>         
            <li>
                <a href="<?php echo BASE_URL; ?>district&act=list">
                    <i class="fa fa-circle-o"></i> <span>Quận/Huyện</span> <!--<small class="badge pull-right bg-green">new</small>-->            </a>
            </li>      
            <li>
                <a href="<?php echo BASE_URL; ?>ward&act=list">
                    <i class="fa fa-circle-o"></i> <span>Phường / Xã</span> <!--<small class="badge pull-right bg-green">new</small>-->            </a>
            </li>       
            <li>
                <a href="<?php echo BASE_URL; ?>price&act=list">
                    <i class="fa fa-circle-o"></i> <span>Khoảng giá</span> <!--<small class="badge pull-right bg-green">new</small>-->            </a>
            </li>
            <li>
                <a href="<?php echo BASE_URL; ?>seo&act=list">
                    <i class="fa fa-circle-o"></i> <span>SEO</span> <!--<small class="badge pull-right bg-green">new</small>-->            </a>
            </li> 
                    
          </ul>
        </li>
    </ul>
</section>
<!-- /.sidebar -->