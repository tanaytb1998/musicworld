



<html>
<head>
<title>MUSICWORLD</title>
<link rel="stylesheet" type="text/css" href="css/image_animation.css">
<style>
.menu {
	width: 100%;
	background:#142b47;
	overflow: auto;
}
.menu ul{
	margin:0;
	padding:0;
	list-style:none;
	line-height:60px;
}
.menu li{
	float:left;
}

.menu ul li a{
	background:#142b47;
	text-decoration:none;
	width:130px;
	display:block;
	text-align:center;
	color:#f2f2f2;
	font-size:18px;
	font-family:sans-serif;
	letter-spacing:0.5px;
}
.menu li a:hover{
	color:#fff;
	opacity:0.5;
	font-right:100px;
}
.search-form{
	margin-top:15px;
	margin-right:15px;
	float:right;
	font-size:19px;
	width:20%;
	height:40px;
}
input[type=text]{
	padding:7px;
	border:none;
	font-size:16px;
	font-family:sans-serif;
}
button{
	background:orange;
	color:white;
	border-radius:5px 5px 5px 5px;
	cursor:pointer;
	margin-right:10px;
	font-family:sans-serif;
	border:none;
	width:100%;
	font-size:16px;
	height:40px;
   
}
</style>
</head>
<body>
<nav class="menu">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="category.php?catg=hindi">Hindi Music</a></li>
<li><a href="category.php?catg=english">English Music</a></li>
<li><a href="category.php?catg=bengali">Bengali Music</a></li>
<li><a href="Contact_us.php">Contact Us</a></li>
<li><a href="about.php">About</a></li>
</ul>
<div class="search-form">
<a href="search.php">
<button>Search</button>
</a>
</div>
</nav>
</body>
</html>

<style>
#header{
	background-color:rgb(255,70,39);
	color:rgb(255,255,255);
	font-size:40px;
	text-align:center;
}
body{
      font-family:verdana,tohama;
      font-size:13px;
}
body a{
	text-decoration: none;
}
.small_image{
	width:250px;
	float:left;
}
#wrapper{
	width: 100%;
	
	background-color: rgb(128,0,0);
}

}
</style>
<body>
	<div id="wrapper">
<div id="header">
	<div style="height:250px;float:left;" class="img_sld"></div>
	<img src="img/index/logo.png" class="small_image"/>
	<br/> MUSICWORLD.COM<br/>
	<div style="font-size:30px; font-family:Bradley Hand ITC;">LET THE MUSIC ROCK YOUR SOUL!</div>
<br style="clear:both;"/>
</div>
<style>

			#song{
	width:200px;
	height:310px;
	background-color:rgb(1,142,167);
	margin-left:27px;
	margin-top:10px;
	margin-bottom:20px;
	margin-right:30px;
	padding:4px;
	color:rgb(255,255,255);
	float:left;
	text-align:center;
}
#song:hover{
	background-color:rgb(25,40,167);
}
.image{
	width:100%;
	height:70%;
}

.xyz{
  width: 200px;
  font-size: 10px;
  box-sizing: border-box;
  height: 20px;
  border-radius: 8px; 
  margin-top:6px;
}
</style>
<br style="clear:both;"/>
</div>

<?php
	include ('dbcon.php');
?>




<!-- resent song box -->
<div class="recent_header">Recent Playlist</div>
<?php
	$qry="SELECT * FROM `resent` WHERE `sl`= '1'";
	$qry_run=mysqli_query($t_basu,$qry);
	$data=mysqli_fetch_assoc($qry_run);
	$d=$data['m_id'];
	$qry1="SELECT * FROM `music` WHERE `m_id`= '$d'";
	$qry_run1=mysqli_query($t_basu,$qry1);
	$data1=mysqli_fetch_assoc($qry_run1);
?>
<div id="song">
<img src="Admin/dataimg/<?php echo $data1['m_img'] ?>" class="image" onclick="play_song(1)"/><br/>
<b>SONG:<?php echo $data1['m_title'] ?><br/> <br/>
ARTIST:<?php echo $data1['m_artist'] ?><br/> 
<audio controls class="xyz" id="1">
    <source src="Admin/songs/<?php echo $data1['m_song'] ?>" />
