<?php
$list_url = "../index.php?mod=cate-articles&act=list";
require_once "../model/Backend.php";
$model = new Backend;

$id = isset($_POST['id']) ? (int) $_POST['id'] : 0 ;

$arrData['name_vi'] = $name_vi = $model->processData($_POST['name_vi']);
$arrData['name_en'] = $name_en = $model->processData($_POST['name_en']);

$arrData['alias_vi'] = $model->changeTitle($name_vi);
$arrData['alias_en'] = $model->changeTitle($name_en);

$rs = mysql_query("SELECT * FROM articles_cate");
$count = mysql_num_rows($rs);
if($id == 0){
	$arrData['display_order'] = $count + 1;
}

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


$table = "articles_cate";

if($id > 0) {	

	$arrData['id'] = $id;

	$arrData['updated_at'] = time();

	$model->update($table, $arrData);	

}else{

	$arrData['created_at'] = time();

	$arrData['updated_at'] = time();

	$id = $model->insert($table, $arrData);	

}
header('location:'.$list_url);
?>
