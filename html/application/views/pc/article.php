<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="FourPH�Ǘ��l�ł��B<?= count($article) === 0 ? '�Y���L������' : $article[0]->ac_title ?>�ɂ��ċL���ɂ��܂����I�R�����g��낵�����肢���܂��B���������׋����ł��B" />
		<meta name="keywords" content="FourPH,CodeIgniter,VPS,GitHub,SE,�׋�,�u���O,Blog,�L��,Article" />
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>VPS�A���z���APHP�ACodeIgniter�A�l�X�ȓ�����L�^�����L���̏ڍ� | 4 people house</title>

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
			<a href="/top"><img src="/img/4_people_house.png" alt="VPS�A���z���APHP�ACodeIgniter�A�l�X�ȓ�����L�^�����L���u4 people house�v" /></a>
		</header>
		
		<ul class="nav nav-tabs">
			<li class="active"><a href="#">Home</a></li>
			<li><a href="/profile">Profile</a></li>
		</ul>
		
		<div id="breadcrumb" align="left">
		<a href="/">�ꗗ</a> ><br />
		</div><!-- breadcrumb -->
		
		<? if(count($article) == 0) { ?>
			�Y���L���͑��݂��܂���B<br />
			<br />
		<? } else { ?>
		
		<? $ac = $article[0]; ?>
		<div id="article" align="left">
		<div class="panel panel-info">
			<div class="panel-heading">
				<span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>
				<?= $ac->ac_title ?>
				�@<small><?= date('Y-m-d H:i', strtotime($ac->ac_regdate)) ?></small>
				�@
				<? if(strtotime('- 7 days') < strtotime($ac->ac_regdate)) { ?>
					<span class="badge">New</span>
				<? } ?>
				<span class="badge" style="background-color:#FDFF54; color:#000000;">�R��<?= count($comment) ?></span>
			</div>
			<div class="panel-body">
				<?= $ac->ac_content ?>
				<div id="info" align="right">
				<span class="info" style="font-size:12px; color:#004B91;"><?= $ac->ac_info ?></span>
				|
				<span class="tag" style="font-size:10px; color:#004B91;"><?= $ac->ac_tag ?></span>
				</div><!-- id=info -->
			</div>
		</div><!-- panel -->
		</div><!-- id=article -->
		
		<? $i = 1; ?>
		<div id="comment" align="left">
		<button type="button" class="btn btn-default btn-xs">�R�����g</button><br />
		<br />
		
		<? foreach($comment as $cm) { ?>
			<? $cm_name = $cm->cm_name === '' ? '����������' : $cm->cm_name; ?>
			<p>
			<?= htmlentities($cm->cm_content, ENT_QUOTES, 'UTF-8') ?>
			</p>
			<hr size="1px" style="margin:1px;" />
			<p>
			<div id="user_info" align="right" style="font-size:12px; color:#cccccc;">
			<?= date('Y-m-d H:i', strtotime($cm->cm_regdate)) ?>�@<?= htmlentities($cm_name, ENT_QUOTES, 'UTF-8') ?><br />
			</div><!-- user_info -->
			</p>
		<? } // foreach $comment ?>
		
		</div><!-- comment -->
		
		<?
		$autofocus = '';
		if(form_error('name') !== '') {
			$autofocus = 'name';
		} elseif(form_error('comment') !== '') {
			$autofocus = 'comment';
		}
		?>
		<form action="/article/reg_comment/<?= $ac->ac_id ?>/" method="post">
		<div id="comment_form" class="form-group" align="left">
			<label for="name">���O</label>
			<?= form_error('name') === '' ? '' : '<div style="color:red; font-weight:bold;">'.mb_convert_encoding(form_error('name'), 'UTF-8', 'SJIS').'</div>' ?>
			<input name="name" id="name" type="text" class="form-control" style="ime-mode: active;" placeholder="����������" value="<?= set_value('name') ?>"<?= $autofocus == 'name' ? ' autofocus' : '' ?> />
			<label for="comment">�R�����g</label>
			<?= form_error('comment') === '' ? '' : '<div style="color:red; font-weight:bold;">'.mb_convert_encoding(form_error('comment'), 'UTF-8', 'SJIS').'</div>' ?>
			<textarea name="comment" class="form-control" rows="3" style="ime-mode: active;"<?= $autofocus == 'comment' ? ' autofocus' : '' ?>><?= set_value('comment') ?></textarea>
			
			<button type="submit" class="btn btn-primary btn-xs">�R�����g�𓊍e</button><br />
		</div>
		</form>
		
		<? } ?><!-- if count($article) -->
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="/js/bootstrap.min.js"></script>
		</div><!-- width:950px; -->
		</center>
	</body>
</html>
