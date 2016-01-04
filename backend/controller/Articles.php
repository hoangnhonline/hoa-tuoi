<?php
$url = "../index.php?mod=articles&act=list";
require_once "../model/Backend.php";
$model = new Backend;

$id = (int) $_POST['id'];

$arrData['name_vi'] = $name_vi = $model->processData($_POST['name_vi']);
$arrData['name_en'] = $name_en = $model->processData($_POST['name_en']);

$arrData['alias_vi'] = $model->changeTitle($name_vi);
$arrData['alias_en'] = $model->changeTitle($name_en);

$arrData['description_vi'] = addslashes($_POST['description_vi']);
$arrData['description_en'] = addslashes($_POST['description_en']);

$arrData['content_vi'] = addslashes($_POST['content_vi']);
$arrData['content_en'] = addslashes($_POST['content_en']);

$arrData['is_hot'] = (int) $_POST['is_hot'];
$arrData['cate_id'] = (int) $_POST['cate_id'];

$image_url_upload = $_FILES['image_url_upload'];

if(($image_url_upload['name']!='')){
	$arrRe = $model->uploadImages($image_url_upload);	
	$image_url = $arrRe['filename'];
}else{
	$image_url = str_replace('../', '', $_POST['image_url']);
}

$arrData['image_url'] = $image_url;

$meta_title_vi = $model->processData($_POST['meta_title_vi']);
if($meta_title_vi == '') $meta_title_vi = $name_vi;

$meta_title_en = $model->processData($_POST['meta_title_en']);
if($meta_title_en == '') $meta_title_en = $name_en;

$meta_description_vi = $model->processData($_POST['meta_description_vi']);
if($meta_description_vi == '') $meta_description_vi = $name_vi;

$meta_description_en = $model->processData($_POST['meta_description_en']);
if($meta_description_en == '') $meta_description_en = $name_en;

$meta_keyword_vi = $model->processData($_POST['meta_keyword_vi']);
if($meta_keyword_vi == '') $meta_keyword_vi = $name_vi;

$meta_keyword_en = $model->processData($_POST['meta_keyword_en']);
if($meta_keyword_en == '') $meta_keyword_en = $name_en;

$arrData['meta_title_vi'] = $meta_title_vi;
$arrData['meta_title_en'] = $meta_title_en;

$arrData['meta_description_vi'] = $meta_description_vi;
$arrData['meta_description_en'] = $meta_description_en;

$arrData['meta_keyword_vi'] = $meta_keyword_vi;
$arrData['meta_keyword_en'] = $meta_keyword_en;

$arrData['updated_at'] = time();

$table = "articles";

if($id > 0) {	
	$arrData['id'] = $id;	
	$model->update($table, $arrData);	
}else{
	$arrData['created_at'] = time();	
	$model->insert($table, $arrData);	
}
header('location:'.$url);
?>