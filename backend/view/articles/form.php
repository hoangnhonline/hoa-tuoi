<?php
$id = 0;
$is_detail = false;
if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
    require_once "model/Backend.php";
    $model = new Backend;
    $detail = $model->getDetail("articles",$id);   
    $is_detail = true;
}
$cateArr = $model->getList('articles_cate', -1, -1);
?>
<div class="row">
    <div class="col-md-12">
        <section class="content-header">     
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="index.php?mod=articles&act=list">Tin tức</a></li>              
          </ol>
        </section>
        <!-- Custom Tabs -->
        <button class="btn btn-primary btn-sm" onclick="location.href='index.php?mod=articles&act=list'">
            Danh sách
        </button>
        <div style="clear:both;margin-bottom:10px"></div>

        <div class="box box-primary">
            <div class="box-header">
                <h2 class="box-title" style="text-tranform:uppercase !important;color: #B10007">
                    <?php echo ($id > 0) ? "Cập nhật" : "Tạo mới" ?> tin tức <?php echo ($id > 0) ? ': "'.$detail['name_vi'].'"' : ""; ?>
                </h2>
                <div class="clearfix"></div>
            </div><!-- /.box-header -->
            <div class="clearfix"></div>
            <div class="box-body">
            <!-- form start -->
            <form role="form" method="post" id="dataForm" action="controller/Articles.php" enctype="multipart/form-data">
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
                        <td>Danh mục <span class="error">*</span></td>
                        <td colspan="2">
                            <select name="cate_id" id="cate_id" class="form-control">
                                <option value="0">-- Chọn danh mục --</option>
                                <?php 
                                if(!empty($cateArr['data'])){
                                foreach ($cateArr['data'] as $cate) {
                                ?>
                                <option value="<?php echo $cate['id']; ?>" 
                                    <?php if((isset($cate_id) && $cate_id == $cate['id']) || (isset($detail['cate_id']) && $detail['cate_id'] == $cate['id'])) echo "selected"; ?>>
                                    <?php echo $cate['name_vi']; ?>
                                </option>
                                <?php } } ?>                                
                            </select>
                            <label class="error" id="error_cate_type_id">Vui lòng chọn 1 danh mục.</label>
                        </td>                        
                    </tr>         
                    <tr>
                        <td>Tiêu đề <span class="error">*</span></td>
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
                                    $is_hot = $detail['is_hot'];                                                                       
                               }else{
                                    $is_hot = 0;
                               }
                            ?>                     
                            <div class="col-md-12">                                
                                <div class="checkbox">
                                  <input type="checkbox" <?php if($is_hot == 1) echo "checked"; ?> value="1" name="is_hot" id="is_hot"><label>Hiện trang chủ</label>
                                </div>
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
                        <td>Ảnh đại diện</td>
                        <td colspan="2">
                            <div class="form-group">                            
                            <input type="radio" id="choose_img_sv" name="choose_img" value="1" checked="checked"/> Chọn ảnh từ server
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="choose_img_cp" name="choose_img" value="2" /> Chọn ảnh từ máy tính
                            <div id="from_sv">
                                <input type="hidden" name="image_url" id="image_url" class="form-control" value="<?php if(!empty($detail['image_url'])) echo "../".$detail['image_url']; ?>" /><br />
                                <?php if(!empty($detail['image_url'])){ ?>
                                <img id="img_thumnails" src="../<?php echo $detail['image_url']; ?>" height="100" />
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
                    </tr>
                    <tr>
                        <td>Chi tiết <img src="img/vn.png" /></td>
                        <td colspan="2">
                            <textarea class="form-control" name="content_vi" id="content"><?php if(isset($detail)) echo stripslashes($detail['content_vi']); ?></textarea>
                        </td>                       
                    </tr>
                    <tr>
                        <td>Chi tiết <img src="img/en.png" /></td>                       
                        <td colspan="2">
                            <textarea class="form-control" name="content_en" id="content_en"><?php if(isset($detail)) echo stripslashes($detail['content_en']); ?></textarea>
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
        
    });

</script>
<script type="text/javascript">

var editor = CKEDITOR.replace( 'content',{

    uiColor : '#9AB8F3',

    language:'en',

    height:300,    

    skin:'office2003',      

    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',    

    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

    toolbar:[

    ['Source','-','Bold','Italic','Underline','Strike'],   
    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],       

    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','Image'],

    ['Link','Unlink','Anchor','TextColor','BGColor'],['Maximize', 'ShowBlocks','-','About']

    ['Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],

    ['Styles','Format','Font','FontSize']    
    

    ]

});     

</script>
<script type="text/javascript">

var editor = CKEDITOR.replace( 'content_en',{

    uiColor : '#9AB8F3',

    language:'en',

    height:300,

    skin:'office2003',      

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