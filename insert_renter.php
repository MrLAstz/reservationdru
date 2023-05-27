<?php include('header.php'); ?>
<?php

    $errors = array();

    if ($_REQUEST['action'] == 'add')
    {
                
        $A = array(
            'renter_fullname', trim( $_REQUEST['renter_fullname'] ),
            'renter_birth', trim( $_REQUEST['renter_birth'] ),
            'renter_id_card', trim( $_REQUEST['renter_id_card'] ),
            'renter_address', trim( $_REQUEST['renter_address'] ),
            'renter_tel', trim( $_REQUEST['renter_tel'] ),
            'renter_email', trim( $_REQUEST['renter_email'] ),
            'renter_user', trim( $_REQUEST['renter_user'] ),
            'renter_detail', trim( $_REQUEST['renter_detail'] ),
        );
        
        $password = trim( $_REQUEST['renter_password'] );
        if ($password != '')
        {
            $A[] = 'renter_password';
            $A[] = $password; //encrypt_password($password);
        }
        
        if (count($errors) == 0) 
        {              
            $res = DynDb_Insert('tb_renter', $A);
            if ($res > 0)
            {
                $Id = $res;
                header("Location: show_renter.php");
                exit;
            }
            else
                $errors[] = "ไม่สามารถสร้างผู้ใช้นี้ได้";
        }
        
    }
    
?>
<header>
    <style>
        .le {
            margin-left: 100px;
            margin-right: -100px;
        }

        #hh {
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
                
    <?php if (count($errors)) : ?>
    <div class="alert alert-warning">
        <?php foreach($errors as $error) : ?>
        <li><?php echo $error ?></li>
        <?php endforeach ?>
    </div>
    <?php endif;?>    
                
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header"><strong>เพิ่มข้อมูลผู้เช่า</strong></div>
                        <div class="card-body card-block">

                            <form id="addperson" method="post" action="#">
                                <input type="hidden" name="action" value="add" />
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">ชื่อผู้เช่า</label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa ti-id-badge"></i></div>
                                            <input type="text" id="renter_fullname" name="renter_fullname" placeholder="ชื่อ-นามสกุล" class="form-control" required="" value="<?php echo $_REQUEST['renter_fullname'] ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">วัน/เดือน/ปีเกิด</label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            <input type="date" id="renter_birth" name="renter_birth" placeholder="วัน/เดือน/ปีเกิด" class="form-control " required=""  value="<?php echo $_REQUEST['renter_birth'] ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">ที่อยู่</label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-home"></i></div>
                                            <input type="text" id="renter_address" name="renter_address" placeholder="ที่อยู่" class="form-control" required=""  value="<?php echo $_REQUEST['renter_address'] ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-2"><label class="form-control-label">เบอร์โทร </label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                            <input type="text" id="renter_tel" name="renter_tel" maxlength="10" OnKeyPress="return chkNumber(this)" placeholder="เบอร์โทรศัพท์" class="form-control" required=""  value="<?php echo $_REQUEST['renter_tel'] ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-2"><label class="form-control-label">เลขบัตรประชาชน </label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                            <input type="text" id="renter_id_card" name="renter_id_card" maxlength="13" OnKeyPress="return chkNumber(this)" placeholder="เลขบัตรประชาชน" class="form-control" required=""  value="<?php echo $_REQUEST['renter_card_id'] ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">รายละเอียดการขาย</label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class=" fa fa-home"></i></div>
                                            <input type="text" id="renter_detail" name="renter_detail" placeholder="รายละเอียดการขาย" class="form-control" required="" value="<?php echo $_REQUEST['renter_detail'] ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">Email </label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                            <input type="email" id="renter_email" name="renter_email" placeholder="Email" class="form-control" required="" value="<?php echo $_REQUEST['renter_email'] ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">ชื่อผู้ใช้งาน </label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" id="renter_user" name="renter_user" placeholder="ชื่อผู้ใช้งาน" class="form-control" required="" value="<?php echo $_REQUEST['renter_user'] ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">รหัสผ่าน</label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                            <input type="password" id="renter_password" name="renter_password" placeholder="รหัสผ่าน" class="form-control" required="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">ยืนยันรหัสผ่าน</label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                            <input type="password" id="renter_password2" name="renter_password2" placeholder="รหัสผ่าน" class="form-control" required="" />
                                        </div>
                                    </div>

                                    <div id="message_password">

                                    </div>
                                </div>

                                <div class="card-body nav nav-pills nav-justified"  id="hh">

                                    <button type="summit" name="submit" class="btn btn-success btn-sm btn-save nav-link">ยืนยัน</button>
                                    &nbsp;
                                    <a href="insert_renter.php" type="button" class="btn btn-danger btn-sm nav-link">ยกเลิก</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>