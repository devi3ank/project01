<?php
    check_user($_SESSION['user_type'], array(1));
    insert_db("products_tb", $_POST);
    echo "<script>window.location.href='$domain?app=products&action=products_list';</script>";
?>