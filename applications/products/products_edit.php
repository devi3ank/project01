<?php
    check_user($_SESSION['user_type'], array(1));
    $id = $_GET['id'];
    $result = select_db("
        SELECT
            *
        FROM
            products_tb
        WHERE
            products_id = '$id'
    ");

    if ($result->num_rows == 0) {
        alert_msg('ไม่มีข้อมูล');
        exit();
    }

    $row = $result->fetch_assoc();
?>
<div class="detail">
    <p class="title">แก้ไขข้อมูลสินค้า</p>
    <form action="?app=products&action=products_update&id=<?=$id?>" method="POST">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">รหัสสินค้า : </label>
            <div class="col-sm-5">
                <input type="text" name="products_code" class="form-control" value="<?=$row['products_code']?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">ชื่อสินค้า : </label>
            <div class="col-sm-5">
                <input type="text" name="products_name" class="form-control" value="<?=$row['products_name']?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right">สถานะ : </label>
            <div class="col-sm-5">
                <label class="mt-2">
                    <input type="radio" name="products_status" value="1" <?php if($row['products_status'] == 1){echo "checked";}?> required>&nbsp;
                    ใช้งาน
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    <input type="radio" name="products_status" value="2" <?php if($row['products_status'] == 2){echo "checked";}?> required>&nbsp;
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