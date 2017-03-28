<?php 
	$errors = $blogPost->errors;
	// var_dump($blogPost);
	$verb = ($blogPost->id? 'Edit' : 'Add new');
	if ($blogPost->id) {
		$submitAction = ".\?page=blog.update&id=$blogPost->id";
	} else {
		$submitAction = '.\?page=blog.store';
	}
 ?>

<div class="row">
	<div class="col-xs-12">
		<h1><?= $verb ?> blog post</h1>
		<form id="blogCreate" action="<?= $submitAction ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
			<div class="form-group <?php if ($errors['title']):?> has-error <?php endif;?>">
				<!-- label>for and name>title need to match for accessibility -->
				<!-- input>name needs to match the table col names -->
				<label for="title" class="control-label">Blog title</label>
				<input class="form-control" type="text" name="title" value="<?php echo $blogPost->title; ?>" placeholder="The title of your post">
				<div class="help-block"><?php echo $errors['title'];?></div>
			</div>

			<div class="form-group <?php if ($errors['description']):?> has-error <?php endif;?>">
				<label for="description" class="control-label">Blog Description</label>
				<textarea class="form-control" type="text" name="description" placeholder="The description for your post"><?php echo $blogPost->description;?></textarea>
				<div class="help-block"><?php echo $errors['description'];?></div>
			</div>

			<div class="form-group <?php if ($errors['image']):?> hes-error <?php endif;?>">
				<label for="image" class="control-label">Blog Image</label>
				<input class="form-control" type="file" name="image"></input>
				<?php if ($blogPost->image != ''): ?>
					<img src="<?= './images/thumbs/' . $blogPost->image ?>">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="removeImage" value="true">
							Remove Image?
						</label>
					</div>
				<?php else: ?>
					<p>There is currently no image for this post.</p>
				<?php endif; ?>
			</div>

			<div class="form-group">
				<button class="btn btn-success"><?= $verb ?> blog post</button>
			</div>
		</form>
	</div>
</div>