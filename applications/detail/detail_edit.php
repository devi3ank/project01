<?php
    check_user($_SESSION['user_type'], array(1));
    $id = $_GET['id'];
    $result = select_db("
        SELECT
            *
        FROM
            detail_tb
        WHERE
            detail_id = '$id'
    ");

    if ($result->num_rows == 0) {
        alert_msg('ไม่มีข้อมูล');
        exit();
    }

    $row = $result->fetch_assoc();
?>

<div class="detail">
    <p class="title">แก้ไขข้อมูลรายละเอียด</p>
    <form action="?app=detail&action=detail_update&id=<?=$id?>" method="POST" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">รูป : </label>
            <div class="col-sm-5">
                <?php if (!$row['detail_image']) { ?>
                    <input type="file" name="fileToUpload">
                <?php } else { ?>
                    <img src="./uploads/<?=$row['detail_image']?>" alt="" width="150px"><br/>
                    [<a href="?app=detail&action=delete_file&id=<?=$id?>&namefile=<?=$row['detail_image']?>" onclick="return confirm('ยืนยันการลบรูปภาพ')">ลบรูปภาพ</a>]
                <?php }?>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">ชื่อรายละเอียด : </label>
            <div class="col-sm-5">
                <input type="text" name="detail_name" value="<?=$row['detail_name']?>" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">รายละเอียด : </label>
            <div class="col-sm-5">
                <input type="text" name="detail_description" value="<?=$row['detail_description']?>" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right">สถานะ : </label>
            <div class="col-sm-5">
                <label class="mt-2">
                    <input type="radio" name="detail_status" value="1" <?php if($row['detail_status'] == 1){echo "checked";}?> required>&nbsp;
                    ใช้งาน
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    <input type="radio" name="detail_status" value="2" <?php if($row['detail_status'] == 2){echo "checked";}?> required>&nbsp;
                    ปิดการใช้งาน
                </label>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right"></label>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-secondary btn-sm"><i class="far fa-save"></i> บันทึกข้อมูล</button>
            </div>
        </div>
    </form>
</div>