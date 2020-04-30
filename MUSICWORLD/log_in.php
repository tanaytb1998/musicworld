<?php
  include ('dbcon.php');
  $qry="SELECT * FROM `user`";
  $qry_run=mysqli_query($t_basu,$qry);
?>

<html>
<head>
<title>login form design</title>
<link rel="stylesheet" type="text/css" href="css/login_style.css">
<script type="text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
</head>
<body>
<div class="loginbox">
<img src="img/log_in/avatar.jpg" class="avatar">
<h1>Login here</h1>
<form action="log_in.php" method="post" enctype="multipart/form-data">
<p>Username</p>
<input type="text" name="u_name" placeholder="Enter Username">
<p>Password</p>
<input type="password" name="u_pw" placeholder="Enter Password">
<form action="index.html">
<input type="submit" name="submit" value="Login">
<input type="button" name="submit" class="home" value="Home" onclick="Home()">
</form>
</div>



</body>

</html>
<script type="text/javascript">
	function Home()
	{
		window.open("Index.php","_self");
	}
</script>

<?php
  if(isset($_POST['submit'])){
    $u_name=$_POST['u_name'];
    $u_pw=$_POST['u_pw'];
	while($data=mysqli_fetch_assoc($qry_run)){
		if($u_name == $data['u_name'] and $u_pw == $data['u_pw'])
		{
			?> <script type="text/javascript">
				window.open("Admin/admin.php","_self");
			</script> <?php
		}
	}
	?> 
		<script type="text/javascript">
			alert("User id or Password is incorrect");
		</script> 
	<?php
 }
?>