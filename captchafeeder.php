<?php
    /* require_once(captchafeeder-mysql.php); */
 
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

    $query = 'SELECT * FROM my_table';
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());

    // Printing results in HTML //

    echo "<table>\n";
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
    {
        echo "\t<tr>\n";
        foreach ($line as $col_value)
        {
            echo "\t\t<td>$col_value</td>\n";
        }
        echo "\t</tr>\n";
    }
    echo "</table>\n";

    // Free resultset
    mysql_free_result($result);

    // Closing connection
    mysql_close($link);
?>
