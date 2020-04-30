<!DOCTYPE html>
<html>
<head>
	<title>Contact Form Design</title>
	<link rel="stylesheet" type="text/css" href="css/contact_us.css">
</head>
<body>
	<div class="contact-title">
		<h1>CONTACT US</h1>
		<h2>music world only for you</h2>
	</div>
	<div class="contact-form">
		<form id="contact-form" method="post" action="contact_us.php">
			<input name="name" type="text" class="form-control" placeholder="Your Name" required>
			<br>
			<input name="email" type="text" class="form-control" placeholder="Your Email" required>
			<br>
			<input name="phn" type="text" class="form-control" placeholder="Your Phone Number" required>
			<br>
			<textarea name="msg" class="form-control" placeholder="message" row="4" required></textarea><br>
			<input type="submit" class="form-control submit" name="submit" value="SEND FEEDBACK">
		</form>
	</div>
</body>
</html>

<?php
  if(isset($_POST['submit'])){
    include ('dbcon.php');
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phn=$_POST['phn'];
    $msg=$_POST['msg'];
    $qry="INSERT INTO `feedback`(`sl`, `name`, `email`, `phn`, `msg`) VALUES (NULL,'$name','$email','$phn','$msg')";
    $run_qry=mysqli_query($t_basu,$qry);
    if($run_qry==true)
    {
      ?>
        <script type="text/javascript">
          alert("Thanks for giving feedback!");
		  window.open("index.php","_self");
        </script>
      <?php
    }
    else {
      ?>
        <script type="text/javascript">
          alert("Sorry! There is some technical issues. Try after some time.");
		  window.open("index.php","_self");
        </script>
      <?php
    }
  }
?>