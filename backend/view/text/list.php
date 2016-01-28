<?php
require_once "model/Backend.php";
$model = new Backend;
$link = "index.php?mod=text&act=list";

if (isset($_GET['status']) && $_GET['status'] > 0) {
    $lang_id = (int) $_GET['status'];
    $status.="&status=$status";
} else {
    $status = -1;
}

$listTotal = $model->getList('text', -1, -1);

$total_record = $listTotal['total'];
$limit = 100;
$total_page = ceil($total_record / $limit);

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$offset = $limit * ($page - 1);

$list = $model->getList('text', $offset, $limit);

?>
<div class="row">
    <div class="col-md-12">
    <button class="btn btn-primary btn-sm right" onclick="location.href='index.php?mod=text&act=form'">Tạo mới</button>
         <div class="box-header">
                <h3 class="box-title">Danh sách text</h3>
            </div><!-- /.box-header -->
        <div class="box">

            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <tbody><tr>
                        <th style="width: 5%">No.</th>
                        <th style="width:45%">Nội dung <img src="img/vn.png" ></th>
                        <th style="width:45%">Nội dung <img src="img/en.png" ></th>
                        <th style="width: 5%;text-align:center">Action</th>
                    </tr>
                    <?php
                    $i = ($page-1) * LIMIT;
                    if(!empty($list['data'])){
                    foreach ($list['data'] as $key => $row) {
                    $i++;
                    ?>
                    <tr>
                        <td style="text-align:center"><?php echo $i."<span style='display:none'> - ".$row['id']."</span>"; ?></td>
                        <td><?php echo $row['text_vi']; ?> </td>
                        <td><?php echo $row['text_en']; ?> </td>
                        <td style="white-space:nowrap">
                            <?php if($row['id']!=11){ ?>
                            <a class="btn btn-info btn-xs" href="index.php?mod=text&act=form&id=<?php echo $row['id']; ?>">
                                Chỉnh sửa
                            </a>
                            <?php }else{ ?>
                            <a class="btn btn-info btn-xs" href="index.php?mod=lh&act=form">
                                Chỉnh sửa
                            </a>
                            <?php } ?>
                            <a class="btn btn-danger btn-xs link-delete" href="javascript:;" alias="<?php echo $row['text_vi']; ?>" id="<?php echo $row['id']; ?>" mod="text" class="link_delete" >
                                Xóa
                            </a>
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