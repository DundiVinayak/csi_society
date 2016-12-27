<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_u_charges = "localhost";
$database_u_charges = "csi_society";
$username_u_charges = "root";
$password_u_charges = "12345";
$u_charges = mysql_pconnect($hostname_u_charges, $username_u_charges, $password_u_charges) or trigger_error(mysql_error(),E_USER_ERROR); 
?>