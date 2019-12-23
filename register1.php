<?php
session_start();
if (empty($_POST['userName']) or empty($_POST['userPwd'])) {
    $title = "Please enter name, password and enail";
    $url = "/register.php";
} else {
    $user_name = $_POST['userName'];
    $user_pwd = sha1($_POST['userPwd']);
    $user_email = $_POST['userEmail'];

    $conn = mysqli_connect("localhost","root","","guestbook");
    $result = mysqli_query($conn,"SELECT * FROM users where user_name='$user_name';");

    if ($result->num_rows > 0) {
        $title = "$user_name is already used";
        $url = "/register.php";

    } else {
        $sql = "INSERT INTO users (user_name, user_pwd, user_email)
            VALUES ('$user_name', '$user_pwd', '$user_email')";
        $conn->query($sql);

        $title = "$user_name created successfully";
        $url = "/";
    }

    
    $conn->close();
}


?> 
<html>   
<head>   
<meta http-equiv="refresh" content="3;url=<?php echo $url ?>">
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

