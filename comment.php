<?php
session_start();

$url = "http://".$_SERVER['HTTP_HOST']."/";

date_default_timezone_set("Asia/Taipei");
$t=time();
$time = (date("Y-m-d H:i",$t));

if (empty($_POST['comment'])) {
    $title = "Please enter comment";
} else {
    $comment = $_POST['comment'];
    $user_name = $_SESSION['userName'];
    $user_id = $_SESSION['userId'];
    $message_id = $_GET['id'];
    $conn = mysqli_connect("localhost","root","","guestbook");
    $sql = "INSERT INTO comments (user_name, comment, time, user_id, message_id)
                VALUES ('$user_name', '$comment', '$time', '$user_id', '$message_id');";

    $conn->query($sql);

    $title = "Comment successfully";

    $conn->close();
}


?> 
<html>   
<head>   
<meta http-equiv="refresh" content="3;url=<?php echo $url ?>article.php?id=<?php echo $message_id ?>">
<style>
#title {
    font-size: 40px;
    text-align: center;
    margin-top: 60px;
}
#index {
    font-size: 25px;
    text-align: center;
    margin-top: 60px;
}
</style>
</head>
<body>
<?php
    echo "<div id='title'>$title</div>
        <div id='index'>The page will jump after 3 seconds</div>";
?>
</body>
</html>

