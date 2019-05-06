<?php

   @ $store_name = $_POST['store_name'];

    $where = ($store_name!="")? "AND store_name LIKE '$store_name%'":"";

    $result = select_db("
        SELECT
            *
        FROM
            store_tb
        WHERE
            store_status != '3'
        $where
    ");
?>

<div class="detail">
    <p class="title">จัดการร้านค้า</p>

    <div class="row">
        <div class="col-sm-6">
            <a href="?app=store&action=store_add" class="btn btn-secondary btn-sm">เพิ่มข้อมูลร้านค้า</a>
        </div>
        <div class="col-sm-6">
            <form action="" class="form-inline float-right" method="POST">
                <div class="input-group mb-3">
                    <input type="text" name="store_name" value="<?=$store_name?>" placeholder="ค้นหาชื่อร้านค้า" class="form-control form-control-sm">
                    <button type="submit" class="btn btn-secondary btn-sm">ค้นหา</button>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-bordered table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th class="text-center" style="width: 100px;">#</th>
                <th class="text-center">ชื่อร้านค้า</th>
                <th class="text-center" style="width: 150px;">ประเภท</th>
                <th class="text-center" style="width: 150px;">สถานะ</th>
                <th class="text-center" style="width: 150px;"></th>
            </tr>
        </thead>
        <tbody>
        <?php
            if ($result->num_rows > 0) {
                $i = 1;
                while($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td class="text-center"><?=$i?></td>
                <td><?=$row['store_name']?></td>
                <td class="text-center"><?=$typeStore[$row['store_type']]?></td>
                <td class="text-center"><?=$status[$row['store_status']]?></td>
                <td class="text-center">
                    <a href="?app=store&action=store_edit&id=<?=$row['store_id']?>" class="btn btn-secondary btn-sm" title="แก้ไขข้อมูล"><i class="fas fa-edit"></i></a>
                    <?php if ($row['store_id'] != 1) { ?>
                    <a href="?app=store&action=store_delete&id=<?=$row['store_id']?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล ?')" title="ลบข้อมูล"><i class="far fa-trash-alt"></i></a>
                    <?php } ?>
                </td>
            </tr>
            <?php $i++;}} else { ?>
            <tr>
                <td class="text-center" colspan="5">ไม่มีข้อมูล</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>