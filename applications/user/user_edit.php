<?php 
    $id = $_GET['id'];

    $resultStore = select_db("    
        SELECT 
            *
        FROM store_tb
        WHERE store_status = '1'
    ");

    $result = select_db("    
        SELECT 
            *
        FROM user_tb
        WHERE 
            user_id = '$id' AND
            user_status != '3'
    ");
?>

<div class="detail">
    <?php
    if ($result->num_rows == 1) {
        
        $row = $result->fetch_assoc();
    ?>
    <p class="title">แก้ไขข้อมูลผู้ใช้งาน</p>
    <form action="?app=user&action=user_update&id=<?=$id?>" method="POST">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">ชื่อ - นามสกุล : </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="user_fullname" value="<?php echo $row['user_fullname']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right">Username : </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="user_username" value="<?php echo $row['user_username']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right">Password : </label>
            <div class="col-sm-5">
                <input type="password" class="form-control" name="user_password" value="<?php echo $row['user_password']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right">E-mail : </label>
            <div class="col-sm-5">
                <input type="email" class="form-control" name="user_email" value="<?php echo $row['user_email']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right">เบอร์โทรศัพท์ : </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="user_phone" value="<?php echo $row['user_phone']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right">ชื่อร้าน : </label>
            <div class="col-sm-5">
                <select name="user_store" class="form-control" required>
                    <option value="">-- เลือกร้าน --</option>
                    <?php while($rowStore = $resultStore->fetch_assoc()) { ?>
                    <option value="<?=$rowStore['store_id']?>" <?php if ($rowStore['store_id'] == $row['user_store']) {echo "selected";}?>><?=$rowStore['store_name']?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right">ประเภทผู้ใช้ระบบ : </label>
            <div class="col-sm-5">
                <select name="user_type" class="form-control" required>
                    <option value="2" <?php if ($row['user_type'] == 2) { echo "selected"; } ?>>เจ้าของร้าน</option>
                    <option value="3" <?php if ($row['user_type'] == 3) { echo "selected"; } ?>>ผู้ซื้อสินค้า</option>
                    <option value="4" <?php if ($row['user_type'] == 4) { echo "selected"; } ?>>ผู้ขายสินค้า</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right">สถานะ : </label>
            <div class="col-sm-5">
                <label for="status1" class="mt-2">
                    <input id="status1" type="radio" name="user_status" value="1" <?php if ($row['user_status'] == 1) {echo "checked";} ?>>&nbsp;
                    ใช้งาน
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="status2">
                    <input id="status2" type="radio" name="user_status" value="2" <?php if ($row['user_status'] == 2) {echo "checked";} ?>>&nbsp;
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
    <?php } else { ?>
    <p class="title">ไม่มีข้อมูล</p>
    <?php } ?>
</div>