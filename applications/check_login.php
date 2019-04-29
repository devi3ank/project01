<?php
session_start();

// ยังไม่ได้ทำการเชื่อมต่อดาต้าเบสเพื่อดึงข้อมูลผู้ใช้งาน

if (!empty($_POST['u_username']) && !empty($_POST['u_password'])) {
    $_SESSION['loginStatus'] = "LOGIN_SUCCESS";
}

echo "<script>window.location.href='';</script>";