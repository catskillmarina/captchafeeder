<?php
    include_once('captchafeeder-conf.php');

    // Connecting, selecting database //

    $link = mysql_connect($captchafeeder_db_host,
                          $captchafeeder_db_user,
                          $captchafeeder_db_mysql_password)
        or die('Could not connect: ' . mysql_error());

    echo 'Connected successfully';

    mysql_select_db($captchafeeder_db) 
        or die('Could not select database');

    // Performing SQL query //

    $query = 'SELECT serial,question,answer 
                  FROM captchafeeder 
                  ORDER by random 
                  LIMIT 1';

    $result = mysql_query($query) or die('Query failed: ' . mysql_error());

    $serial = $line[0];

    $query = "DELETE from captchafeeder WHERE serial = $serial";

    $result = mysql_query($query) or die('Query failed: ' . mysql_error());

    // Printing results in HTML //

    while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
    {
        $i = 0;
        foreach ($line as $col_value)
        {
            echo "$col_value|\n";
            $i = 7;
        }
    }
    if($i == 0)
    {
        echo "What meat do most americans eat at thanksgiving ?|turkey\n";
    }

    // Free resultset
    mysql_free_result($result);

    // Closing connection
    mysql_close($link);
?>
