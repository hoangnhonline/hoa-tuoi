<?php
$list_url = "../index.php?mod=product&act=list";
require_once "../model/Backend.php";
$model = new Backend;

$id = isset($_POST['id']) ? (int) $_POST['id'] : 0 ;

$arrData['name_vi'] = $name_vi = $model->processData($_POST['name_vi']);
$arrData['name_en'] = $name_en = $model->processData($_POST['name_en']);

$arrData['alias_vi'] = $model->changeTitle($name_vi);
$arrData['alias_en'] = $model->changeTitle($name_en);

$arrData['description_vi'] = $model->processData($_POST['description_vi']);
$arrData['description_en'] = $model->processData($_POST['description_en']);
$arrData['gift_vi'] = $model->processData($_POST['gift_vi']);
$arrData['gift_en'] = $model->processData($_POST['gift_en']);

$price = $model->processData($_POST['price']);
$arrData['price'] = str_replace(",", "", $price);

$price_sale = $model->processData($_POST['price_sale']);
$arrData['price_sale'] = str_replace(",", "", $price_sale);

$arrData['content_vi'] = addslashes($_POST['content_vi']);
$arrData['content_en'] = addslashes($_POST['content_en']);

$image_url_upload = $_FILES['image_url_upload'];
$image_url = "";
if(($image_url_upload['name']!='')){
	$arrRe = $model->uploadImages($image_url_upload);	
	$image_url = $arrRe['filename'];
}else{
	$image_url = str_replace("../", "", $_POST['image_url']);
}

$arrData['image_url'] = $image_url;

$arrData['is_new'] = isset($_POST['is_new']) ? (int) $_POST['is_new'] : 0;
$arrData['is_sale'] = isset($_POST['is_sale']) ? (int) $_POST['is_sale'] : 0;

$arrData['cate_type_id'] = $cate_type_id = (int) $_POST['cate_type_id'];

$cateIdArr = $_POST['cate_id'];

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


$table = "product";

if($id > 0) {	

	$arrData['id'] = $id;

	$arrData['updated_at'] = time();

	$model->update($table, $arrData);	

}else{

	$arrData['created_at'] = time();

	$arrData['updated_at'] = time();

	$id = $model->insert($table, $arrData);	

}
mysql_query("DELETE FROM product_cate WHERE product_id = $id");
if(!empty($cateIdArr)){
	foreach ($cateIdArr as $cate_id_str) {
		$tmp = explode("-", $cate_id_str);
		$parent_id_a = $tmp[0];
		$cate_id = $tmp[1];
		$arrDataCate['cate_id'] = $cate_id;
		$arrDataCate['product_id'] = $id;
		$arrDataCate['parent_id'] = $parent_id_a;
		$model->insert('product_cate', $arrDataCate);
	}
}
header('location:'.$list_url."&cate_type_id=".$cate_type_id);
?>
