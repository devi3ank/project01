<?php
    check_user($_SESSION['user_type'], array(1));
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $rename = generateRandomString(20);
    $target_file = $target_dir . $rename .'.'.$imageFileType;

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "ไม่สามารถอัพโหลดไฟล์ได้ กรุณาตรวจสอบไฟล์อีกครั้ง.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "ไฟล์มีขนาดใหญ่เกิน ไม่สามารถอัพโหลดได้";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "กรุณาอัพโหลดไฟล์ .jpg .png .jpeg .gif เท่านั้น";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "ไม่สามารถอัพโหลดไฟล์ได้ กรุณาตรวจสอบไฟล์อีกครั้ง.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $data['detail_name'] = $_POST['detail_name'];
            $data['detail_description'] = $_POST['detail_description'];
            $data['detail_image'] = $rename .'.'.$imageFileType;
            $data['detail_status'] = 1;
            $data['detail_fitby'] = $_SESSION['user_id'];
            $data['detail_fitdate'] = date("Y-m-d H:i:s");
            insert_db("detail_tb", $data);
            echo "<script>window.location.href='$domain?app=detail&action=list';</script>";
        } else {
            echo "ไม่สามารถอัพโหลดไฟล์ได้ กรุณาตรวจสอบไฟล์อีกครั้ง.";
        }
    }
?>