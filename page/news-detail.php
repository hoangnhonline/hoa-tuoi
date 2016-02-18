<!-- ▼CONTENT▼ -->
<div id="content" class="col-md-9">                

    <section class="breadcrumb">
      <ul class="clearfix">
        <li><a href="<?php echo "http://".$_SERVER['SERVER_NAME']; ?>"><?php echo $arrText[16]['text_'.$lang]; ?></a></li>
        <li><a href="<?php echo $lang == "vi"  ? "tin-tuc.html" : "news.html"; ?>"><?php echo $lang == "vi"  ? "Tin tức" : "News"; ?></a></li>
      </ul>
    </section>
    
    <section class="post-detail">
    
      <header class="post-header">
        <h2 class="post-title"><?php echo $detailArr['name_'.$lang]; ?></h2>
      </header><!-- end .post-header -->
      
      <div class="post-intro">
        <?php echo $detailArr['description_'.$lang]; ?>
      </div>
      
      <p class="post-thumb"><img src="<?php echo $detailArr['image_url']; ?>" alt=""></p>
      
      <div class="post-body">
          <?php echo $detailArr['content_'.$lang]; ?>
      </div>
      
    </section><!-- end Section Post Detail --> 
    
    <section class="post-list-other">
      <div class="title-section">
        <h1 class="title-inner">
          <?php echo $arrText[27]['text_'.$lang]; ?>
        </h1>
      </div>  
      <ul class="item-list">
        <?php         
        $relatedArr = $model->getListRelatedNews($article_id_curr, $detailArr['cate_id']);
        if(!empty($relatedArr)){
          foreach ($relatedArr as $key => $value) {            
        ?>
        <li><a href="<?php echo $lang == 'vi' ? "chi-tiet-tin" : "news-detail" ; ?>/<?php echo $value['alias_'.$lang]; ?>-<?php echo $value['id']; ?>.html" title="<?php echo $value['name_'.$lang]; ?>"><?php echo $value['name_'.$lang]; ?></a></li>
        <?php } } ?>       
      </ul>
    </section><!-- End Section News Page -->
         
</div><!-- End #content -->  