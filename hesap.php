
<?php

$hesaplar=$db->prepare("select * from hesaplar where nakit=?");
$hesaplar->execute(array(1));
$hesaplar->fetchALL(PDO::FETCH_ASSOC);
$hesap = $hesaplar->rowCount();

$hesaplar2=$db->prepare("select * from hesaplar where nakit=?");
$hesaplar2->execute(array(0));
$hesaplar2->fetchALL(PDO::FETCH_ASSOC);
$hesap2 = $hesaplar2->rowCount();

$nakitler = $db->prepare("select SUM(miktar) AS toplamMiktar FROM hesaplar where nakit=? AND parabirimi_id=?");
$nakitler->execute(array(1,1));
$nakit_tl = $nakitler->fetch(PDO::FETCH_ASSOC);

$nakitler3 = $db->prepare("select SUM(miktar) AS toplamMiktar FROM hesaplar where nakit=? AND parabirimi_id=?");
$nakitler3->execute(array(1,2));
$nakit_usd = $nakitler3->fetch(PDO::FETCH_ASSOC);

$nakitler2 = $db->prepare("select SUM(miktar) AS toplamMiktar FROM hesaplar where nakit=? AND parabirimi_id=?");
$nakitler2->execute(array(0,1));
$nakit2_tl = $nakitler2->fetch(PDO::FETCH_ASSOC);

$nakitler4 = $db->prepare("select SUM(miktar) AS toplamMiktar FROM hesaplar where nakit=? AND parabirimi_id=?");
$nakitler4->execute(array(0,2));
$nakit2_usd = $nakitler4->fetch(PDO::FETCH_ASSOC);

$giderler = $db->prepare("select SUM(gider_miktar) AS toplamMiktar FROM giderler where gider_parabirimi_id=? and gider_turu=?");
$giderler->execute(array(1,1));
$gider_nakit = $giderler->fetch(PDO::FETCH_ASSOC);

$giderler = $db->prepare("select SUM(gider_miktar) AS toplamMiktar FROM giderler where gider_parabirimi_id=? and gider_turu=?");
$giderler->execute(array(1,1));
$gider_tl_nakit = $giderler->fetch(PDO::FETCH_ASSOC);

$giderler3 = $db->prepare("select SUM(gider_miktar) AS toplamMiktar FROM giderler where gider_parabirimi_id=? and gider_turu=?");
$giderler3->execute(array(2,1));
$gider_usd_nakit = $giderler3->fetch(PDO::FETCH_ASSOC);


$giderler2 = $db->prepare("select SUM(gider_miktar) AS toplamMiktar FROM giderler where gider_parabirimi_id=? and gider_turu=?");
$giderler2->execute(array(1,0));
$gider_tl_kredi = $giderler2->fetch(PDO::FETCH_ASSOC);

$giderler4 = $db->prepare("select SUM(gider_miktar) AS toplamMiktar FROM giderler where gider_parabirimi_id=? and gider_turu=?");
$giderler4->execute(array(2,0));
$gider_usd_kredi = $giderler4->fetch(PDO::FETCH_ASSOC);


$gelirler = $db->prepare("select SUM(gelir_miktar) AS toplamMiktar FROM gelirler where gelir_parabirimi_id=? and gelir_turu=?");
$gelirler->execute(array(1,1));
$gelirler_tl_nakit = $gelirler->fetch(PDO::FETCH_ASSOC);

$gelirler3 = $db->prepare("select SUM(gelir_miktar) AS toplamMiktar FROM gelirler where gelir_parabirimi_id=? and gelir_turu=?");
$gelirler3->execute(array(2,1));
$gelirler_usd_nakit = $gelirler3->fetch(PDO::FETCH_ASSOC);


$gelirler2 = $db->prepare("select SUM(gelir_miktar) AS toplamMiktar FROM gelirler where gelir_parabirimi_id=? and gelir_turu=?");
$gelirler2->execute(array(1,0));
$gelirler_tl_kredi = $gelirler2->fetch(PDO::FETCH_ASSOC);

$gelirler4 = $db->prepare("select SUM(gelir_miktar) AS toplamMiktar FROM gelirler where gelir_parabirimi_id=? and gelir_turu=?");
$gelirler4->execute(array(2,0));
$gelirler_usd_kredi = $gelirler4->fetch(PDO::FETCH_ASSOC);




