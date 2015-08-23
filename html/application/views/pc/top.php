<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="����ɂ��́AFourPH�Ǘ��l�ł��B�s���̉�Ђ�SE�����Ȃ���APHP�ACodeIgniter�̕׋��A���p�����Ă��܂��B�܂���ServersMan@VPS�ACodeIgniter�𗘗p���ău���O�uwhite_snake�v���\�z���Ă��܂��BGitHub�ł����J���Ă��܂��̂ŁA����䗗�������B" />
		<meta name="keywords" content="FourPH,CodeIgniter,VPS,GitHub,SE,�׋�,�u���O,Blog,�g�b�v,Top" />
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>VPS�A���z���APHP�ACodeIgniter�A�l�X�ȓ�����L�^ | 4 people house</title>

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
			<a href="/top"><img src="/img/4_people_house.png" alt="VPS�A���z���APHP�ACodeIgniter�A�l�X�ȓ�����L�^����u4 people house�v" /></a>
		</header>
		
		<ul class="nav nav-tabs">
			<li class="active"><a href="#">Home</a></li>
			<li><a href="/profile">Profile</a></li>
		</ul>
		
		<?= $pages_top ?>
		
		<? $i = 1; ?>
		<? foreach($article as $ac) { ?>
			<div id="article<?= $i ?>" align="left">
			<div class="panel panel-info">
				<div class="panel-heading">
					<span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>
					<?= $ac->ac_title ?>
					�@<small><?= date('Y-m-d H:i', strtotime($ac->ac_regdate)) ?></small>
					�@
					<? if(strtotime('- 7 days') < strtotime($ac->ac_regdate)) { ?>
						<span class="badge">New</span>
					<? } ?>
					<span class="badge" style="background-color:#FDFF54; color:#000000;">�R��<?= $comment_count[$ac->ac_id] ?></span>
				</div>
				<div class="panel-body">
					<?= $ac->ac_content ?>
					<div id="info<?= $i ?>" align="right">
					<span class="info" style="font-size:12px; color:#004B91;"><?= $ac->ac_info ?></span>
					|
					<span class="tag" style="font-size:10px; color:#004B91;"><?= $ac->ac_tag ?></span>
					</div><!-- id=info<?= $i ?> -->
				</div>
				<div id="comment<?= $i ?>" align="right">
					<form action="/article/index/<?= $ac->ac_id ?>/" method="post">
						<button type="submit" class="btn btn-default btn-xs">�R�����g (<?= $comment_count[$ac->ac_id] ?>) </button><br />
					</form>
				</div><!-- id=comment<?= $i ?> -->
			</div><!-- panel -->
			</div><!-- id=article<?= $i ?> -->
			<? $i++; ?>
		<? } // foreach $article ?>
		
		<?= $pages_bottom ?>
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="/js/bootstrap.min.js"></script>
		</div><!-- width:950px; -->
		</center>
	</body>
</html>
