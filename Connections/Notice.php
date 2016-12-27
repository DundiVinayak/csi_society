<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Notice = "localhost";
$database_Notice = "csi_society";
$username_Notice = "root";
$password_Notice = "";
$Notice = mysql_pconnect($hostname_Notice, $username_Notice, $password_Notice) or trigger_error(mysql_error(),E_USER_ERROR); 
?>