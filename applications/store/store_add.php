<div class="detail">
    <p class="title">เพิ่มข้อมูลร้านค้า</p>
    <form action="?app=store&action=store_insert" method="POST">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">ชื่อร้านค้า</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="store_name" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">ที่อยู่</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="store_address" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">เบอร์โทรศัพท์</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="store_phone" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">เลขประจำตัวผู้เสียภาษี</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="store_tax" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">ประเภทร้าน</label>
            <div class="col-sm-5">
                <select name="store_type" class="form-control" required>
                    <option value="">-- เลือกประเภทร้าน --</option>
                    <option value="1">ร้านเจ้าของร้าน</option>
                    <option value="2">ร้านซื้อสินค้า</option>
                    <option value="3">ร้านขายสินค้า</option>
                </select>
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