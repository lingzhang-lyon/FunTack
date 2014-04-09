<?php include("../controllers/loginController.php"); ?>
<?php include("layouts/header.php"); ?>
<div id="main">
  <div id="navigation">
	<br />
	<a href="index.php">&laquo; Main Page</a><br />
  </div>
  <div id="page">
    <?php echo message(); ?>
    <?php echo basicHelper::form_errors($errors); ?>
    
    <h2>Login</h2>
    <form action="login.php" method="post">
      <p>Email:
        <input type="text" name="email" value="<?php echo htmlentities($email); ?>" />
      </p>
      <p>Password:
        <input type="password" name="password" value="" />
      </p>
      <input type="submit" name="submit" value="Submit" />
    </form>
  </div>
</div>

<?php include("layouts/footer.php"); ?>