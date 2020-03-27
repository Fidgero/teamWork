<form action="/movies/comment" method="post">
	<input type="input" name="user_id" class="hidden">
	<input type="input" name="movie_id" class="hidden">

	<div class="form-group">
		<textarea name="comment_text" class="form-control"></textarea>
	</div>
</form>

<?php redirect($this->session->flashdata('redirect')); ?>