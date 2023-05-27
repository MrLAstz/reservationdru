<?php
    error_reporting(E_ERROR | E_PARSE | E_WARNING);

    $Configs["GOOGLE_API_KEY"] = '';

    switch ($_SERVER['SERVER_NAME']) {   
            
        default:
        case 'reservationdru.host.imakeservice.com':
            $Configs["SERVER"] = 'db.imakeservice.com';
            $Configs["USERNAME"] = 'reservationdru';
            $Configs["PASSWORD"] = '6i56fugHHtD6hzWy';
            $Configs["DATABASE"] = 'reservationdru';
            if (!isset($Configs["DEBUG"]))
            $Configs["DEBUG"] = true;
        break;
            
        /*
        default:            
            $Configs["SERVER"] = '127.0.0.1';
            $Configs["USERNAME"] = 'root';
            $Configs["PASSWORD"] = '';
            $Configs["DATABASE"] = 'reservationdru';
            $Configs["DEBUG"] = true;
        break; 
        */

    }

    require_once('core/init.php');
    require_once('appdata.php');
    require_once('check_login.php');
    //require_once('check_settings.php');

    $Title = "";
    
?>