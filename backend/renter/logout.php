<?php include('header.php');?>
<div class="right_col" role="main">
  <?php
    session_destroy();
    $cls_conn = new class_conn;
    echo $cls_conn->goto_page(0,'../../logout.php');
    ?>

           
</div>
<?php include('footer.php');?>
     