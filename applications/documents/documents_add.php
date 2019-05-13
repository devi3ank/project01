<?php
    check_user($_SESSION['user_type'], array(1,3,4));
    $result = select_db("    
        SELECT 
            *
        FROM store_tb
        WHERE store_status = '1'
    ");
?>
<div class="detail">
    <p class="title">เพิ่มเอกสาร</p>
    <form action="?app=documents&action=documents_insert" method="POST" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">เอกสาร : </label>
            <div class="col-sm-5">
                <input type="file" name="fileToUpload">
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">ชื่อเอกสาร : </label>
            <div class="col-sm-5">
                <input type="text" name="doc_name" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">รายละเอียด : </label>
            <div class="col-sm-5">
                <input type="text" name="doc_description" class="form-control" required>
            </div>
        </div>
        <?php if ($_SESSION['user_type'] == 1) { ?>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">ร้านที่ต้องการส่งไฟล์ : </label>
            <div class="col-sm-5">
                <select name="doc_tostore" class="form-control" required>
                    <option value="">-- เลือกร้านที่ต้องการส่งไฟล์ --</option>
                    <?php while($row = $result->fetch_assoc()) { ?>
                    <option value="<?=$row['store_id']?>"><?=$row['store_name']?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <?php } else { ?>
            <input type="hidden" name="doc_tostore" value="1">
        <?php } ?>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right"></label>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-secondary btn-sm"><i class="far fa-save"></i> บันทึกข้อมูล</button>
            </div>
        </div>
    </form>
</div>