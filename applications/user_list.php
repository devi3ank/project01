<?php 
    $sql = "    
        SELECT 
            user_tb.user_id, 
            user_tb.user_fullname,
            user_tb.user_type,
            user_tb.user_status
        FROM user_tb
        WHERE user_status != '3'
    ";

    $result = $conn->query($sql);
?>
<div class="detail">
    <p class="title">จัดการข้อมูลผู้ใช้งาน</p>
    <a href="?app=user_add" class="btn btn-secondary mb-2"><i class="fas fa-user-plus"></i> เพิ่มข้อมูลผู้ใช้งาน</a>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th class="text-center" style="width: 100px;">#</th>
                <th class="text-center">ชื่อ-นามสกุล</th>
                <th class="text-center" style="width: 150px;">สถานะ</th>
                <th class="text-center" style="width: 150px;">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($result->num_rows > 0) { 
                $i = 1;
                while($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td class="text-center"><?php echo $i; ?></td>
                    <td><?php echo $row['user_fullname']; ?></td>
                    <td class="text-center"><?php echo $status[$row['user_status']]?></td>
                    <td class="text-center">
                        <a href="?app=user_edit&id=<?php echo $row['user_id']; ?>" class="btn btn-secondary"><i class="fas fa-user-edit"></i></a>

                        <?php if ($row['user_id'] != 1) { ?>
                        <a href="#" class="btn btn-danger" onclick="confirm('ยืนยันการลบข้อมูล');"><i class="fas fa-user-minus"></i></a>
                        <?php } ?>
                    </td>
                </tr>
            <?php
                $i++; 
                } 
            } else { 
            ?>
                <tr>
                    <td class="text-center" colspan="4">ไม่มีข้อมูล</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>