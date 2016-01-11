<?php
$url = "../index.php?mod=footer&act=list";
require_once "../model/Backend.php";
$model = new Backend;

$id = (int) $_POST['id'];

$arrData['name_vi'] = $name_vi = trim($_POST['name_vi']);
$arrData['name_en'] = $name_en = trim($_POST['name_en']);
$arrData['content_vi'] = $content_vi = trim($_POST['content_vi']);
$arrData['content_en'] = $name_en = trim($_POST['content_en']);
$rs = mysql_query("SELECT * FROM footer");
$count = mysql_num_rows($rs);
if($id == 0){
	$arrData['display_order'] = $count + 1;
}

$table = "footer";

if($id > 0) {	

	$arrData['id'] = $id;

	$arrData['updated_at'] = time();

	$model->update($table, $arrData);	

}else{

	$arrData['created_at'] = time();

	$arrData['updated_at'] = time();

	$id = $model->insert($table, $arrData);	

}
header('location:'.$url);
?>