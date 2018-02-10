<?php
$ds = DIRECTORY_SEPARATOR;  //1
 
 //die(var_dump($_FILES));

$storeFolder = '/pdfs';   //2
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name']; 

    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
     
    $file_name = $_FILES['file']['name'];

    $targetFile =  $targetPath. $file_name;

    if(move_uploaded_file($tempFile,$targetFile)){
    	die( $file_name );
    }else{
    	die('Fail');
    }
     
}
?> 