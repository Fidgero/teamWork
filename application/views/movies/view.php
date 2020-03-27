<h1><?php echo $title." "; ?>
<?php if($this->dx_auth->is_admin()) { ?>
			<a href="/movies/"><button type="button" class="btn btn-default">
				<span class="glyphicon glyphicon-pencil" area-hidden="true"></span></button></a>
	<?php	} ?>
</h1>
<hr>

<div class="embed-responsive embed-responsive-16by9">
	<iframe src="<?php echo $player_code; ?>" frameborder="0" class="embed-responsive-item" allowfullscreen></iframe>
</div>
<div class="well info-block text-center">
	Год: <span class="badge"><?php echo $year; ?></span>
	Рейтинг: <span class="badge"><?php echo $rating; ?></span>
	Режиссер: <span class="badge"><?php echo $director; ?></span>
</div>

<div class="margin-8"></div>

<h2>Описание <?php if ($category == 1) {echo 'фильма ';}?><?php if ($category == 2) {echo 'сериала '}?> <?php echo $title; ?></h2>
<hr>

<div class="well">
	<?php echo $descriptions_movie; ?>
</div>

<div class="margin-8"></div>

<h2>Описание <?php if ($category == 1) {echo 'фильма ';}?><?php if ($category == 2) {echo 'сериала '}?> <?php echo $title; ?></h2>
<hr>

<?php foreach ($comments as $key => $value): ?>
	<div class="panel panel-info">
		<div class="panel-heading"><i class="glyphicon glyphicon-user"></i>
			<span><?php echo getUserNameByID($value['user_id'])->username; ?></span>
		</div>
		<div class="panel-body">
			<?php echo $value['comment_text']; ?>
		</div>
	</div>
<?php endforeach ?>

<?php if ($this->dx_auth->is_logged_in()): ?>
<?php $this->session->set_flashdate('redirect', $this->uri->uri_string()); ?>

<form action="/movies/comment/" method="post">
	<input type="input" class="hidden" name="user_id" value="<?php echo $this->dx_auth->get_user_id(); ?>">
	<input type="input" class="hidden" name="movie_id" value="<?php $id; ?>">

	<div class="form-group">
		<textarea class="form-control" name="comment_text" placeholder="Ваш комментарий"></textarea>
	</div>

	<button class="btn btn-lg btn-warning pull-right">Отправить</button>
</form>

<?php endif?>

<?php if (!$this->dx_auth->is_logged_in()): ?>
	<br>
	<p>Чтобы оставить комментарий, войдите или зарегистрируйтесь!</p>

<?php endif?>