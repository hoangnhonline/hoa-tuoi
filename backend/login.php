<?php include "defined.php";?>
<?php 
session_start(); 
require "model/Backend.php";
$d =  new Backend;
if (isset($_POST['btnLog'])==true){	
	$d->Login();	
}
?>
<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>ADMIN NGUYEN TIN</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>        
        <link href="<?php echo STATIC_URL; ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />        
        <link href="<?php echo STATIC_URL; ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />        
        <link href="<?php echo STATIC_URL; ?>css/AdminLTE.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Sign In</div>
            <form action="" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Email"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>      
                  
                </div>
                <div class="footer">                                                               
                    <button type="submit" name="btnLog" class="btn bg-olive btn-block">Log in</button>                      
                    
                </div>
            </form>
            
        </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>        
        <script src="<?php echo STATIC_URL; ?>js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>