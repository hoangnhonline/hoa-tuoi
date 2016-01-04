<?php
$id = 0;
$is_detail = false;
$cate_type_id = $parent_id = $menu_type = 0;
if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
    require_once "model/Backend.php";
    $model = new Backend;
    $detail = $model->getDetail("product",$id);   
    $is_detail = true;
    $arrCateSelected = $model->getListProductCate($id);
    foreach ($arrCateSelected as $key => $value) {
        $arrCateId[] = $value['parent_id']."-".$value['cate_id'];
    }
}

$cateTypeArr = $model->getListCateType();
if($is_detail){
    $cate_type_id = $detail['cate_type_id'];
    $detailCateType = $model->getDetail('cate_type', $cate_type_id);
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
            <li><a href="index.php?mod=product&act=list">Sản phẩm</a></li>     
            <?php if(isset($_GET['cate_type_id']) && $_GET['cate_type_id'] > 0){ ?>
            <li><a href="index.php?mod=cate&act=list&cate_type_id=<?php echo $cate_type_id; ?>"><?php echo $detailCateType['name_vi']; ?></a></li>
            <?php } ?>
            <?php if(isset($_GET['parent_id']) && $_GET['parent_id'] > 0){ ?>
            <li><a href="index.php?mod=cate&act=list&cate_type_id=<?php echo $cate_type_id; ?>&parent_id=<?php echo $parent_id; ?>"><?php echo $detailParent['name_vi']; ?></a></li>
            <?php } ?>            
          </ol>
        </section>
        <!-- Custom Tabs -->
        <button class="btn btn-primary btn-sm" onclick="location.href='index.php?mod=product&act=list'">
            Danh sách
        </button>
        <div style="clear:both;margin-bottom:10px"></div>

        <div class="box box-primary">
            <div class="box-header">
                <h2 class="box-title" style="text-tranform:uppercase !important;color: #B10007">
                    <?php echo ($id > 0) ? "Cập nhật" : "Tạo mới" ?> sản phẩm <?php echo ($id > 0) ? ': "'.$detail['name_vi'].'"' : ""; ?>
                </h2>
                <div class="clearfix"></div>
            </div><!-- /.box-header -->
            <div class="clearfix"></div>
            <div class="box-body">
            <!-- form start -->
            <form role="form" method="post" id="dataForm" action="controller/Product.php" enctype="multipart/form-data">
                <?php if($id> 0){ ?>
                <input type="hidden" value="<?php echo $id; ?>" name="id" id="product_id" />
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
                            <label class="error" id="error_cate_type_id">Vui lòng chọn 1 loại sản phẩm.</label>
                        </td>                        
                    </tr>                    
                    <tr>
                        <td>Danh mục<span class="error">*</span></td>
                        <td colspan="2">            
                           <label class="error" id="error_cate_id">Vui lòng nhập chọn ít nhất 1 danh mục.</label>                
                           <div class="col-md-12" id="list-cate">
                            <h4 style="color:#0066FF">Chọn loại sản phẩm phía trên để hiển thị danh mục tương ứng.</h4>
                           </div>
                        </td>                        
                    </tr>
                    <tr>
                        <td>Tên sản phẩm<span class="error">*</span></td>
                        <td>
                            <input aria-required="true" required="required" type="text" name="name_vi" id="name_vi" value="<?php if(isset($detail)) echo $detail['name_vi']; ?>" class="form-control">
                            <label class="error" id="error_name_vi">Vui lòng nhập vào trường này.</label>
                        </td>
                        <td>
                            <input aria-required="true" required="required" type="text" name="name_en" id="name_en" value="<?php if(isset($detail)) echo $detail['name_en']; ?>" class="form-control">
                            <label class="error" id="error_name_en">Vui lòng nhập vào trường này.</label>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2">
                           
                            <?php 
                               if(isset($detail)){
                                    $is_new = $detail['is_new'];
                                    $is_sale = $detail['is_sale'];                                    
                               }else{
                                    $is_new = $is_sale = 0;
                               }
                            ?>                     
                            <div class="col-md-6">                                
                                <div class="checkbox">
                                  <input type="checkbox" <?php if($is_new == 1) echo "checked"; ?> value="1" name="is_new" id="is_new"><label>Sản phẩm mới</label>
                                </div>
                            </div>
                            <div class="col-md-6">                                
                                <div class="checkbox">
                                  <input type="checkbox" <?php if($is_sale == 1) echo "checked"; ?> value="1" name="is_sale" id="is_sale"><label>Sản phẩm khuyến mãi</label>
                                </div>
                            </div>
                        </td>
                    </tr> 
                    <tr>
                        <td>Giá sản phẩm</td>
                        <td colspan="2">
                           
                            <?php 
                               if(isset($detail)){
                                    $is_new = $detail['is_new'];
                                    $is_sale = $detail['is_sale'];                                    
                               }else{
                                    $is_new = $is_sale = 0;
                               }
                            ?>                     
                            <div class="col-md-6" >                                
                                <div class="form-group">
                                    <label>Giá<span class="error">*</span></label>
                                   <input aria-required="true" required="required" type="text" name="price" id="price" value="<?php if(isset($detail)) echo number_format($detail['price']); ?>" class="form-control number">
                                   <label class="error" id="error_price">Vui lòng nhập vào trường này.</label>
                                </div>
                            </div>
                            <div class="col-md-6">                                
                                <div class="form-group">
                                    <label>Giá khuyến mãi</label>
                                   <input type="text" name="price_sale" id="price_sale" value="<?php if(isset($detail['price_sale']) && $detail['price_sale'] > 0) echo number_format($detail['price_sale']); ?>" class="form-control number">
                                   <label class="error" id="error_price_sale">Vui lòng nhập vào trường này.</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Hình ảnh</td>
                        <td colspan="2">
                            <div class="form-group">                                
                                <!--<input type="radio" id="choose_img_sv" name="choose_img" value="1" checked="checked"/> Chọn ảnh từ server
                                &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="choose_img_cp" name="choose_img" value="2" /> Chọn ảnh từ máy tính
                                <div id="from_sv">-->
                                    <input type="file" name="image_url_upload" id="image_url_upload" />

                                    <input type="hidden" name="image_url" id="image_url" class="form-control" value="<?php if(!empty($detail['image_url'])) echo "../".$detail['image_url']; ?>" /><br />
                                    <?php if(!empty($detail['image_url'])){ ?>
                                    <img id="img_thumnails" class="img-thumbnail" src="../<?php echo $detail['image_url']; ?>" width="150" />
                                    <?php }else{ ?>
                                    <img id="img_thumnails" class="img-thumbnail"  src="static/img/no_image.jpg" width="150" />
                                    <?php } ?>
                                    <!--<button class="btn btn-default " type="button" onclick="BrowseServer('Images:/','image_url')" >Upload</button>-->
                                <!--</div>
                                <div id="from_cp" style="display:none;padding:15px;margin-bottom:10px">-->
                                    
                                <!--</div>-->
                            </div>
                        </td>
                    </tr> 
                    <tr>
                        <td>Mô tả ngắn</td>
                        <td>
                            <textarea class="form-control" name="description_vi" rows="5" id="description_vi"><?php if(isset($detail)) echo stripslashes($detail['description_vi']); ?></textarea>                            
                        </td>
                        <td>
                            <textarea class="form-control" name="description_en" rows="5" id="description_en"><?php if(isset($detail)) echo stripslashes($detail['description_en']); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Quà tặng</td>
                        <td>
                            <textarea class="form-control" name="gift_vi" rows="3" id="gift_vi"><?php if(isset($detail)) echo stripslashes($detail['gift_vi']); ?></textarea>                            
                        </td>
                        <td>
                            <textarea class="form-control" name="gift_en" rows="3" id="gift_en"><?php if(isset($detail)) echo stripslashes($detail['gift_en']); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Chi tiết</td>
                        <td>
                            <textarea class="form-control" name="content_vi" id="content"><?php if(isset($detail)) echo stripslashes($detail['content_vi']); ?></textarea>
                        </td>
                        <td>
                            <textarea class="form-control" name="content_en" id="content_en"><?php if(isset($detail)) echo stripslashes($detail['content_en']); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Ghi chú</td>
                        <td>
                            <textarea class="form-control" name="note_vi" rows="3" id="note_vi"><?php if(isset($detail)) echo $detail['note_vi']; ?></textarea>                            
                        </td>
                        <td>
                            <textarea class="form-control" name="note_en" rows="3" id="note_en"><?php if(isset($detail)) echo $detail['note_en']; ?></textarea>
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
                            <button class="btn btn-primary" id="btnSave" type="submit" onclick="return validateData();">Save</button>
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
#list-cate{   
    height: 250px;
    overflow-y: scroll; 
}
label.error{
    display: none;
}
</style>


</div>
<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript" src="js/form.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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
function validateData(){
    var countError = 0;
    if($('#cate_type_id').val()==0){
        $('#error_cate_type_id').show();
        countError++;
    }else{
        $('#error_cate_type_id').hide();
    }
    if($('#cate_type_id').val()>0){
        if($('.cate_id:checked').length == 0){
            $('#error_cate_id').show();
            countError++;
        }else{
            $('#error_cate_id').hide();
        }
    }
    if($('#name_vi').val()==''){
        $('#error_name_vi').show();
        countError++;
    }else{
        $('#error_name_vi').hide();   
    }
    if($('#name_en').val()==''){
        $('#error_name_en').show();
        countError++;
    }else{
        $('#error_name_en').hide();   
    }
    if($('#price').val()==''){
        $('#error_price').show();
        countError++;
    }else{
        $('#error_price').hide();   
    }
    if($('#is_sale').prop('checked') == true){
        if($('#price_sale').val()==''){
            $('#error_price_sale').show();
            countError++;
        }else{            
            $('#error_price_sale').hide();            
        }
    }
    if(countError == 0){
        return true;
    }else{
         $('html, body').animate({
            scrollTop: $("label.error").parent().parent().offset().top
        }, 500);
        return false;        
    }
}
$(function(){    
    $('#choose_img_sv').on('ifChecked', function(event){
        $('#from_sv').show();
        $('#from_cp').hide();
    });
    $('#choose_img_cp').on('ifChecked', function(event){
        $('#from_cp').show();
        $('#from_sv').hide();
    });    
   
    $(document).on('click','.remove_image', function(){
        var obj = $(this);
        if(confirm('Are you sure you want to remove this image?')){
            var image_url = obj.attr('data-value');
            var image_id = obj.attr('data-id');
            $.ajax({
                url: "ajax/remove-image.php",
                type: "POST",
                async: true,
                data: {
                    image_id : image_id,
                    image_url : image_url 
                },
                success: function(data){                    
                    obj.parent().parent().remove();
                }
            });

        }    
    });
  
}); 
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#name_vi').change(function(){
            if($(this).val()==''){
                $('#error_name_vi').show();
            }else{
                $('#error_name_vi').hide();
            }
        });
        $('#name_en').change(function(){
            if($(this).val()==''){
                $('#error_name_en').show();
            }else{
                $('#error_name_en').hide();
            }
        });
         $('#price').change(function(){
            if($(this).val()==''){
                $('#error_price').show();
            }else{
                $('#error_price').hide();
            }
        });
        <?php if(isset($cate_type_id) && $cate_type_id == 1){ ?>            
            $('#loai-menu').show();
        <?php }else{ ?>           
            $('#loai-menu').hide();
        <?php } ?>
        <?php if(isset($detail['cate_type_id']) && $detail['cate_type_id']){ ?>
            $.ajax({
                url: "ajax/process.php",
                type: "POST",
                async: false,
                data: {
                    action : 'getCate',
                    product_id : $('#product_id').val(),
                    cate_type_id : <?php echo $detail['cate_type_id']; ?>
                },
                success: function(data){
                    $('#list-cate').html(data);
                    <?php if(!empty($arrCateId)) { 
                        foreach ($arrCateId as $strCateId) {                          
                            ?>
                            $('.cate_id[value="<?php echo $strCateId; ?>"]').iCheck('check');
                            <?php
                        }
                    } ?>

                }
            }); 
        <?php } ?>
        $('#cate_type_id').change(function(){            
            var cate_type_id = $(this).val();
            if(cate_type_id > 0){
                $('#error_cate_type_id').hide();
            }else{
                $('#error_cate_type_id').show();
            }
            $.ajax({
                url: "ajax/process.php",
                type: "POST",
                async: false,
                data: {
                    action : 'getCate',
                    cate_type_id : cate_type_id,
                    product_id : $('#product_id').val()
                },
                success: function(data){
                    $('#list-cate').html(data); 
                }
            }); 
        });

    });

</script>
<script type="text/javascript">

var editor = CKEDITOR.replace( 'content',{

    uiColor : '#9AB8F3',

    language:'vi',

    height:300,    

    skin:'kama',      

        filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',    

        filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

    toolbar:[

    ['Source','-','Bold','Italic','Underline','Strike'],   
    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],       

    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],

    ['Link','Unlink','Anchor','TextColor','BGColor'],['Maximize', 'ShowBlocks','-','About']

    ['Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],

    ['Styles','Format','Font','FontSize']    
    

    ]

});     

</script>
<script type="text/javascript">

var editor = CKEDITOR.replace( 'content_en',{

    uiColor : '#9AB8F3',

    language:'vi',

    height:300,    

    skin:'kama',      

        filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',    

        filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

    toolbar:[

    ['Source','-','Bold','Italic','Underline','Strike'],   
    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],       

    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],

    ['Link','Unlink','Anchor','TextColor','BGColor'],['Maximize', 'ShowBlocks','-','About']

    ['Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],

    ['Styles','Format','Font','FontSize']    

    ]

});     

</script>