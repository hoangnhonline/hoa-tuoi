 <!-- ▼CONTENT▼ --> 
<div id="content" class="col-md-9">                

    <section class="breadcrumb">
      <ul class="clearfix">
        <li><a href="<?php echo "http://".$_SERVER['SERVER_NAME']; ?>"><?php echo $arrText[16]['text_'.$lang]; ?></a></li>
        <li>
          <a href="<?php echo ($lang == 'vi') ? 'trang' : 'page';?>/<?php echo $detailArr['alias_'.$lang]; ?>.html">
          <?php echo $detailArr['name_'.$lang]; ?>
          </a>
        </li>
      </ul>
    </section>
    
    <section class="article-page">
      <h2 class="article-title"><?php echo $detailArr['name_'.$lang]; ?></h2>
      <div class="article-body">
        <?php echo $detailArr['content_'.$lang]; ?>
      </div>
    </section><!-- End Section Article Page -->
         
</div><!-- End #content -->   

            