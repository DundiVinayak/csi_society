<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_raise_complaints = "localhost";
$database_raise_complaints = "csi_society";
$username_raise_complaints = "root";
$password_raise_complaints = "";
$raise_complaints = mysql_pconnect($hostname_raise_complaints, $username_raise_complaints, $password_raise_complaints) or trigger_error(mysql_error(),E_USER_ERROR); 
?>