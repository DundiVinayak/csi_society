<?php require_once('Connections/User_Information.php'); ?>
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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $sql = "SELECT users.user_type FROM users";
  $result = mysql_query($sql); 
  $user = mysql_fetch_array($result);
  $_SESSION['username'] = $user['username']; 
    $_SESSION['user_type'] = $user['user_type'];
  if($_SESSION['user']['user_type'] == 2)
  {
    header("location:admin.php");
    exit();
  }
    
  $MM_redirectLoginSuccess = "uindex.php";
  

  $MM_redirectLoginFailed = "access_denied.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_User_Information, $User_Information);
   
  $LoginRS__query=sprintf("SELECT username, password FROM users WHERE username=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $User_Information) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  
	
 if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title><script type="text/javascript">
     function validate()
        {
         if(document.getElementById("user_name").value=="")
               {
                 alert("Username should not be empty");
               }
        }
		
    </script>
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

<div align="right"><img id="logo" src="csi1.gif" alt="CSI Society logo"  style="display: block;
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
      <li><a href="login.php">LOGIN</a></li>
      <li><a href="contact_us.php">CONTACT US</a></li>
    </ul>
  </div>
</nav>
</div><div id="innerblock">

<h1>Login</h1>
<form ACTION="<?php echo $loginFormAction; ?>" METHOD="POST" name="login_form"><br/>
<label>Username : </label><br/>
<input type="text" name="username" ><br/>
<label>Passsword : </label><br/>
<input type="password" name="password"><br/>
<input type="submit" value="Login" onclick="validate()">

</form>
<a href="register.php" class="cf" > Register </a></div>
</body>
</html>