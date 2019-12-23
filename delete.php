<?php
$id = $_GET['id'];
$conn = mysqli_connect("localhost","root","","guestbook");
mysqli_query($conn,"DELETE FROM messages where id = $id;");
$title = "Successfully deleted";
$conn->close();


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

