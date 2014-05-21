<?php 
        $ch = curl_init(); 

        curl_setopt($ch, CURLOPT_URL, "http://stratus.e271.net/answer.txt"); 

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        $output = curl_exec($ch); 

        echo "\nThe raw string is: $output\n\n";

        $qa = preg_split ( "/\|/" , $output);
        echo "the question is: $qa[0]\n";
        echo "the answer is: $qa[1]\n";

        curl_close($ch);      
?>
