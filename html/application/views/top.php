<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>4 people house</title>

		<!-- Bootstrap -->
		<link href="/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<center>
		<div style="width:950px;">
		<header id="header">
			<a href="/top"><img src="/img/4_people_house.png" alt="4 people house" /></a>
		</header>
		
		<ul class="nav nav-tabs">
			<li class="active"><a href="#">Home</a></li>
			<li><a href="#">Profile</a></li>
			<li><a href="#">Messages</a></li>
		</ul>
		
		<div id="pagination_top" align="right">
		<nav>
			<ul class="pagination pagination-sm">
			<li>
				<a href="#" aria-label="前のページへ">
				<span aria-hidden="true">«</span>
				</a>
			</li>
			<li class="active"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li>
				<a href="#" aria-label="次のページへ">
				<span aria-hidden="true">»</span>
				</a>
			</li>
			</ul>
		</nav>
		</div><!-- id=pagination_top -->
		
		<? $i = 1; ?>
		<? foreach($article as $ac) { ?>
			<div id="article<?= $i ?>" align="left">
			<div class="panel panel-info">
				<div class="panel-heading">
					<span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>
					<?= $ac->ac_title ?>
					　<small><?= $ac->ac_regdate ?></small>
					　<span class="badge">New</span>
				</div>
				<div class="panel-body">
					<?= $ac->ac_content ?>
					<br />
					<div id="info<?= $i ?>" align="right">
					<span class="info" style="font-size:12px; color:#004B91;"><?= $ac->ac_info ?></span>
					|
					<span class="tag" style="font-size:10px; color:#004B91;"><?= $ac->ac_tag ?></span>
					</div><!-- id=info<?= $i ?> -->
				</div>
			</div><!-- panel -->
			</div><!-- id=article<?= $i ?> -->
			<? $i++; ?>
		<? } // foreach $article ?>
		
		<div id="pagination_bottom" align="center">
		<nav>
			<ul class="pagination">
			<li>
				<a href="#" aria-label="前のページへ">
				<span aria-hidden="true">«</span>
				</a>
			</li>
			<li class="active"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li>
				<a href="#" aria-label="次のページへ">
				<span aria-hidden="true">»</span>
				</a>
			</li>
			</ul>
		</nav>
		</div><!-- id=pagination_bottom -->
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="/js/bootstrap.min.js"></script>
		</div><!-- width:950px; -->
		</center>
	</body>
</html>