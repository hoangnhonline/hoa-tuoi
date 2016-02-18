<?php
$id = 0;
$is_detail = false;
$cate_type_id = $parent_id = $menu_type = 0;
if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
    require_once "model/Backend.php";
    $model = new Backend;
    $detail = $model->getDetail("cate",$id);   
    $is_detail = true; 
}

$cateTypeArr = $model->getListCateType();
if($is_detail){
    $cate_type_id = $detail['cate_type_id'];
    $detailCateType = $model->getDetail('cate_type', $cate_type_id);

    $parent_id = $detail['parent_id'];
    $detailParent = $model->getDetail('cate', $parent_id);

    $menu_type = $detail['menu_type'];
}else{
    if(isset($_GET['cate_type_id']) && $_GET['cate_type_id'] > 0){
        $cate_type_id = $_GET['cate_type_id'];
        $detailCateType = $model->getDetail('cate_type', $cate_type_id);
    }
    if(isset($_GET['parent_id']) && $_GET['parent_id'] > 0){
        $parent_id = $_GET['parent_id'];
        $detailParent = $model->getDetail('cate', $parent_id);
        $cate_type_id = $detailParent['cate_type_id'];
    } 
    if(isset($_GET['menu_type']) && $_GET['menu_type'] > 0){
        $menu_type = $_GET['menu_type'];        
    }    
}
if($cate_type_id > 0){
    $cateParentArr = $model->getListArray('cate', -1, -1, array('parent_id' => 0, 'cate_type_id' => $cate_type_id));
}else{
    $cateParentArr = $model->getListCateParent();
}
?>
<div class="row">
    <div class="col-md-12">
        <section class="content-header">     
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="index.php?mod=cate&act=list">Danh mục</a></li>     
            <?php if(isset($_GET['cate_type_id']) && $_GET['cate_type_id'] > 0){ ?>
            <li><a href="index.php?mod=cate&act=list&cate_type_id=<?php echo $cate_type_id; ?>"><?php echo $detailCateType['name_vi']; ?></a></li>
            <?php } ?>
            <?php if(isset($_GET['parent_id']) && $_GET['parent_id'] > 0){ ?>
            <li><a href="index.php?mod=cate&act=list&cate_type_id=<?php echo $cate_type_id; ?>&parent_id=<?php echo $parent_id; ?>"><?php echo $detailParent['name_vi']; ?></a></li>
            <?php } ?>            
          </ol>
        </section>
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
            <form role="form" method="post" id="dataForm" action="controller/Cate.php"  enctype="multipart/form-data">
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
                        <td>Loại sản phẩm<span class="error">*</span></td>
                        <td colspan="2">
                            <select name="cate_type_id" id="cate_type_id" class="form-control">
                                <option value="0">-- Chọn loại sản phẩm --</option>
                                <?php 
                                if(!empty($cateTypeArr)){
                                foreach ($cateTypeArr as $cateType) {
                                ?>
                                <option value="<?php echo $cateType['id']; ?>" 
                                    <?php if((isset($cate_type_id) && $cate_type_id == $cateType['id'])) echo "selected"; ?>>
                                    <?php echo $cateType['name_vi']; ?>
                                </option>
                                <?php } } ?>
                                
                            </select>
                        </td>                        
                    </tr>
                    <tr id="loai-menu">
                        <td>Thuộc Menu<span class="error">*</span></td>
                        <td colspan="2">
                            <select name="menu_type" id="menu_type" class="form-control">
                                <option value="0">-- Chọn menu --</option>
                                <option value="1" <?php if((isset($detail) && $detail['menu_type'] == 1) || (isset($_GET['menu_type']) && $_GET['menu_type'] == 1)) echo "selected"; ?>>Menu ngang</option>
                                <option value="2" <?php if((isset($detail) && $detail['menu_type'] == 2) || (isset($_GET['menu_type']) && $_GET['menu_type'] == 2)) echo "selected"; ?>>Menu dọc</option>
                            </select>
                        </td>                        
                    </tr>
                    <tr>
                        <td>Danh mục cha<span class="error">*</span></td>
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
                        <td>Tên danh mục<span class="error">*</span></td>
                        <td>
                            <input aria-required="true" required="required" type="text" name="name_vi" id="name_vi" value="<?php if(isset($detail)) echo $detail['name_vi']; ?>" class="form-control">
                        </td>
                        <td>
                            <input aria-required="true" required="required" type="text" name="name_en" id="name_en" value="<?php if(isset($detail)) echo $detail['name_en']; ?>" class="form-control">
                        </td>
                    </tr>
                     <!--<tr>
                        <td>Mô tả</td>
                        <td>
                            <textarea class="form-control" name="description_vi" rows="5" id="description_vi"><?php if(isset($detail)) echo $detail['description_vi']; ?></textarea>                            
                        </td>
                        <td>
                            <textarea class="form-control" name="description_en" rows="5" id="description_en"><?php if(isset($detail)) echo $detail['description_en']; ?></textarea>
                        </td>
                    </tr>-->                   
                   
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
                            <div class="col-md-6">                                
                                <div class="checkbox">
                                  <input type="checkbox" <?php if($show_menu == 1) echo "checked"; ?> value="1" name="show_menu"><label>&nbsp;Hiện trên menu</label>
                                </div>
                            </div>
                            <?php 
                               if(isset($detail)){
                                    $is_new = $detail['is_new'];
                                    $is_hot = $detail['is_hot'];                                    
                               }else{
                                    $is_new = $is_hot = 0;
                               }
                            ?>                     
                             <!--<div class="col-md-4">                                
                                <div class="checkbox">
                                  <input type="checkbox" <?php if($is_new == 1) echo "checked"; ?> value="1" name="is_new" id="is_new"><label>Mẫu hoa mới</label>
                                </div>
                            </div>-->
                            <div class="col-md-6">                                
                                <div class="checkbox">
                                  <input type="checkbox" <?php if($is_hot == 1) echo "checked"; ?> value="1" name="is_hot" id="is_hot"><label>Danh mục HOT (trang chủ)</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <!--<tr>
                        <td>Hình ảnh</td>
                        <td colspan="2">
                            <div class="form-group">                            
                            <input type="radio" id="choose_img_sv" name="choose_img" value="1" checked="checked"/> Chọn ảnh từ server
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="choose_img_cp" name="choose_img" value="2" /> Chọn ảnh từ máy tính
                            <div id="from_sv">
                                <input type="hidden" name="image_url" id="image_url" class="form-control" value="<?php if(!empty($detail['image_url'])) echo "../".$detail['image_url']; ?>" /><br />
                                <?php if(!empty($detail['image_url'])){ ?>
                                <img id="img_thumnails" src="../<?php echo $detail['image_url']; ?>" width="100" />
                                <?php }else{ ?>
                                <img id="img_thumnails" src="static/img/no_image.jpg" width="100" />
                                <?php } ?>
                                <button class="btn btn-default " type="button" onclick="BrowseServer('Images:/','image_url')" >Upload</button>
                            </div>
                            <div id="from_cp" style="display:none;padding:15px;margin-bottom:10px">
                                <input type="file" name="image_url_upload" />
                            </div>

                        </div>
                        </td>
                    </tr> -->
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
                            <button class="btn btn-warning" type="reset" onclick="location.href='index.php?mod=cate&act=list'">Cancel</button>
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

