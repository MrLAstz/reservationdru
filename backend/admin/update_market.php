<?php include('header.php');?>
<?php

    $TablePage = "show_location.php";

    $TbName = "tb_market";
    $TbPrimaryKey = "market_id";

    $mode = $_REQUEST['mode'];
    $func = $_REQUEST['func'];
    $Id = intval($_REQUEST['id']);

    if ($func == 'submit' && $mode != '')
    {
        
        
        $res = DynDb_Update($TbName, array(
            
            'numberbox', trim( $_REQUEST['numberbox'] ),
            'id_type', intval( $_REQUEST['id_type'] ),
            'status_id', intval( $_REQUEST['status_id'] ),
                            
            " WHERE {$TbPrimaryKey} = {$Id} "
        ));
        
        if ($res > 0)
        {
            echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
            echo $cls_conn->goto_page(0,$TablePage);
        }
        else
        {
            echo $cls_conn->show_message('บันทึกข้อมูลไม่สำเร็จ');
        }
    }


    $sql = "SELECT * FROM {$TbName} WHERE {$TbPrimaryKey} = {$Id}";
    $row = DynDb_SelectTableRow($sql);

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
                            <div class="card-header"><strong>แก้ไขข้อมูลผู้ดูแลระบบ</strong></div>
                            <div class="card-body card-block">
                            
                            <form action="#" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="func" value="submit" />
                                <input type="hidden" name="mode" value="update" />
                                <input type="hidden" name="id" value="<?php echo $Id ?>" />
                                
                                    <div class="row form-group">
                                     <div class="col col-md-2"><label class=" form-control-label">ชื่อพื้นที่</label></div>
                                        <div class="col-6 col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" id="input1-group1" name="numberbox"  value="<?=$row['numberbox'];?>" placeholder="ชื่อพื้นที่" class="form-control">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="select" class=" form-control-label">ประเภท</label></div>
                                        <div class="col-6 col-md-10">
                                        <?php
                                            $Tb = DynDb_SelectTable("SELECT * FROM tb_type");
                                            echo MakeSelectTable("id_type", $Tb, "id_type", "name_type", $row['id_type']);
                                        ?>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="select" class=" form-control-label">สถานะ</label></div>
                                        <div class="col-6 col-md-10">
                                        <?php
                                            $Tb = DynDb_SelectTable("SELECT * FROM tb_status");
                                            echo MakeSelectTable("status_id", $Tb, "status_id", "status_name", $row['status_id']);
                                        ?>
                                        </div>
                                    </div>

                                    <div class="card-body" id="pp" >
                                        <button type="summit" name="submit" class="btn btn-success btn-sm">ยืนยัน</button>
                                        <a href="<?php echo $TablePage ?>" class="btn btn-danger btn-sm" >ยกเลิก</a>
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