</audio>
<br/>
</div>

<?php
	$qry="SELECT * FROM `resent` WHERE `sl`= '2'";
	$qry_run=mysqli_query($t_basu,$qry);
	$data=mysqli_fetch_assoc($qry_run);
	$d=$data['m_id'];
	$qry1="SELECT * FROM `music` WHERE `m_id`= '$d'";
	$qry_run1=mysqli_query($t_basu,$qry1);
	$data1=mysqli_fetch_assoc($qry_run1);
?>
<div id="song">
	<img src="Admin/dataimg/<?php echo $data1['m_img'] ?>" class="image" onclick="play_song(2)"/><br/>
<b>SONG:<?php echo $data1['m_title'] ?><br/> <br/>
ARTIST:<?php echo $data1['m_artist'] ?><br/> 
<audio controls class="xyz" id="2">
    <source src="Admin/songs/<?php echo $data1['m_song'] ?>" />
</audio>
<br/>
</div>

<?php
	$qry="SELECT * FROM `resent` WHERE `sl`= '3'";
	$qry_run=mysqli_query($t_basu,$qry);
	$data=mysqli_fetch_assoc($qry_run);
	$d=$data['m_id'];
	$qry1="SELECT * FROM `music` WHERE `m_id`= '$d'";
	$qry_run1=mysqli_query($t_basu,$qry1);
	$data1=mysqli_fetch_assoc($qry_run1);
?>
<div id="song">
	<img src="Admin/dataimg/<?php echo $data1['m_img'] ?>" class="image" onclick="play_song(3)"/><br/>
<b>SONG:<?php echo $data1['m_title'] ?><br/> <br/>
ARTIST:<?php echo $data1['m_artist'] ?><br/> 
<audio controls class="xyz" id="3">
    <source src="Admin/songs/<?php echo $data1['m_song'] ?>" />
</audio>
<br/>
</div>

<?php
	$qry="SELECT * FROM `resent` WHERE `sl`= '4'";
	$qry_run=mysqli_query($t_basu,$qry);
	$data=mysqli_fetch_assoc($qry_run);
	$d=$data['m_id'];
	$qry1="SELECT * FROM `music` WHERE `m_id`= '$d'";
	$qry_run1=mysqli_query($t_basu,$qry1);
	$data1=mysqli_fetch_assoc($qry_run1);
?>
<div id="song">
	<img src="Admin/dataimg/<?php echo $data1['m_img'] ?>" class="image" onclick="play_song(4)"/><br/>
<b>SONG:<?php echo $data1['m_title'] ?><br/> <br/>
ARTIST:<?php echo $data1['m_artist'] ?><br/> 
<audio controls class="xyz" id="4">
    <source src="Admin/songs/<?php echo $data1['m_song'] ?>" />
</audio>
<br/>
</div>

<?php
	$qry="SELECT * FROM `resent` WHERE `sl`= '5'";
	$qry_run=mysqli_query($t_basu,$qry);
	$data=mysqli_fetch_assoc($qry_run);
	$d=$data['m_id'];
	$qry1="SELECT * FROM `music` WHERE `m_id`= '$d'";
	$qry_run1=mysqli_query($t_basu,$qry1);
	$data1=mysqli_fetch_assoc($qry_run1);
?>
<div id="song">
	<img src="Admin/dataimg/<?php echo $data1['m_img'] ?>" class="image" onclick="play_song(5)"/><br/>
<b>SONG:<?php echo $data1['m_title'] ?><br/> <br/>
ARTIST:<?php echo $data1['m_artist'] ?><br/> 
<audio controls class="xyz" id="5">
    <source src="Admin/songs/<?php echo $data1['m_song'] ?>" />
</audio>
<br/>
</div>

<script type="text/javascript">
function play_song(p)
{
	var sng;
	for(var i=1;i<6;i++)
	{
		sng=document.getElementById(i);
		sng.pause(1);
	};
	var sng=document.getElementById(p);
	sng.play();
}
</script>






<!--slidebar start-->
<br style="clear:both;"/>
<br/>
<br/>
<br/>
<br/>

