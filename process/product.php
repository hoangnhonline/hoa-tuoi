<?php 
require_once "../models/Home.php";
$model = new Home;
$limit = 32;
$page = (int) $_POST['page'];
$cate_type_id = (int) $_POST['cate_type_id'];
$parent_id = (int) $_POST['parent_id'];
$cate_id = (int) $_POST['cate_id'];
$lang = 'vi';
$offset = $limit * ($page - 1);
$productArr = $model->getListProduct($cate_type_id, $parent_id, $cate_id, array(), $offset, $limit, 1);
$html = '';
$total = $productArr['total'];
$conlai = (int) $_POST['conlai'];
$conlai = $conlai-$total;
?>
<?php if(!empty($productArr['data'])){ ?>
<?php foreach ($productArr['data'] as $value) {
$html.='<li class="col-md-3 col-sm-4 col-xs-6 item">';
  $html.='<div class="item-inner">';
    $html.='<div class="thumb">';                       
      $html.='<a href="'.$model->getAliasById('cate', $value['cate_id'], $lang).'/'.$value['alias_'.$lang]."-".$value['id'].'html">';
        $html.='<img class="lazy" data-original="'.$value['image_url'].'" alt="'.$value['name_'.$lang].'">';
      $html.='</a>';
    $html.='</div>';
    $html.='<div class="caption">';
      $html.='<h2 class="pro-title">';
        $html.='<a href="'.$model->getAliasById('cate', $value['cate_id'], $lang).'/'.$value['alias_'.$lang].'-'.$value['id'].'.html">';
          $html.=$value['name_'.$lang];
        $html.='</a>';
      $html.='</h2>';
      $html.='<div class="clearfix">';
        if($value['is_sale'] > 0 && $value['price_sale'] > 0){
        $html.='<p class="price-old">'.number_format($value['price']).' đ</p>';
        $html.='<p class="price">'.number_format($value['price_sale']).' đ</p>';
        }else{
        $html.='<p class="price">'.number_format($value['price']).'đ</p>';
        }
      $html.='</div>';
      $html.='<div>';
        $html.='<a href="'.$model->getAliasById('cate', $value['cate_id'], $lang).'/'.$value['alias_'.$lang].'-'.$value['id'].'.html" class="btn btn-detail">';
          $html.='Xem chi tiết';
        $html.='</a>';
      $html.='</div>';
    $html.='</div>';
  $html.='</div>';
$html.='</li>';
} }
$arrReturn['html'] = $html;
$arrReturn['total'] = $total;

$arrReturn['conlai'] = $conlai;
$arrReturn['spanconlai'] = number_format($conlai);
//var_dump($arrReturn);
echo json_encode($arrReturn);
?>

