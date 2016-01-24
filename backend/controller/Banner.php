<?php 

$url = "../index.php?mod=banner&act=list";

require_once "../model/Backend.php";

$model = new Backend;

$id = (int) $_POST['id'];

$arrData['name_vi'] = $name_vi = $model->processData($_POST['name_vi']);
$arrData['name_en'] = $name_en = $model->processData($_POST['name_en']);


$arrData['alias_vi'] = $model->changeTitle($name_vi);
$arrData['alias_en'] = $model->changeTitle($name_en);


$arrData['status'] = $_POST['status']==null ? 0 : 1;

$arrData['position_id'] = $position_id = (int) $_POST['position_id'];




$arrData['start_time'] = $_POST['start_time']!='' ? strtotime($_POST['start_time']) : 0;
$arrData['end_time'] = $_POST['end_time']!='' ? strtotime($_POST['end_time']) : 0;


$arrData['type_id'] = $type_id = (int) $_POST['type_id'];

if($type_id!=3) $arrData['link_url'] = '';

//$size_default = $_POST['size_default'];


$image_url_upload_vi = $_FILES['image_url_upload_vi'];
if(($image_url_upload_vi['name']!='')){
	$arrReVi = $model->uploadImages($image_url_upload_vi);	
	$image_url_vi = $arrReVi['filename'];
}else{
	$image_url_vi = str_replace('../', '', $_POST['image_url_vi']);
}

$arrData['image_url_vi'] = $image_url_vi;

$image_url_upload_en = $_FILES['image_url_upload_en'];
if(($image_url_upload_en['name']!='')){
	$arrReEn = $model->uploadImages($image_url_upload_en);	
	$image_url_en = $arrReEn['filename'];
}else{
	$image_url_en = str_replace('../', '', $_POST['image_url_en']);
}

$arrData['image_url_en'] = $image_url_en;

if($type_id == 2){
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


	$arrData['description_vi'] = $description_vi = $model->processData($_POST['description_vi']);
	$arrData['description_en'] = $description_en = $model->processData($_POST['description_en']);
	
	$arrData['content_vi'] = addslashes($_POST['content_vi']);
	$arrData['content_en'] = addslashes($_POST['content_en']);
	$arrData['link_url'] = null;
}else{
	$arrData['meta_title_vi'] = null;
	$arrData['meta_title_en'] = null;

	$arrData['meta_description_vi'] = null;
	$arrData['meta_description_en'] = null;

	$arrData['meta_keyword_vi'] = null;
	$arrData['meta_keyword_en'] = null;
	$arrData['description_vi'] = null;
	$arrData['description_en'] = null;
	
	$arrData['content_vi'] = null;
	$arrData['content_en'] = null;
	$arrData['link_url'] = $_POST['link_url'];
}

$arrData['updated_at'] = time();

$table = "banner";

if($id > 0) {	
	$arrData['id'] = $id;
	$model->update($table, $arrData);	
}else{
	$arrData['created_at'] = time();
	$model->insert($table, $arrData);	
}
header('location:'.$url."&position_id=".$_POST['position_id']);
?>
