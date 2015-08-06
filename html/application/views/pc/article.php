<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="test now" />
		<meta name="keywords" content="FourPH,CodeIgniter,VPS,GitHub,SE,勉強,ブログ,Blog,記事,Article" />
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>VPS、仮想環境、PHP、CodeIgniter、様々な日常を記録した記事 | 4 people house</title>

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
			<a href="/top"><img src="/img/4_people_house.png" alt="VPS、仮想環境、PHP、CodeIgniter、様々な日常を記録した記事「4 people house」" /></a>
		</header>
		
		<ul class="nav nav-tabs">
			<li class="active"><a href="#">Home</a></li>
			<li><a href="/profile">Profile</a></li>
		</ul>
		
		<div id="breadcrumb" align="left">
		<a href="/">一覧</a> ><br />
		</div><!-- breadcrumb -->
		
		<div id="article<?= 1 ?>" align="left">
		<div class="panel panel-info">
			<div class="panel-heading">
				<span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>
				<?= 'これはテスト記事ですよ！' ?>
				　<small><?= date('Y-m-d H:i', strtotime('2015-08-06 22:49:00')) ?></small>
				　<span class="badge">New</span>
			</div>
			<div class="panel-body">
				<?= 'これはテスト記事ですよ！<br />本文！<br />' ?>
				<div id="info<?= 1 ?>" align="right">
				<span class="info" style="font-size:12px; color:#004B91;"><?= 'テスト' ?></span>
				|
				<span class="tag" style="font-size:10px; color:#004B91;"><?= '記事 テスト' ?></span>
				</div><!-- id=info<?= 1 ?> -->
			</div>
		</div><!-- panel -->
		</div><!-- id=article<?= $i ?> -->
		
		<?
		$ary_comment = array();
		$comment = array('name'=>'テスト投稿者1', 'regdate'=>'2015-08-06 23:27', 'comment'=>'テスト投稿1です。<br />改行<br />');
		$ary_comment[] = $comment;
		$comment = array('name'=>'テスト投稿者2', 'regdate'=>'2015-08-06 23:28', 'comment'=>'テスト投稿2です。<br />改行<br />');
		$ary_comment[] = $comment;
		$comment = array('name'=>'テスト投稿者3', 'regdate'=>'2015-08-06 23:29', 'comment'=>'テスト投稿3です。<br />改行<br />');
		$ary_comment[] = $comment;
		?>
		<div id="comment" align="left">
		<button type="button" class="btn btn-default btn-xs">コメント</button><br />
		<br />
		<? foreach($ary_comment as $comment) { ?>
			<p>
			<?= $comment['comment'] ?>
			</p>
			<hr size="1px" style="margin:1px;" />
			<p>
			<div id="user_info" align="right" style="font-size:12px; color:#cccccc;">
			<?= date('Y-m-d H:i', strtotime($comment['regdate'])) ?>　<?= $comment['name'] ?><br />
			</div><!-- user_info -->
			</p>
		<? } ?>
		</div><!-- comment -->
		
		<form action="/article" method="post">
		<div id="comment_form" class="form-group" align="left">
			<label for="name">名前</label>
			<input name="name" id="name" type="text" class="form-control" style="ime-mode: active;" placeholder="名無しさん" />
			<label for="comment">コメント</label>
			<textarea name="comment" class="form-control" rows="3" style="ime-mode: active;" autofocus></textarea>
			
			<button type="submit" class="btn btn-primary btn-xs">コメントを投稿</button><br />
		</div>
		</form>
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="/js/bootstrap.min.js"></script>
		</div><!-- width:950px; -->
		</center>
	</body>
</html>
