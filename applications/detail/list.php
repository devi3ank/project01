<?php
    $result = select_db("
        SELECT
            *
        FROM
            detail_tb
        WHERE
            detail_status != '3'
    ");
?>

<div class="detail">
    <p class="title">จัดการข้อมูลเว็บไซต์</p>
    <a href="?app=detail&action=detail_add" class="btn btn-secondary btn-sm mb-2">เพิ่มข้อมูลรายละเอียด</a>
    <table class="table table-bordered table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th class="text-center" style="width: 100px;">#</th>
                <th class="text-center" style="width: 100px;">รูป</th>
                <th class="text-center">ชื่อ</th>
                <th class="text-center" style="width: 150px;">สถานะ</th>
                <th class="text-center" style="width: 150px;">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if ($result->num_rows > 0) {
                $i=1;
                while($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td class="text-center"><?=$i?></td>
                    <td class="text-center">
                        <?php if ($row['detail_image'] != "") { ?>
                        <img src="./uploads/<?=$row['detail_image']?>" alt="<?=$row['detail_name']?>" width="100%">
                        <?php } ?>
                    </td>
                    <td><?=$row['detail_name']?></td>
                    <td class="text-center"><?=$status[$row['detail_status']]?></td>
                    <td class="text-center">
                        <a href="?app=detail&action=detail_edit&id=<?=$row['detail_id']?>" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="?app=detail&action=detail_delete&id=<?=$row['detail_id']?>" class="btn btn-danger btn-sm" onclick="confirm('ยืนยันการลบข้อมูล');"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php $i++; }} else { ?>
                <tr>
                    <td class="text-center" colspan="5">ไม่มีข้อมูล</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>