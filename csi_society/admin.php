<?php
    session_start();
    if(!session_is_registered('password'))
    {
        header("location:access_denied.php");
    }
?>

<html>
<html>
<title>This is Admin Page</title>
</head>
<center>
Welcome Admin!
</center>
</body>
</html>