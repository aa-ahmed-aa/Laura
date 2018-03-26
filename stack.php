<?php 
	$base_url = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

	die("<pre>".var_dump($_SERVER)."</pre>");
    if($base_url == "http://www.example.org") { 
     	echo "Hello";
     }
	else {
       echo "Bad";
	}

?>