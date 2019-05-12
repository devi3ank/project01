<?php
//================================================ Database ============================================================
    $serveName      = "localhost";
    $userConect     = "root";
    $passConnect    = "";
    $DB             = "sub_data";
    $conn           = new mysqli($serveName, $userConect, $passConnect, $DB);
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
//============================================================================================================

//================================================ CONFIG ============================================================
    $status         = array('', 'ใช้งาน', 'ปิดการใช้งาน');
    $statusLot      = array('', 'ยังไม่ได้ขาย', 'ขายแล้ว');
    $typeStore      = array('', 'เจ้าของร้าน', 'ร้านซื้อสินค้า', 'ร้านขายสินค้า');
    $transferStatus = array('', 'ยังไม่ได้ส่งสินค้า', 'ส่งสินค้าเรียบร้อยแล้ว');
    $protocol       = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domain         = $protocol.$_SERVER['HTTP_HOST']."/project01";
//============================================================================================================

//================================================ FUNCTION ============================================================
    function insert_db($table, $arrData) { // เพิ่มข้อมูล
        Global $conn;
        $column = "";
        $data = "";
        foreach ($arrData AS $key => $val) {
            $column .= $key.',';
            $data .= "'".$val."',";
        }
        $column = rtrim($column,",");
        $data = rtrim($data,",");
        $sql = "
            INSERT INTO $table ($column)
            VALUE ($data)
        ";
        $conn->query($sql);
    }

    function update_db($table, $arrData, $where="") {
        Global $conn;
        $set = "";
        foreach ($arrData AS $key => $val) {
            $set .= "$key='$val',";
        }
        $set = rtrim($set,",");
        $sql = "
            UPDATE $table SET $set WHERE $where
        ";
        $conn->query($sql);
    }

    function select_db($sql) {
        Global $conn;
        return $conn->query($sql);
    }

    function check_user($userType, $arrType=array()) {
        if (!in_array($userType, $arrType)) {
            alert_msg("ไม่อนุญาติให้เข้าถึงเมนูนี้ได้");
            exit();
        }
    }

    function alert_msg($msg) {
        echo '
            <div class="detail">
                <p class="title">'.$msg.'</p>
            </div>
        ';
    }

    function dieArray($data) {
        echo "<pre>";
            print_r($data);
        echo "</pre>";
        die();
    }

    function convert($number){ 
        $txtnum1 = array('ศูนย์','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า','สิบ'); 
        $txtnum2 = array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน'); 
        $number = str_replace(",","",$number); 
        $number = str_replace(" ","",$number); 
        $number = str_replace("บาท","",$number); 
        $number = explode(".",$number); 
        if(sizeof($number)>2){ 
            return 'ทศนิยมมากกว่า 2 ตำแหน่ง'; 
            exit; 
        } 
        $strlen = strlen($number[0]); 
        $convert = ''; 
        for($i=0;$i<$strlen;$i++){ 
            $n = substr($number[0], $i,1); 
            if($n!=0){ 
                if($i==($strlen-1) AND $n==1){ $convert .= 'เอ็ด'; } 
                elseif($i==($strlen-2) AND $n==2){  $convert .= 'ยี่'; } 
                elseif($i==($strlen-2) AND $n==1){ $convert .= ''; } 
                else{ $convert .= $txtnum1[$n]; } 
                $convert .= $txtnum2[$strlen-$i-1]; 
            } 
        } 
        
        $convert .= 'บาท'; 
        if($number[1]=='0' OR $number[1]=='00' OR $number[1]==''){ 
            $convert .= 'ถ้วน'; 
        }else{ 
            $strlen = strlen($number[1]); 
            for($i=0;$i<$strlen;$i++){ 
                $n = substr($number[1], $i,1); 
                if($n!=0){ 
                    if($i==($strlen-1) AND $n==1){
                        $convert .= 'เอ็ด';
                    } 
                    elseif($i==($strlen-2) AND $n==2){
                        $convert .= 'ยี่';
                    } 
                    elseif($i==($strlen-2) AND $n==1){
                        $convert .= '';
                    } 
                    else{ 
                        $convert .= $txtnum1[$n];
                    } 
                    $convert .= $txtnum2[$strlen-$i-1]; 
                } 
            } 
            $convert .= 'สตางค์'; 
        } 
        return $convert; 
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
//============================================================================================================
?>