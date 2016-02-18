<?php
$id = 0;
if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
    require_once "model/Backend.php";
    $model = new Backend;
    $detail = $model->getDetail("text", $id);
}
?>
<div class="row">
    <div class="col-md-8">

        <!-- Custom Tabs -->
        <button class="btn btn-primary btn-sm" onclick="location.href='index.php?mod=social&act=list'">Danh sách</button>
        <div style="clear:both;margin-bottom:10px"></div>

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo ($id > 0) ? "Cập nhật" : "Tạo mới" ?> tài khoản social</h3>

            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="controller/Social.php">
                <?php if($id> 0){ ?>
                <input type="hidden" value="<?php echo $id; ?>" name="id" />
                <?php } ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="text">Tài khoản : </label>
                        <span> <?php 
                         if($detail['id'] == 23) echo "Facebook";
                        if($detail['id'] == 24) echo "Google +";
                        if($detail['id'] == 25) echo "Twitter";
                        if($detail['id'] == 26) echo "Skype";
                        ?></span>
                    </div>
                     <div class="form-group">
                        <label for="text">Nội dung</label>
                        <input type="text" name="text_vi" id="text_vi" class="form-control required" value="<?php echo isset($detail['text_vi'])  ? $detail['text_vi'] : "" ?>" />
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                     <button class="btn btn-primary btnSave" type="submit">Save</button>
                     <button class="btn btn-primary" type="reset"  onclick="location.href='index.php?mod=social&act=list'">Cancel</button>
                </div>
            </form>
        </div>

    </div><!-- /.col -->
</div>