<?php
	$qry_max_1="SELECT MAX(m_id) as m_id FROM music";
	$qry_max_2="SELECT MAX(m_id) as m_id FROM music WHERE m_id<(SELECT MAX(m_id) FROM music )";
	$qry_max_3="SELECT MAX(m_id) as m_id FROM music WHERE m_id<(SELECT MAX(m_id) FROM music WHERE m_id<(SELECT MAX(m_id) FROM music))";
	$qry_run_max_1=mysqli_query($t_basu,$qry_max_1);
	$qry_run_max_2=mysqli_query($t_basu,$qry_max_2);
	$qry_run_max_3=mysqli_query($t_basu,$qry_max_3);
	$max_1=mysqli_fetch_assoc($qry_run_max_1);
	$max_2=mysqli_fetch_assoc($qry_run_max_2);
	$max_3=mysqli_fetch_assoc($qry_run_max_3);
	$d1=$max_1['m_id'];
	$d2=$max_2['m_id'];
	$d3=$max_3['m_id'];
	$qry_slide_song_1="SELECT * FROM music where m_id='$d1'";
	$qry_slide_song_2="SELECT * FROM music where m_id='$d2'";
	$qry_slide_song_3="SELECT * FROM music where m_id='$d3'";
	$qry_run_slide_song_1=mysqli_query($t_basu,$qry_slide_song_1);
	$qry_run_slide_song_2=mysqli_query($t_basu,$qry_slide_song_2);
	$qry_run_slide_song_3=mysqli_query($t_basu,$qry_slide_song_3);
	$slide_song_1=mysqli_fetch_assoc($qry_run_slide_song_1);
	$slide_song_2=mysqli_fetch_assoc($qry_run_slide_song_2);
	$slide_song_3=mysqli_fetch_assoc($qry_run_slide_song_3);
?>
<link rel="stylesheet" href="css/sliders/slidebar1/slidebar1.css">
<!--hiden divs-->
<!--top song 1-->
<div hidden id="sldr_sng1_img">Admin/dataimg/<?php echo $slide_song_1['m_img'] ?></div>
<div hidden id="sldr_sng1_ttl"><?php echo $slide_song_1['m_title'] ?></div>
<div hidden id="sldr_sng1_artst"><?php echo $slide_song_1['m_artist'] ?></div>
<div hidden id="sldr_sng1_sng">Admin/songs/<?php echo $slide_song_1['m_song'] ?></div>
<!--top song 2-->
<div hidden id="sldr_sng2_img">Admin/dataimg/<?php echo $slide_song_2['m_img'] ?></div>
<div hidden id="sldr_sng2_ttl"><?php echo $slide_song_2['m_title'] ?></div>
<div hidden id="sldr_sng2_artst"><?php echo $slide_song_2['m_artist'] ?></div>
<div hidden id="sldr_sng2_sng">Admin/songs/<?php echo $slide_song_2['m_song'] ?></div>
<!--top song 3-->
<div hidden id="sldr_sng3_img">Admin/dataimg/<?php echo $slide_song_3['m_img'] ?></div>
<div hidden id="sldr_sng3_ttl"><?php echo $slide_song_3['m_title'] ?></div>
<div hidden id="sldr_sng3_artst"><?php echo $slide_song_3['m_artist'] ?></div>
<div hidden id="sldr_sng3_sng">Admin/songs/<?php echo $slide_song_3['m_song'] ?></div>

<div class="slidebar_header" style="text-align:center;">Letest Songs</div>
<div class="slider_div_1">
<div class="nav_left" onclick="slide_song_prev()"><img class="nav_left_icon" src="img/index/icons/left.png"></div>
<img class="slider1" onclick="slide_song_play()" id="top_song_img" src="Admin/dataimg/<?php echo $slide_song_1['m_img'] ?>">
<div class="nav_right" onclick="slide_song_next()"><img class="nav_right_icon" src="img/index/icons/right.png"></div>
</div>
<h1 style="text-align:center" id="top_song_ttl"><?php echo $slide_song_1['m_title'] ?></h1>
<h2 style="text-align:center" id="top_song_artst"><?php echo $slide_song_1['m_artist'] ?></h2>
<div style="margin: 0 auto; display: table;">
	<audio controls id="top_song_play">
	  <source src="Admin/songs/<?php echo $slide_song_1['m_song'] ?>" type="audio/mpeg">
	</audio>
