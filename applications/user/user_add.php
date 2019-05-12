<?php 
    check_user($_SESSION['user_type'], array(1,3,4));
    $sql = "    
        SELECT 
            *
        FROM store_tb
        WHERE store_status = '1'
    ";

    $result = select_db("    
        SELECT 
            *
        FROM store_tb
        WHERE store_status = '1'
    ");
?>
<div class="detail">
    <p class="title">เพิ่มข้อมูลผู้ใช้งาน</p>
    <form action="?app=user&action=user_insert" method="POST">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">ชื่อ - นามสกุล : </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="user_fullname" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right">Username : </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="user_username" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right">Password : </label>
            <div class="col-sm-5">
                <input type="password" class="form-control" name="user_password" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right">E-mail : </label>
            <div class="col-sm-5">
                <input type="email" class="form-control" name="user_email" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right">เบอร์โทรศัพท์ : </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="user_phone" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right">ชื่อร้าน : </label>
            <div class="col-sm-5">
                <select name="user_store" class="form-control" required>
                    <option value="">-- เลือกร้าน --</option>
                    <?php while($row = $result->fetch_assoc()) { ?>
                    <option value="<?=$row['store_id']?>"><?=$row['store_name']?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right">ประเภทผู้ใช้ระบบ : </label>
            <div class="col-sm-5">
                <select name="user_type" class="form-control" required>
                    <option value="2">เจ้าของร้าน</option>
                    <option value="3">ผู้ซื้อสินค้า</option>
                    <option value="4">ผู้ขายสินค้า</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right">สถานะ : </label>
            <div class="col-sm-5">
                <label for="status1" class="mt-2">
                    <input id="status1" type="radio" name="user_status" value="1" checked required>&nbsp;
                    ใช้งาน
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="status2">
                    <input id="status2" type="radio" name="user_status" value="2" required>&nbsp;
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