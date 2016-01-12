<!-- ▼SIDEBAR▼ -->
<aside id="sidebar" class="col-md-3">
    
    <ul class="sbnr-list">
      <?php
      if(!empty($adsArr1)){           
      foreach($adsArr1 as $img){                
        $link_url = "";
        if($img['type_id'] == 2){
            $link_url = "su-kien/".$img['name_'.$lang]."-".$img['id'].".html";
        }
        if($img['type_id'] == 3){
            $link_url = $img['link_url'];
        }
      ?>
      <li>
        <?php if($link_url!=""){ ?><a href="<?php echo $link_url;?>"><?php } ?>
        <img class="lazy" data-original="<?php echo $img['image_url']; ?>" alt="<?php echo $img['name_'.$lang]; ?>"/>
        <?php if($link_url!=""){ ?></a><?php } ?>
      </li>
      <?php } } ?>
    </ul>
    
    <div class="block">
      <h3 class="block-title"><i class="fa fa-folder"></i> Tin mới nhất</h3>
      <div class="block-main">
        <div class="article-list-sblock">
          <article class="item">
            <figure class="thumb">
              <a href="#"><img class="lazy" data-original="uploads/post-001.jpg" alt="" class="imghover"></a>
            </figure>
            <header>
              <h2 class="post-title"><a href="#" title="#">Ý nghĩa Hoa Hồng</a></h2>
              <p class="meta">
                <span class="date"><i class="fa fa-clock-o"></i> 15:29 04/05/2015</span>
                <span class="hits">131</span>
              </p>
            </header>
          </article><!-- end item -->
         
        </div><!-- end / Post List -->
      </div>
    </div><!-- end /.block -->
    
    <ul class="sbnr-list">
      <?php
      if(!empty($adsArr2)){           
      foreach($adsArr2 as $img){                
        $link_url = "";
        if($img['type_id'] == 2){
            $link_url = "su-kien/".$img['name_'.$lang]."-".$img['id'].".html";
        }
        if($img['type_id'] == 3){
            $link_url = $img['link_url'];
        }
      ?>
      <li>
        <?php if($link_url!=""){ ?><a href="<?php echo $link_url;?>"><?php } ?>
        <img class="lazy" data-original="<?php echo $img['image_url']; ?>" alt="<?php echo $img['name_'.$lang]; ?>"/>
        <?php if($link_url!=""){ ?></a><?php } ?>
      </li>
      <?php } } ?>
    </ul>
</aside><!-- End #sidebar -->