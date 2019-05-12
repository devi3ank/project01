<div class="detail">
    <p class="title">เพิ่มข้อมูลรายละเอียด</p>
    <form action="?app=detail&action=detail_insert" method="POST" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">รูป : </label>
            <div class="col-sm-5">
                <input type="file" name="fileToUpload">
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">ชื่อรายละเอียด : </label>
            <div class="col-sm-5">
                <input type="text" name="detail_name" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-right">รายละเอียด : </label>
            <div class="col-sm-5">
                <input type="text" name="detail_description" class="form-control" required>
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