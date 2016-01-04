<?php
$url = "upload/images/2015/12/28/desert-1.jpg";

//$abc = "123451";
//echo $str = str_replace("1", "6", $abc);die;


//var_dump($_SERVER['DOCUMENT_ROOT']);
//ini_set('display_errors',1);
//echo time();
ob_start();
if(!isset($_SESSION))
{
    session_start();
}
if(!isset($_SESSION['user_id'])) {
    $_SESSION['back']= $_SERVER['REQUEST_URI'];
    $_SESSION['error']= "Bạn chưa đăng nhập";
    header("location: login.php");
}
include "defined.php";
$mod='';
if(isset($_GET['mod']))
{
    $mod = $_GET['mod'];
}
$act = isset($_GET['act']) ? $_GET['act'] : "list";
$mod = isset($_GET['mod']) ? $_GET['mod'] : "product";
$dataLinkParent = $mod;
$dataLinkChild = $mod."-".$act;

require_once "model/Backend.php";
$model = new Backend;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ADMIN NGUYEN TIN</title>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>        
        <link href="<?php echo STATIC_URL; ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo STATIC_URL; ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />        
        <link href="<?php echo STATIC_URL; ?>css/AdminLTE.css" rel="stylesheet" type="text/css" />          
        <script src="<?php echo STATIC_URL; ?>js/jquery-1.10.2.js"></script>
	    
        <link href="css/jquery.datetimepicker.css" rel="stylesheet" type="text/css" />    
        <link href="static/css/jquery-ui.css" rel="stylesheet" type="text/css" /> 
        <link href="css/jquery-ui.css" rel="stylesheet" type="text/css" /> 
        <link href="css/skins/all.css" rel="stylesheet">

    </head>
    <body class="skin-blue">        
        <header class="header">
            <a href="index.php" class="logo">                
                NGUYEN TIN
            </a>            
            <?php include URL_LAYOUT."top.php"; ?>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <?php include URL_LAYOUT."sidebar.php"; ?>
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Main content -->
                <section class="content">
                    <?php                     
                    if ($mod=="") include "view/product/list.php";
                    else include "view/".$mod.'/'.$act.'.php';

                    ?>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->
    <script src="js/lazy.js"></script>
    <script src="js/icheck.min.js"></script>
    <script src="<?php echo STATIC_URL; ?>js/form.js" type="text/javascript"></script>        
    <script src="<?php echo STATIC_URL; ?>js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo STATIC_URL; ?>js/AdminLTE/app.js" type="text/javascript"></script>
    <script src="<?php echo STATIC_URL; ?>js/jquery-ui.js"></script>
    <script src="<?php echo STATIC_URL; ?>js/AdminLTE/dashboard.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.datetimepicker.js"></script>
    <script type="text/javascript" src="js/number.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('.number').number(true,0);
        $("img.lazy").lazyload();
        $('input[type=checkbox], input[type=radio]').iCheck({
            checkboxClass: 'icheckbox_square',
            radioClass: 'iradio_square',
            increaseArea: '20%' // optional
        });        
        var objectMenu = $('li[data-link=<?php echo $dataLinkParent; ?>]');
        objectMenu.addClass('active');
        objectMenu.find('.treeview-menu').css('display', 'block');
        objectMenu.find('i.pull-right').removeClass('fa-angle-left').addClass('fa-angle-down');
        $('a[data-link=<?php echo $dataLinkChild; ?>]').addClass('active');
    });
    </script>
    </body>
</html>