<?php include('header.php'); ?>
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

                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header"><strong>จองพื้นที่</strong></div>
                        <div class="card-body card-block">

                            <form id="addbooking">
                                <div class="row form-group">
                                    <div class="col col-md-2"><label for="select" class=" form-control-label">รหัสการจอง</label></div>
                                    <div class="col-6 col-md-10">
                                        <select id="status_id" name="status_id" required="required" class="form-control has-feedback-left">
                                            <option>--- เลือก ---</option>
                                            <?php
                                            $sqld = " select * from tb_status";
                                            $resultd = $cls_conn->select_base($sqld);
                                            while ($rowd = mysqli_fetch_array($resultd)) {
                                            ?>
                                                <option value="<?= $rowd['status_id']; ?>"><?= $rowd['status_name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">หมายเลขแผง</label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-home"></i></div>
                                            <input type="text" id="market_id" name="market_id" placeholder="หมายเลขแผง" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">ชื่อผู้จอง</label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" id="renter_id" name="renter_id" placeholder="ชื่อ-นามสกุล" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">วันเวลาที่จอง</label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            <input type="date" id="bk_datetime" name="bk_datetime" placeholder="วัน/เดือน/ปีเกิด" class="form-control " required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">วันเวลาสิ้นสุดการจอง</label></div>
                                    <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            <input type="date" id="bk_end" name="bk_end" placeholder="ที่อยู่" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body nav nav-pills nav-justified" id="hh">

                                    <button type="summit" name="submit" class="btn btn-success btn-sm btn-save nav-link">ยืนยัน</button>
                                    &nbsp;<a href="insert_renter.php" type="button" class="btn btn-danger btn-sm nav-link">ยกเลิก</a>
                                </div>
                            </form>

                            <script>
                                $('#addbooking').submit(function() {
                                    $.ajax({
                                        method: 'post',
                                        url: 'insert_bk.php',
                                        data: $(this).serialize() + '&action=add',
                                        success: function(data) {
                                            if (data == 1) {
                                                window.location = 'show_booking.php';
                                            }

                                        },
                                        error: function(error) {
                                            console.log(error);
                                        }
                                    });
                                    return false;
                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>