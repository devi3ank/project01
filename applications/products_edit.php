<div class="detail">
    <p class="title">แก้ไขข้อมูลสินค้า</p>
    <form>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">ชื่อสินค้า : </label>
            <div class="col-sm-5">
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right">สถานะ : </label>
            <div class="col-sm-5">
                <label for="status1" class="mt-2">
                    <input id="status1" type="radio" name="status" value="1" checked>&nbsp;
                    ใช้งาน
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="status2">
                    <input id="status2" type="radio" name="status" value="0">&nbsp;
                    ปิดการใช้งาน
                </label>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-right"></label>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-secondary"><i class="far fa-save"></i> บันทึกข้อมูล</button>
            </div>
        </div>
    </form>
</div>