<?php
    check_user($_SESSION['user_type'], array(1));
    insert_db("user_tb", $_POST);
    echo "<script>window.location.href='$domain?app=user&action=user_list';</script>";
?>