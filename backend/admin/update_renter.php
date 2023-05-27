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
                            <div class="card-header"><strong>แก้ไขข้อมูลผู้เช่า</strong></div>
                            <div class="card-body card-block">
                            <?php
                                if(isset($_GET['id']))
                                {
                                    $id=$_GET['id'];
                                    $sqlu="select * from tb_renter  ";
                                    $sqlu.=" where";
                                    $sqlu.=" renter_id='$id'";
                                    $resultu=$cls_conn->select_base($sqlu);
                                    while($rowu=mysqli_fetch_array($resultu))
                                    {
                                        $renter_id=$rowu['renter_id'];
                                        $renter_fullname=$rowu['renter_fullname'];
                                        $renter_birth=$rowu['renter_birth'];
                                        $renter_id_card=$rowu['renter_id_card'];
                                        $renter_address=$rowu['renter_address'];
                                        $renter_tel=$rowu['renter_tel'];
                                        $renter_email=$rowu['renter_email'];
                                        $renter_user=$rowu['renter_user'];
                                        $renter_password=$rowu['renter_password'];
                                    }
                                }
                            ?>
                           
                                <form  method="post">
                                    <input type="hidden" name="renter_id" value="<?=$renter_id;?>" />
                                                        <div class="row form-group">
                                                             <div class="col col-md-2"><label class=" form-control-label">ชื่อผู้เช่า</label></div>
                                                                    <div class="col-6 col-md-10">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                                        <input type="text" id="renter_fullname" name="renter_fullname" value="<?=$renter_fullname;?>" placeholder="ชื่อ-นามสกุล" class="form-control">
                                                                    </div>
                                                                </div>
                                                        </div>

                                                        <div class="row form-group">
                                                                <div class="col col-md-2"><label class=" form-control-label">วัน/เดือน/ปีเกิด</label></div>
                                                                <div class="col-6 col-md-10">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                                        <input type="date" id="renter_birth" name="renter_birth" value="<?=$renter_birth;?>" placeholder="วัน/เดือน/ปีเกิด" class="form-control ">
                                                                    </div>
                                                                </div>
                                                        </div>

                                                        <div class="row form-group">
                                                             <div class="col col-md-2"><label class=" form-control-label">ที่อยู่</label></div>
                                                                    <div class="col-6 col-md-10">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="ti-home"></i></div>
                                                                        <input type="text" id="renter_address" name="renter_address" value="<?=$renter_address;?>" placeholder="ที่อยู่" class="form-control">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                            
                                                        <div class="row form-group">
                                                                <div class="col col-md-2"><label class="form-control-label">เบอร์โทร </label></div>
                                                                <div class="col-6 col-md-10">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                                                        <input type="text" id="renter_tel" name="renter_tel" value="<?=$renter_tel;?>" maxlength="10" OnKeyPress="return chkNumber(this)"  placeholder="เบอร์โทรศัพท์" class="form-control" disabled>
                                                                    </div>
                                                                </div>
                                                        </div>

                                                        <div class="row form-group">
                                                                <div class="col col-md-2"><label class="form-control-label">เลขบัตรประชาชน </label></div>
                                                                <div class="col-6 col-md-10">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                                                        <input type="text" id="renter_id_card" name="renter_id_card" value="<?=$renter_id_card;?>" maxlength="13" OnKeyPress="return chkNumber(this)" placeholder="เลขบัตรประชาชน" class="form-control" disabled>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                            
                                                        <div class="row form-group">
                                                                <div class="col col-md-2"><label class=" form-control-label">Email </label></div>
                                                                <div class="col-6 col-md-10">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                                                        <input type="email" id="renter_email" name="renter_email" value="<?=$renter_email;?>" placeholder="Email" class="form-control" disabled>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="row form-group">
                                                                <div class="col col-md-2"><label class=" form-control-label">ชื่อผู้ใช้งาน </label></div>
                                                                <div class="col-6 col-md-10">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                                        <input type="text" id="renter_user" name="renter_user" value="<?=$renter_user;?>"  placeholder="ชื่อผู้ใช้งาน" class="form-control">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="row form-group">
                                                                <div class="col col-md-2"><label class=" form-control-label">Password</label></div>
                                                                <div class="col-6 col-md-10">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                                                        <input type="password" id="renter_password" name="renter_password" value="<?=$renter_password;?>" placeholder="รหัสผ่าน" class="form-control">
                                                                    </div>
                                                                </div>
                                                         </div>

                                                            <div class="card-body" id="pp" >
                                                                <button type="summit" name="submit" class="btn btn-success btn-sm">ยืนยัน</button>
                                                                <a href="show_renter.php" class="btn btn-danger btn-sm" >ยกเลิก</a>
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

                                        $renter_id      = $_POST['renter_id'];
                                        $renter_fullname = $_POST['renter_fullname'];
                                        $renter_birth     = $_POST['renter_birth'];
                                        // $renter_id_card   = $_POST['renter_id_card'];
                                        $renter_address   = $_POST['renter_address'];
                                        // $renter_tel       = $_POST['renter_tel'];
                                        // $renter_email     = $_POST['renter_email'];
                                        $renter_user      = $_POST['renter_user'];
                                        $renter_password  = $_POST['renter_password'];


                         
                                        $sql=" update tb_renter";
                                        $sql.=" set";
                                        $sql.=" renter_fullname='$renter_fullname'";
                                        $sql.=" ,renter_birth='$renter_birth'";
                                        // $sql.=" ,renter_id_card='$renter_id_card'";
                                        $sql.=" ,renter_address='$renter_address'";
                                        // $sql.=" ,renter_tel='$renter_tel'";
                                        // $sql.=" ,renter_email='$renter_email'";
                                        $sql.=" ,renter_user='$renter_user'";
                                        $sql.=" ,renter_password='$renter_password'";
                                        $sql.=" where";
                                        $sql.=" renter_id='$renter_id'";
                            
                           
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(0,'show_renter.php');
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