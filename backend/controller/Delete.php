<?php
if(!isset($_SESSION))
{
     session_start();
}
require_once "../model/Backend.php";
$model = new Backend;

$id = $_POST['id'];

$mod = $_POST['mod'];
if($mod=="product"){
	mysql_query("DELETE FROM product_cate WHERE product_id = $id");
	$model->deleteImageProduct($id);
}
mysql_query("DELETE FROM $mod WHERE id = $id");

exit();

?>
