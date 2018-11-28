<div class="col-4">
  <div class="card p-3">
    <h2>Search</h2>
    <form action="" method="get">
    	<?php 
    	$search = "";
    	if(isset($_GET['s'])){
    		$search = $_GET['s'];
    	}
    	?>
    	<input name="s" type="text" class="form-control" value="<?php echo $search ?>">
    	<input type="submit" value="Search" class="form-control mt-2">
    </form>
  </div>
</div>