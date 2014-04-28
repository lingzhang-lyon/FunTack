<?php require_once("../controllers/userCreateBoardController.php"); ?>  
<!-- The userCreateBoardController will set session and the object $user, object array $categories -->
<?php include("layouts/header.php"); ?>	
<?php include("layouts/menu.php"); ?>

<div id="content">

    <?php echo Session::message(); ?>
    <?php echo Session::form_errors(Session::$errors); ?>
    
    <h2>Create Your Board: <?php echo htmlentities($user->first_name); ?></h2>
    <form action="user_create_board.php" method="post">

		<p>Board Name<br></br>
		<input type="text" name="boardname"  />
		</p>
		
		<p>Board Category<br></br>		
		<select name="categoryid" >
		<?php
			foreach($categories as $category) { 
				echo "<option value ={$category->id}> {$category->category_name} </option>";
		}?>
		</select>
		
		
		</p>
		
		<p>Description<br></br>
		<input type="text" name="description" />
		</p>

		<p>Board Type<br></br>
		<select name="boardtype">
		  <!-- <option value="">Select...</option> -->
		  <option value=0 >Public</option>
		  <option value=1 >Private</option>
		</select>	
		</p>


		<input type="submit" name="submit" value="Create"/>
    </form>

</div>

<?php include("layouts/footer.php"); ?>