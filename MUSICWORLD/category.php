<?php
  include ('dbcon.php');
?>

<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* The image used */
  background-image: url("img/catgry/b9.jpg");
  
  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 80px;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 95%;
  padding: 1px;
  text-align: center;
  height:100px;
  border-radius:10px;
}
*{
      font-family: sans-serif;
     }
     .content-table{

     border-collapse: collapse;
    margin-left:auto; 
    margin-right:auto;
     font-size: 0.9em;
     min-width: 400px;
     border-radius: 5px 5px 0 0;
     overflow: hidden;
     box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);

}
.music_outer_div{
  position: absolute;
  top: 400px;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 95%;
  height:500px;
  overflow: scroll;
}


 
</style>
<style>

			#song{
	width:200px;
	height:300px;
	background-color:rgba(0,0,0, 0.4);
	margin-right:10px;
	margin-bottom:10px;
	padding:4px;
	color:rgb(255,255,255);
	float:left;
	text-align:center;
}
.image{
	width:100%;
	height:70%;
}
</style>





<link rel="stylesheet" href="css/load_music.css">
</head>
<body>

<div class="bg-image"></div>

<div class="bg-text">
	<?php
		$tanay=$_GET['catg'];
		if($tanay=="hindi")
		{
			?><div style="font-family:Algerian;font-size:50px;margin-top:10px;"> ** Hindi Songs ** </div><?php
		}
		elseif($tanay=="bengali")
		{
			?><div style="font-family:Algerian;font-size:50px;margin-top:10px;"> Bengali Songs </div><?php
		}
		elseif($tanay=="english")
		{
			?><div style="font-family:Algerian;font-size:50px;margin-top:10px;"> English Songs </div><?php
		}
	?>
		
</div>

<div class="music_outer_div">

<?php
$t=$_GET['catg'];
if($t=="hindi")
{
$qry="SELECT DISTINCT `m_album`,`m_year`,`m_img` FROM `music` WHERE `m_catg`='$t'";
}
elseif($t=="bengali")
{
$qry="SELECT DISTINCT `m_album`,`m_img` FROM `music` WHERE `m_catg`='$t'";	
}
elseif($t=="english")
{
$qry="SELECT DISTINCT `m_album`,`m_artist`,`m_img` FROM `music` WHERE `m_catg`='$t'";	
}
$qry_run=mysqli_query($t_basu,$qry);
while($data=mysqli_fetch_assoc($qry_run))
{
?>
<div>
<div style="left:5%; width:100%">
<a href="song_load.php?album=<?php echo $data['m_album']; ?>">
<div id="song">
	<img src="Admin/dataimg/<?php echo $data['m_img'] ?>" class="image" /><br/> <br/>
	<?php
		if($t=="hindi")
		{
			?>
			<b><?php echo $data['m_album']; ?><br/> <br/>
			<?php echo $data['m_year']; ?><br/> <br/>
		<?php
		}
		elseif($t=="bengali")
		{
			?>
			<b><?php echo $data['m_album']; ?><br/> <br/>
			<br/> <br/>
		<?php
		}
		elseif($t=="english")
		{
			?>
			<b><?php echo $data['m_album']; ?><br/> <br/>
			<?php echo $data['m_artist']; ?><br/> <br/>
		<?php
		}
	?>
</div>
</a>
</div>
</div>
<?php
}
?>
</div>



</body>
</html>