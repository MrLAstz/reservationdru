<?php include('header.php');?>

                           
                            <?php
                                if(isset($_GET['id']))
                                {
                                    $id=$_GET['id'];
                                    
                                
                                    $sql=" delete from tb_type";
                                    $sql.=" where";
                                    $sql.=" id_type='$id'";
                                    
                                    $cls_conn=new class_conn;
                                    if(DynDb_Execute($sql)==true)
                                    {
                                        echo $cls_conn->show_message('ลบข้อมูลสำเร็จ');
                                        echo $cls_conn->goto_page(0,'show_type.php');
                                    }
                                    else
                                    {
                                        echo $cls_conn->show_message('ลบข้อมูลไม่สำเร็จ');
                                        echo $sql;
                                    }
                                }
                                
                                ?>
                       



<?php include('footer.php');?>