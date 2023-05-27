<?php include('header.php'); ?>
<?php
    $dest = "login.php";

    $cls_conn=new class_conn;
    echo $cls_conn->goto_page(0, $dest);
?>
<?php include('footer.php'); ?>