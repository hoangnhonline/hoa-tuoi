<?php
$id = 0;
$is_detail = false;
if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
    require_once "model/Backend.php";
    $model = new Backend;
    $detail = $model->getDetail("banner",$id);   
    $is_detail = true;
}
$position_id = isset($_GET['position_id']) ? (int) $_GET['position_id'] : 0;
?>
<div class="row">
    <div class="col-md-12">
        <section class="content-header">     
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="index.php?mod=banner&act=index">Banner</a></li>              
          </ol>
        </section>
        <!-- Custom Tabs -->
        <button class="btn btn-primary btn-sm" onclick="location.href='index.php?mod=banner&act=list&position_id=<?php echo $position_id; ?>'">
            Danh sách
        </button>
        <div style="clear:both;margin-bottom:10px"></div>

        <div class="box box-primary">
            <div class="box-header">
                <h2 class="box-title" style="text-tranform:uppercase !important;color: #B10007">
                    <?php echo ($id > 0) ? "Cập nhật" : "Tạo mới" ?> quảng cáo/sự kiện <?php echo ($id > 0) ? ': "'.$detail['name_vi'].'"' : ""; ?>
                </h2>
                <div class="clearfix"></div>
            </div><!-- /.box-header -->
            <div class="clearfix"></div>
            <div class="box-body">
            <!-- form start -->
            <form role="form" method="post" id="dataForm" action="controller/Banner.php" enctype="multipart/form-data">
                <?php if($id> 0){ ?>
                <input type="hidden" value="<?php echo $id; ?>" name="id" />
                <?php } ?>                
                <input type="hidden" name="position_id" value="<?php echo $position_id; ?>">
                <table class="table table-bordered">
                    <tr>
                        <th width="15%"></th>
                        <th width="42%" style="text-align:center">Tiếng Việt <img src="img/vn.png" /></th>
                        <th width="43%" style="text-align:center">Tiếng Anh <img src="img/en.png" /></th>
                    </tr>
                    <tr>
                        <td>Loại QC / sự kiện <span class="error">*</span></td>
                        <td colspan="2">
                            <select name="type_id" id="type_id" class="form-control">
                                <option value="0">-- Chọn --</option>
                                <option value="1" <?php if(isset($detail) && $detail['type_id'] == 1) echo "selected"; ?>>Không có liên kết</option>
                                <option value="2" <?php if(isset($detail) && $detail['type_id'] == 2) echo "selected"; ?>>Liên kết đến nội dung</option>
                                <option value="3" <?php if(isset($detail) && $detail['type_id'] == 3) echo "selected"; ?>>Liên kết đến 1 URL</option>
                            </select>
                            <label class="error" id="error_type_id">Vui lòng chọn 1 mục.</label>
                        </td>                        
                    </tr>         
                    <tr>
                        <td>Tên QC / sự kiện <span class="error">*</span></td>
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
                        <td>Ngày bắt đầu</td>
                        <td colspan="2">
                             <input type="text" name="start_time" id="start_time" class="form-control datetime" value="<?php if(!empty($detail['start_time'])) echo date('d-m-Y H:i',$detail['start_time']); ?>" />
                        </td>                        
                    </tr>  
                    <tr>
                        <td>Ngày kết thúc</td>
                        <td colspan="2">
                            <input type="text" name="end_time" id="end_time" class="form-control datetime" value="<?php if(!empty($detail['end_time'])) echo date('d-m-Y H:i',$detail['end_time']); ?>" />
                        </td>                        
                    </tr>  
                    <tr>
                        <td></td>
                        <td colspan="2">                           
                            <?php 
                               if(isset($detail)){
                                    $status = $detail['status'];                                                                       
                               }else{
                                    $status = 0;
                               }
                            ?>                     
                            <div class="col-md-12">                                
                                <div class="checkbox">
                                  <input type="checkbox" <?php if($status == 1) echo "checked"; ?> value="1" name="status" id="status"><label>Hiện</label>
                                </div>
                            </div>
                           
                        </td>
                    </tr> 
                    
                    
                    
                    <tr>
                        <td>Hình ảnh <span class="error">*</span></td>
                        <td>
                            <div class="form-group">                            
                                <input type="radio" id="choose_img_sv_vi" name="choose_img_vi" value="1" checked="checked"/> Chọn ảnh từ server
                                &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="choose_img_cp_vi" name="choose_img_vi" value="2" /> Chọn ảnh từ máy tính
                                <div id="from_sv_vi">
                                    <input type="hidden" name="image_url_vi" id="image_url_vi" class="form-control" value="<?php if(!empty($detail['image_url_vi'])) echo "../".$detail['image_url_vi']; ?>" /><br />
                                    <?php if(!empty($detail['image_url_vi'])){ 
                                        if($position_id != 7){
                                        ?>
                                    <img id="img_thumnails_vi" class="lazy" data-original="../<?php echo $detail['image_url_vi']; ?>" height="100" />
                                    <?php }else{
                                        ?>
                                        <img id="img_thumnails_vi" class="lazy" data-original="../<?php echo $detail['image_url_vi']; ?>" width="300" />
                                        <?php
                                    }
                                }else{ ?>
                                    <img id="img_thumnails_vi" class="lazy" data-original="static/img/no_image.jpg" width="100" />
                                    <?php } ?>
                                    <button class="btn btn-default " type="button" onclick="BrowseServer('Images:/','image_url_vi')" >Upload</button>
                                </div>
                                <div id="from_cp_vi" style="display:none;padding:15px;margin-bottom:10px">
                                    <input type="file" name="image_url_upload_vi" />
                                </div>

                            </div>
                        </td>
                        <td>
                            <div class="form-group">                            
                                <input type="radio" id="choose_img_sv_en" name="choose_img_en" value="1" checked="checked"/> Chọn ảnh từ server
                                &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="choose_img_cp_en" name="choose_img_en" value="2" /> Chọn ảnh từ máy tính
                                <div id="from_sv_en">
                                    <input type="hidden" name="image_url_en" id="image_url_en" class="form-control" 
                                    value="<?php if(!empty($detail['image_url_en'])) echo "../".$detail['image_url_en']; ?>" /><br />
                                    <?php if(!empty($detail['image_url_en'])){ 
                                        if($position_id != 7){
                                    ?>
                                    <img id="img_thumnails_en" class="lazy" data-original="../<?php echo $detail['image_url_en']; ?>" height="100" />
                                    <?php }else{?>
                                    <img id="img_thumnails_en" class="lazy" data-original="../<?php echo $detail['image_url_en']; ?>" width="300" />
                                    <?php
                                    } }else{ ?>
                                    <img id="img_thumnails_en" class="lazy" data-original="static/img/no_image.jpg" width="100" />
                                    <?php } ?>
                                    <button class="btn btn-default " type="button" onclick="BrowseServer2('Images:/','image_url_en')" >Upload</button>
                                </div>
                                <div id="from_cp_en" style="display:none;padding:15px;margin-bottom:10px">
                                    <input type="file" name="image_url_upload_en" />
                                </div>

                            </div>
                        </td>
                    </tr>
                    <tr id="lien-ket" style="display:none;">
                        <td>URL</td>
                        <td colspan="2">
                            <input type="text" name="link_url" id="link_url" class="form-control" value="<?php if(!empty($detail['link_url'])) echo $detail['link_url']; ?>" />
                        </td>
                    </tr>                    
                    <tr style="display:none;" class="noi-dung">
                        <td>Mô tả ngắn</td>
                        <td>
                            <textarea class="form-control" name="description_vi" rows="5" id="description_vi"><?php if(isset($detail)) echo stripslashes($detail['description_vi']); ?></textarea>                            
                        </td>
                        <td>
                            <textarea class="form-control" name="description_en" rows="5" id="description_en"><?php if(isset($detail)) echo stripslashes($detail['description_en']); ?></textarea>
                        </td>
                    </tr>
                    <tr style="display:none;" class="noi-dung">
                        <td>Chi tiết <img src="img/vn.png" /></td>
                        <td colspan="2">
                            <textarea class="form-control" name="content_vi" id="content"><?php if(isset($detail)) echo stripslashes($detail['content_vi']); ?></textarea>
                        </td>                       
                    </tr>
                    <tr style="display:none;" class="noi-dung">
                        <td>Chi tiết <img src="img/en.png" /></td>                       
                        <td colspan="2">
                            <textarea class="form-control" name="content_en" id="content_en"><?php if(isset($detail)) echo stripslashes($detail['content_en']); ?></textarea>
                        </td>
                    </tr>
                    
                    <tr style="display:none;" class="noi-dung">
                        <td>Meta Title</td>
                        <td>
                            <input type="text" name="meta_title_vi" id="meta_title_vi" value="<?php if(isset($detail)) echo $detail['meta_title_vi']; ?>" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="meta_title_en" id="meta_title_en" value="<?php if(isset($detail)) echo $detail['meta_title_en']; ?>" class="form-control">
                        </td>
                    </tr>
                     <tr style="display:none;" class="noi-dung">
                        <td>Meta Description</td>
                        <td>
                            <textarea class="form-control" name="meta_description_vi" rows="5" id="meta_description_vi"><?php if(isset($detail)) echo $detail['meta_description_vi']; ?></textarea>                            
                        </td>
                        <td>
                            <textarea class="form-control" name="meta_description_en" rows="5" id="meta_description_en"><?php if(isset($detail)) echo $detail['meta_description_en']; ?></textarea>
                        </td>
                    </tr>  
                    <tr style="display:none;" class="noi-dung">
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
                            <button class="btn btn-warning" type="reset" onclick="location.href='index.php?mod=banner&act=list&position_id=<?php echo $position_id; ?>'">Cancel</button>
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
<link href="static/css/jquery-ui.css" rel="stylesheet" type="text/css" />
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

