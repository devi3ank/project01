<div class="detail">
    <p class="title">จัดการข้อมูลสินค้า</p>
    <a href="?app=products_add" class="btn btn-secondary mb-2"><i class="fas fa-user-plus"></i> เพิ่มข้อมูลสินค้า</a>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th class="text-center" style="width: 100px;">#</th>
                <th class="text-center">ชื่อสินค้า</th>
                <th class="text-center" style="width: 150px;">สถานะ</th>
                <th class="text-center" style="width: 150px;">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">1.</td>
                <td>ข้าวสาว</td>
                <td class="text-center">ใช้งาน</td>
                <td class="text-center">
                    <a href="?app=products_edit" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                    <a href="#" class="btn btn-danger" onclick="confirm('ยืนยันการลบข้อมูล');"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>
            <tr>
                <td class="text-center">2.</td>
                <td>ข้าวเหนียว</td>
                <td class="text-center">ใช้งาน</td>
                <td class="text-center">
                    <a href="?app=products_edit" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                    <a href="#" class="btn btn-danger" onclick="confirm('ยืนยันการลบข้อมูล');"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>