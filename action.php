<?php
session_start();
date_default_timezone_set("Asia/Taipei");
$t=time();
$time = (date("Y-m-d H:i",$t));

if (empty($_POST['message']) or empty($_POST['title'])) {
    $title = "Please enter message";
} else {
    $message = $_POST['message'];
    $title = $_POST['title'];
    $user_name = $_SESSION['userName'];
    $user_id = $_SESSION['userId'];
    $conn = mysqli_connect("localhost","root","","guestbook");
    $sql = "INSERT INTO messages (user_name, message, time, title, user_id)
                VALUES ('$user_name', '$message', '$time', '$title', '$user_id');";

    $conn->query($sql);

    $title = "Created successfully";

    $conn->close();
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

