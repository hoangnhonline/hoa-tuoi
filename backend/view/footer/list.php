<?php
require_once "model/Backend.php";
$model = new Backend;
$link = $link_back = "index.php?mod=footer&act=list";
$link_form = "index.php?mod=footer&act=form";


$table = "footer";
$listTotal = $model->getList($table, -1, -1, array(), 1);

$total_record = $listTotal['total'];

$total_page = ceil($total_record / 100);

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$offset = 100 * ($page - 1);

$list = $model->getList($table, $offset, 100, array(), 1);

?>
<div class="row">
    <div class="col-md-12">
        <section class="content-header">     
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="index.php?mod=footer&act=list">Nội dung footer</a></li>       
      </ol>
    </section>
    <a class="btn btn-primary btn-sm right" href="<?php echo $link_form; ?>">Tạo mới</a>   
         <div class="box-header">
                <h2 class="box-title" style="text-tranform:uppercase !important;color: #B10007">
                    Danh sách nội dung footer        
                </h2>
            </div><!-- /.box-header -->
        <div class="box">
           
            <div class="box-body">
                <table class="table table-bordered table-striped" id="tbl_list">
                    <tbody><tr>
                        <th width="1%">No.</th>                      
                                            
                        <th width="80%">Tiêu đề</th>                       
                        
                        <th style="text-align:center;width: 1%;white-space:nowrap">Thứ tự hiển thị</th>

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
                        
                        <td width="80%">
                            <a href="index.php?mod=footer&act=form&id=<?php echo $row['id']; ?>&parent_id=<?php echo $row['parent_id'];?>&cate_type_id=<?php echo $row['cate_type_id']; ?>&menu_type=<?php echo $row['menu_type']; ?>">
                                <?php echo $row['name_vi']; ?>                                
                            </a>                           
                        </td>                                                                      
                        <td style="text-align:center;width: 1%;white-space:nowrap"><img src="img/drag.png" class="dragHandle" /></td>
                        
                     
                        <td style="width: 1%;white-space:nowrap">                            
                            <a class="btn btn-info btn-xs" href="index.php?mod=footer&act=form&id=<?php echo $row['id']; ?>">
                                Chỉnh sửa
                            </a>
                           
                            <a class="btn btn-danger btn-xs link-delete" href="javascript:;" alias="<?php echo $row['name_vi']; ?>" id="<?php echo $row['id']; ?>" mod="footer" class="link_delete" >
                                Xóa
                            </a>                          

                        </td>
                    </tr>
                    <?php } }else{  ?>
                    <tr>
                        <td colspan="4">Không tìm thấy dữ liệu.</td>
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
                        'table' : 'footer'
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
});
</script>