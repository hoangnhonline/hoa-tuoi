<?php
$id = 0;
if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
    require_once "model/Backend.php";
    $model = new Backend;
    $detail = $model->getDetail("cate",$id);    
}
$cateParentArr = $model->getListCateParent();
?>
<div class="row">
    <div class="col-md-12">

        <!-- Custom Tabs -->
        <button class="btn btn-primary btn-sm" onclick="location.href='index.php?mod=cate&act=list'">
            Danh sách
        </button>
        <div style="clear:both;margin-bottom:10px"></div>

        <div class="box box-primary">
            <div class="box-header">
                <h2 class="box-title" style="text-tranform:uppercase !important;color: #B10007">
                    <?php echo ($id > 0) ? "Cập nhật" : "Tạo mới" ?> danh mục <?php echo ($id > 0) ? ': "'.$detail['name_vi'].'"' : ""; ?>
                </h2>
                <div class="clearfix"></div>
            </div><!-- /.box-header -->
            <div class="clearfix"></div>
            <div class="box-body">
            <!-- form start -->
            <form role="form" method="post" id="dataForm" action="controller/Cate.php" >
                <?php if($id> 0){ ?>
                <input type="hidden" value="<?php echo $id; ?>" name="id" />
                <?php } ?>
                <input type="hidden" name="image_url" value="" />
                <table class="table table-bordered">
                    <tr>
                        <th width="15%"></th>
                        <th width="42%" style="text-align:center">Tiếng Việt <img src="img/vn.png" /></th>
                        <th width="43%" style="text-align:center">Tiếng Anh <img src="img/en.png" /></th>
                    </tr>
                    <tr>
                        <td>Thuộc Menu</td>
                        <td colspan="2">
                            <select name="menu_type" id="menu_type" class="form-control" aria-required="true" required="required">
                                <option value="0">-- Chọn menu --</option>
                                <option value="1" <?php if(isset($detail) && $detail['menu_type'] == 1) echo "selected"; ?>>Menu ngang</option>
                                <option value="2" <?php if(isset($detail) && $detail['menu_type'] == 2) echo "selected"; ?>>Menu dọc</option>
                            </select>
                        </td>                        
                    </tr>
                    <tr>
                        <td>Danh mục cha</td>
                        <td colspan="2">                            
                            <select name="parent_id" id="parent_id" class="form-control" aria-required="true" required="required">
                                <option value="0">--Danh mục gốc--</option>
                                <?php 
                                if(!empty($cateParentArr)){
                                foreach ($cateParentArr as $cate) {
                                ?>
                                <option <?php if((isset($detail) && $detail['parent_id'] == $cate['id'] ) || (isset($_GET['parent_id']) && $_GET['parent_id'] == $cate['id'])) echo "selected"; ?> value="<?php echo $cate['id']; ?>"><?php echo $cate['name_vi']; ?></option>
                                <?php    
                                }}
                                ?>
                            </select>
                        </td>                        
                    </tr>
                    <tr>
                        <td>Tên danh mục</td>
                        <td>
                            <input aria-required="true" required="required" type="text" name="name_vi" id="name_vi" value="<?php if(isset($detail)) echo $detail['name_vi']; ?>" class="form-control">
                        </td>
                        <td>
                            <input aria-required="true" required="required" type="text" name="name_en" id="name_en" value="<?php if(isset($detail)) echo $detail['name_en']; ?>" class="form-control">
                        </td>
                    </tr>
                     <tr>
                        <td>Mô tả</td>
                        <td>
                            <textarea class="form-control" name="description_vi" rows="5" id="description_vi"><?php if(isset($detail)) echo $detail['description_vi']; ?></textarea>                            
                        </td>
                        <td>
                            <textarea class="form-control" name="description_en" rows="5" id="description_en"><?php if(isset($detail)) echo $detail['description_en']; ?></textarea>
                        </td>
                    </tr>                   
                   
                    <tr>
                        <td></td>
                        <td colspan="2">
                           
                            <?php 
                               if(isset($detail)){
                                $show_menu = $detail['show_menu'];
                               }else{
                                $show_menu = 1;
                               }
                            ?>                     
                            <div class="col-md-12">                                
                                <div class="checkbox">
                                  <input type="checkbox" <?php if($show_menu == 1) echo "checked"; ?> value="1" name="show_menu"><label>&nbsp;Hiện trên menu</label>
                                </div>
                            </div>
                        </td>
                    </tr> 
                    <tr>
                        <td>Meta Title</td>
                        <td>
                            <input type="text" name="meta_title_vi" id="meta_title_vi" value="<?php if(isset($detail)) echo $detail['meta_title_vi']; ?>" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="meta_title_en" id="meta_title_en" value="<?php if(isset($detail)) echo $detail['meta_title_en']; ?>" class="form-control">
                        </td>
                    </tr>
                     <tr>
                        <td>Meta Description</td>
                        <td>
                            <textarea class="form-control" name="meta_description_vi" rows="5" id="meta_description_vi"><?php if(isset($detail)) echo $detail['meta_description_vi']; ?></textarea>                            
                        </td>
                        <td>
                            <textarea class="form-control" name="meta_description_en" rows="5" id="meta_description_en"><?php if(isset($detail)) echo $detail['meta_description_en']; ?></textarea>
                        </td>
                    </tr>  
                    <tr>
                        <td>Meta Keyword</td>
                        <td>
                            <textarea class="form-control" name="meta_keyword_vi" rows="5" id="meta_keyword_vi"><?php if(isset($detail)) echo $detail['meta_keyword_vi']; ?></textarea>                            
                        </td>
                        <td>
                            <textarea class="form-control" name="meta_keyword_en" rows="5" id="meta_keyword_en"><?php if(isset($detail)) echo $detail['meta_keyword_en']; ?></textarea>
                        </td>
                    </tr>
                                   
                    <tr>
                        <td></td>
                        <td colspan="2">
                            <button class="btn btn-primary btnSave" type="submit">Save</button>
                            <button class="btn btn-primary" type="reset" onclick="location.href='index.php?mod=cate&act=list'">Cancel</button>
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
<script type="text/javascript" src="js/form.js"></script>
<link rel="stylesheet" type="text/css" href="css/sweet.css">
<script type="text/javascript" src="js/sweet.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#dataForm').validate({
            rules: {
           menu_type: { min: 1 }
          }
        });    
    });
</script>