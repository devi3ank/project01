<?php
    $app    = (!empty($_GET['app']))?'/'.$_GET['app'].'/':'/';
    $action = (!empty($_GET['action']))?$_GET['action']:'main';
    include './main/navbar.php';
?>
<div class="content">
<?php 
    include './applications'.$app.$action.'.php';
?>
</div>

<?php $conn->close(); ?>