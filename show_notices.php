<?php require_once('Connections/Notice.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

if (!function_exists("GetSQLValueString")) {
function GetSQLValueStrinnoticesg($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Recent Notices</title>
	<style>

div#block {
	border-bottom-color:#9EE8FB;
	border-bottom-width:2px;
    padding: 20px;
	padding-left:50px;
	padding-right:50px;
	padding-top:0px;
    border: 5px #DC0408;
	background-color:#303030;
    margin: 10px;
	alignment-adjust:central;
	}
	
	
div#innerblock {
    padding: 40px;
	padding-left:auto;
	padding-right:auto;
	padding-top:20px;
    border: 5px #DC0408;
	background-color:#F5D77E;
    margin: 50px;
	alignment-adjust:central;
	}
nav {
	margin: 0;
	padding: 0;
	width: 60%;
	border-radius: 4px;
	text-align: center;
	margin-left:36%;
	border-width:2px;
	border-color:#F7F4F4;
	
} 

nav ul {
	-webkit-font-smoothing:antialiased;
	text-shadow:0 1px 0 0;
    list-style: none;
    margin: 0;
    padding: 0;
    width: 100%;
}
nav li {
    float: left;
    margin: 0;
    padding: 0;
    position: relative;
    min-width: 20%;
}
nav a {
    color: #444;
    display: block;
	color: #1283FB; 
    font: bold 12px/24px sans-serif;
    padding: 0 8px;
	padding-top:2px;
	padding-bottom:2px;
    text-align: center;
    text-decoration: none;
    -webkit-transition: all .25s ease;
       -moz-transition: all .25s ease;
        -ms-transition: all .25s ease;
         -o-transition: all .25s ease;
            transition: all .25s ease;
}
nav .dropdown:after {
    content: ' ▶';
}
nav .dropdown:hover:after{
	content:'\25bc'
}
nav li:hover a {
    background: #1283FB;
	color:#F5F5C4;
}
nav li ul {
    float: left;
    left: 0;
    opacity: 0;
    position: absolute;
    top: 2px;
    visibility: hidden;
    z-index: 1;
    -webkit-transition: all .25s ease;
       -moz-transition: all .25s ease;
        -ms-transition: all .25s ease;
         -o-transition: all .25s ease;
            transition: all .25s ease;
}
nav li:hover ul {
    opacity: 1;
    top: 26px;
    visibility: visible;
}
nav li ul li {
    float: none;
    width: 100%;
}
nav li ul a:hover {
    background: #439AF8;
}

/* Clearfix */

.cf:after, .cf:before {
    content:"";
    display:table;
}
.cf:after {
    clear:both;
}
.cf {
    zoom:1;
}​
    div strong {
	font-family: Constantia, Lucida Bright, DejaVu Serif, Georgia, serif;
}

    </style>
</head>
<body style="background-color:#0C2549">
<div id="block">

<div align="right"><img id="logo" src="csi1.gif".jpg" alt="CSI Society logo"  style="display: block;
	border-radius: 5px;
	border-bottom-left-radius:0px;
    border-bottom-right-radius:0px;
    margin-left: auto;
    margin-right: auto;
    padding-top:20px;    ">
</div>
<nav id="menu">
  <div align="right">
    <ul class="cf"> 
      <li><a href="uindex.php">HOME</a></li>
      <li><a href="events.php">EVENTS</a>
        <ul>
          <li><a href="calender.php" >CALENDER</a></li>
          <li><a href="upcoming_events.php">UPCOMING EVENT</a></li>
        </ul>
      </li> 
      <li><a href="facilities.php">FACILITIES</a>
      	<ul>
          <li><a href="gym.php" >GYM</a></li>
          <li><a href="swimmingpool.php" >SWIMMING POOL</a></li>
          <li><a href="indoor_games.php">INDOOR GAMES</a></li>
          <li><a href="outdoor_games.php">OUTDOOR GAMES</a></li>
        </ul>
      </li>
      <li><a href="maintenance.php">MAINTENANCE</a></li>
      <li><a href="show_notices.php">NOTICES</a></li>
    </ul>
  </div>
</nav>
</div>

<div>

<?php 
	mysql_select_db($database_Notice, $Notice);

$query_s_notices_header = "SELECT notice_header FROM notices ORDER BY notice_id DESC";
$s_notices_header = mysql_query($query_s_notices_header, $Notice) or die(mysql_error());
$row_s_notices_header = mysql_fetch_assoc($s_notices_header);
$totalRows_s_notices_header = mysql_num_rows($s_notices_header);

	$query_s_notice = "SELECT notice FROM notices ORDER BY notice_id DESC";
	$s_notice = mysql_query($query_s_notice, $Notice) or die(mysql_error());
	$row_s_notice = mysql_fetch_assoc($s_notice);
	$totalRows_s_notice = mysql_num_rows($s_notice);

	$query_s_notices_date = "SELECT date FROM notices ORDER BY notice_id DESC";
	$s_notices_date = mysql_query($query_s_notices_date, $Notice) or die(mysql_error());
	$row_s_notices_date = mysql_fetch_assoc($s_notices_date);
	$totalRows_s_notices_date = mysql_num_rows($s_notices_date);

	//Test code
	//mysql_select_db($database_Notice, $Notice);
	/*
	$query_s_notices_header1 = "SELECT * FROM notices ORDER BY notice_id DESC";
	$s_notices_header1 = mysql_query($query_s_notices_header1, $Notice) or die(mysql_error());
	$row_s_notices_header1 = mysql_fetch_assoc($s_notices_header1);
	$totalRows_s_notices_header1 = mysql_num_rows($s_notices_header1);
     
	*/
	
	
//echo $s_notices;
	$not1 = array();
	$not1 = $row_s_notices_header;
	echo implode(" ",$not1);
	
	
	
/*	foreach($not1 as $values)
	{
		echo implode(" ",$values);	
	} */
	
	$not2 = array();
	$not2 = $row_s_notice;
	echo '<p>'.implode(" ",$not2).'<p>';
	$not3 = array();
	$not3 = $row_s_notices_date;
	echo implode(" ",$not3);
	//$not4 = array();
	//$not4 = $rows_s_notices_header;
	//echo implode(" ",$not2);
	
/*	while(!$rows_s_notices_header->EOF){
    $not4[] = $rows_s_notices_header->fields;
    $not4->MoveNext();
}
	
	foreach($not4 as $values => $value){ 
		echo "<p style='color:red;'>".implode(" ",$values[$value])."</p>";  
	} */
	//echo implode(" ",$not2);
	//echo implode(" ",$not3); 

?>




</div>
</body>
</html>
<?php
mysql_free_result($s_notices_header);
mysql_free_result($s_notice);
mysql_free_result($s_notices_date);

?>
