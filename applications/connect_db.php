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
    $status = array('', 'ใช้งาน', 'ปิดการใช้งาน');
    $statusLot = array('', 'ยังไม่ได้ขาย', 'ขายแล้ว');
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domain = $protocol.$_SERVER['HTTP_HOST']."/project01";
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
//============================================================================================================
?>