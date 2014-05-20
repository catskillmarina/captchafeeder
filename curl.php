<?php 
        // create curl resource 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, "http://stratus.e271.net/answer.txt"); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 
        echo "\nThe raw string is: $output\n\n";
        $qa = preg_split ( "/\|/" , $output);
        echo "the question is: $qa[0]\n";
        echo "the answer is: $qa[1]\n";

        // close curl resource to free up system resources 
        curl_close($ch);      
?>
