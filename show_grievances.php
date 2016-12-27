<?php require_once('Connections/raise_complaints.php'); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Complaints</title>
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
      <li><a href="maintenance.php">MAINTENANCE</a>
      	<ul>
      		<li><a href="manage_users.php">MANAGE USERS </a></li>
            <li><a href="notice.php">POST A NOTICE </a></li>  
            <li><a href="show_grievances.php">VIEW GRIEVANCES</a></li>  
        </ul>>
       </li>
      <li><a href="accounts.php">ACCOUNTS</a></li>
    </ul>
  </div>
</nav>
</div>


<div id="innerblock">
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

mysql_select_db($database_raise_complaints, $raise_complaints);
$query_view_comp = "SELECT * FROM grievances ORDER BY `time` DESC";
$view_comp = mysql_query($query_view_comp, $raise_complaints) or die(mysql_error());
$row_view_comp = mysql_fetch_assoc($view_comp);
//$totalRows_view_comp = mysql_num_rows($view_comp);

while($row_view_comp = mysql_fetch_array($view_comp))
{
echo "<div id='griev' style=' '>";
echo "<p><h2>" . $row_view_comp['title'] . "</h2></p>";
echo "<p>" . $row_view_comp['complaint'] . "</p>";
echo "<p><b>Registered Time : </b>" . $row_view_comp['time'] . "</p>";
}

?>

</div>
</body>
</html>
<?php
mysql_free_result($view_comp);
?>