function SetFileField( fileUrl, data){
    document.getElementById( data["selectActionData"] ).value = fileUrl;
    $('#img_thumnails_vi').attr('src', fileUrl).show();
}
function BrowseServer2( startupPath, functionData ){    
    var finder = new CKFinder();
    finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
    finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
    finder.selectActionFunction = SetFileField2; // hàm sẽ được gọi khi 1 file được chọn
    finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
    //finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn    
    finder.popup(); // Bật cửa sổ CKFinder
} //BrowseServer

function SetFileField2( fileUrl, data){
    document.getElementById( data["selectActionData"] ).value = fileUrl;
    $('#img_thumnails_en' ).attr('src', fileUrl).show();
}
</script>
<script type="text/javascript">
$(function(){
    <?php
    if(isset($detail)){
        ?>
        var type_id = <?php echo $detail['type_id']; ?>;
        if(type_id == 3){
            $('#lien-ket').show();
            $('.noi-dung').hide();
        }else if(type_id == 2){
            $('#lien-ket').hide();
            $('.noi-dung').show();
        }else{
            $('#lien-ket').hide();
            $('.noi-dung').hide();
        }
        <?php
    }

    ?> 
    $('#type_id').change(function(){
        if($(this).val()==3){
            $('#lien-ket').show();
            $('.noi-dung').hide();
        }else if($(this).val()==2){
            $('#lien-ket').hide();
            $('.noi-dung').show();
        }else{
            $('#lien-ket').hide();
            $('.noi-dung').hide();
        }
    });
    <?php //if($detail['type_id']==3){ ?>
      //  $('#lien-ket').show();
    <?php //} ?>
    $('.datetime').datetimepicker({
        format:'d-m-Y H:i'
    });        
    $('#choose_img_sv_vi').on('ifChecked', function(event){
        $('#from_sv_vi').show();
        $('#from_cp_vi').hide();
    });
    $('#choose_img_cp_vi').on('ifChecked', function(event){
        $('#from_cp_vi').show();
        $('#from_sv_vi').hide();
    });  

    $('#choose_img_sv_en').on('ifChecked', function(event){
        $('#from_sv_en').show();
        $('#from_cp_en').hide();
    });
    $('#choose_img_cp_en').on('ifChecked', function(event){
        $('#from_cp_en').show();
        $('#from_sv_en').hide();
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