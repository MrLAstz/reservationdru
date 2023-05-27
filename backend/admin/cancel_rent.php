<?php include('header.php');?>

                           
        <?php
            if(isset($_GET['id']))
            {
                $id= intval($_GET['id']);
                
                $sql = "UPDATE tb_rent SET rent_cancel_date = CURDATE() WHERE rent_id = {$id}";
                
                $cls_conn=new class_conn;
                
                if(DynDb_Exec($sql)==true)
                {
                    echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                    echo $cls_conn->goto_page(0,'show_rent.php');
                }
                else
                {
                    echo $cls_conn->show_message('ลบข้อมูลไม่สำเร็จ');
                    echo $sql;
                }
            }

            ?>
                       



<?php include('footer.php');?>