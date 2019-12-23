<?php
session_start();
if (empty($_POST['userName']) or empty($_POST['userPwd'])) {
    $title = "Please enter name or password";
} else {
    $user_name = $_POST['userName'];
    $user_pwd = sha1($_POST['userPwd']);

    $conn = mysqli_connect("localhost","root","","guestbook");
    $result = mysqli_query($conn,"SELECT * FROM users where user_name='$user_name';");

    while($row = mysqli_fetch_array($result)){
        if ($user_pwd == $row['user_pwd']) {
            $_SESSION['userName'] = $user_name;
            $_SESSION['userId'] = $row['id'];
            $title = "Welcome, $user_name";
        } else {
            $title = "Wrong password";
        }
    }
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

