<?php require_once('configs.php'); 

    $TbName = "tb_renter";

    $func = $_REQUEST['func'];
    $mode = $_REQUEST['mode'];
    $Id = intval($_REQUEST['id']);

    if ($func == 'submit')
    {
        $title = trim( $_REQUEST['renter_fullname'] );
        $birth = trim( $_REQUEST['renter_birth'] );
        $card_id = trim( $_REQUEST['renter_id_card'] );
        $address = trim( $_REQUEST['renter_address'] );
        $telephone = trim( $_REQUEST['renter_tel'] );
        $email = trim( $_REQUEST['renter_email'] );
        $username = trim( $_REQUEST['renter_user'] );
        $password = trim( $_REQUEST['password'] );
        $password2 = trim( $_REQUEST['password2'] );
        $detail = trim( $_REQUEST['renter_detail'] );
        
        //var_dump($birth);
        if ($title == '')
            $errors[] = "โปรดใส่ ชื่อ-สกุล";
        if ($username == '')
            $errors[] = "โปรดใส่ Username ที่ใช้เข้าระบบ";
        if (filter_var($email, FILTER_VALIDATE_EMAIL) == false)
            $errors[] = "โปรดใส่ E-mail ให้ถูกต้อง";
        
        if ($password != '' && $password != $password2)
            $errors[] = "โปรดยืนยันรหัสผ่านให้้ตรงกัน";        
        
        if ($password != '')
        {
            if (strlen($password) < 4) {
                $errors[] = "รหัสผ่านต้องมีตัวอักษรมากกว่า 4 ตัวอักษร";
            }           
        }
        
        $A = array(
            'renter_fullname', $title,
            'renter_birth', $birth,
            'renter_id_card', $card_id,
            'renter_address', $address,
            'renter_tel', $telephone,   
            'renter_email', $email,            
            'renter_user', $username,
            'renter_password', $password,
            'renter_detail', $detail,
        );
                
        if (count($errors) == 0) 
        {              
            
            if ($mode == 'update')
            {
                $A[] = "WHERE {$TbPrimaryKey} = {$Id}";
                $res = DynDb_Update($TbName, $A);
            }

            if ($mode == '')
            {
                $res = DynDb_Insert($TbName, $A);
                if ($res > 0)
                    $Id = $res;
            }
            
            if ($Id > 0)
            {
                $cls_conn=new class_conn;
                echo $cls_conn->show_message('Success');
                echo $cls_conn->goto_page(0,'index.php');
            }
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
            padding-left: 26%;

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



<div class="container">
    <div class="animated fadeIn">


    <?php if (($mode == 'update') && ($res > 0)) : ?>
    <div class="alert alert-success">
      ทำการอัพเดทรายการเรียบร้อยแล้ว
    </div>
    <?php endif;?>
        
    <?php if (count($errors)) : ?>
    <div class="alert alert-warning">
        <?php foreach($errors as $error) : ?>
        <li><?php echo $error ?></li>
        <?php endforeach ?>
    </div>
    <?php endif;?>   
        <!--/.col-->


        <div class="card" style=" max-width:1250px;">
            <div class="card-header"><strong>สมัครเพื่อเข้าสู่ระบบ</strong></div>
            <div class="card-body card-block">
                <form id="addperson" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="func" value="submit" />
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">ชื่อผู้เช่า</label></div>
                        <div class="col-6 col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa ti-id-badge"></i></div>
                                <input type="text" id="renter_fullname" name="renter_fullname" placeholder="ชื่อ-นามสกุล" class="form-control" required="" value="<?php echo $_REQUEST['renter_fullname'] ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">วัน/เดือน/ปีเกิด</label></div>
                        <div class="col-6 col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="date" id="renter_birth" name="renter_birth" placeholder="วัน/เดือน/ปีเกิด" class="form-control " required="" value="<?php echo $_REQUEST['renter_birth'] ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">ที่อยู่</label></div>
                        <div class="col-6 col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-home"></i></div>
                                <input type="text" id="renter_address" name="renter_address" placeholder="ที่อยู่" class="form-control" required="" value="<?php echo $_REQUEST['renter_address'] ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label class="form-control-label">เบอร์โทร </label></div>
                        <div class="col-6 col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                <input type="text" id="renter_tel" name="renter_tel" maxlength="10" OnKeyPress="return chkNumber(this)" placeholder="เบอร์โทรศัพท์" class="form-control" required="" value="<?php echo $_REQUEST['renter_tel'] ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label class="form-control-label">เลขบัตรประชาชน </label></div>
                        <div class="col-6 col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                <input type="text" id="renter_id_card" name="renter_id_card" maxlength="13" OnKeyPress="return chkNumber(this)" placeholder="เลขบัตรประชาชน" class="form-control" required="" value="<?php echo $_REQUEST['renter_id_card'] ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">รายละเอียดการขาย</label></div>
                        <div class="col-6 col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon"><i class=" fa fa-home"></i></div>
                                <input type="text" id="renter_detail" name="renter_detail" placeholder="รายละเอียดการขาย" class="form-control" required="" value="<?php echo $_REQUEST['renter_detail'] ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Email </label></div>
                        <div class="col-6 col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                <input type="email" id="renter_email" name="renter_email" placeholder="Email" class="form-control" required="" value="<?php echo $_REQUEST['renter_email'] ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">ชื่อผู้ใช้งาน </label></div>
                        <div class="col-6 col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" id="renter_user" name="renter_user" placeholder="ชื่อผู้ใช้งาน" class="form-control" required="" value="<?php echo $_REQUEST['renter_fullname'] ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">รหัสผ่าน</label></div>
                        <div class="col-6 col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                <input type="password" id="password" name="password" placeholder="รหัสผ่าน" class="form-control" required=""  />
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">ยืนยันรหัสผ่าน</label></div>
                        <div class="col-6 col-md-6">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                <input type="password" id="password2" name="password2" placeholder="รหัสผ่าน" class="form-control" required="" />
                            </div>

                            <div id="message_password"></div>
                        </div>
                    </div>

                    <div class="card-body nav nav-pills nav-justified" id="hh">
                        <button type="summit" name="submit" class="btn btn-success btn-sm btn-save nav-link">ยืนยัน</button>&nbsp;
                        <a href="cancel" type="button" class="btn btn-danger btn-sm nav-link">ยกเลิก</a>
                    </div>


                </form>
                <!--
                <script src="jquery-3.5.1.min.js"></script>                
                <script>
                    var check_password = false;
                    var check_password_agin = false;

                    function check_btn() {
                        if (check_password == true && check_password_agin == true) {
                            $('.btn-save').attr('disabled', false);
                        }
                    }

                    $('#addperson').submit(function() {
                        $.ajax({
                            method: 'post',
                            url: 'insert.php',
                            data: $(this).serialize() + '&action=add',
                            success: function(data) {
                                if (data == 1) {
                                    window.location = 'market.php';
                                }

                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                        return false;
                    });
                    $('#renter_password').change(function() {
                        var password = $(this).val();
                        var password_agin = document.getElementById('renter_password2').value;
                        if (password == "") {
                            $('#message_password').html('กรุณากรอกรหัสผ่าน');
                        } else {
                            $.ajax({
                                method: 'post',
                                url: 'insert.php',
                                data: {
                                    password: password,
                                    password2: password_agin,
                                    function: 'check_password'
                                },
                                success: function(data) {
                                    console.log(typeof(data))
                                    if (data == 0) {
                                        check_password = true;
                                    } else if (data == 1) {
                                        $('#message_password').html('รหัสผ่าน สามารถใช้งานได้');
                                        check_password = true;
                                        check_btn();
                                    } else {
                                        $('#message_password').html('รหัสผ่าน ไม่ตรงกัน');
                                        check_password = false;
                                        $('.btn-save').attr('disabled', true);
                                    }
                                },
                                error: function(error) {
                                    console.log(error);
                                }
                            });
                        }
                    })
                    $('#renter_password2').change(function() {
                        var password_agin = $(this).val();
                        var password = document.getElementById('renter_password').value;
                        if (password_agin == "") {
                            $('#message_password').html('กรุณากรอกรหัสผ่าน');
                        } else {
                            $.ajax({
                                method: 'post',
                                url: 'insert.php',
                                data: {
                                    password: password,
                                    password2: password_agin,
                                    function: 'check_password'
                                },
                                success: function(data) {
                                    if (data == 0) {
                                        check_password_agin = true;
                                    } else if (data == 1) {
                                        $('#message_password').html('รหัสผ่าน สามารถใช้งานได้');
                                        check_password_agin = true;
                                        check_btn();
                                    } else {
                                        $('#message_password').html('รหัสผ่าน ไม่ตรงกัน');
                                        check_password_agin = false;
                                        $('.btn-save').attr('disabled', true);
                                    }
                                },
                                error: function(error) {
                                    console.log(error);
                                }
                            })
                        }
                    })
                </script>-->
            </div>
        </div>
    </div>
</div>