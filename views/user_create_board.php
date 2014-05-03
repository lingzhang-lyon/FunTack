<?php require_once("../controllers/userCreateBoardController.php"); ?>  
<!-- The userCreateBoardController will set session and the object $user, object array $categories -->
<?php include("layouts/header.php"); ?>	
<?php $activeMenu = "user_myboards"; include("layouts/menu.php"); ?>

<div id="content" style="margin-top:15px;">

    <?php echo Session::message(); ?>
    <?php echo Session::form_errors(Session::$errors); ?>
    <div class="panel panel-warning" > 
		<div class="panel-heading"><h3>Create Your Board: <?php echo htmlentities($user->first_name); ?></h3></div>
		<div class="panel-body">
		<form action="user_create_board.php" method="post" class="form-horizontal" role="form">
			<div class="form-group">
				<label for="inputBoard" class="col-sm-2 control-label">Board Name</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="inputEmail3" name="boardname" placeholder="boardname">
				</div>
			</div>
			<div class="form-group">
				<label for="inputCategory" class="col-sm-2 control-label">Board Category</label>
				<div class="col-sm-10">
				  <select name="categoryid" >
					<?php
						foreach($categories as $category) { 
							echo "<option value ={$category->id}> {$category->category_name} </option>";
					}?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="Description" class="col-sm-2 control-label">Description</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="inputEmail3" name="description" placeholder="description">
				</div>
			</div>
			<div class="form-group">
				<label for="BoardType" class="col-sm-2 control-label">Board Type</label>
				<div class="col-sm-10">
				  <select name="boardtype">
					  <!-- <option value="">Select...</option> -->
					  <option value=0 >Public</option>
					  <option value=1 >Private</option>
					</select>
				</div>
			</div>	
			<input type="submit" name="submit" value="Create" class="btn btn-primary"/>
			<a class="btn btn-danger " href="user_myboards.php">Cancel</a>
		</form>
		</div>
	</div>
</div>

<?php include("layouts/footer.php"); ?>