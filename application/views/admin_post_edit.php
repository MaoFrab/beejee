<form action="post_edit_post" method="post" id="form_post">
	<div class="form-group">
	    <label for="email">Email</label>
	    <input value="<?php echo $data['email'] ?>" type="email" class="form-control" name="email" id="email" placeholder="Email">
  	</div>
  	<div class="form-group">
	    <label for="username">Ваше Имя</label>
	    <input value="<?php echo $data['username'] ?>" type="text" class="form-control" name="username" id="username" placeholder="Ваше Имя">
  	</div>
  	<div class="form-group">
	    <label for="subject">Тема</label>
	    <input value="<?php echo $data['subject'] ?>" type="text" class="form-control" name="subject" id="subject" placeholder="Тема">
  	</div>
  	<div class="form-group">
	    <label for="text">Текст</label>
	    <textarea type="text" class="form-control" name="text" id="text" placeholder="Текст"><?php echo $data['text'] ?></textarea>
  	</div>
  	<button type="submit" class="btn btn-default" name="id" value="<?php echo $data['id'] ?>" >Отправить</button>
</form>
