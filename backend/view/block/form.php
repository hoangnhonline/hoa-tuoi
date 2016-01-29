<?php
$id = 0;
$is_detail = false;
if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
    require_once "model/Backend.php";
    $model = new Backend;
    $detail = $model->getDetail("block",$id);   
    $is_detail = true;
}
?>
<div class="row">
    <div class="col-md-12">
        <section class="content-header">     
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="index.php?mod=block&act=list">Link footer</a></li>              
          </ol>
        </section>
        <!-- Custom Tabs -->
        <button class="btn btn-primary btn-sm" onclick="location.href='index.php?mod=block&act=list'">
            Danh sách
        </button>
        <div style="clear:both;margin-bottom:10px"></div>

        <div class="box box-primary">
            <div class="box-header">
                <h2 class="box-title" style="text-tranform:uppercase !important;color: #B10007">
                    <?php echo ($id > 0) ? "Cập nhật" : "Tạo mới" ?> link footer <?php echo ($id > 0) ? ': "'.$detail['name_vi'].'"' : ""; ?>
                </h2>
                <div class="clearfix"></div>
            </div><!-- /.box-header -->
            <div class="clearfix"></div>
            <div class="box-body">
            <!-- form start -->
            <form role="form" method="post" id="dataForm" action="controller/Block.php">
                <?php if($id> 0){ ?>
                <input type="hidden" value="<?php echo $id; ?>" name="id" />
                <?php } ?>                
                <table class="table table-bordered">
                    <tr>                        
                        <th width="50%" style="text-align:center">Tiếng Việt <img src="img/vn.png" /></th>
                        <th width="50%" style="text-align:center">Tiếng Anh <img src="img/en.png" /></th>
                    </tr>
                    <tr>                        
                        <td>
                            <div class="form-group">
                                <div class="col-md-12">
                                <label>Tiêu đề</label>

                                <input class="form-control" name="text_vi[1]" value="<?php echo $arrLink[0]['text_link']; ?>" />
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <div class="col-md-12">
                                <label>Tiêu đề</label>

                                <input class="form-control" name="text_vi[1]" value="<?php echo $arrLink[0]['text_link']; ?>" />
                                </div>
                            </div>
                        </td>
                    </tr>                      
                    <tr>                        
                        <td>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Text</label>

                                    <input class="form-control" name="text_vi[1]" value="<?php echo $arrLink[0]['text_link']; ?>" />
                                </div>
                                <div class="col-md-8">
                                <label>&nbsp;&nbsp;&nbsp;Link</label>

                                <input class="form-control" name="link_vi[1]" value="<?php echo $arrLink[0]['link_url']; ?>" />
                                </div>
                            </div>
                        </td>
                        <td>
                           <div class="form-group">
                                <div class="col-md-4">
                                    <label>Text</label>

                                    <input class="form-control" name="text_en[1]" value="<?php echo $arrLink[0]['text_link']; ?>" />
                                </div>
                                <div class="col-md-8">
                                <label>&nbsp;&nbsp;&nbsp;Link</label>

                                <input class="form-control" name="link_en[1]" value="<?php echo $arrLink[0]['link_url']; ?>" />
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>                        
                        <td>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Text</label>

                                    <input class="form-control" name="text_vi[1]" value="<?php echo $arrLink[0]['text_link']; ?>" />
                                </div>
                                <div class="col-md-8">
                                <label>&nbsp;&nbsp;&nbsp;Link</label>

                                <input class="form-control" name="link_vi[1]" value="<?php echo $arrLink[0]['link_url']; ?>" />
                                </div>
                            </div>
                        </td>
                        <td>
                           <div class="form-group">
                                <div class="col-md-4">
                                    <label>Text</label>

                                    <input class="form-control" name="text_en[1]" value="<?php echo $arrLink[0]['text_link']; ?>" />
                                </div>
                                <div class="col-md-8">
                                <label>&nbsp;&nbsp;&nbsp;Link</label>

                                <input class="form-control" name="link_en[1]" value="<?php echo $arrLink[0]['link_url']; ?>" />
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>                        
                        <td>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Text</label>

                                    <input class="form-control" name="text_vi[1]" value="<?php echo $arrLink[0]['text_link']; ?>" />
                                </div>
                                <div class="col-md-8">
                                <label>&nbsp;&nbsp;&nbsp;Link</label>

                                <input class="form-control" name="link_vi[1]" value="<?php echo $arrLink[0]['link_url']; ?>" />
                                </div>
                            </div>
                        </td>
                        <td>
                           <div class="form-group">
                                <div class="col-md-4">
                                    <label>Text</label>

                                    <input class="form-control" name="text_en[1]" value="<?php echo $arrLink[0]['text_link']; ?>" />
                                </div>
                                <div class="col-md-8">
                                <label>&nbsp;&nbsp;&nbsp;Link</label>

                                <input class="form-control" name="link_en[1]" value="<?php echo $arrLink[0]['link_url']; ?>" />
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>                        
                        <td>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Text</label>

                                    <input class="form-control" name="text_vi[1]" value="<?php echo $arrLink[0]['text_link']; ?>" />
                                </div>
                                <div class="col-md-8">
                                <label>&nbsp;&nbsp;&nbsp;Link</label>

                                <input class="form-control" name="link_vi[1]" value="<?php echo $arrLink[0]['link_url']; ?>" />
                                </div>
                            </div>
                        </td>
                        <td>
                           <div class="form-group">
                                <div class="col-md-4">
                                    <label>Text</label>

                                    <input class="form-control" name="text_en[1]" value="<?php echo $arrLink[0]['text_link']; ?>" />
                                </div>
                                <div class="col-md-8">
                                <label>&nbsp;&nbsp;&nbsp;Link</label>

                                <input class="form-control" name="link_en[1]" value="<?php echo $arrLink[0]['link_url']; ?>" />
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>                        
                        <td>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Text</label>

                                    <input class="form-control" name="text_vi[1]" value="<?php echo $arrLink[0]['text_link']; ?>" />
                                </div>
                                <div class="col-md-8">
                                <label>&nbsp;&nbsp;&nbsp;Link</label>

                                <input class="form-control" name="link_vi[1]" value="<?php echo $arrLink[0]['link_url']; ?>" />
                                </div>
                            </div>
                        </td>
                        <td>
                           <div class="form-group">
                                <div class="col-md-4">
                                    <label>Text</label>

                                    <input class="form-control" name="text_en[1]" value="<?php echo $arrLink[0]['text_link']; ?>" />
                                </div>
                                <div class="col-md-8">
                                <label>&nbsp;&nbsp;&nbsp;Link</label>

                                <input class="form-control" name="link_en[1]" value="<?php echo $arrLink[0]['link_url']; ?>" />
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>                        
                        <td>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Text</label>

                                    <input class="form-control" name="text_vi[1]" value="<?php echo $arrLink[0]['text_link']; ?>" />
                                </div>
                                <div class="col-md-8">
                                <label>&nbsp;&nbsp;&nbsp;Link</label>

                                <input class="form-control" name="link_vi[1]" value="<?php echo $arrLink[0]['link_url']; ?>" />
                                </div>
                            </div>
                        </td>
                        <td>
                           <div class="form-group">
                                <div class="col-md-4">
                                    <label>Text</label>

                                    <input class="form-control" name="text_en[1]" value="<?php echo $arrLink[0]['text_link']; ?>" />
                                </div>
                                <div class="col-md-8">
                                <label>&nbsp;&nbsp;&nbsp;Link</label>

                                <input class="form-control" name="link_en[1]" value="<?php echo $arrLink[0]['link_url']; ?>" />
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>                        
                        <td>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Text</label>

                                    <input class="form-control" name="text_vi[1]" value="<?php echo $arrLink[0]['text_link']; ?>" />
                                </div>
                                <div class="col-md-8">
                                <label>&nbsp;&nbsp;&nbsp;Link</label>

                                <input class="form-control" name="link_vi[1]" value="<?php echo $arrLink[0]['link_url']; ?>" />
                                </div>
                            </div>
                        </td>
                        <td>
                           <div class="form-group">
                                <div class="col-md-4">
                                    <label>Text</label>

                                    <input class="form-control" name="text_en[1]" value="<?php echo $arrLink[0]['text_link']; ?>" />
                                </div>
                                <div class="col-md-8">
                                <label>&nbsp;&nbsp;&nbsp;Link</label>

                                <input class="form-control" name="link_en[1]" value="<?php echo $arrLink[0]['link_url']; ?>" />
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>                        
                        <td colspan="2">
                            <button class="btn btn-primary" id="btnSave" type="submit" >Save</button>
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
var editor = CKEDITOR.replace( 'content',{
                            uiColor : '#9AB8F3',
                            language:'vi',
                            skin:'office2003',
                            filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
                            filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
                            filebrowserImageUploadUrl :'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                            filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                            toolbar:[
                            ['Source','-','Save'],
                            ['Copy','Paste','PasteText','PasteFromWord'],
                            ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
                            ['NumberedList','BulletedList'],
                            ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
                            ['Link','Unlink','Anchor','Image'],                           
                            ['Styles','Format','Font','FontSize'],
                            ['TextColor','BGColor']                         
                            ]
                        });
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
<script type="text/javascript">
var editor2 = CKEDITOR.replace( 'content_en',{
                            uiColor : '#9AB8F3',
                            language:'vi',
                            skin:'office2003',
                            filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
                            filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
                            filebrowserImageUploadUrl :'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                            filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                            toolbar:[
                            ['Source','-','Save'],
                            ['Copy','Paste','PasteText','PasteFromWord'],
                            ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
                            ['NumberedList','BulletedList'],
                            ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
                            ['Link','Unlink','Anchor','Image'],                           
                            ['Styles','Format','Font','FontSize'],
                            ['TextColor','BGColor']                         
                            ]
                        });
/*
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
*/

</script>
