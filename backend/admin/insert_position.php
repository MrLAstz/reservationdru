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
                            <div class="card-header"><strong>เพิ่มข้อมูลสิทธ์การใช้งาน</strong></div>
                            <div class="card-body card-block">
                            <form  method="post">
                                                            
                                                            <div class="row form-group">
                                                             <div class="col col-md-2"><label class=" form-control-label">สิทธ์การใช้งาน</label></div>
                                                                    <div class="col-6 col-md-10">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                                        <input type="text" id="input1-group1" name="position_name"  placeholder="สิทธ์การใช้งาน" class="form-control" required="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="card-body nav nav-pills nav-justified" id="pp">
                                                                <button type="summit" name="submit" class="btn btn-success btn-sm nav-link">ยืนยัน</button>
                                                                &nbsp;<a href="insert_admin.php" type="button" class="btn btn-danger btn-sm nav-link">ยกเลิก</a>
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
                                        $position_name=$_POST['position_name'];
                                       

                           
                            $sql=" insert into tb_position(position_name)";
                            $sql.=" values ('$position_name')";
                            
                           
                            if($cls_conn->write_base($sql)==true)
                            {
                                // echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(0,'insert_position.php');
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