?>
<?php
 if($_POST){
		
         $hesapadi = $_POST["hesapadi"];
         $miktar =  $_POST["miktar"];
         $parabirimi = $_POST["parabirimi"];
         $nakit = $_POST["nakit"];
		 
		 if(!$hesapadi || !$miktar){
			 
			 
			 echo '<div class="hata">Lütfen Tüm Alanları Doldurun</div>';
			 
		 }else {
			 
			 $v = $db->prepare("select * from hesaplar where hesap_adi=?");
			 $v->execute(array($hesapadi));
			$x = $v->fetch(PDO::FETCH_ASSOC);
			$z = $v->rowCount();
			 
			 if($z){
				 
				 echo '<div class="hata"> Bu Hesap Daha Önce Açılmış.../div>';
				 
			 }else {
				 
				
              $x = $db->prepare("insert into hesaplar set 
			             
						 hesap_adi=?,
						 miktar=?,
						 parabirimi_id=?,
						 nakit=?
						 
			  ");				
				
            $kayit = $x->execute(array($hesapadi,$miktar,$parabirimi,$nakit));				
				
              if($kayit){
				  
				  
				  echo '<div style="border:1px solid #ddd; padding:10px; font-size:25px; background:lightgreen;">Hesap Eklendi Lütfen Bekleyin </div>';
				  header("refresh: 2; url=anasayfa.php");
				  
			  }else {
				  
				  echo'<div class="hata">Hata Oluştu Tekrar Deneyin.</div>';
				  
			  }
				
			 }
			 
		 }
		  
		  
	  }else {
		?>


<div style="margin-top:10px;">
<h2>Hesap Ekleme Formu</h2>
  <form action="" method="post">
    <label for="fname">Hesap Adı</label>
    <input type="text" id="fname" name="hesapadi" placeholder="Hesap Adı Giriniz">

    <label for="lname">Hesap Miktarı</label>
    <input type="text" id="lname" name="miktar" placeholder="Para Miktarı Giriniz">

    <label for="parabirimi">Para Birimi</label>
    <select id="parabirimi" name="parabirimi">
    <?php
	$v = $db->prepare("select * from parabirimi");
	$v->execute(array());
	$x = $v->fetchALL(PDO::FETCH_ASSOC);
	
	foreach($x as $m){
		echo '<option value="'.$m["parabirimi_id"].'">'.$m["parabirimi"].'</option>';
		
		
	}
	
	?>
    </select>
	<input type="radio" id="age1" name="nakit" value="1"> <label for="age1">Nakit</label><span style="margin-left:30px;"><input type="radio" id="age1" name="nakit" value="0">
  <label for="age1">Kart</label><br></span>
 
  
    <input style="margin-top:30px;" type="submit" value="Hesabı Ekle">
  </form>
  <?php
	  }
  ?>
  <div class="hesap" style="float:left; border:1px solid #ddd; width:200px; padding:5px; margin-left:85px; height:230px; background: skyblue;">
		<h3 style="border:1px sloid #ddd; padding:5px; background:#eee; font-size:17px">Nakit Hesaplar</h3>
		<p style="padding:2px;"><b>Toplam Hesap :</b> <span class="badge badge-primary text-wrap" style="font-size:17px"><?php echo $hesap; ?></span>
		<p style="padding:2px;"><b>TL :</b> <span class="badge badge-primary text-wrap" style="font-size:17px"><?php echo $nakit_tl['toplamMiktar']-$gider_tl_nakit['toplamMiktar']+$gelirler_tl_nakit['toplamMiktar']; ?></span>
		<p style="padding:2px;"><b>USD :</b> <span class="badge badge-primary text-wrap" style="font-size:17px"><?php echo $nakit_usd['toplamMiktar']-$gider_usd_nakit['toplamMiktar']+$gelirler_usd_nakit['toplamMiktar']; ?></span>
		<a href="?do=nakit_duzenle" ><button class="btn btn-warning">Düzenle</button></a><span><a href="?do=nakit_duzenle"><button class="btn btn-warning">Sil</button></a></span>
		</p>
  
</div>

  <div class="hesap" style="float:left;
	border:1px solid #ddd;
	width:200px; padding:5px;
	margin:5px; height:230px;
	background:skyblue;">
		<h3 style="border:1px sloid #ddd; padding:5px; background:#eee; font-size:17px">Kredi Hesapları</h3>
		<p style="padding:2px;"><b>Toplam Hesap :</b> <span class="badge badge-primary text-wrap" style="font-size:17px"><?php echo $hesap2; ?></span>
		<p style="padding:2px;"><b>TL :</b> <span class="badge badge-primary text-wrap" style="font-size:17px"><?php echo $nakit2_tl['toplamMiktar']-$gider_tl_kredi['toplamMiktar']+$gelirler_tl_kredi['toplamMiktar']; ?></span>
		<p style="padding:2px;"><b>USD :</b> <span class="badge badge-primary text-wrap" style="font-size:17px"><?php echo $nakit2_usd['toplamMiktar']-$gider_usd_kredi['toplamMiktar']+$gelirler_usd_kredi['toplamMiktar']; ?></span>
		<a href="?do=nakit_duzenle" ><button class="btn btn-warning">Düzenle</button></a><span><a href="?do=nakit_duzenle" ><button class="btn btn-warning">Sil</button></a></span>
		
		</p>
  
</div>

<div class="hesap" style="float:left; border:1px solid #ddd; width:200px; padding:15px; margin:5px; height:230px; background: skyblue;">
		<h3 style="border:1px sloid #ddd; padding:5px; background:#eee; font-size:17px">Para Transferi</h3>
		<a href="?do=para_transferi_nakit" ><button class="btn btn-warning">Nakitten > Karta Transfer Yap</button></a>
		<a href="?do=para_transferi_kart" ><button class="btn btn-warning">Karttan > Nakite Transfer Yap</button></a>
		</p>
  
</div>


</div>
