<?php
    require_once('configs.php');

    $Settings = DynDb_SelectTable("SELECT * FROM settings ");

    if (count($Settings) > 0)
    {
        foreach($Settings as $S)
        {
            $setting_name = $S['setting_name'];
            $setting_value = $S['setting_value'];
            $Configs[ $setting_name ] = $setting_value;
        }
    }

?>