</div>
<script type="text/javascript">
var flg=1;
function slide_song_next(){
	if(flg==1)
	{
		var song_get=document.getElementById("sldr_sng2_sng").innerHTML;
		var ttl_get=document.getElementById("sldr_sng2_ttl").innerHTML;
		var artst_get=document.getElementById("sldr_sng2_artst").innerHTML;
		var img_get=document.getElementById("sldr_sng2_img").innerHTML;
		var song_set=document.getElementById("top_song_play");
		var ttl_set=document.getElementById("top_song_ttl");
		var artst_set=document.getElementById("top_song_artst");
		var img_set=document.getElementById("top_song_img");
		song_set.src=song_get;
		img_set.src=img_get;
		ttl_set.innerHTML=ttl_get;
		artst_set.innerHTML=artst_get;
		flg=2;
	}
	else if(flg==2)
	{
		var song_get=document.getElementById("sldr_sng3_sng").innerHTML;
		var ttl_get=document.getElementById("sldr_sng3_ttl").innerHTML;
		var artst_get=document.getElementById("sldr_sng3_artst").innerHTML;
		var img_get=document.getElementById("sldr_sng3_img").innerHTML;
		var song_set=document.getElementById("top_song_play");
		var ttl_set=document.getElementById("top_song_ttl");
		var artst_set=document.getElementById("top_song_artst");
		var img_set=document.getElementById("top_song_img");
		song_set.src=song_get;
		img_set.src=img_get;
		ttl_set.innerHTML=ttl_get;
		artst_set.innerHTML=artst_get;
		flg=3;
	}
}

function slide_song_prev(){
	if(flg==3)
	{
		var song_get=document.getElementById("sldr_sng2_sng").innerHTML;
		var ttl_get=document.getElementById("sldr_sng2_ttl").innerHTML;
		var artst_get=document.getElementById("sldr_sng2_artst").innerHTML;
		var img_get=document.getElementById("sldr_sng2_img").innerHTML;
		var song_set=document.getElementById("top_song_play");
		var ttl_set=document.getElementById("top_song_ttl");
		var artst_set=document.getElementById("top_song_artst");
		var img_set=document.getElementById("top_song_img");
		song_set.src=song_get;
		img_set.src=img_get;
		ttl_set.innerHTML=ttl_get;
		artst_set.innerHTML=artst_get;
		flg=2;
		
	}
	else if(flg==2)
	{
		var song_get=document.getElementById("sldr_sng1_sng").innerHTML;
		var ttl_get=document.getElementById("sldr_sng1_ttl").innerHTML;
		var artst_get=document.getElementById("sldr_sng1_artst").innerHTML;
		var img_get=document.getElementById("sldr_sng1_img").innerHTML;
		var song_set=document.getElementById("top_song_play");
		var ttl_set=document.getElementById("top_song_ttl");
		var artst_set=document.getElementById("top_song_artst");
		var img_set=document.getElementById("top_song_img");
		song_set.src=song_get;
		img_set.src=img_get;
		ttl_set.innerHTML=ttl_get;
		artst_set.innerHTML=artst_get;
		flg=1;
	}
}

slide_song_play()
{
	if(flg==1)
	{
		var sn=document.getElementById("top_song_play");
		sn.play();
	}
	else if(flg==2)
	{
		var sn=document.getElementById("top_song_play");
		sn.play();
	}
	else if(flg==3)
	{
		var sn=document.getElementById("top_song_play");
		sn.play();
	}
}
</script>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>


        <h1 style="font-size:20px"align="center">Copyright © 2019 All rights reserved </h1>
        <p align="center"> <a href="https://www.facebook.com/"><img src="img/index/icons/fb.png" width="32px" height="32px" style="padding: 1px"></a>
         <a href="https://www.messenger.com/"><img src="img/index/icons/msg.png" width="32px" height="32px" style="padding: 1px"></a>
         <a href="https://www.whatsapp.com/"><img src="img/index/icons/wapp.jpg" width="32px" height="32px" style="padding: 1px"></a>

    </footer>
    <li><a style="none" href="log_in.php"><h1 style="text-align:center">ADMIN LOGIN</a></h1></li>
</body>
</html>




