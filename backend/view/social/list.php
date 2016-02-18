<?php
require_once "model/Backend.php";
$model = new Backend;
$link = "index.php?mod=text&act=list";

$list = $model->getListSocial();

?>
<div class="row">
    <div class="col-md-12">    
         <div class="box-header">
                <h3 class="box-title">Danh sách tài khoản social</h3>
            </div><!-- /.box-header -->
        <div class="box">

            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <tbody><tr>
                        <th style="width: 5%">No.</th>
                        <th style="width:45%">Tài khoản</th>
                        <th style="width:45%">Nội dung</th>
                        <th style="width: 5%;text-align:center">Action</th>
                    </tr>
                    <?php
                    $i = 0;
                    if(!empty($list)){
                    foreach ($list as $key => $row) {
                    $i++;
                    ?>
                    <tr>
                        <td style="text-align:center"><?php echo $i."<span style='display:none'> - ".$row['id']."</span>"; ?></td>
                        <td><?php 
                        if($row['id'] == 23) echo "Facebook";
                        if($row['id'] == 24) echo "Google +";
                        if($row['id'] == 25) echo "Twitter";
                        if($row['id'] == 26) echo "Skype";
                        ?> </td>
                        <td><?php echo $row['text_en']; ?> </td>
                        <td style="white-space:nowrap">
                           
                            <a class="btn btn-info btn-xs" href="index.php?mod=social&act=form&id=<?php echo $row['id']; ?>">
                                Chỉnh sửa
                            </a>
                           
                            <!--<a class="btn btn-danger btn-xs link-delete" href="javascript:;" alias="<?php echo $row['text_vi']; ?>" id="<?php echo $row['id']; ?>" mod="social" class="link_delete" >
                                Xóa
                            </a>-->
                        </td>
                    </tr>
                    <?php } } ?>
                </tbody></table>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">                
                <?php echo $model->phantrang($page, PAGE_SHOW, $total_page, $link); ?>
            </div>
        </div><!-- /.box -->
    </div><!-- /.col -->

</div>