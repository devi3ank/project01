<?php
    check_user($_SESSION['user_type'], array(1,3,4));
    $where = "";
    if ($_SESSION['store_id'] != 1) {
        $where = "(document_tb.doc_tostore = '".$_SESSION['store_id']."' OR store_tb.store_id = '".$_SESSION['store_id']."') AND ";
    }
    $result = select_db("
        SELECT
            *
        FROM
            document_tb
        INNER JOIN user_tb ON document_tb.doc_fitby = user_tb.user_id
        INNER JOIN store_tb ON user_tb.user_store = store_tb.store_id
        WHERE
            $where
            doc_status = '1'
    ");
?>
<div class="detail">
    <p class="title">เอกสารข้อมูล</p>
    <a href="?app=documents&action=documents_add" class="btn btn-sm btn-secondary mb-3">เพิ่มเอกสาร</a>
    <table class="table table-bordered table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th class="text-center" style="width: 80px">#</th>
                <th class="text-center" style="width: 300px">ชื่อร้านที่อัพโหลด</th>
                <th class="text-center" style="width: 200px">ชื่อเอกสาร</th>
                <th class="text-center">รายละเอียด</th>
                <th class="text-center" style="width: 150px">ประเภทเอกสาร</th>
                <th style="width: 120px"></th>
            </tr>
        </thead>
        <tbody>
        <?php 
            if ($result->num_rows > 0) { 
            $i = 1;
            while($row = $result->fetch_assoc()) {
                $fileType = strtolower(pathinfo("./uploads/".$row['doc_file'],PATHINFO_EXTENSION));
            ?>
            <tr>
                <td class="text-center"><?=$i?></td>
                <td><?=$row['store_name']?></td>
                <td><?=$row['doc_name']?></td>
                <td><?=$row['doc_description']?></td>
                <td class="text-center">
                    <?php if ($fileType == "docx") {?>
                    <i class="far fa-file-word"></i> Word
                    <?php } elseif ($fileType == "pdf") { ?>
                    <i class="fas fa-file-pdf"></i> PDF
                    <?php } elseif ($fileType == "xlsx") { ?>
                    <i class="fas fa-file-excel"></i> Excel
                    <?php } else { ?>
                    <i class="far fa-image"></i> รูปภาพ
                    <?php }  ?>
                </td>
                <td class="text-center">
                    <a href="./uploads/<?=$row['doc_file']?>" download="<?=$row['doc_name']?>" class="btn btn-warning btn-sm" title="ดาวน์โหลด"><i class="fas fa-file-export"></i></a>
                    <a href="?app=documents&action=documents_delete&id=<?=$row['doc_id']?>" title="ลบข้อมูล" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล');"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>
        <?php $i++;}} else { ?>
            <tr>
                <td class="text-center" colspan="6">ไม่มีข้อมูล</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>