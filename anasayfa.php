<?php include("ayar.php");?>

<?php session_start();
ob_start();

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Hesap Takip Sistemi</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	 <link rel="stylesheet" type="text/css" href="css///style.css">
	 <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css" integrity="sha384-4ZPLezkTZTsojWFhpdFembdzFudphhoOzIunR1wH6g1WQDzCAiPvDyitaK67mp0+" crossorigin="anonymous">
	
</head>

<body>

<div class="sidenav">
  <a href="?do=hesap"><img style="width:25px; height:25px; background:white;" src="tema/hesap.png"/> Hesap İşlemleri</a>
  <a href="?do=hareketler"><img style="width:25px; height:25px; background:white;" src="tema/hareket.png"/> Hareketler</a>
  <a href="?do=genel_bakis"><img style="width:25px; height:25px; background:white;" src="tema/genel.png"/> Genel Bakış</a>
  <a href="?do=kategoriler"><img style="width:25px; height:25px; background:white;" src="tema/kategori.png"/> Kategoriler</a>
<a href="?do=kullanici_islemleri"><img style="width:25px; height:25px; background:white;" src="tema/kullanici.png"/> Kullanıcı İşlemleri</a>
	
</div>

<div class="main">


  
  <?php 
			$do = @$_GET["do"];
			if(file_exists("{$do}.php")){
				
				include("{$do}.php");
			}else{
				
				include("hareketler.php");
				
			}
		
		?>
   


</div>
</body>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>



</html>