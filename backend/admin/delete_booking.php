<?php include('header.php');?>

                           
        <?php
            if(isset($_GET['id']))
            {
                $id= intval($_GET['id']);
                
                DynDb_Update("tb_market", array(
                    'status_id', 1,
                    " WHERE market_id = {$id} "                    
                ));

                $bk_id = DynDb_SelectValue("SELECT bk_id 
                     FROM tb_booking WHERE market_id = {$id}
                     ORDER BY bk_id DESC LIMIT 1");

                $sql = "DELETE FROM tb_booking WHERE bk_id = {$bk_id}";
                
                $cls_conn=new class_conn;
                if(DynDb_Exec($sql)==true)
                {
                    echo $cls_conn->show_message('ลบข้อมูลสำเร็จ');
                    echo $cls_conn->goto_page(0,'index.php');
                }
                else
                {
                    echo $cls_conn->show_message('ลบข้อมูลไม่สำเร็จ');
                    echo $sql;
                }
            }

            ?>
                       



<?php include('footer.php');?>