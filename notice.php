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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "menu")) {
  $insertSQL = sprintf("INSERT INTO notices (notice_header, notice) VALUES (%s, %s)",
                       GetSQLValueString($_POST['notice_header'], "text"),
                       GetSQLValueString($_POST['notice'], "text"));

  mysql_select_db($database_Notice, $Notice);
  $Result1 = mysql_query($insertSQL, $Notice) or die(mysql_error());

  $insertGoTo = "admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_Notice, $Notice);
$query_Recordset1 = "SELECT * FROM notices";
$Recordset1 = mysql_query($query_Recordset1, $Notice) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Post a Notice</title>
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
      <li><a href="admin_maintenance.php">MAINTENANCE</a>
      	<ul>
      		<li><a href="manage_users.php">MANAGE USERS </a></li>
            <li><a href="notice.php">POST A NOTICE </a></li>  
            <li><a href="show_grievances.php">VIEW GRIEVANCES</a></li>  
        </ul>
      </li>
      <li><a href="accounts.php">ACCOUNTS</a></li>         
        </ul>
      </li>
  </div>
</nav>
</div>


<div id="innerblock">
<form name="menu" action="<?php echo $editFormAction; ?>" method="POST" id="menu" 
	style="margin:auto; 
    	background-color:#F7F2F2; 
        padding:20px; 
        padding-left:auto;
	padding-right:auto;
        border-radius:5px;
        border-width:3px;
        ">
        <label><h3>Notice...</h3></label>
        <p><br>
        <table><tr><td>
          <label>Title of the Notice</label></td><td>
          <input type="text"  name="notice_header" maxlength="255" style="margin-bottom:10px;"></td>
        </tr></table>  
         
          <textarea name="notice" cols="70" rows="10" columns="70"></textarea>
          <br>
          <input type="submit" value="POST" style="margin:5px;">
          <br/>
          <input type="hidden" name="MM_insert" value="menu">
    </p>
</form>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
