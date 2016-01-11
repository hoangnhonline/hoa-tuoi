<?php
$id = 0;
if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
    require_once "model/Backend.php";
    $model = new Backend;
    $detail = $model->getDetail("text",$id);
}
?>
<div class="row">
    <div class="col-md-8">

        <!-- Custom Tabs -->
        <button class="btn btn-primary btn-sm" onclick="location.href='index.php?mod=text&act=list'">Danh sách</button>
        <div style="clear:both;margin-bottom:10px"></div>

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo ($id > 0) ? "Cập nhật" : "Tạo mới" ?> text</h3>

            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="controller/Text.php">
                <?php if($id> 0){ ?>
                <input type="hidden" value="<?php echo $id; ?>" name="id" />
                <?php } ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="text">Nội dung <img src="img/vn.png"></label>
                        <textarea name="text_vi" id="text_vi" class="form-control required" rows="5"><?php echo isset($detail['text_vi'])  ? $detail['text_vi'] : "" ?></textarea>                        
                    </div>
                     <div class="form-group">
                        <label for="text">Nội dung <img src="img/en.png"></label>
                        <textarea name="text_en" id="text_en" class="form-control required" rows="5"><?php echo isset($detail['text_en'])  ? $detail['text_en'] : "" ?></textarea>                        
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                     <button class="btn btn-primary btnSave" type="submit">Save</button>
                     <button class="btn btn-primary" type="reset"  onclick="location.href='index.php?mod=text&act=list'">Cancel</button>
                </div>
            </form>
        </div>

    </div><!-- /.col -->
</div>