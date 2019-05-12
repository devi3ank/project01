<?php
$id = $_GET['id'];
$flgDelete = unlink("./uploads/".$_GET['namefile']);
if($flgDelete)
{
	$id = $_GET['id'];
    update_db("detail_tb", array('detail_image'=>""), "detail_id = '$id'");
    echo "
        <script>
            alert('ลบข้อมูลเรียบร้อยแล้ว');
            window.location.href='$domain?app=detail&action=detail_edit&id=$id';
        </script>
    ";
}
?>