<?php
session_start();
include 'connect_db.php';
// ยังไม่ได้ทำการเชื่อมต่อดาต้าเบสเพื่อดึงข้อมูลผู้ใช้งาน
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!empty($_POST['u_username']) && !empty($_POST['u_password'])) {
    $username = $_POST['u_username'];
    $password = $_POST['u_password'];

    $sql = "    
        SELECT 
            user_tb.user_id, 
            user_tb.user_fullname,
            user_tb.user_type,
            store_tb.store_id,
            store_tb.store_name,
            store_tb.store_type
        FROM user_tb 
        INNER JOIN store_tb  ON user_tb.user_store = store_tb.store_id
        WHERE 
            user_username = '$username' AND 
            user_password = '$password'
    ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['loginStatus']    = "LOGIN_SUCCESS";
        $_SESSION['user_id']        = $row['user_id'];
        $_SESSION['user_fullname']  = $row['user_fullname'];
        $_SESSION['user_type']      = $row['user_type'];
        $_SESSION['store_id']       = $row['store_id'];
        $_SESSION['store_name']     = $row['store_name'];
        $_SESSION['store_type']     = $row['store_type'];
    }     
}

echo "<script>window.location.href='".$domain."';</script>";

