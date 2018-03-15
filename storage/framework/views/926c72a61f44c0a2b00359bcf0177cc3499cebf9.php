<div class="container input-form">
	<form enctype="multipart/form-data" action="/index/set" method="POST">
		<div class="row">
			<div class="col"><input id="input-user_name" name="user_name" placeholder="User Name" required></div>
			
			<div class="col"><input id="input-e_mail" type="email" name="e_mail" placeholder="E-mail" required></div>
			
			<div class="col"><input id="input-homepage" type="url" name="homepage" placeholder="Homepage"></div>

			<div class="col">CAPTCHA</div>
			
			<div class="col"><textarea id="input-text" name="text" placeholder="Text" required></textarea></div>

		    <div class="col-12 mt-2">
			    <input type="hidden" name="MAX_FILE_SIZE" value="102400" required/>
			    Выбрать файл или картинку: <input id="input-img" name="userfile" type="file" accept="image/jpeg,image/png,image/gif,text/plain"/>
			    <input type="submit" value="Отправить" />
			</div>
		</div>
	</form>
	<button id="button-preview" class="btn btn-primary mt-2" data-toggle="modal" data-target=".bd-example-modal-lg">Предварительный просмотр</button>
	<div class="modal fade bd-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	    	<div class="row">
	    		<div class="col" id="user_name"></div>
	    		<div class="col" id="e_mail"></div>
	    		<div class="col" id="text_task"></div>
	    		<label id="img" class="input-img" for=pct></label>
	    	</div>
	    </div>
	  </div>
	</div>
</div>