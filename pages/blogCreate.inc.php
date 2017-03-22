<div class="row">
	<div class="col-xs-12">
		<h1>Add new blog post</h1>
		<form id="blogCreate" action=".\?page=blog.store" method="POST" class="form-horizontal" enctype="multipart/form-data">
			<div class="form-group">
				<label for="blogTitle" class="control-label">Blog title</label>
				<input class="form-control" type="text" name="blogTitle" placeholder="The title of your post">
			</div>

			<div class="form-group">
				<label for="blogDescription" class="control-label">Blog Description</label>
				<textarea class="form-control" type="text" name="blogDescription" placeholder="The description for your post"></textarea>
			</div>

			<div class="form-group">
				<label for="blogImage" class="control-label">Blog Image</label>
				<input class="form-control" type="file" name="blogImage"></input>
			</div>

			<div class="form-group">
				<button class="btn btn-success">Submit blog post</button>
			</div>
		</form>
	</div>
</div>