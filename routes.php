<?php
if(!isset($_SESSION)){
    session_start();
}
if(isset($_COOKIE['nguyentin-lang'])){
    $lang = $_COOKIE['nguyentin-lang'];
}elseif(isset($_SESSION['nguyentin-lang'])){
    $lang = $_SESSION['nguyentin-lang'];
}else{
    $lang = 'vi';
}
require_once 'models/Home.php';
$model = new Home;
$mod = isset($_GET['mod']) ? $_GET['mod'] : "";
$arrText = $model->getListText();

$adsArr1 = $model->getListBannerByPosition(4, -1);
$adsArr2 = $model->getListBannerByPosition(5, -1);
//loai sp
$cateTypeArr = $model->getList('cate_type', -1, -1, array(), 1);

//menu ngang
$menuNgangParentArr = $model->getList('cate', -1, -1, array('parent_id' => 0, 'menu_type' => 1, 'cate_type_id' => 1), 1);
$menuNgangChildArr = array();
if(!empty($menuNgangParentArr['data'])){
    foreach ($menuNgangParentArr['data'] as $key => $value) {
        $parent_id = $value['id'];
        $tmpArr = $model->getList('cate', -1, -1, array('parent_id' => $parent_id, 'menu_type' => 1, 'cate_type_id' => 1), 1);
        if(!empty($tmpArr['data'])){
            $menuNgangChildArr[$parent_id] = $tmpArr['data'];
        }
    }
}
$cate_type_id = 1; 
$phantrang = 32;
function checkCat($uri) {

    require_once 'models/Home.php';    
    $model = new Home;

    $uri = str_replace("+", "", $uri);

    $p_detail = '#[a-z0-9\-\+]/[a-z0-9\-\+]+\-\d+.html#';
    $p_detail_news = '#tin-tuc/[a-z0-9\-\+]+\-\d+.html#';
    $p_cate = '#[a-z0-9\-]/[a-z0-9\-\+]+.html#';
    $p_parent_cate = '#[a-z0-9\-\+]+.html#';
    $p_product_detail = '#[a-z0-9\-\+]/[a-z0-9\-\+]/[a-z0-9\-\+]+.html#';
    $p_cate_news = '#danh-muc/[a-z0-9\-\+]+\-\d+.html#';
    $p_detail_event = '#su-kien/[a-z0-9\-\+]+\-\d+.html#';
	$p_contact = '#/lien-he+.html#';
    $p_logout = '#/thoat+.html#';
    $p_about = '#/gioi-thieu+.html#';    
	$p_tintuc = '#/tin-tuc+.html#';
    $p_cate =  '#/[a-z0-9\-]+\-+p+\d+.html#';    
    $p_content =  '#/[a-z0-9\-]+\-+c+\d+.html#';
    $p_search = '#/tim-kiem+.html#';
    
    $mod = $seo = "";
    //$uri = str_replace(".html", '', $uri);
    $object_id = 0;
    $city_id = $district_id = $type_id = $price_id = "";
    $arrTmp = explode('/',$uri);    
    unset($arrTmp[0]);
    if (preg_match($p_detail, $uri)) {
        $mod = "detail";
    }elseif(preg_match($p_cate, $uri) || preg_match($p_parent_cate, $uri) ){
        $mod = "cate";        
    }elseif(strpos($uri, 'trang/')){
        $mod = "page";        
    }elseif(strpos($uri, 'tin-tuc')){
        $mod = "news";        
    }elseif(strpos($uri, 'chi-tiet-tin')){
        $mod = "news-detail";
    }else{
        $mod = "home";     
    }   
    
    return array("mod" =>$mod);
}

$uri = $_SERVER['REQUEST_URI'];

$arrRS = checkCat($uri);

$mod = $arrRS['mod'];

$uri = str_replace(".html", "", $uri);
$tmp_uri = explode("/", $uri);
if($mod==''){
	if(isset($_GET["payment"]) && $_GET['payment']=="success"){
		unset($_SESSION["cart"]);
	}
}
switch ($mod) {
    case "news":
		/*$tieude_id = $tmp_uri[1];
        $arr = explode("-", $tieude_id);
		$page = (int) end($arr);
		$page = ($page==0) ? 1 : $page;
        */
        $seo = $model->getDetailSeo(4);        
        
        break;    
    case "contact": 
        $seo = $model->getDetailSeo(3);              
        break;
    case "info" : 
        $seo = $model->getDetailSeo(8);
        break;
    case "detail":            
        $detail = array();
        $product_alias = $tmp_uri[2];
        $cate_alias = $tmp_uri[1];
        $cate_id = $model->getIdByAlias('cate', $cate_alias, $lang);
        $detailCate = $model->getDetail('cate', $cate_id);
        $parent_id = $detailCate['parent_id'];
        $tmp = explode("-", $product_alias);        
	    $product_id = (int) end($tmp);
        
        $seo = $detail = $model->getDetail("product", $product_id);
        
        break;
    case "news-detail":        
        $article_alias = $tmp_uri[2];        
        $tmp = explode("-", $article_alias);        
        $id = (int) end($tmp);
        $detail = $model->getDetail('articles', $id);
        $seo = $detail;
	    break; 
    case "content":        
        $page_id = $object_id; 
        $data = $seo = $model->getDetailPage($page_id);
        break;
    case "cate":
        $cate_id = $parent_id = 0;
        if(isset($tmp_uri[2])){
            $cate_alias = $tmp_uri[2];
            $cate_id = $model->getIdByAlias('cate', $cate_alias, $lang);
        }
        $parent_id = $model->getIdByAlias('cate', $tmp_uri[1], $lang);
        
        $arrTotal = $model->getListProduct($cate_type_id, $parent_id, $cate_id, array(), -1, -1, 1);        
        $page = 1;
        $productArr = $model->getListProduct($cate_type_id, $parent_id, $cate_id, array(), 0, $phantrang, 1);
        break;
    case "page":
        
        $detailArr = $seo = $model->getDetailPageByAlias($alias);
        //$rs_article = $model->getDetail('pages', $page_id);
        //$arrDetailPage = mysql_fetch_assoc($rs_article);
        break;
    default :    
        $seo = $model->getDetailSeo(1);
        

        //menu doc
        $menuDocArr = $model->getList('cate', -1, -1, array('parent_id' => 0, 'menu_type' => 2, 'cate_type_id' => 1), 1);

        //slideshow
        $slideShowArr = $model->getListBannerByPosition(1, -1);
        //banner
        $bannerArr1 = $model->getListBannerByPosition(2, 1);
        $bannerArr2 = $model->getListBannerByPosition(3, 1);
        //mau hoa moi
        $newArr = $model->getList('cate', -1, -1, array('is_new' => 1), 1);        
        $hotArr = $model->getList('cate', -1, -1, array('is_hot' => 1), 1);
        //footer
        $footerTextArr = $model->getList('footer', -1, -1, array(), 1);    
                   
        break;
}
?>