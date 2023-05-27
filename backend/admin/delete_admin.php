<?php include('header.php');?>

                           
                            <?php
                                if(isset($_GET['id']))
                                {
                                    $id=$_GET['id'];
                                    
                                
                                    $sql=" delete from tb_admin";
                                    $sql.=" where";
                                    $sql.=" admin_id='$id'";
                                    
                                    $cls_conn=new class_conn;
                                    if(DynDb_Exec($sql)==true)
                                    {
                                        echo $cls_conn->show_message('ลบข้อมูลสำเร็จ');
                                        echo $cls_conn->goto_page(0,'show_admin.php');
                                    }
                                    else
                                    {
                                        echo $cls_conn->show_message('ลบข้อมูลไม่สำเร็จ');
                                        echo $sql;
                                    }
                                }
                                
                                ?>
                    


<?php include('footer.php');?>