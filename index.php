<?php
session_start();
if (isset($_SESSION['userName'])) {
	$user_name = $_SESSION['userName'];
} else {
	$user_name = "Login";
}
$conn = mysqli_connect("localhost","root","","guestbook");
$result = mysqli_query($conn,"SELECT * FROM messages order by id desc");
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
					<h1><a href="/">GuestBook</a></h1>
					<p>Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a></p>
				</div>
				<div id="menu">
					<ul>
						<li class="current_page_item"><a href="/">Homepage</a></li>
						<li><a href="guestbook.php">Guestbook</a></li>
						<li><a href="login.php"><?php echo $user_name ?></a></li>
						<?php
							if (isset($_SESSION['userName'])) {
								echo "<li><a href='logout.php'>LOGOUT</a></li>";
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
							$del = "";
							if ($_SESSION['userId'] == $user_id) {
								$del = "Delete";
							}
							echo "<div class='post'>
									<div class='post-bgtop'>
										<div class='post-bgbtm'>
											<h2 class='title'><a href='#'>$title</a></h2>
											<p class='meta'><span class='date'>$time</span><span class='posted'>Posted by <a href='#'>$userName</a></span></p>
											<div class='entry'>
												<p>$message</p>
												<p class='links'><a href='#' class='more'>Read More</a><a href='/delete.php?id=$id' title='b0x' class='comments'>$del</a></p>
											</div>
										</div>
									</div>
								</div>";
						}
						$conn->close();
					?>

					<div class="post">
						<div class="post-bgtop">
							<div class="post-bgbtm">
								<h2 class="title"><a href="#">Welcome to Graffiti</a></h2>
								<p class="meta"><span class="date">December 28, 2011</span><span class="posted">Posted by <a href="#">Someone</a></span></p>
								<div class="entry">
									<p>This is <strong>Graffiti</strong>, a free, fully standards-compliant CSS template designed by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.  This free template is released under the <a href="http://templated.co/license">Creative Commons Attribution</a> license, so you’re pretty much free to do whatever you want with it (even use it commercially) provided you give us credit for it. Have fun :)</p>
									<p>Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. In nulla tortor, elementum ipsum. Proin imperdiet est. Phasellus dapibus semper urna. Pellentesque ornare, orci in felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem.</p>
									<p class="links"><a href="#" class="more">Read More</a><a href="#" title="b0x" class="comments">Comments</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end #content -->
				<div id="sidebar">
					<ul>
						<li>
							<div id="search" >
								<form method="get" action="#">
									<div>
										<input type="text" name="s" id="search-text" value="" />
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
							<h2>Categories</h2>
							<ul>
								<li><a href="#">Aliquam libero</a></li>
								<li><a href="#">Consectetuer adipiscing elit</a></li>
								<li><a href="#">Metus aliquam pellentesque</a></li>
								<li><a href="#">Suspendisse iaculis mauris</a></li>
								<li><a href="#">Urnanet non molestie semper</a></li>
								<li><a href="#">Proin gravida orci porttitor</a></li>
							</ul>
						</li>
						<li>
							<h2>Blogroll</h2>
							<ul>
								<li><a href="#">Aliquam libero</a></li>
								<li><a href="#">Consectetuer adipiscing elit</a></li>
								<li><a href="#">Metus aliquam pellentesque</a></li>
								<li><a href="#">Suspendisse iaculis mauris</a></li>
								<li><a href="#">Urnanet non molestie semper</a></li>
								<li><a href="#">Proin gravida orci porttitor</a></li>
							</ul>
						</li>
						<li>
							<h2>Archives</h2>
							<ul>
								<li><a href="#">Aliquam libero</a></li>
								<li><a href="#">Consectetuer adipiscing elit</a></li>
								<li><a href="#">Metus aliquam pellentesque</a></li>
								<li><a href="#">Suspendisse iaculis mauris</a></li>
								<li><a href="#">Urnanet non molestie semper</a></li>
								<li><a href="#">Proin gravida orci porttitor</a></li>
							</ul>
						</li>
						<li>
							<h2>Links</h2>
							<ul>
								<li><a href="#">Aliquam libero</a></li>
								<li><a href="#">Consectetuer adipiscing elit</a></li>
								<li><a href="#">Metus aliquam pellentesque</a></li>
								<li><a href="#">Suspendisse iaculis mauris</a></li>
								<li><a href="#">Urnanet non molestie semper</a></li>
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
