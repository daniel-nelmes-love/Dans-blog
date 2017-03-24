<?php 
	$errors = $blogPost->errors;
	// var_dump($blogPost);
 ?>

<div class="row">
	<div class="col-xs-12">
		<h1>Add new blog post</h1>
		<form id="blogCreate" action=".\?page=blog.store" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
			</div>

			<div class="form-group">
				<button class="btn btn-success">Submit blog post</button>
			</div>
		</form>
	</div>
</div>