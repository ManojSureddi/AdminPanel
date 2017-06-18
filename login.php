
<div id="rightbox">
<div class="container">
<div style="margin:18% 0 0 12%;">
<?php
	  if(isset($_SESSION['logstatus'])){
	  $a=$_SESSION['logstatus'];
	  if($a)
	  {
	   echo '<span class="alert alert-danger" >Incorrect Username/Password</span>';
	  }
	  else
	  {
	   echo '<span class="alert alert-danger" >Regitration Unsuccesfull</span>';
	  }
	  unset($_SESSION['logstatus']);
	  }
?>
<h4 style="margin-top:15%">Admin Login</h4>
<form action="logindao.php" method="post">
<input type="text" name="uname"  placeholder="Username">
<input type="password" name="pass" placeholder="Password">
<label ><input type="checkbox" name="remember">&nbsp;Remember Me</label>
<input type="submit" name="submit" value="Log In" class="submitbut">
</form>
</div>
</div>
</div>
</section>
</body>
</html>