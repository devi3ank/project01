<?php
    check_user($_SESSION['user_type'], array(1,3,4));
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $rename = generateRandomString(20);
    $target_file = $target_dir . $rename .'.'.$imageFileType;

    // Check if file already exists
    if (file_exists($target_file)) {
        alert_msg("ไม่สามารถอัพโหลดไฟล์ได้ กรุณาตรวจสอบไฟล์อีกครั้ง.");
        $uploadOk = 0;
    }

    // Check file size
    // if ($_FILES["fileToUpload"]["size"] > 500000) {
    //     echo "ไฟล์มีขนาดใหญ่เกิน ไม่สามารถอัพโหลดได้";
    //     $uploadOk = 0;
    // }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "docx" && $imageFileType != "xlsx") {
        alert_msg("กรุณาอัพโหลดไฟล์ .jpg .png .jpeg .gif .pdf .docx .xlsx เท่านั้น");
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        alert_msg("ไม่สามารถอัพโหลดไฟล์ได้ กรุณาตรวจสอบไฟล์อีกครั้ง.");
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $data['doc_name']           = $_POST['doc_name'];
            $data['doc_description']    = $_POST['doc_description'];
            $data['doc_file']           = $rename .'.'.$imageFileType;
            $data['doc_tostore']        = $_POST['doc_tostore'];
            $data['doc_status']         = 1;
            $data['doc_fitby']          = $_SESSION['user_id'];
            $data['doc_fitdate']        = date("Y-m-d H:i:s");
            insert_db("document_tb", $data);
            echo "<script>window.location.href='$domain?app=documents&action=document';</script>";
        } else {
            alert_msg("ไม่สามารถอัพโหลดไฟล์ได้ กรุณาตรวจสอบไฟล์อีกครั้ง.");
        }
    }
?>