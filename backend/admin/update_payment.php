<?php include('header.php');?>
<?php

    $TablePage = "show_payment.php";

    $TbName = "tb_payment";
    $TbPrimaryKey = "pay_id";

    $mode = $_REQUEST['mode'];
    $func = $_REQUEST['func'];
    $Id = intval($_REQUEST['id']);

    if ($func == 'submit' && $mode == 'update')
    {   
        $res = DynDb_Update($TbName, array(
            'admin_id', $User_Id,
                            
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


    //$sql = "SELECT * FROM {$TbName} WHERE {$TbPrimaryKey} = {$Id}";
    //$row = DynDb_SelectTableRow($sql);

?>
<?php include('footer.php');?>