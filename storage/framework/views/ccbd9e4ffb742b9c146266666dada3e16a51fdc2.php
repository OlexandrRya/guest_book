<?php $__env->startSection('input_data'); ?>

<div class="container input-form">
	<form enctype="multipart/form-data" action="/articles" method="POST">
		<div class="row">
			<div class="form-control"><input id="input-user_name" name="user_name" placeholder="User Name" required></div>
			
			<div class="form-control"><input id="input-email" type="email" name="email" placeholder="E-mail" required></div>
			
			<div class="form-control"><input id="input-homepage" type="url" name="homepage" placeholder="Homepage"></div>

			<div class="form-control">
				<img src="<?php echo e(captcha_src()); ?>" alt="captcha" class="captcha-img" data-refresh-config="default">
				<a href="#" id="refresh">
					<i class="fas fa-sync"></i>
				</a>

			</div>
			<div class="form-control">
				<p style="height: 20px;">Капча</p>
				<input class="form-control" type="text" name="captcha" required/>
			</div>
			
			<div class="form-control"><textarea id="input-text" name="text" placeholder="Text" required></textarea></div>

		    <div class="col-12 mt-2">
			    <input type="hidden" name="MAX_FILE_SIZE" value="819200" required/>
			    Выбрать файл или картинку: <input id="input-file" name="userfile" type="file" accept="image/jpeg,image/png,image/gif,text/plain"/>
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
	    		<div class="col" id="email"></div>
	    		<div class="col" id="homepage"></div>
	    		<div class="col" id="text"></div>
	    		<label id="file" class="input-img" for=pct></label>
	    	</div>
	    </div>
	  </div>
	</div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('sort'); ?>

	<?php echo $__env->make('sort', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('show'); ?>

	<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php echo $__env->make('show', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
	<?php echo e($articles->links()); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>