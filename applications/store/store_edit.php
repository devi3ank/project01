<?php
    check_user($_SESSION['user_type'], array(1));
    @$id = $_GET['id'];

    $result = select_db("
        SELECT
            *
        FROM
            store_tb
        WHERE
            store_id = '$id'
    ");

    if ($result->num_rows == 0) {
        alert_msg('ไม่มีข้อมูล');
        exit();
    }

    $row = $result->fetch_assoc();
?>

<div class="detail">
    <p class="title">เพิ่มข้อมูลร้านค้า</p>
    <form action="?app=store&action=store_update&id=<?=$id?>" method="POST">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">ชื่อร้านค้า</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="store_name" value="<?=$row['store_name']?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">ที่อยู่</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="store_address" value="<?=$row['store_address']?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">เบอร์โทรศัพท์</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="store_phone" value="<?=$row['store_phone']?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">เลขประจำตัวผู้เสียภาษี</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="store_tax" value="<?=$row['store_tax']?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">ประเภทร้าน</label>
            <div class="col-sm-5">
                <select name="store_type" class="form-control" required>
                    <option value="">-- เลือกประเภทร้าน --</option>
                    <option value="1" <?php if ($row['store_type'] == 1) {echo "selected";}?>>ร้านเจ้าของร้าน</option>
                    <option value="2" <?php if ($row['store_type'] == 2) {echo "selected";}?>>ร้านซื้อสินค้า</option>
                    <option value="3" <?php if ($row['store_type'] == 3) {echo "selected";}?>>ร้านขายสินค้า</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right">สถานะ</label>
            <div class="col-sm-5">
                <label for="status1" class="mt-2">
                    <input id="status1" type="radio" name="store_status" value="1" <?php if ($row['store_status'] == 1) {echo "checked";} ?>>&nbsp;
                    ใช้งาน
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="status2">
                    <input id="status2" type="radio" name="store_status" value="2" <?php if ($row['store_status'] == 2) {echo "checked";} ?>>&nbsp;
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