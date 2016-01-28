<?php
require_once "model/Backend.php";
$model = new Backend;
$link = $link_back = "index.php?mod=pages&act=list";
$link_form = "index.php?mod=pages&act=form";

$table = "pages";

$list = $model->getList($table, 0, 100);
?>
<div class="row">
    <div class="col-md-12">
        <section class="content-header">     
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="index.php?mod=pages&act=list">Trang nội dung</a></li>       
      </ol>
    </section>
    <a class="btn btn-primary btn-sm right" href="<?php echo $link_form; ?>">Tạo mới</a>   
         <div class="box-header">
                <h2 class="box-title" style="text-tranform:uppercase !important;color: #B10007">
                    Danh sách trang nội dung                
                </h2>
            </div><!-- /.box-header -->
        <div class="box">            
            <div class="box-body">
                <table class="table table-bordered table-striped" id="tbl_list">
                    <tbody><tr>
                        <th width="1%">No.</th>
                        <th width="49%">Tiêu đề trang - URL <img src="img/vn.png"></th>
                        <th width="49%">Tiêu đề trang - URL <img src="img/en.png"></th>
                        <th style="width: 1%;white-space:nowrap">Thao tác</th>
                    </tr>
                    <?php
                    $i = 0;
                    if(!empty($list['data'])){
                    foreach ($list['data'] as $key => $row) {
                    $i++;
                    ?>
                    <tr id="row-<?php echo $row['id']; ?>">
                        <td width="1%"><span class="order"><?php echo $i; ?></span></td>
                        
                        <td>
                            <a style="font-size:16px" href="index.php?mod=pages&act=form&id=<?php echo $row['id']; ?>">
                                <?php echo $row['name_vi']; ?> 
                            </a>                     
                            <br /><br /><?php echo $row['alias_vi']; ?>.html      
                        </td>   
                        <td>
                            <a style="font-size:16px;" href="index.php?mod=pages&act=form&id=<?php echo $row['id']; ?>">
                                <?php echo $row['name_en']; ?>                               
                            </a>                           
                            <br /><br /> <?php echo $row['alias_en']; ?>.html 
                        </td>                     
                        <td style="width: 1%;white-space:nowrap">                            
                            <a class="btn btn-info btn-xs" href="index.php?mod=pages&act=form&id=<?php echo $row['id']; ?>">
                                Chỉnh sửa
                            </a>
                            <a class="btn btn-danger btn-xs link-delete" href="javascript:;" alias="<?php echo $row['name_vi']; ?>" id="<?php echo $row['id']; ?>" mod="pages" class="link_delete" >
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
        </div><!-- /.box -->
    </div><!-- /.col -->

</div>