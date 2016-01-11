<?php
$url = "../index.php?mod=text&act=list";
require_once "../model/Backend.php";
$model = new Backend;

$id = (int) $_POST['id'];

$arrData['text_vi'] = $text = trim($_POST['text_vi']);
$arrData['text_en'] = $text = trim($_POST['text_en']);

$table = "text";
if($id > 0) {	
	$arrData['id'] = $id;
	
	$model->update($table, $arrData);	
}else{	
	$model->insert($table, $arrData);	
}
header('location:'.$url);
?>