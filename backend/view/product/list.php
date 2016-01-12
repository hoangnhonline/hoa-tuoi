<?php
require_once "model/Backend.php";
$model = new Backend;
$link = $link_back = "index.php?mod=product&act=list";
$link_form = "index.php?mod=product&act=form";

if (isset($_GET['name']) && $_GET['name'] != '') {
    $name = $model->processData($_GET['name']);
    $link.="&name=".$name;    
    $link_back.="&name=".$name;
} else {
    $name = '';
}
if (isset($_GET['parent_id']) && $_GET['parent_id'] > 0) {
    $parent_id = $_GET['parent_id'];      
    $link.="&parent_id=".$parent_id;  
    $link_form.="&parent_id=".$parent_id;  
    $detailParent = $model->getDetail('cate', $parent_id); 
} else {
    $parent_id = 0;
}
if (isset($_GET['cate_type_id']) && $_GET['cate_type_id'] > 0) {
    $arrCustom['cate_type_id'] = $_GET['cate_type_id'];      
    $link.="&cate_type_id=".$arrCustom['cate_type_id'];  
    $link_form.="&cate_type_id=".$arrCustom['cate_type_id'];  
   
} else {
    $arrCustom['cate_type_id'] = 1;
}
$cate_type_id = $arrCustom['cate_type_id'];
$detailCateType = $model->getDetail('cate_type', $cate_type_id); 

$listTotal = $model->getListProduct($arrCustom, $parent_id, $name, -1, -1);

$total_record = $listTotal['total'];
    
$total_page = ceil($total_record / 100);

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$offset = 100 * ($page - 1);

