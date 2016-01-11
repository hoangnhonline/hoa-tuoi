<?php
$id = 0;
if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
    require_once "model/Backend.php";
    $model = new Backend;
    $detail = $model->getDetail("footer",$id);    
}
?>
<div class="row">
    <div class="col-md-12">
        <section class="content-header">     
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="index.php?mod=footer&act=list">Nội dung footer</a></li>       
          </ol>
        </section>
        <!-- Custom Tabs -->
        <button class="btn btn-primary btn-sm" onclick="location.href='index.php?mod=footer&act=list'">
            Danh sách
        </button>
        <div style="clear:both;margin-bottom:10px"></div>

        <div class="box box-primary">
            <div class="box-header">
                <h2 class="box-title" style="text-tranform:uppercase !important;color: #B10007">
                    <?php echo ($id > 0) ? "Cập nhật" : "Tạo mới" ?>  nội dung footer <?php echo ($id > 0) ? ': "'.$detail['name_vi'].'"' : ""; ?>
                </h2>
                <div class="clearfix"></div>
            </div><!-- /.box-header -->
            <div class="clearfix"></div>
            <div class="box-body">
            <!-- form start -->
            <form role="form" method="post" id="dataForm" action="controller/Footer.php">
                <?php if($id> 0){ ?>
                <input type="hidden" value="<?php echo $id; ?>" name="id" />
                <?php } ?>               
                <table class="table table-bordered">
                    <tr>
                        <th width="15%"></th>
                        <th width="42%" style="text-align:center">Tiếng Việt <img src="img/vn.png" /></th>
                        <th width="43%" style="text-align:center">Tiếng Anh <img src="img/en.png" /></th>
                    </tr>
                   
                    <tr>
                        <td>Tiêu đề<span class="error">*</span></td>
                        <td>
                            <input aria-required="true" required="required" type="text" name="name_vi" id="name_vi" value="<?php if(isset($detail)) echo $detail['name_vi']; ?>" class="form-control">
                        </td>
                        <td>
                            <input aria-required="true" required="required" type="text" name="name_en" id="name_en" value="<?php if(isset($detail)) echo $detail['name_en']; ?>" class="form-control">
                        </td>
                    </tr>                    
                 
                     <tr>
                        <td>Nội dung</td>
                        <td>
                            <textarea class="form-control" name="content_vi" rows="15" id="content_vi"><?php if(isset($detail)) echo $detail['content_vi']; ?></textarea>                            
                        </td>
                        <td>
                            <textarea class="form-control" name="content_en" rows="15" id="content_en"><?php if(isset($detail)) echo $detail['content_en']; ?></textarea>
                        </td>
                    </tr>  
                    
                    <tr>
                        <td></td>
                        <td colspan="2">
                            <button class="btn btn-primary btnSave" type="submit">Save</button>
                            <button class="btn btn-warning" type="reset" onclick="location.href='index.php?mod=footer&act=list'">Cancel</button>
                        </td>
                    </tr>                           
                </table>               
                </form>
                
        </div>

    </div><!-- /.col -->
</div>
<style type="text/css">
.table td{padding: 10px !important;}
</style>

</div>
<script type="text/javascript" src="js/validate.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#dataForm').validate();    
    });       
</script>