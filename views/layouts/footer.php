		</div> <!--/panel-->
	</div>	 <!--/.jumbotron-->
    <div id="footer" style="color:white;">Copyright 2014, FunTag,Inc.  CMPE203Group12</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="offcanvas.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	</body>
</html>
<?php
  // 5. Close database connection
	if (isset($database)) {
	  $database->close_connection();
	}
?>
