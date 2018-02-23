<!DOCTYPE html>
<!--Login-->
<!--
        Author: Timothy Tsai
        Date Created: October, 2017
        Class: OOSD Oct 2017

        Login Template. Please Inplude this at the very buttom of every html/php page as needed
-->
    <div id="id01" class="modal">
  
  <form class="modal-content animate" action="loginverify.php" method="POST">
    <div class="imgcontainer">
      
    </div>

    <div class="container">
		  <label><b>Email Address</b></label>
		  <input type="text" placeholder="Enter Email Address" name="email" required autocomplete="email">

		  <label><b>Password</b></label>
		  <input type="password" placeholder="Enter Password" name="password" required autocomplete="new-password">
		  <button type="submit" name="submit" value="Sign In">Login</button>  
      <button type="text" onclick="window.location.href='register.php'">Register</button>
    </div>

  </form>
</div>
    	<script type="text/javascript" src="js/index.js">
	</script>
	