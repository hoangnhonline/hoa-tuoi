<?php 
require_once "../model/Backend.php";
$model = new Backend;

$action = $_POST['action'];

if($action=="check_md5"){
	$password = $_POST['old_pass'];
	$md_pass = $_POST['old_pass_md5'];
	if(md5($password) != $md_pass){
		echo "0";
	}else{
		echo "1";
	}
}
if($action=="updateShowMenu"){
	$cate_id = $_POST['cate_id'];
	$table = $_POST['table'];
	$id = $_POST['id'];
	$arrData['id'] = $id;
	$arrData['cate_id'] = $cate_id;
	$model->update($table, $arrData);
	
}
if($action=="updateProduct"){
	$column = $_POST['column'];
	$id = $_POST['id'];
	$value = $_POST['value'];	
	mysql_query("UPDATE product SET $column = $value WHERE id = $id");
	
}
if($action=="updateOrder"){
	$str_id_order = $_POST['str_id_order'];
	$table = $_POST['table'];
	$arrTmp = explode(";", $str_id_order);
	$i = 0;
	foreach ($arrTmp as $value) {
		if($value > 0){
			$i ++;
			$model->updateOrder($table, $value,$i);	
		}
	}
	
}	
if($action == "getCate"){
	$cate_type_id = $_POST['cate_type_id'];
	$product_id = $_POST['product_id'];
	if($cate_type_id > 0){
	$arrList = $model->getListCateTree($cate_type_id);
	$arrCateId = array();
	if($product_id > 0){
		$arrCateSelected = $model->getListProductCate($product_id);
	    foreach ($arrCateSelected as $key => $value) {
	        $arrCateId[] = $value['parent_id']."-".$value['cate_id'];
	    }
	}
		if(!empty($arrList)){
			if($cate_type_id > 1){
				echo '<div class="col-md-12"><div class="panel panel-default"><div class="panel-heading">Menu dọc</div><div class="panel-body">';
				echo "<ul class='list-cate-parent'>";
				foreach ($arrList as $key => $value) {
					$checked_parent = (in_array($value['id']."-".$value['id'], $arrCateId)) ? "checked" : "";
					echo '<li><div class="checkbox"><input type="checkbox" '.$checked_parent.' value="'.$value['id']."-".$value['id'].'" name="cate_id[]" class="cate_id"><label class="parent">'.$value['name_vi'].'</label></div>';
					if(!empty($value['child'])){
						echo "<ul class='list-cate-child'>";
						foreach ($value['child'] as $cate) {
							$checked_child = (in_array($value['id']."-".$cate['id'], $arrCateId)) ? "checked" : "";
							echo '<li><div class="checkbox"><input '.$checked_child.' data-type="child" data-parent="'.$value['id']."-".$value['id'].'" type="checkbox" value="'.$value['id']."-".$cate['id'].'" name="cate_id[]" class="cate_id"><label>'.$cate['name_vi'].'</label></div></li>';					
						}
						echo "</ul>";
					}
					echo "</li>";
				}
				echo "</ul></div></div></div>";
			}else{
				foreach ($arrList as $key => $value) {
					if($value['menu_type'] == 1){
						$arrNgang[$value['id']] = $value;
					}else{
						$arrDoc[$value['id']] = $value;
					}
				}
					if(!empty($arrNgang)){
						echo '<div class="col-md-6"><div class="panel panel-default"><div class="panel-heading">Menu ngang</div><div class="panel-body">';
						echo "<ul class='list-cate-parent'>";
						foreach ($arrNgang as $ngang) {
							$checked_parent_ngang = (in_array($ngang['id']."-".$ngang['id'], $arrCateId)) ? "checked" : "";
							echo '<li><div class="checkbox"><input '.$checked_parent_ngang.' type="checkbox" value="'.$ngang['id']."-".$ngang['id'].'" name="cate_id[]" class="cate_id"><label class="parent">'.$ngang['name_vi'].'</label></div>';
							if(!empty($ngang['child'])){
								echo "<ul class='list-cate-child'>";
								foreach ($ngang['child'] as $ngangCate) {
									$checked_child_ngang = (in_array($ngang['id']."-".$ngangCate['id'], $arrCateId)) ? "checked" : "";
									echo '<li><div class="checkbox"><input '.$checked_child_ngang.' type="checkbox" data-type="child" data-parent="'.$ngang['id']."-".$ngang['id'].'" value="'.$ngang['id']."-".$ngangCate['id'].'" name="cate_id[]" class="cate_id"><label>'.$ngangCate['name_vi'].'</label></div></li>';					
								}
								echo "</ul>";
							}
							echo "</li>";
						}
						echo "</ul></div></div></div>";
					} // arrNgang
					if(!empty($arrDoc)){
						echo '<div class="col-md-6"><div class="panel panel-default"><div class="panel-heading">Menu dọc</div><div class="panel-body">';
						echo "<ul class='list-cate-parent'>";
						foreach ($arrDoc as $doc) {
							$checked_parent_doc = (in_array($doc['id']."-".$doc['id'], $arrCateId)) ? "checked" : "";
							echo '<li><div class="checkbox"><input '.$checked_parent_doc.' type="checkbox" value="'.$doc['id']."-".$doc['id'].'" name="cate_id[]" class="cate_id"><label class="parent">'.$doc['name_vi'].'</label></div>';
							if(!empty($doc['child'])){
								echo "<ul class='list-cate-child'>";
								foreach ($doc['child'] as $docCate) {
									$checked_child_doc = (in_array($doc['id']."-".$docCate['id'], $arrCateId)) ? "checked" : "";
									echo '<li><div class="checkbox"><input '.$checked_child_doc.' data-type="child" data-parent="'.$doc['id']."-".$doc['id'].'" type="checkbox" value="'.$doc['id']."-".$docCate['id'].'" name="cate_id[]" class="cate_id"><label>'.$docCate['name_vi'].'</label></div></li>';
								}
								echo "</ul>";
							}
							echo "</li>";
						}
						echo "</ul></div></div></div>";
					} // arrDoc
						

			}
		}
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$('input[type=checkbox]').iCheck({
	           checkboxClass: 'icheckbox_square',
	            radioClass: 'iradio_square',
	            increaseArea: '20%' // optional
	       });
			 $('.cate_id').on('ifChecked', function(event){
			 	var obj = $(this);
			 	var type = obj.attr('data-type');

			 	if(type == 'child'){
			 		var parent = obj.attr('data-parent');
			 		$('.cate_id[value=' + parent + ']').iCheck('check');
			 	}
	            $('#error_cate_id').hide();
	        });
         $('.cate_id').on('ifUnchecked', function(event){
            if($('.cate_id:checked').length > 0){            	
                $('#error_cate_id').hide();

            }else{
                $('#error_cate_id').show();
            }
            
        });
		});
	</script>
	<style type="text/css">
		ul li{ list-style: none;}
		.checkbox label{margin-left: 10px}
		label.parent{ font-weight: bold; font-size: 17px;}
	</style>
	
	<?php
	}else{
		echo '<h4 style="color:#0066FF">Chọn loại sản phẩm phía trên để hiển thị danh mục tương ứng.</h4>';
	}
}
?>