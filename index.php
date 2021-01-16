<?php include("ayar.php");?>
<?php session_start();
ob_start();

?>

<?php 
 if($_POST){
	 
	 $name = $_POST["name"];
	 $sifre = $_POST["sifre"];
	 
    if(!$name)
	{
		
		echo '<div class="alert alert-warning" style="font-size:20px">Kullancı Adı ve Şifre Boş Bırakılamaz</div>';
	if(!$sifre)
	{
		echo '<div class="alert alert-warning" style="font-size:20px">Kullancı Adı ve Şifre Boş Bırakılamaz</div>';
		
	}	
		
	}else {
		
		$uye = $db->prepare("select * from kullanici where kullanici_adi=? and sifre=?");
		$uye->execute(array($name,$sifre));
		$z = $uye->fetch(PDO::FETCH_ASSOC);
		$x = $uye->rowCount();
		

		
		if($x){
			
			$_SESSION["uye"] = $z["kullanici_adi"];
			$_SESSION["id"] = $z["id"];
			
			header("location:anasayfa.php");
			
		}

		else{
			
			echo '<div class="alert alert-warning" style="font-size:20px; text-align: center; "> Kullanıcı Adı veya Şifre Hatalı..</div>';
			
		}
	}	
	
 }



?>






<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<style>

</style>
</head>
<body>

<h2 style="margin-left:44%;">Hesap Takip</h2>

<form action="/?do=anasayfa" method="post">
  <div class="imgcontainer">
    <img src="tema/hesap.jpg" style="width:200px; height:200px;" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Kullanıcı Adı</b></label>
    <input type="text" placeholder="Kullanıcı Adı Giriniz" name="name" required>

    <label for="psw"><b>Şifre</b></label>
    <input type="password" placeholder="Şifre Giriniz" name="sifre" required>
        
    <button type="submit">Giriş</button>
   
  </div>

 
</form>

 <?php 
   
 
?>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


</html>
