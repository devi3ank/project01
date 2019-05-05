<div class="detail">
    <p class="title">เพิ่มข้อมูลสินค้า</p>
    <form action="?app=products&action=products_insert" method="POST">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">รหัสสินค้า : </label>
            <div class="col-sm-5">
                <input type="text" name="products_code" class="form-control" autofocus required>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">ชื่อสินค้า : </label>
            <div class="col-sm-5">
                <input type="text" name="products_name" class="form-control" autofocus required>
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