<?php
    include_once('captchafeeder-conf.php');


    $ipaddress = $_SERVER["REMOTE_ADDR"];
    
    $ok = 0;
    foreach ($captchafeeder_allowed_ip as $allowed)
    {
        if (preg_match("/$allowed/", $ipaddress))
        {
            $ok = 1;
        }
    }
    if(! $ok)
    {
        echo "GO AWAY $ipaddress !!! YOU ARE NOT ALLOWED HERE !!\n";
        die ();
    }

    $link = mysql_connect($captchafeeder_db_host,
                          $captchafeeder_db_user,
                          $captchafeeder_db_mysql_password)
        or die('Could not connect: ' . mysql_error() . "\n");


    mysql_select_db($captchafeeder_db) 
        or die("Could not select database\n");

    $query = 'SELECT serial,question,answer FROM captchafeeder LIMIT 1;';

    $result = mysql_query($query) 
        or die('Query1 failed: ' . mysql_error() . "\n");

    $i = 0;
    $serial = "";

    while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
    {
        $j = 0;
        foreach ($line as $col_value)
        {
            if($j == 0)
            {
                $serial = $col_value;
            }
            if($j == 1)
            {
                echo "$col_value|";
            }
            if($j == 2)
            {
                echo "$col_value";
            }
            $j++;
            $i = 7;
        }
        echo "\n";
    }
    mysql_free_result($result);


    if($i == 0)
    {
        echo "$captchafeeder_noammo_question";
    }
    else
    {
        $query = "DELETE from captchafeeder WHERE serial = $serial;";
        $result = mysql_query($query) or die('Query2 failed: ' . mysql_error());
        echo "i think i deleted\n";
        mysql_free_result($result);
    }

    mysql_close($link);
?>
