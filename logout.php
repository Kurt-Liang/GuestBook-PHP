<?php
session_start();
if (isset($_SESSION['userName'])) {
    $user_name = $_SESSION['userName'];
    $title = "See you next time, $user_name";
    unset($_SESSION['userName']);
    unset($_SESSION['userId']);
} else {
    $title = "Currently signed out";
}


?> 
<html>   
<head>   
<meta http-equiv="refresh" content="3;url=/">
<style>
#title {
    font-size: 40px;
    text-align: center;
    margin-top: 60px;
}
</style>
</head>
<body>
<?php
    echo "<div id='title'>$title</div>"
?>
</body>
</html>

