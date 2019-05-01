<?php
    $id = $_GET['id'];
    update_db("user_tb", $_POST, "user_id=$id");
    echo "<script>window.location.href='$domain?app=user_list';</script>";
?>