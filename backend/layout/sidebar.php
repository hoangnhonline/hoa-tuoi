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
        <li class="treeview" data-link="pages">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Trang nội dung</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
                <a href="<?php echo BASE_URL; ?>pages&act=form" data-link="pages-form">
                    <i class="fa fa-circle-o"></i> <span>Tạo mới</span> <!--<small class="badge pull-right bg-green">new</small>-->            </a>
            </li>
            <li>
                <a href="<?php echo BASE_URL; ?>pages&act=list" data-link="pages-list">
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
                <a href="index.php?mod=footer&act=list" data-link="footer">
                    <i class="fa fa-circle-o"></i> Nội dung footer
                </a>
            </li>    
             <li>
                <a href="index.php?mod=lh&act=form" data-link="lh">
                    <i class="fa fa-circle-o"></i> Thông tin liên hệ
                </a>
            </li> 
            <li>
                <a href="index.php?mod=block&act=list" data-link="block">
                    <i class="fa fa-circle-o"></i> Link footer
                </a>
            </li> 
            <li>
                <a href="index.php?mod=social&act=list" data-link="social">
                    <i class="fa fa-circle-o"></i> Kết nối social
                </a>
            </li>   
            <li>
                <a href="index.php?mod=user&act=list" data-link="user">
                    <i class="fa fa-circle-o"></i> Users
                </a>
            </li>           
          </ul>
        </li>
    </ul>
</section>
<!-- /.sidebar -->
