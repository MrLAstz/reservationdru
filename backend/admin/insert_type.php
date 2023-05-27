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
    <!-- <script>
         function chkNumber(ele) {
            var vchar = String.fromCharCode(event.keyCode);
            if ((vchar < '0' || vchar > '9') && (vchar != '.')) return false;
            ele.onKeyPress = vchar;

        }
    </script> -->
</header>
                        <div class="card" style=" max-width:1000px;">
                            <div class="card-header"><strong>เพิ่มข้อมูลประเภท</strong></div>
                            <div class="card-body card-block">
                            <form  method="post" >
                               
                                                            <div class="row form-group">
                                                                <div class="col col-md-5"><label class=" form-control-label">ชื่อประเภท</label></div>
                                                                    <div class="col-6 col-md-8">
                                                                        <div class="input-group">
                                                                           
                                                                             <input type="text" id="input1-group1" name="name_type"   class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            

                                                            <div class="card-body nav nav-pills nav-justified"  id="pp">
                                                                <button   type="summit" name="submit" class="btn btn-success btn-sm nav-link ">ยืนยัน</button>
                                                                &nbsp;<a href="show_type.php" type="button" class="btn btn-danger btn-sm nav-link">ยกเลิก</a>
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

                             $sql_check = "select * from tb_type where name_type ='$name_type'";
                             $numrowtype = $cls_conn->select_numrows($sql_check);  
                            
                         
                             if($numrowtype>=1){
                                echo $cls_conn->show_message('มีประเภทนี้อยู่ในระบบแล้ว');
                             }if($numrowtype != 1 ) {

                            

                            $sql=" insert into tb_type(name_type)";
                            $sql.=" values ('$name_type')";
                            
                           
                            if($cls_conn->write_base($sql)==true)
                            {
                                // echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(0,'show_type.php');
                            //    echo $sql;
                            }
                            else
                            {
                                echo $cls_conn->show_message('บันทึกข้อมูลไม่สำเร็จ');
                            }
                        }                           
                        }
                        ?>


                  </div>                  
                 </div>