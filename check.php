<?php
    $apassword=$_POST['apass'];
    
    if($apassword==("123"))
    {
       // session_register('apass');
        header("location:admin.php");
    }
    else {
		header("location:access_denied.php");	
		exit();
	}
    
?>