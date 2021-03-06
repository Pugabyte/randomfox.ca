<?php
$files = glob("images/*");
if ($files) {
	$PUG_NUM = count($files);
}

if (!isset($_GET['i'])) {
	$random_pug_index = rand(1, $PUG_NUM);
} else if (ctype_digit($_GET['i'])) {
	$random_pug_index = $_GET['i'];
}

?>

<html>
	<head>
		<title>RandomPugClub</title>
		<meta charset="utf-8">
		<meta type="author" content="xinitrc & Pugabyte" />
		<meta type="description" content="Displaying pictures of random pugs with every click!" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="theme-color" content="#FF6600" />
		<meta http-equiv="Cache-Control" content="max-age=1" />

		<meta property="og:image" content="http://randompug.club/images/<?= $random_pug_index ?>.jpg" />
		<meta property="og:title" content="randompug.club" />
		<meta property="og:description" content="Random pug on every click!" />
		<meta property="og:url" content="http://randompug.club" />

		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
		<script>
			$(document).ready(function () {
				var panel_width = document.getElementById('sidebar').offsetWidth;
				var image_width = document.getElementById('pug_full_link').offsetWidth;
				document.getElementById('footer').style.width = panel_width + image_width;
			});
		</script>

		<style type="text/css">
			body {
				margin: 0;
				padding: 5px;
				font-family: arial, verdana, tahoma;
				font-size: 14px;
			}

			#footer {
				position: fixed;
				left: 0;
				bottom: 0;
				width: 75%;
				padding: 5px;
			}

			#panel {
				display: flex;
				align-items: center;
				max-height: 100%;
			}

			#sidebar {
				float: left;
				width: 200px;
				padding: 5px;
			}

			#pug_full_link {
				  max-width: calc(100% - 240px);
				max-height: 100%;
				background-image: url('http://randompug.club/images/<?= $random_pug_index ?>.jpg');
				background-repeat: no-repeat;
				background-size: contain;
				margin: 10px;
			}

			#pug_img_link {
				float: left;
				margin: 10px;
				max-width: 100%;
				border: 2px solid #ccc;
			}
		</style>
	</head>
	<body>
	<div id="panel">
		<div id="sidebar">
			<label><strong>Share this pug!</strong></label>
			<input type="text" id="shareButton" value="http://randompug.club/?i=<?= $random_pug_index ?>" onclick="javascript:this.select();" /><br />

			<p id="pug_count">Pug Count: <?= $PUG_NUM ?><br />

			<p>Submit more pugs at <a href="https://github.com/Pugabyte/randompug.club" target="_blank">GitHub</a>

			<br /><br /><br />
			<p>API is Available: <a href="http://randompug.club/loaf">http://randompug.club/loaf</a></p>

		</div>

		<a href="http://randompug.club/?i=<?= $random_pug_index ?>" id="pug_full_link">
			<img src="http://randompug.club/images/<?= $random_pug_index ?>.jpg" alt="" title="" style="visibility: hidden;" id="pug_img_link" />
		</a>
	</div>
	<div id="footer">
		<p>Made by: xinitrc &amp; Pugabyte</p>
		<p>Also check out some <a href="http://randomfox.ca" target="_blank">random foxes!</a></p>
	</div>
	</body>
</html>
