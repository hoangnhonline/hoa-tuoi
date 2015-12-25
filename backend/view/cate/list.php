<?php
require_once "model/Backend.php";
$model = new Backend;
$link = $link_back = "index.php?mod=cate&act=list";
$link_form = "index.php?mod=cate&act=form";

if (isset($_GET['name_vi']) && $_GET['name_vi'] != '') {
    $arrCustom['name_vi'] = $_GET['name_vi'];      
    $link.="&name=".$arrCustom['name_vi'];    
    $link_back.="&name=".$arrCustom['name_vi'];

} else {
    $arrCustom['name_vi'] = '';
}
if (isset($_GET['menu_type']) && $_GET['menu_type'] > 0) {
    $arrCustom['menu_type'] = $_GET['menu_type'];      
    $link.="&menu_type=".$arrCustom['menu_type'];
    $link_back.="&menu_type=".$arrCustom['menu_type']; 
    $link_form.="&menu_type=".$arrCustom['menu_type']; 
} else {
    $arrCustom['menu_type'] = -1;
}
if (isset($_GET['parent_id']) && $_GET['parent_id'] > 0) {
    $arrCustom['parent_id'] = $_GET['parent_id'];      
    $link.="&parent_id=".$arrCustom['parent_id'];  
    $link_form.="&parent_id=".$arrCustom['parent_id'];  
    $detailParent = $model->getDetail('cate', $arrCustom['parent_id']); 
} else {
    $arrCustom['parent_id'] = 0;
}
$parent_id = $arrCustom['parent_id'];
$table = "cate";
$listTotal = $model->getList($table, -1, -1, $arrCustom);

$total_record = $listTotal['total'];

$total_page = ceil($total_record / LIMIT);

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$offset = LIMIT * ($page - 1);

$list = $model->getList($table, $offset, LIMIT, $arrCustom);
$cateParentArr = $model->getListCateParent();
?>
<div class="row">
    <div class="col-md-12">
    <a class="btn btn-primary btn-sm right" href="<?php echo $link_form; ?>">Tạo mới</a>
    <?php if($parent_id > 0){ ?>
    <a class="btn btn-warning btn-sm right" href="<?php echo $link_back; ?>">Quay lại</a>    
    <?php } ?>
         <div class="box-header">
                <h2 class="box-title" style="text-tranform:uppercase !important;color: #B10007">
                    Danh sách danh mục <?php if($arrCustom['parent_id'] > 0){ ?> con : "<?php echo $detailParent['name_vi']; ?>" <?php } ?>
                </h2>
            </div><!-- /.box-header -->
        <div class="box">
            <div class="col-md-12">
                <div class="box_search">
                <form method="get" id="form_search" name="form_search">                    
                    <div class="col-md-3">
                         <div class="form-group">
                            <label for="name">Thuộc menu</label>
                             <select class="form-control"  name="menu_type" id="menu_type">
                                <option value="-1" <?php if($arrCustom['menu_type'] == -1) echo "selected"; ?>>Tất cả</option>
                                <option value="1" <?php if($arrCustom['menu_type'] == 1) echo "selected"; ?>>Menu ngang</option>
                                <option value="2" <?php if($arrCustom['menu_type'] == 2) echo "selected"; ?>>Menu dọc</option>
                            </select>
                        </div>
                    </div>
                    <?php if(isset($_GET['parent_id'])){ ?>
                    <div class="col-md-3">
                         <div class="form-group">
                            <label for="name">Danh mục cha</label>
                            <select class="form-control"  name="parent_id" id="parent_id">
                                <?php foreach ($cateParentArr as $key => $value) {
                                    ?>
                                    <option value="<?php echo $value['id']; ?>" <?php if($arrCustom['parent_id'] == $value['id']) echo "selected"; ?>><?php echo $value['name_vi']; ?></option>
                                    <?php
                                }?>
                            </select>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-md-3">
                         <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            <input type="text" name='name_vi' id='name_vi' value="<?php echo $arrCustom['name_vi']; ?>" class="form-control" />
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                         <div class="form-group">
                            <label for="name">&nbsp;</label><br>
                            <button class="btn btn-primary btn-sm right" type="submit">Tìm kiếm</button>
                        </div>
                    </div>
                    <input type="hidden" name="mod" value="cate" />
                    <input type="hidden" name="act" value="list" />                                       
                                 
                </form>
                <div class="clearfix"></div>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <tbody><tr>
                        <th width="1%">No.</th>                        
                        <th>Tên danh mục</th>                       
                       
                        <th>Menu</th>
                        <?php if($parent_id == 0){ ?>
                        <th style="text-align:center;width: 1%;white-space:nowrap">Danh mục con</th>
                        <?php } ?>
                        <th style="text-align:center;width: 1%;white-space:nowrap">Hiện trên menu</th>
                        <th style="width: 1%;white-space:nowrap">Thao tác</th>
                    </tr>
                    <?php
                    $i = ($page-1) * LIMIT;
                    if(!empty($list['data'])){
                    foreach ($list['data'] as $key => $row) {
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        
                        <td>
                            <a href="index.php?mod=cate&act=form&id=<?php echo $row['id']; ?>">
                                <?php echo $row['name_vi']; ?>                                
                            </a>                           
                        </td>                                               
                       
                        <td><?php echo $row['menu_type'] == 1 ?  "Menu ngang" : "Menu dọc"; ?></td>
                        <?php if($parent_id == 0){ ?>
                        <td style="text-align:center">                            
                            <a class="btn btn-success btn-sm" href="index.php?mod=cate&act=list&parent_id=<?php echo $row['id']; ?>">
                                <span class="badge"><?php echo $model->getListByParent($row['id']); ?></span>
                            </a>                            
                        </td>
                        <?php } ?>
                        <td style="text-align:center">
                            <div class="checkbox">
                                <input type="checkbox" <?php if($row['show_menu'] == 1) echo "checked"; ?> value="1" name="show_menu">
                            </div>                            
                        </td>
                        <td style="white-space:nowrap">                            
                            <a class="btn btn-info btn-sm" href="index.php?mod=cate&act=form&id=<?php echo $row['id']; ?>">
                                Chỉnh sửa
                            </a>
                            <a class="btn btn-danger btn-sm link-delete" href="javascript:;" alias="<?php echo $row['name_vi']; ?>" id="<?php echo $row['id']; ?>" mod="cate" class="link_delete" >
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