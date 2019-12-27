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
<link href="//vjs.zencdn.net/7.3.0/video-js.min.css" rel="stylesheet">
<script src="//vjs.zencdn.net/7.3.0/video.min.js"></script>
<style>
    .vertical-menu {
		width:600px;
		height:200px;
		overflow-y:auto;
		margin-left:9px;
	}
			
	.vertical-menu input {
		background-color:#eee;
		color:black;
		padding:10px;
		text-decoration:none;
		width:120;
		height:90;
	}
			
	.vertical-menu input:hover {
		background-color:#ccc;
	}
			
	.vertical-menu input.active {
		background-color:#4ACF50;
		color:white;
	}
</style>
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
							$video_mp4 = $row['video_mp4'];
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
											<p class='meta'><span class='date'>$time</span><span class='posted'>Posted by <a href='".$url."list.php?userId=$user_id'>$userName</a></span></p>";
											
											if (!empty($video_mp4)) {
												echo "<div>
														<video id='my-video' class='video-js vjs-big-play-centered'></video>
													</div>
											


											<div class='vertical-menu'>
            									<input type='image' onclick='stamp("."0".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0001.png'>
            									<input type='image' onclick='stamp("."50".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0002.png'>
            									<input type='image' onclick='stamp("."68".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0003.png'>
            									<input type='image' onclick='stamp("."115".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0004.png'>
            									<input type='image' onclick='stamp("."144".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0005.png'>
            									<input type='image' onclick='stamp("."180".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0006.png'>
            									<input type='image' onclick='stamp("."189".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0007.png'>
            									<input type='image' onclick='stamp("."226".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0008.png'>
            									<input type='image' onclick='stamp("."243".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0009.png'>
            									<input type='image' onclick='stamp("."288".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0010.png'>
            									<input type='image' onclick='stamp("."320".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0011.png'>
            									<input type='image' onclick='stamp("."397".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0012.png'>
            									<input type='image' onclick='stamp("."418".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0013.png'>
            									<input type='image' onclick='stamp("."440".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0014.png'>
            									<input type='image' onclick='stamp("."445".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0015.png'>
            									<input type='image' onclick='stamp("."456".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0016.png'>
            									<input type='image' onclick='stamp("."468".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0017.png'>
            									<input type='image' onclick='stamp("."478".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0018.png'>
            									<input type='image' onclick='stamp("."487".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0019.png'>
            									<input type='image' onclick='stamp("."497".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0020.png'>
            									<input type='image' onclick='stamp("."557".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0021.png'>
            									<input type='image' onclick='stamp("."615".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0022.png'>
            									<input type='image' onclick='stamp("."667".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0023.png'>
            									<input type='image' onclick='stamp("."706".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0024.png'>
            									<input type='image' onclick='stamp("."732".");' src='http://d1gxuofruqp40q.cloudfront.net/slide/ebbdc6060d3e2469b7f007a5eb15081a/30157/thumbnail/0025.png'>
											</div>";
											}

											echo "<div class='entry'>
												<p>$message</p>
												Views : <strong>$views</strong><p class='links'><a href='".$url."' class='more'>Home</a><a href='".$url."delete.php?id=$id' title='b0x' class='comments'>$del</a></p>
											</div>";

											$commResult = mysqli_query($conn,"SELECT * FROM comments where message_id=$id");
											if ($commResult->num_rows > 0) {
												while($row = mysqli_fetch_array($commResult)){
													echo "<HR style='border:1 dashed' width='100%' SIZE=1>";

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
												echo "<HR style='border:1 dashed' width='100%' SIZE=1>
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
<script>
    const player = videojs('my-video',{
        sources:[{ src: "<?php echo $video_mp4 ?>"}],
		autoplay:true,
        loop:true,
        muted:true,
        width:"540",
        height:"303",
        controls:true
    });

	function stamp(time){
		player.currentTime(time);
	}
</script>