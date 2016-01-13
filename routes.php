<?php
if(!isset($_SESSION)){
    session_start();
}
require_once 'models/Home.php';
$model = new Home;
$mod = isset($_GET['mod']) ? $_GET['mod'] : "";
$arrText = $model->getListText();
function checkCat($uri) {

    require_once 'models/Home.php';    
    $model = new Home;

    $uri = str_replace("+", "", $uri);

    $p_detail = '#chi-tiet/[a-z0-9\-\+]+\-\d+.html#';
    $p_detail_news = '#tin-tuc/[a-z0-9\-\+]+\-\d+.html#';
     $p_cate_page = '#/[a-z0-9\-\+]+.html#';
     $p_product_detail = '#[a-z0-9\-\+]/[a-z0-9\-\+]/[a-z0-9\-\+]+.html#';
    $p_cate_news = '#danh-muc/[a-z0-9\-\+]+\-\d+.html#';
    $p_detail_event = '#su-kien/[a-z0-9\-\+]+\-\d+.html#';
    $p_tag = '#/tag/[a-z\-]+.html#';
	$p_contact = '#/lien-he+.html#';
    $p_order = '#/quan-ly-don-hang+.html#';
    $p_orderdetail = '#/chi-tiet-don-hang+.html#';
    $p_info = '#/cap-nhat-thong-tin+.html#';
    $p_changepass = '#/doi-mat-khau+.html#';
    $p_logout = '#/thoat+.html#';
	$p_hot = '#/[a-z0-9\-]+\-+c+\d+h+\d+.html#';
	$p_sale = '#/[a-z0-9\-]+\-+c+\d+s+\d+.html#';
   

    $p_cart = '#/gio-hang+.html#';
    $p_register = '#/dang-ky+.html#';
    $p_about = '#/gioi-thieu+.html#';
    $p_thanhtoan = '#/thanh-toan+.html#';
	$p_tintuc = '#/tin-tuc+.html#';
    $p_cate =  '#/[a-z0-9\-]+\-+p+\d+.html#';    
    $p_content =  '#/[a-z0-9\-]+\-+c+\d+.html#';
    $p_search = '#/tim-kiem+.html#';
    
    $mod = $seo = "";
    $uri = str_replace(".html", '', $uri);
    $object_id = 0;
    $city_id = $district_id = $type_id = $price_id = "";
    $arrTmp = explode('/',$uri);    
    unset($arrTmp[0]);
    if(strpos($uri, 'trang/')){
        $mod = "page";        
    }elseif(strpos($uri, 'chi-tiet/')){
        $mod = "detail";        
    }elseif(strpos($uri, 'tin-tuc')){
        $mod = "news";        
    }elseif(strpos($uri, 'chi-tiet-tin')){
        $mod = "news-detail";
    }else{
        
        if(isset($arrTmp[1]) && $arrTmp[1] != ''){        
            $alias = $model->processData($arrTmp[1]);
            $detail = $model->getDetailByAlias('type_bds', $alias);        
            $type_id = $detail['id'];
            $mod = "list";
            $type = $detail['type'];
        }else{
            $type_id = 1;
            $mod = "home";
        }
        if(isset($arrTmp[2])){        
            $alias = $model->processData($arrTmp[2]);
            $detail = $model->getDetailByAlias('city', $alias);        
            $city_id = $detail['id'];
        }else{
            $city_id = 1;
        }

        if(isset($arrTmp[3])){
            $alias = $model->processData($arrTmp[3]);
            
            $detail = $model->getDetailByAlias('district', $alias);
            if($detail){
                $district_id = $detail['id'];
            }else{
                $district_id = 0;                
                $detail = $model->getDetailByAlias('price', $alias);        
                if($detail){
                    $price_id = $detail['id'];
                }
            }                        
        }else{
            $district_id = 0;
        }
        if($price_id == ""){
            if(isset($arrTmp[4])){
                $alias = $model->processData($arrTmp[4]);
                $detail = $model->getDetailByAlias('price', $alias);        
                $price_id = $detail['id'];
            }else{
                $price_id = -1;
            }
        }
    }
   
    
    return array("seo"=>$seo, "mod" =>$mod,'object_id' => $object_id, 'city_id' => $city_id, 'district_id' => $district_id,
        'price_id' => $price_id, 'type_id' => $type_id);
}

$uri = $_SERVER['REQUEST_URI'];

$arrRS = checkCat($uri);

$mod = $arrRS['mod'];
$type_id = $arrRS['type_id']; 
$city_id = $arrRS['city_id']; 
$district_id = $arrRS['district_id']; 
$price_id = $arrRS['price_id']; 

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
        $detail  = $imageHouseArr = array();
        $product_alias = $tmp_uri[2];        
        $tmp = explode("-", $product_alias);        
	    $id = (int) end($tmp);
        
        $seo = $detail = $model->getDetail("objects", $id);
        $object_type = $detail['object_type'];
        $type_id = $detail['type_id'];  
        $detailType = $model->getDetail('type_bds', $type_id);
        if($object_type == 1){
            $convenientArr = $model->getList('convenient', -1, -1);
            $arrAddonSelected = $model->getListRoomInfo($id, 1);
            $arrConvenientSelected = $model->getListRoomInfo($id, 2);
            $imageArr = $model->getChild("images", "object_id", $id, 2);    
            $houseDetail = $model->getDetail("house", $detail['house_id']);
            $imageHouseArr = $model->getChild("images", "object_id", $detail['house_id'], 1);
            $detailMod = $model->getDetail('users', $houseDetail['user_id']);
            $houseServiceArr = $model->getHouseServices($detail['house_id']);
        }else{    
            $type_images =  ($object_type==3) ? 4 : 1;
            $imageHouseArr = $model->getChild("images", "object_id", $id, $type_images);

            $detailMod = $model->getDetail('users', $detail['user_id']); 
            $houseServiceArr = $model->getHouseServices($detail['id']);
        }
        /*
        $data = $seo = $arrDetailProduct['data'];
        $parent_id = $data['parent_cate'];
        $cate_type_id = $data['cate_type_id'];
        $_SESSION['view'][$product_id] = $data;        
        $arrRelated = $model->getProductRelated($parent_id,$product_id);         
        $arrDetailCate =$model->getDetailCate($parent_id); 
        $arrDetailCateType =$model->getDetailCateType($cate_type_id); 
        */
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
    case "page":
        $alias = $tmp_uri[2];
        $detailArr = $seo = $model->getDetailPageByAlias($alias);
        //$rs_article = $model->getDetail('pages', $page_id);
        //$arrDetailPage = mysql_fetch_assoc($rs_article);
        break;
    default :    
        $seo = $model->getDetailSeo(1);
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

        //menu doc
        $menuDocArr = $model->getList('cate', -1, -1, array('parent_id' => 0, 'menu_type' => 2, 'cate_type_id' => 1), 1);

        //slideshow
        $slideShowArr = $model->getListBannerByPosition(1, -1);
        //banner
        $bannerArr1 = $model->getListBannerByPosition(2, 1);
        $bannerArr2 = $model->getListBannerByPosition(3, 1);
        $adsArr1 = $model->getListBannerByPosition(4, -1);
        $adsArr2 = $model->getListBannerByPosition(5, -1);

        //mau hoa moi
        $newArr = $model->getList('cate', -1, -1, array('is_new' => 1), 1);
        $hotArr = $model->getList('cate', -1, -1, array('is_hot' => 1), 1);

        //footer
        $footerTextArr = $model->getList('footer', -1, -1, array(), 1);        
        break;
}
?>