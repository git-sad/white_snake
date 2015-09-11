<? // 共通ヘッダー ?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="<?= htmlentities($description, ENT_QUOTES, 'UTF-8') ?>" />
		<meta name="keywords" content="<?= htmlentities($keywords, ENT_QUOTES, 'UTF-8') ?>" />
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title><?= htmlentities($title, ENT_QUOTES, 'UTF-8') ?></title>

		<!-- Bootstrap -->
		<link href="/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<link href="/css/markdown.css" rel="stylesheet">
	</head>
	<body>
		<center>
		<div style="width:950px;">
		<header id="header">
			<a href="/top"><img src="/img/4_people_house.png" alt="<?= htmlentities($header_img_alt, ENT_QUOTES, 'UTF-8') ?>" /></a>
		</header>
		
		<ul class="nav nav-tabs">
			<? if($nav_active == 'Home') { ?>
				<li class="active"><a href="#">
			<? } else { ?>
				<li><a href="/top">
			<? } ?>
				Home</a></li>
			
			<? if($nav_active == 'Profile') { ?>
				<li class="active"><a href="#">
			<? } else { ?>
				<li><a href="/profile">
			<? } ?>
				Profile</a></li>
		</ul>
		
