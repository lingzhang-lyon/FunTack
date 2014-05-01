<?php require_once("../controllers/userEditBoardController.php"); ?>  
<!-- The userEditBoardController will set session and the object $user, $board, object array $categories -->
<?php include("layouts/header.php"); ?>	
<?php $activeMenu = "user_myboards"; include("layouts/menu.php"); ?>

<div id="content">

    <?php echo Session::message(); ?>
    <?php echo Session::form_errors(Session::$errors); ?>
    
    <h2>Create Your Board: <?php echo htmlentities($user->first_name); ?></h2>
    <form action="user_edit_board.php?boardid=<?php echo urlencode($board->board_id);?>" method="post">

		<p>Board Name<br></br>
		<input type="text" name="boardname" value="<?php echo htmlentities($board->name); ?>" />
		</p>
		
		<p>Board Category<br></br>		
		<select name="categoryid" >
		<?php
			foreach($categories as $category) { 
				$output= "<option value ={$category->id} ";
				if($category->id==$board->category_id) {$output .= " selected ";}
				$output.= "> {$category->category_name} </option>";
				echo $output;
				
		}?>
		</select>
        </p>
		
		<p>Description<br></br>
		<input type="text" name="description" value="<?php echo htmlentities($board->description); ?>" />
		</p>

		<p>Board Type<br></br>
		<select name="boardtype">
		  <!-- <option value="">Select...</option> -->
		  <option value=0 <?php if($board->privacy==0)echo 'selected';?> >Public</option>
		  <option value=1 <?php if($Minus->privacy==1)echo 'selected';?> >Private</option>
		</select>	
		</p>


		<input type="submit" name="submit" value="Update"/>
		<a href="user_board.php?id=<?php echo urlencode($board->board_id);?>">Cancel</a>
    </form>

</div>

<?php include("layouts/footer.php"); ?>