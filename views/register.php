<?php include("../controllers/registerController.php"); ?>
<?php include("layouts/header.php"); ?>
<div id="main">
  <div id="navigation">
	<br />
	<a href="index.php">&laquo; Main Page</a><br />
  </div>
  <div id="page">
    <?php echo Session::message(); ?>
    <?php echo Session::form_errors(Session::$errors); ?>
    
    <h2>Registration</h2>
    <form action="register.php" method="post">
      <p>Email:
        <input type="text" name="email" value="" />
      </p>
      <p>First Name:
        <input type="text" name="firstname" value="" />
      </p>
      <p>Last Name:
        <input type="text" name="lastname" value="" />
      </p>
      <p>Password:
        <input type="password" name="password" value="" />
      </p>
      <input type="submit" name="submit" value="Create your account" />
    </form>
    <br />
    <a href="index.php">Cancel</a>
  </div>
</div>

<?php include("layouts/footer.php"); ?>