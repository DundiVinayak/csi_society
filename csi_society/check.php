<?php
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    
    if($name==("admin") & $pass==("123"))
    {
        session_register('name');
        session_register('pass');
        header("location:admin.php");
    }
    else
        echo 'Something Has Gone Wrong';
?>