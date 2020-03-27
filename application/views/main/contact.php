<div class="well">
	<?php
		$attributes = array("class" => "form-horizontal", "name" => "contactform");
		echo form_open("/contact", $attributes);
	?>
	<fieldset>
		<legend><h2>Контакты</h2></legend>
		<p id="cont">Отправьте Ваш отзыв о портале КиноМонстр</p>
		<div class="form-group">
			<input type="text" class="form-control" name="name" placeholder="Ваше имя" value="<?php echo set_value('name');?>" />
			<span class="text-danger"><?php echo form_error('name'); ?></span>
		</div>

		<div class="form-group">
			<input type="email" class="form-control" name="name" placeholder="Ваш email" value="<?php echo set_value('email');?>" />
			<span class="text-danger"><?php echo form_error('email'); ?></span>
		</div>

		<div class="form-group">
			<input type="text" class="form-control" name="subject" placeholder="Тема" value="<?php echo set_value('subject');?>" />
			<span class="text-danger"><?php echo form_error('subject'); ?></span>
		</div>

		<div class="form-group">
			<textarea class="form-control" name="message" row="4" placeholder="Ваш отзыв"><?php echo set_value('message');?></textarea>
			<span class="text-danger"><?php echo form_error('message'); ?></span>
		</div>

		<div class="form-group">
			<input type="submit" class="btn btn-lg btn-warning pull-right" name="submit" value="Отправить" />
		</div>
	</fieldset>
	<?php echo form_close(); ?>
	<?php echo $this->session->flasdata('msg'); ?>
</div>