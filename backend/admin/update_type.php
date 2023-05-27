<?php include('header.php');?>

<header>
    <style>
        .le{
           margin-left: 100px;
           margin-right: -100px;
        }
        #pp{
           padding-left: 17%;
        }
    </style>
    <script>
         function chkNumber(ele) {
            var vchar = String.fromCharCode(event.keyCode);
            if ((vchar < '0' || vchar > '9') && (vchar != '.')) return false;
            ele.onKeyPress = vchar;

        }
    </script>
</header>
<div class="le">
        <div class="content mt-2">
            <div class="animated fadeIn">


                <div class="">
                    
                    <!--/.col-->

                    <div class="col-lg-9" >
                        <div class="card">
                            <div class="card-header"><strong>แก้ไขข้อมูลประเภทร้านค้า</strong></div>
                            <div class="card-body card-block">
                            <?php
                                if(isset($_GET['id']))
                                {
                                    $id=$_GET['id'];
                                    $sqlu="SELECT
                                    *
                                    FROM
                                    tb_type
                                    ";
                                    $sqlu.=" where";
                                    $sqlu.=" id_type='$id'";
                                    $resultu=$cls_conn->select_base($sqlu);
                                    while($rowu=mysqli_fetch_array($resultu))
                                    {
                                        $id_type=$rowu['id_type'];
                                        $name_type=$rowu['name_type'];
                                    }
                                }
                            ?>
                            <form  method="post">
                                <input type="hidden" name="id_type" value="<?=$id_type;?>" />
                                                            <div class="row form-group">
                                                             <div class="col col-md-2"><label class=" form-control-label">ชื่อประเภทร้านค้า</label></div>
                                                                    <div class="col-6 col-md-4">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                                        <input type="text" id="input1-group1" name="name_type"  value="<?=$name_type;?>" placeholder="ชื่อประเภท" class="form-control" required="">
                                                                    </div>
                                                                </div>
                                                            </div>
     
                                                            

                                                            <div class="card-body" id="pp" >
                                                                <button type="summit" name="submit" class="btn btn-success btn-sm">ยืนยัน</button>
                                                                <a href="show_type.php" class="btn btn-danger btn-sm" >ยกเลิก</a>
                                                            </div>
                                                </div>
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->  
                            </form>
                           
                        <?php
                        if(isset($_POST['submit']))
                        {
                                        $name_type	= $_POST['name_type'];



                         
                                        $sql=" update tb_type";
                                        $sql.=" set";
                                        $sql.=" name_type='$name_type'";

                                        $sql.=" where";
                                        $sql.=" id_type='$id_type'";
                            
                           
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(0,'show_type.php');
                            //    echo $sql;
                            }
                            else
                            {
                                echo $cls_conn->show_message('บันทึกข้อมูลไม่สำเร็จ');
                            }
                            
                                                        
                        }
                        ?>
                            </div>                  
                         </div>
                     </div>
                 </div>
            </div>
        </div>
 </div>


<?php include('footer.php');?>