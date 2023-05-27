<?php
    require_once('configs.php');

    session_start();

    $User = null;

    $User_Type = ( $_SESSION['user_type'] ); 

    $User_Id = ($User_Type == 'admin') ? intval( $_SESSION['admin_id'] ) :  intval( $_SESSION['renter_id'] ); 
    if (!$User_Id)
        $User_Id = intval( $_COOKIE['user_id'] );


    if ($User_Id > 0 && $User_Type != '')
    {
        if ($User_Type == 'admin')
            $User = DynDb_SelectTableRow("SELECT * FROM tb_admin WHERE admin_id = {$User_Id} LIMIT 1 ");
        else
            $User = DynDb_SelectTableRow("SELECT * FROM tb_renter WHERE renter_id = {$User_Id} LIMIT 1 ");
        
        if (count($User) <= 0)
        {
            $User = null;
            $User_Id = 0;
        }
        else
        {               
            $User['user_type'] = $User_Type;
            
            $User_Id = ($User_Type == 'admin') ? $User['admin_id'] : $User['renter_id'];
            $IsAdmin = ($User['user_type'] == 'admin');
            $IsUser = (($User['user_type'] == 'user') || ($User['user_type'] == '')) ;
            $IsManager = (!$IsUser);
        }
    }


    $mobile = $_SESSION['m'];



?>
