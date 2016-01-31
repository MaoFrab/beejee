<div class="row">
	<div class="col-md-6 text-left"><h1>Комментарии</h1></div>
	<div class="col-md-6 text-right"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Написать комментарий</button></div>
</div>

<?php

	foreach($data as $row)
	{
		echo '
			<div class="wrap">
			<div class="row">
			<div class="col-md-12 text-right">'.$row['username'].'</div>
			</div>
			<div class="block">
				<div class="row">
	  				<div class="col-md-8 text-left subject"><b>'.$row['subject'].'</b></div>
	  				<div class="col-md-4 text-right">'.$row['date'].'</div>
				</div>
				<div class="row">
	  				<div class="col-md-12 text-left">'.$row['text'].'</div>
				</div>
				<div class="row">
	  				<div class="col-md-12 text-left"><h6>'.$row['email'].'</div>
				</div>
			  </div>
			</dvi>';
	}
	
	// foreach($data as $row)
	// {
		// echo '<tr><td>'.$row['id'].'</td><td>'.$row['email'].'</td><td>'.$row['username'].'</td><td>'.$row['subject'].'</td><td>'.$row['text'].'</td></tr>';
	// }
?>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Создать комментарий</h4>
      </div>
      <div class="modal-body">
        <form action="post/create_post" method="post" id="form_post">
        	<div class="form-group">
			    <label for="email">Email</label>
			    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
		  	</div>
		  	<div class="form-group">
			    <label for="username">Ваше Имя</label>
			    <input type="text" class="form-control" name="username" id="username" placeholder="Ваше Имя">
		  	</div>
		  	<div class="form-group">
			    <label for="subject">Тема</label>
			    <input type="text" class="form-control" name="subject" id="subject" placeholder="Тема">
		  	</div>
		  	<div class="form-group">
			    <label for="text">Текст</label>
			    <textarea type="text" class="form-control" name="text" id="text" placeholder="Текст"></textarea>
		  	</div>
		  	<button type="button" class="btn btn-default" id="form_submit" data-dismiss="modal">Отправить</button>
		</form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


