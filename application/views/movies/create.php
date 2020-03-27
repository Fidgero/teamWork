<form action="/movies/create/" method="post">
	
	<input type="input" name="slug" class="form-control input-lg" placeholder="слизняк"><br>
	<input type="input" name="name" class="form-control input-lg" placeholder="название фильма"><br>
	<textarea name="descriptions" class="form-control input" placeholder="описание"></textarea><br>
	<input type="input" name="year" class="form-control input-lg" placeholder="год"><br>
	<input type="input" name="rating" class="form-control input-lg" placeholder="рейтинг"><br>
	<input type="input" name="poster" class="form-control input-lg" placeholder="ссылка на постер"><br>
	<input type="input" name="player_code" class="form-control input-lg" placeholder="ссылка на плеер"><br>
	<input type="input" name="director" class="form-control input-lg" placeholder="режиссер"><br>
	<input type="input" name="add_date" class="form-control input-lg" value="<?php echo date("Y-m-d")." ".date("h:i:s"); ?>" placeholder="дата"><br>
	<input type="input" name="category_id" class="form-control input-lg" placeholder="категория (1=фильм; 2=сериал)"><br>
	<input type="submit" name="submit" class="btn btn-success" value="Добавить фильм/сериал"><br>

</form>