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
                            <div class="card-header"><strong>แก้ไขข้อมูลผู้ดูแลระบบ</strong></div>
                            <div class="card-body card-block">
                            <?php
                                if(isset($_GET['id']))
                                {
                                    $id=$_GET['id'];
                                    $sqlu="SELECT
                                    tb_admin.admin_id,
                                    tb_admin.admin_fullname,
                                    tb_admin.admin_email,
                                    tb_admin.admin_tel,
                                    tb_admin.admin_user,
                                    tb_admin.admin_password,
                                    tb_admin.status_id,
                                    tb_admin.position_id,
                                    tb_status.status_name
                                    FROM
                                    tb_admin
                                    INNER JOIN tb_status ON tb_admin.status_id = tb_status.status_id";
                                    $sqlu.=" where";
                                    $sqlu.=" admin_id='$id'";
                                    
                                    $rowu = DynDb_SelectTableRow($sqlu);
                                    if ($rowu)
                                    {
                                        $admin_id=$rowu['admin_id'];
                                        $admin_fullname=$rowu['admin_fullname'];
                                        $admin_email=$rowu['admin_email'];
                                        $admin_tel=$rowu['admin_tel'];
                                        $admin_user=$rowu['admin_user'];
                                        $admin_password=$rowu['admin_password']; 
                                        $position_id=$rowu['position_id'];
                                        $status_id=$rowu['status_id'];
                                    }
                                }
                            ?>
                            <form  method="post" enctype="multipart/form-data" action="#">
                                <input type="hidden" name="admin_id" value="<?=$admin_id;?>" />
                                <div class="row form-group">
                                 <div class="col col-md-2"><label class=" form-control-label">ชื่อผู้ดูแลระบบ</label></div>
                                        <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" id="input1-group1" name="admin_fullname"  value="<?=$admin_fullname;?>" placeholder="ชื่อ-นามสกุล" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class="form-control-label">เบอร์โทร </label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                            <input type="text" id="admin_tel" name="admin_tel" value="<?=$admin_tel;?>"  OnKeyPress="return chkNumber(this)" onkeyup="autoTab2(this,2)" placeholder="เบอร์โทรศัพท์" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">Email </label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                            <input type="email" id="admin_email" name="admin_email" value="<?=$admin_email;?>" placeholder="Email" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">ชื่อผู้ใช้งาน </label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                            <input type="text" id="admin_user" name="admin_user" value="<?=$admin_user;?>" placeholder="ชื่อผู้ใช้งาน" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">Password</label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                            <input type="password" id="admin_password" name="admin_password" value="<?=$admin_password;?>" placeholder="Password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                        <div class="col col-md-2"><label for="select" class=" form-control-label">ตำแหน่ง</label></div>
                                        <div class="col-6 col-md-10">
                                        <?php
                                            $sqld=" select * from tb_position";
                                            $Tb = DynDb_SelectTable($sqld);
                                            echo MakeSelectTable("position_id", $Tb, "position_id", "position_name", $position_id);
                                        ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                        <div class="col col-md-2"><label for="select" class=" form-control-label">สถานะ</label></div>
                                        <div class="col-6 col-md-10">
                                         <?php
                                            $sqld=" select * from tb_status where status_id = 10 or status_id = 11 ";
                                            $Tb = DynDb_SelectTable($sqld);
                                            echo MakeSelectTable("status_id", $Tb, "status_id", "status_name", $status_id);
                                        ?>
                                        
                                        </div>
                                    </div>

                                <div class="card-body" id="pp" >
                                    <button type="summit" name="submit" class="btn btn-success btn-sm">ยืนยัน</button>
                                    <a href="show_admin.php" class="btn btn-danger btn-sm" >ยกเลิก</a>
                                </div>
                                               
                            </form>
                           
                        <?php
                        if(isset($_POST['submit']))
                        {
                                        $admin_fullname	= $_POST['admin_fullname'];
                                        // $admin_tel		= $_POST['admin_tel'];
                                        // $admin_email	= $_POST['admin_email'];
                                        $admin_user		= $_POST['admin_user'];
                                        $admin_password	= $_POST['admin_password'];
                                        $status_id		= $_POST['status_id'];


                         
                                        $sql=" update tb_admin";
                                        $sql.=" set";
                                        $sql.=" admin_fullname='$admin_fullname'";
                                        // $sql.=" ,admin_email='$admin_email'";
                                        // $sql.=" ,admin_tel='$admin_tel'";
                                        $sql.=" ,admin_user='$admin_user'";
                                        $sql.=" ,admin_password='$admin_password'";
                                        $sql.=" ,status_id='$status_id'";
                                        $sql.=" where";
                                        $sql.=" admin_id='$admin_id'";
                            
                           
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(0,'show_admin.php');
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