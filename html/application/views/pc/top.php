<?= $pages_top ?>

<? $i = 1; ?>
<? foreach($article as $ac) { ?>
	<div id="article<?= $i ?>" align="left">
	<div class="panel panel-info">
		<div class="panel-heading">
			<span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>
			<?= $ac->ac_title ?>
			　<small><?= date('Y-m-d H:i', strtotime($ac->ac_regdate)) ?></small>
			　
			<? if(strtotime('- 7 days') < strtotime($ac->ac_regdate)) { ?>
				<span class="badge">New</span>
			<? } ?>
			<span class="badge" style="background-color:#FDFF54; color:#000000;">コメ<?= $comment_count[$ac->ac_id] ?></span>
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
				<button type="submit" class="btn btn-default btn-xs">コメント (<?= $comment_count[$ac->ac_id] ?>) </button><br />
			</form>
		</div><!-- id=comment<?= $i ?> -->
	</div><!-- panel -->
	</div><!-- id=article<?= $i ?> -->
	<? $i++; ?>
<? } // foreach $article ?>

<?= $pages_bottom ?>
