<!-- view part-->


<!Doctype>
<html language="en">
  <head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="register_style.css">
  </head>
  <body> 
  	
   <div id="main_wraper">
   	 <div id="error">
  		<?php
        echo validation_errors();

  		?>
  	</div>
    <header>
      <h1>Registration</h1>
    </header>
	<section>
	  <?php echo form_open();?>
	   <h4>UserName:</h4>
	   <input type="text" placeholder="UserName"name="username" value="<?php echo set_value('username');?>">
	   <h4>Email:</h4>
	   <input type="text" placeholder="Email"name="email" value="<?php echo set_value('email');?>">
	   <h4>Password:</h4>
	   <input type="password" placeholder="Password" name="password" value="<?php echo set_value('password');?>">
	   <h4>Re-Enter:</h4>
	   <input type="password" placeholder="Re Type" name="password_match" value="<?php echo set_value('password_match');?>">
	   <br/><br/><br/>
	   <?php echo form_submit('mysubmit','Register');?>
	  </form>
	
	</section>
    <footer>
	  <p>wishkart Regisration form&copy; All Right Reserved</p>
	</footer>
  </div>	
	</body>
</html>
