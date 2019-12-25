<?php
session_start();

$url = "http://".$_SERVER['HTTP_HOST']."/";

if (isset($_SESSION['userName'])) {
    $user_name = $_SESSION['userName'];
} else {
	$user_name = "Login";
}
$conn = mysqli_connect("localhost","root","","guestbook");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
	$result = mysqli_query($conn,"SELECT * FROM messages where id=$id");
	if ($result->num_rows == 0) {
		header("Location: ".$url."found.php");
		exit;
	}
} else {
    header("Location: $url");
    exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Graffiti
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20111223

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>GuestBook</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="http://fonts.googleapis.com/css?family=Ruthie" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
	<div id="wrapper-bgtop">
		<div id="wrapper-bgbtm">
			<div id="header" class="container">
				<div id="logo">
					<h1><a href="<?php echo $url ?>">GuestBook</a></h1>
					<p>Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a></p>
				</div>
				<div id="menu">
					<ul>
						<li><a href="<?php echo $url ?>">Homepage</a></li>
						<li><a href="<?php echo $url ?>guestbook.php">Guestbook</a></li>
						<li><a href="<?php echo $url ?>login.php"><?php echo $user_name ?></a></li>
						<?php
							if (isset($_SESSION['userName'])) {
								echo "<li><a href='".$url."logout.php'>LOGOUT</a></li>";
							}
						?>
					</ul>
				</div>
			</div>
			<!-- end #header -->
			<div id="page" class="container">
				<div id="content">
					<?php
						while($row = mysqli_fetch_array($result)){
    						$message = $row['message'];
    						$title = $row['title'];
							$time = $row['time'];
							$userName = $row['user_name'];
							$user_id = $row['user_id'];
                            $id = $row['id'];
                            $views = $row['views'] + 1;
							$del = "";
							if (isset($_SESSION['userId'])) {
								if ($_SESSION['userId'] == $user_id) {
									$del = "Delete";
								}
                            }
                            
                            mysqli_query($conn,"UPDATE messages SET views = $views  WHERE id = $id;");

							echo "<div class='post'>
									<div class='post-bgtop'>
										<div class='post-bgbtm'>
											<h2 class='title'><a>$title</a></h2>
											<p class='meta'><span class='date'>$time</span><span class='posted'>Posted by <a href='".$url."list.php?userId=$user_id'>$userName</a></span></p>
											<div class='entry'>
												<p>$message</p>
												Views : <strong>$views</strong><p class='links'><a href='".$url."' class='more'>Home</a><a href='".$url."delete.php?id=$id' title='b0x' class='comments'>$del</a></p>
											</div>";

											$commResult = mysqli_query($conn,"SELECT * FROM comments where message_id=$id");
											if ($commResult->num_rows > 0) {
												while($row = mysqli_fetch_array($commResult)){
													echo "<HR style='border:1 dashed #987cb9' width='100%' SIZE=1>";

													$commentName = $row['user_name'];
													$comment = $row['comment'];
													$commentTime = $row['time'];
													$comment_user_id = $row['user_id'];
													$comment_id = $row['id'];
													$commentDel = "";

													if (isset($_SESSION['userId'])) {
														if ($_SESSION['userId'] == $comment_user_id) {
															$commentDel = "Delete";
														}
													}

													echo "<p class='meta'><span class='date'>$commentTime</span><span class='posted'>Commented by <a>$commentName</a></span></p>
														<div class='entry'>
															<p>$comment</p>
															<p class='links'><a href='".$url."comment_delete.php?id=$id&comment_id=$comment_id' title='b0x' class='comments'>$commentDel</a></p>
														</div>";
												}
											}

											if (isset($_SESSION['userId'])) {
												echo "<HR style='border:1 dashed #987cb9' width='100%' SIZE=1>
													<form class='form' action='".$url."comment.php?id=".$id."', method='post'>
														<div>
															<textarea name='comment' cols='70', rows='10'></textarea>
														</div>
														<div class='entry'>
															<p class='links'><input type='submit' name='submit' value='Comment'></p>
														</div>
													</form>";
											}
									echo "</div>
									</div>
								</div>";
                        }
                        
						$conn->close();
					?>
					
				</div>
				<!-- end #content -->
				<div id="sidebar">
					<ul>
						<li>
							<div id="search" >
								<form method="get" action="<?php echo $url ?>list.php">
									<div>
										<input type="text" name="title" id="search-text" value="" />
										<input type="submit" id="search-submit" value="GO" />
									</div>
								</form>
							</div>
							<div style="clear: both;">&nbsp;</div>
						</li>
						<li>
							<h2>Aliquam tempus</h2>
							<p>Mauris vitae nisl nec metus placerat perdiet est. Phasellus dapibus semper consectetuer hendrerit.</p>
						</li>
						<li>
							<h2>Newer articles</h2>
							<ul>
								<?php 
									$conn = mysqli_connect("localhost","root","","guestbook");
									$result = mysqli_query($conn,"SELECT * FROM messages order by id desc limit 5");
									while($row = mysqli_fetch_array($result)){
										$title = $row['title'];
										$id = $row['id'];
										$user_name = $row['user_name'];
										echo "<li><a href='".$url."article.php?id=$id'><strong>$title</strong></a> by $user_name</li>";
									}
									$conn->close();
								?>
							</ul>
						</li>
						<li>
							<h2>More popular articles</h2>
							<ul>
								<?php 
									$conn = mysqli_connect("localhost","root","","guestbook");
									$result = mysqli_query($conn,"SELECT * FROM messages order by views desc limit 5");
									while($row = mysqli_fetch_array($result)){
										$title = $row['title'];
										$id = $row['id'];
										$user_name = $row['user_name'];
										echo "<li><a href='".$url."article.php?id=$id'><strong>$title</strong></a> by $user_name</li>";
									}
									$conn->close();
								?>
							</ul>
						</li>
					</ul>
				</div>
				<!-- end #sidebar -->
				<div style="clear: both;">&nbsp;</div>
			</div>
			<!-- end #page -->
		</div>
	</div>
</div>
<div id="footer">
	<p>&copy; Untitled. All rights reserved. Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
<!-- end #footer -->
</body>
</html>
