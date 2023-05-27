<?php include('header.php');?>
<?php
    $TablePage = "show_admin.php";
    
    $TbName = 'tb_admin';
    $TbPrimaryKey = 'admin_id' ;

    if(isset($_POST['submit']))
    {
        $admin_fullname=$_POST['admin_fullname'];
        $admin_tel=$_POST['admin_tel'];
        $admin_email=$_POST['admin_email'];
        $admin_user=$_POST['admin_user'];
        $admin_password=$_POST['admin_password'];
        $position_id=$_POST['position_id'];
        $status_id=$_POST['status_id'];

        if(strlen($admin_password) <6 )
            $errors[] = 'รหัสต้อง 6-8 ตัวขึ้นไป';
            
            
        $sql_check = "select count(*) from tb_admin where admin_email ='$admin_email'";
        $numrowemail = DynDb_SelectValue($sql_check);

        $sql_check2 = "select count(*) from tb_admin where admin_tel ='$admin_tel'";
        $numrowtel = DynDb_SelectValue($sql_check2);

        if($numrowtel>=1){
            $errors[] = 'มีหมายเลขโทรศัพท์ในระบบนี้แล้ว';
        }
        
        if($numrowemail>=1){
            $errors[] = 'มีอีเมลนี้ในระบบแล้ว';
            
        }
        
        
        $res = DynDb_Insert($TbName, array(
            
            'admin_fullname', $admin_fullname,
            'admin_tel', $admin_tel,
            'admin_email', $admin_email,
            'admin_user', $admin_user,
            'admin_password', $admin_password,
            'position_id', $position_id,
            'status_id', $status_id,
        ));
        
        if ($res > 0)
        {
            $rent_id = $res;
            
            DynDb_Update('tb_booking', array(                
                'rent_id', $rent_id,
                
                " WHERE bk_id = {$Id} "
            ));
            
            DynDb_Update('tb_market', array(
                'status_id', 2,
                
                " WHERE market_id = {$market_id} "
            ));
            
            echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
            echo $cls_conn->goto_page(0,$TablePage);
        }
        else
        {
            echo $cls_conn->show_message('บันทึกข้อมูลไม่สำเร็จ');
        }
    }
?>
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
                            <div class="card-header"><strong>เพิ่มข้อมูลผู้ดูแลระบบ</strong></div>
                            <div class="card-body card-block">
                            <form  method="post" enctype="multipart/form-data" action="#">
                                                            
                                <div class="row form-group">
                                 <div class="col col-md-2"><label class=" form-control-label">ชื่อผู้ดูแลระบบ</label></div>
                                        <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" id="input1-group1" name="admin_fullname"  placeholder="ชื่อ-นามสกุล" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class="form-control-label">เบอร์โทร </label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                            <input type="text" id="admin_tel" name="admin_tel" maxlength="10" OnKeyPress="return chkNumber(this)" placeholder="เบอร์โทรศัพท์" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">Email </label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                            <input type="email" id="admin_email" name="admin_email" placeholder="Email" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">ชื่อผู้ใช้งาน </label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                            <input type="text" id="admin_user" name="admin_user"  placeholder="ชื่อผู้ใช้งาน" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">Password</label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                            <input type="password" id="admin_password" name="admin_password" placeholder="Password" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                        <div class="col col-md-2"><label for="select" class=" form-control-label">ตำแหน่ง</label></div>
                                        <div class="col-6 col-md-10">
                                        <?php
                                            $sqld=" select * from tb_position";
                                            $Tb = DynDb_SelectTable($sqld);
                                            echo MakeSelectTable("position_id", $Tb, "position_id", "position_name", $_REQUEST['position_id']);
                                        ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                        <div class="col col-md-2"><label for="select" class=" form-control-label">สถานะ</label></div>
                                        <div class="col-6 col-md-10">
                                        <?php
                                            $sqld=" select * from tb_status where status_id = 10 or status_id = 11 ";
                                            $Tb = DynDb_SelectTable($sqld);
                                            echo MakeSelectTable("status_id", $Tb, "status_id", "status_name", $_REQUEST['status_id']);
                                        ?>
                                    </div>
                                </div>

                                <div class="card-body nav nav-pills nav-justified" id="pp">
                                    <button type="summit" name="submit" class="btn btn-success btn-sm nav-link">ยืนยัน</button>
                                    &nbsp;<a href="<?php echo $TablePage ?>" type="button" class="btn btn-danger btn-sm nav-link">ยกเลิก</a>
                                </div>                                                
                                         
                            </form>
                        

                    
                            </div>                  
                         </div>
                     </div>
                 </div>
            </div>
        </div>
 </div>
<?php include('footer.php');?>