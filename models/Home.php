<?php
//ini_set('display_errors', '1');
class Home {
    function __construct() {
		if($_SERVER['SERVER_NAME']=='hoatuoi.dev'){
            mysql_connect('localhost', 'root', '') or die("Can't connect to server");
            mysql_select_db('thietke7_hoatuoi') or die("Can't connect database");
        }else{
            mysql_connect('localhost', 'thietke7_hoatuoi', 'huyhoang157') or die("Can't connect to server");
            mysql_select_db('thietke7_hoatuoi') or die("Can't connect database");
        }
        mysql_query("SET NAMES 'utf8'") or die(mysql_error());
    }
    function getHouseServices($house_id){
        $arr = array();
        $sql = "SELECT * FROM house_services WHERE house_id = $house_id ";        
        $rs = mysql_query($sql);
        while( $row = mysql_fetch_assoc($rs)){            
            $arr[$row['service_id']] = $row;
        }
        return $arr;
    }
    function getDetailPageByAlias($alias){
        $sql = "SELECT * FROM pages WHERE page_alias = '$alias' ";
        $rs = mysql_query($sql);
        $row = mysql_fetch_assoc($rs);
        return $row;
    }
    function getListRelatedNews($article_id, $cate_id){
        $arrReturn = array();
        $sql = mysql_query("SELECT * FROM articles WHERE id <> $article_id AND cate_id = $cate_id ORDER BY id DESC LIMIT 0, 5");
        while($row = mysql_fetch_assoc($sql)){
            $arrReturn[$row['id']] = $row;
        }
        return $arrReturn;
    }
    function getListBannerByPosition($position_id){
        $arrReturn = array();
        $sql = mysql_query("SELECT * FROM banner WHERE position_id = $position_id");
        while($row = mysql_fetch_assoc($sql)){
            $arrReturn[] = $row;
        }
        return $arrReturn;
    }
    function processData($str) {
        $str = trim(strip_tags($str));
        if (get_magic_quotes_gpc() == false) {
            $str = mysql_real_escape_string($str);
        }
        return $str;
    }
    function getListProduct($cate_type_id, $parent_id, $cate_id, $arrCustom = array(), $offset = -1, $limit = -1, $paging = -1) {
        try{            
            $arrReturn = $arrNoPaging = array();            
            
            $sql = "SELECT product.* , cate_id, parent_id FROM product, product_cate WHERE cate_type_id = $cate_type_id ";                       

            $sql.= " AND product.id = product_cate.product_id ";

            if($cate_id > 0){
                $sql.= " AND product_cate.cate_id = $cate_id ";
            }
            if($parent_id > 0){
                $sql.= " AND product_cate.parent_id = $parent_id ";
            }
            if(!empty($arrCustom)){                    
                foreach ($arrCustom as $column => $value) {                    
                    if(is_numeric($value) && $value > -1){
                        $sql.= " AND $column = '$value' ";
                    }
                }
            }
            $sql.="  GROUP BY product_id ORDER BY id DESC ";
            //echo $sql;
            if ($limit > 0 && $offset >= 0){
                $sql .= " LIMIT $offset,$limit";
            }
            //echo $sql;
            $rs = mysql_query($sql) or die(mysql_error());
            while($row = mysql_fetch_assoc($rs)){
               $arrReturn['data'][] = $row;
               $arrNoPaging[] = $row;
            }
            if($paging == 1){
                $arrReturn['total'] = mysql_num_rows($rs);
            }else{
                $arrReturn = $arrNoPaging;
            }            

        }catch(Exception $ex){            
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Product','function' => 'getListProduct' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }
        return $arrReturn;
    }
    function getListProductOther($product_id, $cate_type_id, $parent_id, $cate_id, $arrCustom = array(), $offset = -1, $limit = -1, $paging = -1) {
        try{            
            $arrReturn = $arrNoPaging = array();            
            
            $sql = "SELECT product.* , cate_id, parent_id FROM product, product_cate WHERE cate_type_id = $cate_type_id ";                       

            $sql.= " AND product.id = product_cate.product_id ";

            if($cate_id > 0){
                $sql.= " AND product_cate.cate_id = $cate_id ";
            }
            if($parent_id > 0){
                $sql.= " AND product_cate.parent_id = $parent_id ";
            }
            if(!empty($arrCustom)){                    
                foreach ($arrCustom as $column => $value) {                    
                    if(is_numeric($value) && $value > -1){
                        $sql.= " AND $column = '$value' ";
                    }
                }
            }
            $sql.=" AND product.id <> $product_id ";
            $sql.="  GROUP BY product_id ORDER BY id DESC ";
            //echo $sql;
            if ($limit > 0 && $offset >= 0){
                $sql .= " LIMIT $offset,$limit";
            }
            //echo $sql;
            $rs = mysql_query($sql) or die(mysql_error());
            while($row = mysql_fetch_assoc($rs)){
               $arrReturn['data'][] = $row;
               $arrNoPaging[] = $row;
            }
            if($paging == 1){
                $arrReturn['total'] = mysql_num_rows($rs);
            }else{
                $arrReturn = $arrNoPaging;
            }            

        }catch(Exception $ex){            
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Product','function' => 'getListProduct' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }
        return $arrReturn;
    }
    function getListDistrictHaveRoom($city_id){
        $arr = array();
        $sql = "SELECT district_id FROM objects WHERE city_id = $city_id AND object_type = 1 AND status = 1 ";
        $rs = mysql_query($sql);
        while($row = mysql_fetch_assoc($rs)){
            $arr[$row['district_id']] = $row['district_id'];
        }
        return $arr;
    }
    function getListText(){
        $arrResult = array();
        $sql = "SELECT id, text_vi, text_en FROM text";
        $rs = mysql_query($sql);
        while($row = mysql_fetch_assoc($rs)){
            $arrResult[$row['id']] = $row;
        }
        return $arrResult;
    }
    function getDetailSeo($id) {
            $arrReturn = array();      
            $sql = "SELECT * FROM seo WHERE id = $id";
            $rs = mysql_query($sql) or die(mysql_error());
            $row =mysql_fetch_assoc($rs);
            $arrReturn = $row;           
            return $arrReturn;
    }
    function getListDistrictHaveObjects($type_id, $city_id){
        $arr = array();
        $sql = "SELECT district_id FROM objects WHERE city_id = $city_id AND type_id = $type_id";
        $rs = mysql_query($sql);
        while($row = mysql_fetch_assoc($rs)){
            $arr[$row['district_id']] = $row['district_id'];
        }
        return $arr;
    }
    function getTypeBDS($type){
        $arr = array();
        $sql = "SELECT * FROM type_bds WHERE type = $type";
        $rs = mysql_query($sql);
        while($row = mysql_fetch_assoc($rs)){
            $arr[$row['id']] = $row;
        }
        return $arr;
    }
    function getListDistrictHaveHouse($city_id){
        $arr = array();
        $sql = "SELECT district_id FROM objects WHERE city_id = $city_id AND object_type = 2 AND status = 1";
        $rs = mysql_query($sql);
        while($row = mysql_fetch_assoc($rs)){
            $arr[$row['district_id']] = $row['district_id'];
        }
        return $arr;
    }
    function getListDistrictByString($city_id, $str_id){
        $arr = array();
        $sql = "SELECT * FROM district WHERE city_id = $city_id AND id IN (".$str_id.")";
        $rs = mysql_query($sql);
        while($row = mysql_fetch_assoc($rs)){
            $arr[$row['id']] = $row;
        }
        return $arr;
    }
    function getNameAddonByString($str_id){
        $str_name = '';
        $sql = "SELECT id, name FROM addon WHERE id IN (".$str_id.")";
        $rs = mysql_query($sql);
        while($row = mysql_fetch_assoc($rs)){
            $str_name .= $row['name'].", ";
        }
        if($str_name!=''){
            return rtrim($str_name, ", ");
        }else{
            return $str_name;
        }        
    }
    function changeTitle($str) {
        $str = $this->stripUnicode($str);
        $str = str_replace("?", "", $str);
        $str = str_replace("&", "", $str);
        $str = str_replace("'", "", $str);
        $str = str_replace("  ", " ", $str);
        $str = trim($str);
        $str = mb_convert_case($str, MB_CASE_LOWER, 'utf-8'); // MB_CASE_UPPER/MB_CASE_TITLE/MB_CASE_LOWER
        $str = str_replace(" ", "-", $str);
        $str = str_replace("---", "-", $str);
        $str = str_replace("--", "-", $str);
        $str = str_replace('"', '', $str);
        $str = str_replace('"', "", $str);
        $str = str_replace(":", "", $str);
        $str = str_replace("(", "", $str);
        $str = str_replace(")", "", $str);
        $str = str_replace(",", "", $str);
        $str = str_replace(".", "", $str);
        $str = str_replace("?", "", $str);
        $str = str_replace("'", "", $str);
        $str = str_replace('"', "", $str);
        $str = str_replace("%", "", $str);
        for($i = 0;$i<=strlen($str);$i++){
            $str = str_replace(" ", "-", $str);
            $str = str_replace("--", "-", $str);
        }

        return $str;
    }
    function throw_ex($e){
        throw new Exception($e);
    }
    
    function getChild($table, $column, $parent_id, $type=-1){
        $arr = array();
        $sql = "SELECT * FROM $table WHERE $column = $parent_id ";
        if($type > 0){
            $sql.=" AND object_type = $type";
        }
        $rs = mysql_query($sql);
        while( $row = mysql_fetch_assoc($rs)){
            $arr[$row['id']] = $row;
        }
        return $arr;
    }
    function getRoomServices($room_id){
        $arr = array();
        $sql = "SELECT * FROM room_services WHERE room_id = $room_id ";        
        $rs = mysql_query($sql);
        while( $row = mysql_fetch_assoc($rs)){            
            $arr[$row['service_id']] = $row['price'];
        }
        return $arr;
    }
    function getListRelation($table, $column_select, $column, $value){
        $arr = array();
        $sql = "SELECT $column_select FROM $table WHERE $column = $value";
        $rs = mysql_query($sql);
        while( $row = mysql_fetch_assoc($rs)){
            $arr[] = $row[$column_select];
        }
        return $arr;
    }
    function getListRoomInfo($room_id, $type){
        $arr = array();
        $sql = "SELECT info_id FROM objects_info WHERE object_id = $room_id AND type = $type";
        $rs = mysql_query($sql);
        while( $row = mysql_fetch_assoc($rs)){
            $arr[] = $row['info_id'];
        }
        return $arr;
    }
    function checkNameExistByParentId($table, $column, $value, $name){
        $name = trim($name);
        $sql = "SELECT id FROM $table WHERE name = '$name' AND $column = $value";
        $rs = mysql_query($sql);
        $num = mysql_num_rows($rs);
        return $num > 0 ? false : true;        
    }
    function getNameById($table, $id, $lang){
        $sql = "SELECT name_vi, name_en FROM $table WHERE id = $id";
        $rs = mysql_query($sql);
        $row = mysql_fetch_assoc($rs);
        return $row['name_'.$lang];
    }
    function getAliasById($table, $id, $lang){
        $sql = "SELECT alias_vi, alias_en FROM $table WHERE id = $id";
        $rs = mysql_query($sql);
        $row = mysql_fetch_assoc($rs);
        return $row['alias_'.$lang];
    }
    function getIdByAlias($table, $alias, $lang){
        $sql = "SELECT id FROM $table WHERE alias_vi = '$alias' OR alias_en = '$alias' ";
        $rs = mysql_query($sql);
        $row = mysql_fetch_assoc($rs);
        return $row['id'];
    }
    function getDetail($table, $id){
        $sql = "SELECT * FROM $table WHERE id = $id";
        $rs = mysql_query($sql);
        $row = mysql_fetch_assoc($rs);
        return $row;
    }
    function getDetailByAlias($table, $alias){
        $sql = "SELECT * FROM $table WHERE alias = '$alias'";
        $rs = mysql_query($sql);
        $row = mysql_fetch_assoc($rs);
        return $row;
    }
    function getList($table,$offset = -1 , $limit = -1, $arrCustom = array(), $order = -1){
        try{
            $arrResult = array();
            $sql = "SELECT * FROM $table";

            if(!empty($arrCustom)){
                $sql.= " WHERE 1 = 1 ";
                foreach ($arrCustom as $column => $value) {                    
                    $sql.= " AND $column = $value ";                    
                }
            }
            if($order == 1){
                $sql.= " ORDER BY display_order ";
            }else{
                $sql.= " ORDER BY id DESC ";
            }
            if ($limit > 0 && $offset >= 0)
                $sql .= " LIMIT $offset,$limit";
            //echo $sql."<br>";
            $rs = mysql_query($sql) or die(mysql_error());
            while($row = mysql_fetch_assoc($rs)){
               $arrResult['data'][$row['id']] = $row;
            }
            $arrResult['total'] = mysql_num_rows($rs);
            return $arrResult;
        }catch(Exception $ex){
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Post','function' => 'getListEstateType' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }
    }
    function getListMod(){
        $arr = array();
        $sql = "SELECT email, name, phone, image_url, address, skype, yahoo FROM users WHERE level = 2 ORDER BY id DESC";
        $rs = mysql_query($sql);
        while($row = mysql_fetch_assoc($rs)){
            $arr[] = $row;
        }
        return $arr;
    }

    function getListUserPost($status=-1,$district_id=-1,$type_id=-1,$estate_type_id=-1,$direction_id=-1,$legal_id=-1,$project_type_id=-1,$offset = -1, $limit = -1) {
        try{
            $arrResult = array();
            $sql = "SELECT * FROM post WHERE (district_id = $district_id OR $district_id = -1) AND (status = $status OR $status = -1)  ";
            $sql.=" AND (type_id = $type_id OR $type_id = -1) AND (estate_type_id = $estate_type_id OR $estate_type_id = -1) ";
            $sql.=" AND (direction_id = $direction_id OR $direction_id = -1) ";
            $sql.=" AND (legal_id = $legal_id OR $legal_id = -1) ";
            $sql.=" AND (project_type_id = $project_type_id OR $project_type_id = -1) ";
            $sql.=" AND user_id > 1 ORDER BY creation_time DESC ";
            if ($limit > 0 && $offset >= 0)
                $sql .= " LIMIT $offset,$limit";
            $rs = mysql_query($sql) or die(mysql_error());
            while($row = mysql_fetch_assoc($rs)){
               $arrResult['data'][] = $row;
            }

            $arrResult['total'] = mysql_num_rows($rs);
            return $arrResult;
        }catch(Exception $ex){
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Post','function' => 'getListUserPost' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }
    }
    function getListPost($district_id=-1,$type_id=-1,$estate_type_id=-1,$direction_id=-1,$area_id=-1,$legal_id=-1,$price_id=-1,$project_type_id=-1,$offset = -1, $limit = -1) {
        try{
            $arrResult = array();
            $sql = "SELECT * FROM post WHERE (district_id = $district_id OR $district_id = -1) ";
            $sql.=" AND (type_id = $type_id OR $type_id = -1) AND (estate_type_id = $estate_type_id OR $estate_type_id = -1) ";
            $sql.=" AND (direction_id = $direction_id OR $direction_id = -1) AND (area_id = $area_id OR $area_id = -1) ";
            $sql.=" AND (legal_id = $legal_id OR $legal_id = -1) AND (price_id = $price_id OR $price_id = -1) ";
            $sql.=" AND (project_type_id = $project_type_id OR $project_type_id = -1) ";
            $sql.=" AND status = 1 ORDER BY creation_time DESC ";
            if ($limit > 0 && $offset >= 0)
                $sql .= " LIMIT $offset,$limit";

            $rs = mysql_query($sql) or die(mysql_error());
            while($row = mysql_fetch_assoc($rs)){
               $arrResult['data'][] = $row;
            }

            $arrResult['total'] = mysql_num_rows($rs);
            return $arrResult;
        }catch(Exception $ex){
            $arrLog = array('time'=>date('d-m-Y H:i:s'),'model'=> 'Post','function' => 'getListPost' , 'error'=>$ex->getMessage(),'sql'=>$sql);
            $this->logError($arrLog);
        }
    }
    function getListLinkFooter($block_id){
        $arr = array();
        $sql = "SELECT block.name_vi as block_name_vi, block.name_en as block_name_en, link.* FROM block, link WHERE block.id = $block_id AND link.block_id = $block_id ";
        $rs = mysql_query($sql);
        while($row = mysql_fetch_assoc($rs)){
            $arr[] = $row;
        }
        return $arr;
    }
    function logError($arrLog){
        $time = date('d-m-Y H:i:s');
         ////put content to file
        $createdTime = date('Y/m/d');

        // path to log folder
        $logFolder = "../logs/errors/$createdTime";

        // If not existed => create it
        if (!is_dir($logFolder)) mkdir($logFolder, 0777, true);
        // path to log file
        $logFile = $logFolder . "/error_model.log";
        // Put content in it
        $fp   = fopen($logFile, 'a');
        fwrite($fp, json_encode($arrLog)."\r\n");
        fclose($fp);
    }
    function stripUnicode($str) {
        if (!$str)
            return false;
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd' => 'đ',
            'D' => 'Đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
            '' => '?',
            '-' => '/'
        );
        foreach ($unicode as $khongdau => $codau) {
            $arr = explode("|", $codau);
            $str = str_replace($arr, $khongdau, $str);
        }
        return $str;
    }

    function phantrang($page, $page_show, $total_page, $link) {
        $dau = 1;
        $cuoi = 0;
        $dau = $page - floor($page_show / 2);
        if ($dau < 1)
            $dau = 1;
        $cuoi = $dau + $page_show;
        if ($cuoi > $total_page) {

            $cuoi = $total_page + 1;
            $dau = $cuoi - $page_show;
            if ($dau < 1)
                $dau = 1;
        }
        echo "<div id='thanhphantrang'>";
        if ($page > 1) {
            ($page == 1) ? $class = " class='selected'" : $class = "";
            echo "<a" . $class . " href=" . $link . "&page=1>Đầu</a>";
        }
        for ($i = $dau; $i < $cuoi; $i++) {
            ($page == $i) ? $class = " class='selected'" : $class = "";
            echo "<a" . $class . " href=" . $link . "&page=$i>$i</a>";
        }
        if ($page < $total_page) {
            ($page == $total_page) ? $class = " class='selected'" : $class = "";
            echo "<a" . $class . " href=" . $link . "&page=$total_page>Cuối</a>";
        }
        echo "</div>";
    }



    public function Login(){

		$email = trim(strip_tags($_POST['email']));
        $password = trim(strip_tags($_POST['password']));
        if (get_magic_quotes_gpc() == false) {
            $email = trim(mysql_real_escape_string($email));
            $password = trim(mysql_real_escape_string($password));
        }
        $password = md5($password);
        $sql = "SELECT * FROM users WHERE email='$email' AND password ='$password'";
        $user = mysql_query($sql) or die(mysql_error());

        $row = mysql_num_rows($user);
        if ($row == 1) {//success
            $chitiet = mysql_fetch_assoc($user);
            $_SESSION['user_id'] = $chitiet['user_id'];
            $_SESSION['email'] = $chitiet['email'];
            $_SESSION['full_name'] = $chitiet['full_name'];
            $_SESSION['group'] = $chitiet['group'];
            header("location:index.php");
        }
        else
            header("location:login.php"); //fail
	}


	function phantrang2($page,$page_show,$total_page,$link){
		$dau=1;
		$cuoi=0;
		$dau=$page - floor($page_show/2);
		if($dau<1) $dau=1;
		$cuoi=$dau+$page_show;
		if($cuoi>$total_page)
		{

			$cuoi=$total_page+1;
			$dau=$cuoi-$page_show;
			if($dau<1) $dau=1;
		}
		echo '<div class="pagination pagination__posts"><ul>';
		if($page > 1){
			($page==1) ? $class = " class='active'" : $class="first" ;
			echo "<li ".$class."><a href=".$link."-1.html>First</a></li>"	;
		}
		for($i=$dau; $i<$cuoi; $i++)
		{
			($page==$i) ? $class = " class='active'" : $class="inactive" ;
			echo "<li ".$class."><a href=".$link."-$i.html>$i</a></li>";
		}
		if($page < $total_page) {
			($page==$total_page) ? $class = "class='active'" : $class="last" ;
			echo "<li ".$class."><a href=".$link."-$total_page.html>Last</a></li>";
		}
		echo "</ul></div>";
	}
    function smtpmailer($to, $from, $from_name, $subject, $body) {

		//ini_set('display_errors',1);
        global $error;
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 1;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username = GUSER;
        $mail->Password = GPWD;
        $mail->SetFrom($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->CharSet="utf-8";
        $mail->IsHTML(true);
        $mail->AddAddress($to);
		//var_dump($mail->ErrorInfo);
        if(!$mail->Send()) {
            $error = 'Gởi mail bị lỗi : '.$mail->ErrorInfo;
            return false;
        } else {
            $error = 'Thư của bạn đã được gởi đi !';
            return true;
        }
    }
    function checkemailexist($email){
        $sql = "SELECT id FROM newsletter WHERE email = '$email' AND status = 1 ";
        $rs = mysql_query($sql) or die(mysql_error());
        $row = mysql_num_rows($rs);
        if($row==0){
            return "1";
        }else{
            return "0";
        }
    }

    function uploadImages($file_upload){
        $allowedExts = array("jpg", "jpeg", "gif", "png");
        $arrResult = array();
        if(!is_dir("../../upload/images/".date('Y/m/d')."/"))
        mkdir("../../upload/images/".date('Y/m/d')."/",0777,true);

        $url = "../../upload/images/".date('Y/m/d')."/";   
            $extension = end(explode(".", $file_upload["name"]));
            if ((($file_upload["type"] == "image/gif") || ($file_upload["type"] == "image/jpeg") || ($file_upload["type"] == "image/png")
            || ($file_upload["type"] == "image/jpeg")) 
            && in_array($extension, $allowedExts))
              {
              if ($file_upload["error"] > 0)
                {
                //echo "Return Code: " . $file_upload["error"] . "<br />";
                }
              else
                {       
            
                if (file_exists($url. $file_upload["name"]))
                  {
                  //echo $file_upload["name"] . " đã tồn tại. "."<br />";       
                  }
                else
                  {

                    $arrPartImage = explode('.', $file_upload["name"]);

                    // Get image extension
                    $imgExt = array_pop($arrPartImage);

                    // Get image not extension
                    $img = preg_replace('/(.*)(_\d+x\d+)/', '$1', implode('.', $arrPartImage));
                    
                    $img = $this->changeTitle($img);
                    $img = $this->countImage($url,$img);                    
                    $name = "{$img}.{$imgExt}";

         
                   
                    if(move_uploaded_file($file_upload["tmp_name"],$url. $name)==true){                                    
                        $hinh = str_replace("../","",$url). $name;
                        $arrReturn['filename'] = $hinh;               
                    }
                  }
                }
                
              }
              
        return $arrReturn;      
   
    }
    function countImage($url,$img){
          $dh  = opendir($url);
            while (false !== ($filename = readdir($dh))) {
                $arrFiles[] = $filename;
            }
            sort($arrFiles);

            unset($arrFiles[0]);
            unset($arrFiles[1]);
            $nameReturn = $img.'-'.(count($arrFiles)+1);
           /* 
           if(!empty($arrFiles)){
            foreach ($arrFiles as $files) {
                $arrTmp = explode(".",$files);
                $arrName[] = $arrTmp[0];
            }
           }

           $nameReturn = $img.'-'.(count($arrFiles)+1);
           
           if(in_array($img, $arrName)){
                for($i = 0; $i<=9;$i++){             
                    if($i==0){
                        $newname =  $img;
                    }else{
                        $newname =  $img.'-'.$i;
                    }
                    if(in_array($newname, $arrName)){
                        $nameReturn = $img.'-'.($i+1);
                        
                    }else{
                        $nameReturn = $nameReturn;
                    }
                }
                
           }else{
             $nameReturn = $img;
           } 
           */          
            return $nameReturn;
    } 


}

?>
