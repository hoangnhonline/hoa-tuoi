<?php
require_once "model/Backend.php";
$model = new Backend;
$link = $link_back = "index.php?mod=articles&act=list";
$link_form = "index.php?mod=articles&act=form";

if (isset($_GET['name_vi']) && $_GET['name_vi'] != '') {
    $arrCustom['name_vi'] = $model->processData($_GET['name_vi']);      
    $link.="&name=".$arrCustom['name_vi'];    
    $link_back.="&name=".$arrCustom['name_vi'];

} else {
    $arrCustom['name_vi'] = '';
}
if (isset($_GET['cate_id']) && $_GET['cate_id'] > 0) {
    $cate_id = $_GET['cate_id'];      
    $link.="&cate_id=".$cate_id;  
    $link_form.="&cate_id=".$cate_id; 
    $arrCustom['cate_id'] = $cate_id; 
    $detailParent = $model->getDetail('articles_cate', $cate_id); 
} else {
    $cate_id = -1;
}

if (isset($_GET['is_hot'])) {
    $is_hot = $_GET['is_hot'];      
    $link.="&is_hot=".$is_hot;  
    $link_form.="&is_hot=".$is_hot; 
    $arrCustom['is_hot'] = $is_hot;     
} else {
    $is_hot = -1;
}
$table = "articles";
$listTotal = $model->getList($table, -1, -1, $arrCustom);

$total_record = $listTotal['total'];

$total_page = ceil($total_record / 100);

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$offset = 100 * ($page - 1);

$list = $model->getList($table, $offset, 100, $arrCustom);
$cateArr = $model->getList('articles_cate', -1, -1);
?>
<div class="row">
    <div class="col-md-12">
        <section class="content-header">     
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="index.php?mod=articles&act=list">Tin tức</a></li>       
      </ol>
    </section>
    <a class="btn btn-primary btn-sm right" href="<?php echo $link_form; ?>">Tạo mới</a>   
         <div class="box-header">
                <h2 class="box-title" style="text-tranform:uppercase !important;color: #B10007">
                    Danh sách tin tức                   
                </h2>
            </div><!-- /.box-header -->
        <div class="box">
            <div class="col-md-12">
                <div class="box_search">
                <form method="get" id="formSearch" name="formSearch"> 
                    <div class="col-md-3">                         
                        <div class="form-group">
                            <label for="name">Danh mục</label>
                            <select class="form-control change-submit"  name="cate_id" id="cate_id">
                                <option value="-1" <?php if($cate_id == -1) echo "selected"; ?>>Tất cả</option>
                                <?php foreach ($cateArr['data'] as $key => $value) { ?>
                                <option value="<?php echo $value['id']; ?>"
                                    <?php if($cate_id == $value['id']) echo "selected"; ?>
                                    ><?php echo $value['name_vi']; ?></option>            
                                <?php } ?>
                                
                            </select>
                        </div>
                    </div>  
                    <div class="col-md-3">
                         <div class="form-group">
                            <label for="name">Tiêu đề</label>
                            <input type="text" name='name_vi' id='name_vi' value="<?php echo $arrCustom['name_vi']; ?>" class="form-control" />
                        </div>
                    </div>   
                    <div class="col-md-3">
                        <div class="form-group">
                            <br />
                            <input  id="is_hot" type="checkbox" name="is_hot" value="<?php echo $is_hot; ?>" <?php if($is_hot==1) echo "checked"; ?>>
                            <label for="name">Hiện trang chủ</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                         <div class="form-group">
                            <label for="name">&nbsp;</label><br>
                            <button class="btn btn-primary btn-sm right" type="submit">Tìm kiếm</button>
                        </div>
                    </div>
                    <input type="hidden" name="mod" value="articles" />
                    <input type="hidden" name="act" value="list" />                                       
                                 
                </form>
                <div class="clearfix"></div>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped" id="tbl_list">
                    <tbody><tr>
                        <th width="1%">No.</th>        
                        <th width="20%">Hình ảnh</th>                
                        <th width="50%">Tiêu đề</th>
                        <th style="text-align:center;width: 1%;white-space:nowrap">Hiện trang chủ</th>
                        <th style="text-align:center;white-space:nowrap">Ngày tạo</th>                        
                        <th style="width: 1%;white-space:nowrap">Thao tác</th>
                    </tr>
                    <?php
                    $i = ($page-1) * LIMIT;
                    if(!empty($list['data'])){
                    foreach ($list['data'] as $key => $row) {
                    $i++;
                    ?>
                    <tr id="row-<?php echo $row['id']; ?>">
                        <td width="1%"><span class="order"><?php echo $i; ?></span></td>
                        <td>
                            <img src="../<?php echo $row['image_url']; ?>" width="100" class="img-thumbnail" />
                        </td>
                        <td width="50%">
                            <a style="font-size:19px;color:#B10007" href="index.php?mod=articles&act=form&id=<?php echo $row['id']; ?>">
                                <?php echo $row['name_vi']; ?>                                
                            </a>
                            <br>
                            <strong style="font-size:12px"><?php echo $model->getNameById('articles_cate',$row['cate_id']);?></strong>
                        </td>                                                                      
                        <td style="text-align:center;width: 1%;white-space:nowrap">
                            <div class="checkbox">
                                <input data-value="<?php echo $row['id']; ?>" data-table="articles" data-column="is_hot" class="change-column" type="checkbox" <?php if($row['is_hot'] == 1) echo "checked"; ?>>                               
                            </div>
                        </td>
                        <td style="text-align:center;white-space:nowrap"><?php echo date('d-m-Y', $row['created_at']);?></td>
                        <td style="width: 1%;white-space:nowrap">                            
                            <a class="btn btn-info btn-xs" href="index.php?mod=articles&act=form&id=<?php echo $row['id']; ?>&cate_id=<?php echo $row['cate_id']; ?>">
                                Chỉnh sửa
                            </a>
                            <a class="btn btn-danger btn-xs link-delete" href="javascript:;" alias="<?php echo $row['name_vi']; ?>" id="<?php echo $row['id']; ?>" mod="articles" class="link_delete" >
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
   $('#is_hot').on('ifChecked', function(event){
       $(this).val(1);
       $('#formSearch').submit();

    });
    $('#is_hot').on('ifUnchecked', function(event){
       $(this).val(-1);
       $('#formSearch').submit();

    });
   
});
</script>