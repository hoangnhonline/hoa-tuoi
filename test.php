<?php 
require_once "backend/model/Backend.php";
$model = new Backend;
for($i = 0; $i<10; $i++){
	$sql = "SELECT * FROM product";
	$rs = mysql_query($sql);

	while($row = mysql_fetch_assoc($rs)){
		$id = $row['id'];
		$rs1 = mysql_query("SELECT * FROM product_cate WHERE product_id = $id");
		while($row1 = mysql_fetch_assoc($rs1)){
			$arrCateId[$row1['cate_id']] = $row1['cate_id'];
			$arrParentId[$row1['cate_id']] = $row1['parent_id'];
		}
		unset($row['id']);
		$arrData = $row;
		$table = "product";
		$product_id = $model->insert($table, $arrData);	

	}
}

?>