<?php
require_once "model/Backend.php";

$model = new Backend;

$link = "index.php?mod=block&act=list";

$arrList = $model->getList("block", -1 , -1);

?>



<div class="row">

    <div class="col-md-12">

    <button class="btn btn-primary btn-sm right" onclick="location.href='index.php?mod=block&act=form'">Tạo mới</button>

         <div class="box-header">

                <h3 class="box-title">Danh sách block</h3>

            </div><!-- /.box-header -->

        <div class="box">

            <div class="box_search">



            </div>

            <div class="box-body">

                <table class="table table-bordered table-striped">

                    <tbody><tr>

                        <th style="width:1%">No.</th>

                        <th width="300">Block Name <img src="img/vn.png"></th>
                        <th width="300">Block Name <img src="img/en.png"></th>

                        <th style="width: 1%">Action</th>

                    </tr>

                    <?php
                    $i = 0;
                    if(!empty($arrList['data'])){

                    foreach($arrList['data'] as $row){

                    $i++;

                    ?>

                    <tr>

                        <td><?php echo $i; ?></td>

                        <td>

                            <a href="index.php?mod=block&act=form&id=<?php echo $row['id']; ?>">

                                <?php echo $row['name_vi']; ?>

                            </a>



                        </td>
                        <td>

                            <a href="index.php?mod=block&act=form&id=<?php echo $row['id']; ?>">

                                <?php echo $row['name_en']; ?>

                            </a>



                        </td>

                        <td style="white-space:nowrap">

                            <a href="index.php?mod=block&act=form&id=<?php echo $row['id']; ?>">

                                <i class="fa fa-fw fa-edit"></i>

                            </a>

                            <a href="javascript:;" alias="<?php echo $row['name_vi']; ?>" id="<?php echo $row['id']; ?>" mod="block" class="link_delete" >

                                <i class="fa fa-fw fa-trash-o"></i>

                            </a>



                        </td>

                    </tr>

                    <?php } }else{ ?>

                    <tr>

                        <td colspan="8" class="error_data">Không tìm thấy dữ liệu!</td>

                    </tr>

                    <?php } ?>

                </tbody></table>

            </div><!-- /.box-body -->

            <div class="box-footer clearfix">

                <!--

                <ul class="pagination pagination-sm no-margin pull-right">

                    <li><a href="#">«</a></li>

                    <li><a href="#">1</a></li>

                    <li><a href="#">2</a></li>

                    <li><a href="#">3</a></li>

                    <li><a href="#">»</a></li>

                </ul>-->

            </div>

        </div><!-- /.box -->

    </div><!-- /.col -->



</div>