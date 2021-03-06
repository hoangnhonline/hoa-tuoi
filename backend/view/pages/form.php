<?php
$id = 0;
$is_detail = false;
if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
    require_once "model/Backend.php";
    $model = new Backend;
    $detail = $model->getDetail("pages",$id);   
    $is_detail = true;
}
?>
<div class="row">
    <div class="col-md-12">
        <section class="content-header">     
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="index.php?mod=pages&act=list">Trang nội dung</a></li>              
          </ol>
        </section>
        <!-- Custom Tabs -->
        <button class="btn btn-primary btn-sm" onclick="location.href='index.php?mod=pages&act=list'">
            Danh sách
        </button>
        <div style="clear:both;margin-bottom:10px"></div>

        <div class="box box-primary">
            <div class="box-header">
                <h2 class="box-title" style="text-tranform:uppercase !important;color: #B10007">
                    <?php echo ($id > 0) ? "Cập nhật" : "Tạo mới" ?> trang <?php echo ($id > 0) ? ': "'.$detail['name_vi'].'"' : ""; ?>
                </h2>
                <div class="clearfix"></div>
            </div><!-- /.box-header -->
            <div class="clearfix"></div>
            <div class="box-body">
            <!-- form start -->
            <form role="form" method="post" id="dataForm" action="controller/Pages.php">
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
                    
                    
                    <!--<tr>
                        <td>Mô tả ngắn</td>
                        <td>
                            <textarea class="form-control" name="description_vi" rows="5" id="description_vi"><?php if(isset($detail)) echo stripslashes($detail['description_vi']); ?></textarea>                            
                        </td>
                        <td>
                            <textarea class="form-control" name="description_en" rows="5" id="description_en"><?php if(isset($detail)) echo stripslashes($detail['description_en']); ?></textarea>
                        </td>
                    </tr>-->
                    <!--<tr>
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
                    </tr>-->
                    <tr>
                        <td>Nội dung <img src="img/vn.png" /></td>
                        <td colspan="2">
                            <textarea class="form-control" name="content_vi" id="content"><?php if(isset($detail)) echo stripslashes($detail['content_vi']); ?></textarea>
                        </td>                       
                    </tr>
                    <tr>
                        <td>Nội dung <img src="img/en.png" /></td>                       
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
                            <button class="btn btn-warning" type="reset" onclick="location.href='index.php?mod=pages&act=list'">Cancel</button>
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
    /*$('#choose_img_sv').on('ifChecked', function(event){
        $('#from_sv').show();
        $('#from_cp').hide();
    });
    $('#choose_img_cp').on('ifChecked', function(event){
        $('#from_cp').show();
        $('#from_sv').hide();
    });*/    
  
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
CKEDITOR.replace( 'content',{
            filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=hinh',
            filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
            filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
            filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
            width: 800,
    }
);
CKEDITOR.replace( 'content_en',{
            filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=hinh',
            filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
            filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
            filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
            width: 800,
    }
);
CKEDITOR.instances.noidung.on('afterCommandExec', handleAfterCommandExec);
function handleAfterCommandExec(event)
{
    var commandName = event.data.name;
    if (commandName=='button1') {
    alert(commandName);
    CKEDITOR.instances.noidung.insertHtml('<b>aa</b>');
    }
}
/*
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
*/
</script>