<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Admin_conn = "localhost";
$database_Admin_conn = "csi_society";
$username_Admin_conn = "root";
$password_Admin_conn = "";
$Admin_conn = mysql_pconnect($hostname_Admin_conn, $username_Admin_conn, $password_Admin_conn) or trigger_error(mysql_error(),E_USER_ERROR); 
?>