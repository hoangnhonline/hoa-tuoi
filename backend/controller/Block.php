<?php

$url = "../index.php?mod=block&act=list";

require_once "../model/Backend.php";

$model = new Backend;

$id = (int) $_POST['id'];

$arrData['name_vi'] = $name_vi = $_POST['name_vi'];
$arrData['name_en'] = $name_en = $_POST['name_en'];
if($id > 0){
	$arrData['id'] = $id;
	$model->update('block', $arrData);
	mysql_query("DELETE FROM link WHERE block_id = $id");
}
if(!empty($_POST['text_vi'])){
	foreach ($_POST['text_vi'] as $key => $text_vi) {
		if(isset($_POST['link_vi'][$key]) && $_POST['link_vi'][$key] != '' && isset($_POST['link_en'][$key]) && $_POST['link_en'][$key] != '' && isset($_POST['text_en'][$key]) && $_POST['text_en'][$key] != ''){
			$arrLink['text_vi'] = $_POST['text_vi'][$key];
			$arrLink['text_en'] = $_POST['text_en'][$key];
			$arrLink['link_url_vi'] = $_POST['link_vi'][$key];
			$arrLink['link_url_en'] = $_POST['link_en'][$key];
			$arrLink['block_id'] = $id;
			$arrLink['status'] = 1;
			$model->insert('link', $arrLink);
			$arrLink = array();
		}
	}
}


header('location:'.$url);

?>