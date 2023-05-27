<?php include('header.php');?>
    <div class="le">
        <div class="content mt-2">
            <div class="animated fadeIn">
                    <div class="col-lg-9" >
                        <div class="card">
                            <div class="card-header"><strong>เพิ่มข้อมูลผู้ดูแลระบบ</strong></div>
                            <div class="card-body card-block">
                           
                            <?php
                                if(isset($_GET['id']))
                                {
                                    $id=$_GET['id'];
                                    
                                
                                    $sql=" delete from tb_renter";
                                    $sql.=" where";
                                    $sql.=" renter_id='$id'";
                                    
                                    $cls_conn=new class_conn;
                                    if(DynDb_Exec($sql)==true)
                                    {
                                        echo $cls_conn->show_message('ลบข้อมูลสำเร็จ');
                                        echo $cls_conn->goto_page(0,'show_renter.php');
                                    }
                                    else
                                    {
                                        echo $cls_conn->show_message('ลบข้อมูลไม่สำเร็จ');
                                        echo $sql;
                                    }
                                }
                                
                                ?>
                       
                            </div>                  
                         </div>
                     </div>
            
            </div>
        </div>
    </div>


<?php include('footer.php');?>