$list =  $model->getListProduct($arrCustom, $parent_id, $name, $offset, 100);
if($cate_type_id > 0){
    $cateParentArr = $model->getListCateTree($cate_type_id);
}else{
    $cateParentArr = $model->getListCateParent();
}
$cateTypeArr = $model->getListCateType();
?>
<div class="row">
    <div class="col-md-12">
        <section class="content-header">     
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="index.php?mod=product&act=list">Danh mục</a></li>
        <?php if($cate_type_id > 0){ ?>
        <li><a href="index.php?mod=product&act=list&cate_type_id=<?php echo $cate_type_id; ?>"><?php echo $detailCateType['name_vi']; ?></a></li>
        <?php } ?>
        <?php if($parent_id > 0){ ?>
        <li><a href="index.php?mod=product&act=list&cate_type_id=<?php echo $cate_type_id; ?>&parent_id=<?php echo $parent_id; ?>"><?php echo $detailParent['name_vi']; ?></a></li>
        <?php } ?>       
      </ol>
    </section>
    <a class="btn btn-primary btn-sm right" href="<?php echo $link_form; ?>">Tạo mới</a>
    <?php if($parent_id > 0){ ?>
    <a class="btn btn-warning btn-sm right" href="<?php echo $link_back; ?>">Quay lại</a>    
    <?php } ?>
         <div class="box-header">
                <h2 class="box-title" style="text-tranform:uppercase !important;color: #B10007">
                    Danh sách sản phẩm                    
                </h2>
            </div><!-- /.box-header -->
        <div class="box">
            <div class="col-md-12">
                <div class="box_search">
                <form method="get" id="formSearch" name="formSearch"> 
                    <div class="col-md-3">
                         <div class="form-group">
                            <label for="name">Loại sản phẩm</label>
                             <select class="form-control change-submit"  name="cate_type_id" id="cate_type_id">
                               <?php foreach ($cateTypeArr as $key => $value) {
                                    ?>
                                    <option value="<?php echo $value['id']; ?>" <?php if($arrCustom['cate_type_id'] == $value['id']) echo "selected"; ?>><?php echo $value['name_vi']; ?></option>
                                    <?php
                                }?>
                            </select>
                        </div>
                    </div>                                       
                
                    <div class="col-md-3">
                         <div class="form-group">
                            <label for="name">Danh mục cha</label>
                            <select class="form-control change-submit"  name="parent_id" id="parent_id">
                                <option value="-1" <?php if($parent_id == -1) echo "selected"; ?>>Tất cả</option>
                                <?php foreach ($cateParentArr as $key => $value) {
                                    ?>
                                <option value="<?php echo $value['id']; ?>" <?php if($parent_id == $value['id']) echo "selected"; ?>><?php echo $value['name_vi']; ?></option>
                                    <?php if(!empty($value['child'])){ 
                                        foreach($value['child'] as $child){
                                    ?>
                                    <option value="<?php echo $child['id']; ?>" <?php if($parent_id == $child['id']) echo "selected"; ?>><?php echo $value['name_vi']; ?> / <?php echo $child['name_vi']; ?></option>
                                    <?php } } ?>
                                <?php
                                }?>
                            </select>
                        </div>
                    </div>
                   
                    <div class="col-md-2">
                         <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input type="text" name='name' id='name' value="<?php echo $name; ?>" class="form-control" />
                        </div>
                    </div>
                    
                    <div class="col-md-2">
                         <div class="form-group">
                            <label for="name">&nbsp;</label><br>
                            <button class="btn btn-primary btn-sm right" type="submit">Tìm kiếm</button>
                        </div>
                    </div>
                    <input type="hidden" name="mod" value="product" />
                    <input type="hidden" name="act" value="list" />                                       
                                 
                </form>
                <div class="clearfix"></div>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped" id="tbl_list">
                    <tbody><tr>
                        <th width="1%" style="text-align:center">No.</th>                        
                        <th width="18%">Hình ảnh</th>
                        <th width="30%">Thông tin sản phẩm</th>
                        <th width="30%">Danh mục</th>
                        <th width="10%" style="text-align:center">SP mới</th>
                        <th width="10%" style="text-align:center">Khuyến mãi</th>                        
                        <th style="width: 1%;white-space:nowrap">Thao tác</th>
                    </tr>
                    <?php
                    $i = ($page-1) * LIMIT;
                    if(!empty($list['data'])){
                    foreach ($list['data'] as $key => $row) {
                    $i++;
                    ?>
                    <tr id="row-<?php echo $row['id']; ?>">
                        <td width="1%" style="text-align:center"><span class="order"><?php echo $i; ?></span></td>
                        <td width="18%">
                            <img class="img-thumbnail lazy" data-original="../<?php echo $row['image_url']; ?>" width="150">
                        </td>
                        <td width="30%">
                            <a style="font-size:19px;color:#B10007" href="index.php?mod=product&act=form&id=<?php echo $row['id']; ?>&cate_type_id=<?php echo $row['cate_type_id']; ?>">
                                <?php echo $row['name_vi']; ?>                                
                            </a>  <br>                         
                            <span class="title-value">Loại SP :</span>
                            <span class="value"><?php echo $model->getNameById('cate_type', $row['cate_type_id']); ?></span><br>
                            <span class="title-value">Giá :</span>
                            <span class="value"><?php echo number_format($row['price']); ?></span><br>
                            <?php if($row['is_sale'] == 1) { ?>
                            <span class="title-value">Giá khuyến mãi:</span>
                            <span class="value"><?php echo number_format($row['price_sale']); ?></span><br>
                            <?php } ?>
                        </td>                                               
                        <td width="30%">
                            <?php $tmpArr = $model->getListProductCate($row['id']);?>
                            <ul id="list-cate">
                                <?php foreach ($tmpArr as $tmp) {
                                    if(!isset($parent_name_old)){
                                        $parent_name_old = "";
                                    }
                                    $parent_name = $model->getNameById('cate', $tmp['parent_id']);
                                    $cate_name = $model->getNameById('cate', $tmp['cate_id']);
                                ?>
                                <li>
                                    <?php 
                                    if($tmp['parent_id'] == $tmp['cate_id']){
                                        echo "<strong>".$parent_name."</strong>";
                                         $parent_name_old = $parent_name;
                                    }else{
                                        if($parent_name != $parent_name_old){ 
                                            echo $parent_name."/".$cate_name;
                                        }else{
                                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$cate_name;
                                        } 

                                    } /// else
                                    
                                    ?>
                                </li>
                                <?php    
                               
                                }?>
                                
                            </ul>
                        </td>
                        <td width="10%" style="text-align:center">
                            <div class="checkbox">
                                <input data-value="<?php echo $row['id']; ?>" data-table="product" data-column="is_new" class="change-column" type="checkbox" <?php if($row['is_new'] == 1) echo "checked"; ?>>
                            </div>
                        </td>
                        <td width="10%" style="text-align:center">
                            <div class="checkbox">
                                <input data-value="<?php echo $row['id']; ?>" data-table="product" data-column="is_sale" class="change-column" type="checkbox" <?php if($row['is_sale'] == 1) echo "checked"; ?>>
                            </div>
                        </td>
                        <td style="width: 1%;white-space:nowrap">                            
                            <a class="btn btn-info btn-xs" href="index.php?mod=product&act=form&id=<?php echo $row['id']; ?>&cate_type_id=<?php echo $row['cate_type_id']; ?>">
                                Chỉnh sửa
                            </a>
                            <a class="btn btn-danger btn-xs link-delete" href="javascript:;" alias="<?php echo $row['name_vi']; ?>" id="<?php echo $row['id']; ?>" mod="product" class="link_delete" >
                                Xóa
                            </a>

                        </td>
                    </tr>
                    <?php } }else{  ?>
                    <tr>
                        <td colspan="6">Không tìm thấy dữ liệu.</td>
                    </tr>
                    <?php } ?>
                </tbody></table>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">               
                <?php echo $model->phantrang($page, PAGE_SHOW, $total_page, $link); ?>
            </div>
        </div><!-- /.box -->
    </div><!-- /.col -->

</div>
<script type="text/javascript">
$(document).ready(function(){   
    
   
    $('.change-column').on('ifChecked', function(event){
        var id = $(this).attr('data-value');
        var column = $(this).attr('data-column');
        $.ajax({
            url: "ajax/process.php",
            type: "POST",
            async: false,
            data: {
                action : 'updateProduct',
                column : column,                
                value : 1,
                id  : id
            },
            success: function(data){
                                      
            }
        }); 
    });
    $('.change-column').on('ifUnchecked', function(event){
        var id = $(this).attr('data-value');
        var column = $(this).attr('data-column');
        $.ajax({
            url: "ajax/process.php",
            type: "POST",
            async: false,
            data: {
                action : 'updateProduct',
                column : column,                
                value : 0,
                id  : id
            },
            success: function(data){
                                      
            }
        }); 
    });
});
</script>
<style type="text/css">
#list-cate{
    margin-left: -20px;
}
#list-cate li{
    list-style: none;
}

</style>