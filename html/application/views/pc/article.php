<div id="breadcrumb" align="left">
<a href="/">一覧</a> ><br />
</div><!-- breadcrumb -->

<? if(count($article) == 0) { ?>
	該当記事は存在しません。<br />
	<br />
<? } else { ?>

<? $ac = $article[0]; ?>
<div id="article" align="left">
<div class="panel panel-info">
	<div class="panel-heading">
		<span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>
		<?= $ac->ac_title ?>
		　<small><?= date('Y-m-d H:i', strtotime($ac->ac_regdate)) ?></small>
		　
		<? if(strtotime('- 7 days') < strtotime($ac->ac_regdate)) { ?>
			<span class="badge">New</span>
		<? } ?>
		<span class="badge" style="background-color:#FDFF54; color:#000000;">コメ<?= count($comment) ?></span>
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
<button type="button" class="btn btn-default btn-xs">コメント</button><br />
<br />

<? foreach($comment as $cm) { ?>
	<? $cm_name = $cm->cm_name ?: '名無しさん'; ?>
	<p>
	<?= htmlentities($cm->cm_content, ENT_QUOTES, 'UTF-8') ?>
	</p>
	<hr size="1px" style="margin:1px;" />
	<p>
	<div id="user_info" align="right" style="font-size:12px; color:#cccccc;">
	<?= date('Y-m-d H:i', strtotime($cm->cm_regdate)) ?>　<?= htmlentities($cm_name, ENT_QUOTES, 'UTF-8') ?><br />
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
	<label for="name">名前</label>
	<?= form_error('name') === '' ? '' : '<div style="color:red; font-weight:bold;">'.mb_convert_encoding(form_error('name'), 'UTF-8', 'SJIS').'</div>' ?>
	<input name="name" id="name" type="text" class="form-control" style="ime-mode: active;" placeholder="名無しさん" value="<?= set_value('name') ?>"<?= $autofocus == 'name' ? ' autofocus' : '' ?> />
	<label for="comment">コメント</label>
	<?= form_error('comment') === '' ? '' : '<div style="color:red; font-weight:bold;">'.mb_convert_encoding(form_error('comment'), 'UTF-8', 'SJIS').'</div>' ?>
	<textarea name="comment" class="form-control" rows="3" style="ime-mode: active;"<?= $autofocus == 'comment' ? ' autofocus' : '' ?>><?= set_value('comment') ?></textarea>
	
	<button type="submit" class="btn btn-primary btn-xs">コメントを投稿</button><br />
</div>
</form>

<? } ?><!-- if count($article) -->
