<?php 
$dataArr = $model->getList('articles', -1, -1, array('cate_id' => 2));
?>
<!-- ▼CONTENT▼ -->
<div id="content" class="col-md-9">                

    <section class="breadcrumb">
      <ul class="clearfix">
        <li><a href="<?php echo "http://".$_SERVER['SERVER_NAME']; ?>"><?php echo $arrText[16]['text_'.$lang]; ?></a></li>
        <li><a href="#">Tin tức</a></li>
      </ul>
    </section>
    
    <section class="post-list">
      <?php 
      if(!empty($dataArr['data'])){
        foreach ($dataArr['data'] as $key => $value) {          
      ?>
      <article class="item">
        <figure class="thumb">
          <a href="<?php echo $lang == 'vi' ? "chi-tiet-tin" : "news-detail" ; ?>/<?php echo $value['alias_'.$lang]; ?>-<?php echo $value['id']; ?>.html" title="<?php echo $value['name_'.$lang]; ?>">
            <img class="img-thumbnail" src="<?php echo $value['image_url']; ?>" alt="<?php echo $value['name_'.$lang]; ?>" >
          </a>
        </figure>
        <header>
          <h2 class="post-title">
            <a href="<?php echo $lang == 'vi' ? "chi-tiet-tin" : "news-detail" ; ?>/<?php echo $value['alias_'.$lang]; ?>-<?php echo $value['id']; ?>.html" title="<?php echo $value['name_'.$lang]; ?>">
              <?php echo $value['name_'.$lang]; ?>
            </a>
          </h2>
        </header>
        <div class="desc">
          <?php echo $value['description_'.$lang]; ?>
        </div>
      </article><!-- end item -->
     
      <?php } } else{ ?>
      <?php } ?>
    </section><!-- End Section News Page -->
         
</div><!-- End #content -->   