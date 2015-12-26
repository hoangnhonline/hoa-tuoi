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
if (isset($_GET['cate_type_id']) && $_GET['cate_type_id'] > 0) {
    $arrCustom['cate_type_id'] = $_GET['cate_type_id'];      
    $link.="&cate_type_id=".$arrCustom['cate_type_id'];  
    $link_form.="&cate_type_id=".$arrCustom['cate_type_id'];  
   
} else {
    $arrCustom['cate_type_id'] = 1;
}
$cate_type_id = $arrCustom['cate_type_id'];
$detailCateType = $model->getDetail('cate_type', $cate_type_id); 
$parent_id = $arrCustom['parent_id'];
$menu_type = $arrCustom['menu_type'];
$table = "cate";
$listTotal = $model->getList($table, -1, -1, $arrCustom, 1);

$total_record = $listTotal['total'];

$total_page = ceil($total_record / 100);

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$offset = 100 * ($page - 1);

$list = $model->getList($table, $offset, 100, $arrCustom, 1);
if($cate_type_id > 0){
    $cateParentArr = $model->getListArray('cate', -1, -1, array('parent_id' => 0, 'cate_type_id' => $cate_type_id));
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
        <li><a href="index.php?mod=cate&act=list">Danh mục</a></li>
        <?php if($cate_type_id > 0){ ?>
        <li><a href="index.php?mod=cate&act=list&cate_type_id=<?php echo $cate_type_id; ?>"><?php echo $detailCateType['name_vi']; ?></a></li>
        <?php } ?>
        <?php if($parent_id > 0){ ?>
        <li><a href="index.php?mod=cate&act=list&cate_type_id=<?php echo $cate_type_id; ?>&parent_id=<?php echo $parent_id; ?>"><?php echo $detailParent['name_vi']; ?></a></li>
        <?php } ?>
        <?php if($menu_type > 0){ ?>
        <li><a href="index.php?mod=cate&act=list&cate_type_id=<?php echo $cate_type_id; ?>&parent_id=<?php echo $parent_id; ?>&menu_type=<?php echo $menu_type; ?>"><?php echo ($menu_type==1) ? "Menu ngang" : "Menu dọc"; ?></a></li>
        <?php } ?>
      </ol>
    </section>
    <a class="btn btn-primary btn-sm right" href="<?php echo $link_form; ?>">Tạo mới</a>
    <?php if($parent_id > 0){ ?>
    <a class="btn btn-warning btn-sm right" href="<?php echo $link_back; ?>">Quay lại</a>    
    <?php } ?>
         <div class="box-header">
                <h2 class="box-title" style="text-tranform:uppercase !important;color: #B10007">
                    Danh sách danh mục 
                    <?php if($cate_type_id > 0  && $parent_id == 0 ){ ?> loại sản phẩm : "<?php echo $detailCateType['name_vi']; ?>" <?php } ?>
                    <?php if($arrCustom['parent_id'] > 0){ ?> con : "<?php echo $detailParent['name_vi']; ?>" <?php } ?>
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
                    <div class="col-md-2">
                         <div class="form-group">
                            <label for="name">Thuộc menu</label>
                             <select class="form-control change-submit"  name="menu_type" id="menu_type">
                                <option value="-1" <?php if($arrCustom['menu_type'] == -1) echo "selected"; ?>>Tất cả</option>
                                <option value="1" <?php if($arrCustom['menu_type'] == 1) echo "selected"; ?>>Menu ngang</option>
                                <option value="2" <?php if($arrCustom['menu_type'] == 2) echo "selected"; ?>>Menu dọc</option>
                            </select>
                        </div>
                    </div>
                    <?php if(isset($_GET['parent_id']) && $_GET['parent_id'] > 0){ ?>
                    <div class="col-md-3">
                         <div class="form-group">
                            <label for="name">Danh mục cha</label>
                            <select class="form-control change-submit"  name="parent_id" id="parent_id">
                                <option value="-1" <?php if($arrCustom['parent_id'] == -1) echo "selected"; ?>>Tất cả</option>
                                <?php foreach ($cateParentArr as $key => $value) {
                                    ?>
                                    <option value="<?php echo $value['id']; ?>" <?php if($arrCustom['parent_id'] == $value['id']) echo "selected"; ?>><?php echo $value['name_vi']; ?></option>
                                    <?php
                                }?>
                            </select>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-md-2">
                         <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            <input type="text" name='name_vi' id='name_vi' value="<?php echo $arrCustom['name_vi']; ?>" class="form-control" />
                        </div>
                    </div>
                    
                    <div class="col-md-2">
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
                <table class="table table-bordered table-striped" id="tbl_list">
                    <tbody><tr>
                        <th width="1%">No.</th>                        
                        <th width="10%">Tên danh mục</th>                       
                       
                        <th width="5%">Menu</th>
                        <?php if(($cate_type_id > 0 && $menu_type > 0 ) || $cate_type_id > 1){ ?>
                        <th style="text-align:center;width: 1%;white-space:nowrap">Thứ tự hiển thị</th>
                        <?php } ?>
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
                    <tr id="row-<?php echo $row['id']; ?>">
                        <td width="1%"><span class="order"><?php echo $i; ?></span></td>
                        
                        <td width="10%">
                            <a href="index.php?mod=cate&act=form&id=<?php echo $row['id']; ?>&parent_id=<?php echo $row['parent_id'];?>&cate_type_id=<?php echo $row['cate_type_id']; ?>&menu_type=<?php echo $row['menu_type']; ?>">
                                <?php echo $row['name_vi']; ?>                                
                            </a>                           
                        </td>                                               
                       
                        <td width="5%"><?php echo $row['menu_type'] == 1 ?  "Menu ngang" : "Menu dọc"; ?></td>
                        <?php if(($cate_type_id > 0 && $menu_type > 0 ) || $cate_type_id > 1){ ?>
                        <td style="text-align:center;width: 1%;white-space:nowrap"><img src="img/drag.png" class="dragHandle" /></td>
                        <?php } ?>
                        <?php if($parent_id == 0){ ?>
                        <td style="text-align:center;width: 1%;white-space:nowrap">                            
                            <a class="btn btn-success btn-sm" href="index.php?mod=cate&act=list&menu_type=<?php echo $row['menu_type']; ?>&parent_id=<?php echo $row['id']; ?>&cate_type_id=<?php echo $row['cate_type_id']; ?>">
                                <span class="badge"><?php echo $model->countListByParent($row['id']); ?></span>
                            </a>                            
                        </td>
                        <?php } ?>
                        <td style="text-align:center;width: 1%;white-space:nowrap">
                            <div class="checkbox">
                                <input data-value="<?php echo $row['id']; ?>" class="show-menu" type="checkbox" <?php if($row['show_menu'] == 1) echo "checked"; ?>>                                
                            </div>                            
                        </td>
                        <td style="width: 1%;white-space:nowrap">                            
                            <a class="btn btn-info btn-sm" href="index.php?mod=cate&act=form&id=<?php echo $row['id']; ?>&parent_id=<?php echo $row['parent_id'];?>&cate_type_id=<?php echo $row['cate_type_id']; ?>&menu_type=<?php echo $row['menu_type']; ?>">
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
<script type="text/javascript">
$(document).ready(function(){
    <?php if($cate_type_id != 1){ ?>
        $('#menu_type').val(2).attr('disabled', 'disabled');
    <?php } ?>
    $('#tbl_list tbody').sortable({
            placeholder: 'placeholder',
            handle: ".dragHandle",
            start: function (event, ui) {
                    ui.item.toggleClass("highlight");
            },
            stop: function (event, ui) {
                    ui.item.toggleClass("highlight");
            },          
            axis: "y",
            update: function() {
                var rows = $('#tbl_list tbody tr');
                var strOrder = '';
                var strTemp = '';
                for (var i=0; i<rows.length; i++) {
                    strTemp = rows[i].id;
                    strOrder += strTemp.replace('row-','') + ";";
                }      

                $.ajax({
                    url: "ajax/process.php",
                    type: "POST",
                    async: false,
                    data: {
                        'action' : 'updateOrder',
                        'str_id_order' : strOrder,
                        'table' : 'cate'
                    },
                    success: function(data){
                        var countRow = $('#tbl_list tbody span.order').length;
                        for(var i = 0 ; i < countRow ; i ++ ){
                            $('span.order').eq(i).html(i+1);
                        }                        
                    }
                }); 
            }
        });
   
    $('.show-menu').on('ifChecked', function(event){
        var id = $(this).attr('data-value');
        $.ajax({
            url: "ajax/process.php",
            type: "POST",
            async: false,
            data: {
                action : 'updateShowMenu',
                show_menu : 1,
                table : 'cate',
                id  : id
            },
            success: function(data){
                                      
            }
        }); 
    });
    $('.show-menu').on('ifUnchecked', function(event){
        var id = $(this).attr('data-value');
        $.ajax({
            url: "ajax/process.php",
            type: "POST",
            async: false,
            data: {
                action : 'updateShowMenu',
                show_menu : 0,
                table : 'cate',
                id  : id
            },
            success: function(data){
                                      
            }
        }); 
    });
});
</script>