<script type="text/javascript">
    $(document).ready(function(){
        $('#dataForm').validate({
            rules: {
                menu_type: { min: 1 },
                cate_type_id: { min: 1 }
            }
        });    
        <?php if(isset($cate_type_id) && $cate_type_id == 1){ ?>            
            $('#loai-menu').show();
        <?php }else{ ?>           
            $('#loai-menu').hide();
        <?php } ?>
        $('#cate_type_id').change(function(){            
            if($(this).val()==1){                
                $('#loai-menu').show();
            }else{                
                $('#loai-menu').hide();
            }
        });

    });
</script>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>

<script type="text/javascript">


function split(val) {
    return val.split(/;\s*/);
}

function extractLast(term) {
    return split(term).pop();
}
function BrowseServer( startupPath, functionData ){    
    var finder = new CKFinder();
    finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
    finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
    finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
    finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
    //finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn    
    finder.popup(); // Bật cửa sổ CKFinder
} //BrowseServer

function SetFileField( fileUrl, data ){
    document.getElementById( data["selectActionData"] ).value = fileUrl;
    $('#img_thumnails').attr('src',fileUrl).show();
}
function BrowseServerIcon( startupPath, functionData ){    
    var finder = new CKFinder();
    finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
    finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
    finder.selectActionFunction = SetFileFieldIcon; // hàm sẽ được gọi khi 1 file được chọn
    finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
    //finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn    
    finder.popup(); // Bật cửa sổ CKFinder
} //BrowseServer

function SetFileFieldIcon( fileUrl, data ){
    document.getElementById( data["selectActionData"] ).value = fileUrl;
    $('#img_icon').attr('src', fileUrl).show();
}
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#choose_img_sv').on('ifChecked', function(event){
        $('#from_sv').show();
        $('#from_cp').hide();
    });
    $('#choose_img_cp').on('ifChecked', function(event){
        $('#from_cp').show();
        $('#from_sv').hide();
    });    
});    
</script>