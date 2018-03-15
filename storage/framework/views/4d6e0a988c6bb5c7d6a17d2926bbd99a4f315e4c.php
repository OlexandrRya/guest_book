<div class="container">
	<div class="row row-task">
		<div class="col"><span><?php echo e($article->user_name); ?></span></div>
		<div class="col"><span><?php echo e($article->email); ?></span></div>
		<div class="col"><span><?php echo e($article->homepage); ?></span></div>
		<div class="col"><p><?php echo e($article->text); ?></p></div>
		<?php if(isset($article->file)): ?>
			<div class="col"><img src="/file/<?php echo e($article->file); ?>" ></div>
		<?php endif; ?>
	</div>
</div>