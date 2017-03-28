<p>
	<a href="./?page=blog.edit&id=<?= $blogPost->id ?>" class="btn btn-primary">Edit post</a>
	<form action="./?page=blog.remove" method="POST" class="form-horizontal">
		<input type="hidden" name="id" value="<?= $blogPost->id ?>">
		<button class="btn btn-danger">Delete Post</button>
	</form>
</p>
<div class="row">
	<div class="col-xs-12">
		<h1><?= $blogPost->title ?></h1>
		<p><small>Blog created at - <?= $blogPost->timeStamp ?></small></p>
		<hr>
		<p><?= $blogPost->description ?></p>
		<?php if ($blogPost->image !=''): ?>
			<img src="./images/thumbs/<?= $blogPost->image ?>">
		<?php endif; ?>
	</div>
</div>