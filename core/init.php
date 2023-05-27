<?php
	require_once("dynutils.php");
	require_once("dynformat.php");

    if (function_exists('mysqli_connect'))
        require_once('dyndatabasei.php');
    else
        require_once("dyndatabase.php");

	require_once("dynuserfile.php");
	require_once("dynenc.php");

    if (file_exists('modules/mailer/init.php'))
    {
        require_once("modules/mailer/init.php");
        require_once("mail.php");
    }

    if (file_exists('modules/sms/init.php'))
    {
        require_once("modules/sms/init.php");
    }

	require_once("dynwsp.php");

    error_reporting(E_ERROR | E_PARSE);
    date_default_timezone_set('Asia/Bangkok');
	
    DynDb_Setup( $Configs );
	DynDb_Connect();

    DynDb_Exec("SET GLOBAL time_zone = 'Asia/Bangkok'");
    DynDb_Exec("SET time_zone = '+07:00' ");
    DynDb_Exec("SET @@session.time_zone = '+07:00'");



?>