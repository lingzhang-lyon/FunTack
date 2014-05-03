<?php require_once("../controllers/userEditBoardController.php"); ?>  
<!-- The userEditBoardController will set session and the object $user, $board, object array $categories -->
<?php include("layouts/header.php"); ?>	
<?php $activeMenu = "user_myboards"; include("layouts/menu.php"); ?>

<div id="content">

    <?php echo Session::message(); ?>
    <?php echo Session::form_errors(Session::$errors); ?>
    
	<div class="panel panel-warning" > 
		<div class="panel-heading"><h3>Create Your Board: <?php echo htmlentities($user->first_name); ?></h3></div>
		<div class="panel-body">
			<form action="user_edit_board.php?boardid=<?php echo urlencode($board->board_id);?>" method="post" class="form-horizontal" role="form">
			<div class="form-group">
				<label for="BoardName" class="col-sm-2 control-label">Board Name</label>
				<div class="col-sm-10">
				  <input type="text" name="boardname" value="<?php echo htmlentities($board->name); ?>" class="form-control" placeholder="Board Name">
				</div>
			</div>
			<div class="form-group">
				<label for="BoardCategory" class="col-sm-2 control-label">Board Category</label>
				<div class="col-sm-10">
				  <select name="categoryid" >
				<?php
					foreach($categories as $category) { 
						$output= "<option value ={$category->id} ";
						if($category->id==$board->category_id) {$output .= " selected ";}
						$output.= "> {$category->category_name} </option>";
						echo $output;
						
				}?>
				</select>
				</div>
			</div>
			<div class="form-group">
				<label for="Description" class="col-sm-2 control-label">Description</label>
				<div class="col-sm-10">
				  <input type="text" name="description" value="<?php echo htmlentities($board->description); ?>" class="form-control" placeholder="Description">
				</div>
			</div>
			<div class="form-group">
				<label for="BoardType" class="col-sm-2 control-label">Board Type</label>
				<div class="col-sm-10">
				<select name="boardtype">
				  <!-- <option value="">Select...</option> -->
				  <option value=0 <?php if($board->privacy==0)echo 'selected';?> >Public</option>
				  <option value=1 <?php if($board->privacy==1)echo 'selected';?> >Private</option>
				</select>	
				</div>
			</div>

				<input type="submit" name="submit" value="Update" class="btn btn-primary"/>
				<a class="btn btn-danger " href="user_board.php?id=<?php echo urlencode($board->board_id);?>">Cancel</a>
			</form>
		</div>
	</div>	

</div>

<?php include("layouts/footer.php"); ?>