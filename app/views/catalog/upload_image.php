<?php $this->view("catalog/header",$data); ?>

	<div style="margin: auto;max-width: 600px;width:100%;padding: 2em;">
		
		<form method="post" enctype="multipart/form-data">
		  <div class="form-group">
 		    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Image Title" required>
		    <small id="emailHelp" class="form-text text-muted">Add a title to your image.</small>
		  </div>
		  <div class="form-group">
 		    <input type="text" name="price" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Image Price" required>
		    <small id="emailHelp" class="form-text text-muted">Add a price to your image.</small>
		  </div>
		  <div class="form-group">
 		    <input type="text" name="description" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp" placeholder="Image Description" required>
		    <small id="emailHelp" class="form-text text-muted">Add a description to your image.</small>
		  </div>
		  <div class="form-group">
		    <input type="file" name="file" class="btn" id="exampleInputPassword1" placeholder="Password">
		  </div>
		   <br>
		  <button type="submit" class="btn btn-primary">Upload Image</button>
		</form>
	</div>

<?php $this->view("catalog/footer",$data); ?>