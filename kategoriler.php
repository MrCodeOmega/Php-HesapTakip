  <?php 

$nakitler = $db->prepare("select SUM(gider_miktar) AS toplamMiktar FROM giderler where gider_kategori_id=? AND gider_parabirimi_id=?");
$nakitler->execute(array(1,1));
$petrol_tl = $nakitler->fetch(PDO::FETCH_ASSOC);

$nakitler2 = $db->prepare("select SUM(gider_miktar) AS toplamMiktar FROM giderler where gider_kategori_id=? AND gider_parabirimi_id=?");
$nakitler2->execute(array(1,2));
$petrol_usd = $nakitler2->fetch(PDO::FETCH_ASSOC);

$nakitler3 = $db->prepare("select SUM(gider_miktar) AS toplamMiktar FROM giderler where gider_kategori_id=? AND gider_parabirimi_id=?");
$nakitler3->execute(array(2,1));
$market_tl = $nakitler3->fetch(PDO::FETCH_ASSOC);

$nakitler2 = $db->prepare("select SUM(gider_miktar) AS toplamMiktar FROM giderler where gider_kategori_id=? AND gider_parabirimi_id=?");
$nakitler2->execute(array(2,2));
$market_usd = $nakitler2->fetch(PDO::FETCH_ASSOC);

$nakitler4 = $db->prepare("select SUM(gider_miktar) AS toplamMiktar FROM giderler where gider_kategori_id=? AND gider_parabirimi_id=?");
$nakitler4->execute(array(4,1));
$ulasim_tl = $nakitler4->fetch(PDO::FETCH_ASSOC);

$nakitler5 = $db->prepare("select SUM(gider_miktar) AS toplamMiktar FROM giderler where gider_kategori_id=? AND gider_parabirimi_id=?");
$nakitler5->execute(array(4,2));
$ulasim_usd = $nakitler5->fetch(PDO::FETCH_ASSOC);

$nakitler6 = $db->prepare("select SUM(gider_miktar) AS toplamMiktar FROM giderler where gider_kategori_id=? AND gider_parabirimi_id=?");
$nakitler6->execute(array(3,1));
$saglik_tl = $nakitler6->fetch(PDO::FETCH_ASSOC);

$nakitler7 = $db->prepare("select SUM(gider_miktar) AS toplamMiktar FROM giderler where gider_kategori_id=? AND gider_parabirimi_id=?");
$nakitler7->execute(array(3,2));
$saglik_usd = $nakitler7->fetch(PDO::FETCH_ASSOC);

$nakitler8 = $db->prepare("select SUM(gider_miktar) AS toplamMiktar FROM giderler where gider_kategori_id=? AND gider_parabirimi_id=?");
$nakitler8->execute(array(5,1));
$restoran_tl = $nakitler8->fetch(PDO::FETCH_ASSOC);

$nakitler9 = $db->prepare("select SUM(gider_miktar) AS toplamMiktar FROM giderler where gider_kategori_id=? AND gider_parabirimi_id=?");
$nakitler9->execute(array(5,2));
$restoran_usd = $nakitler9->fetch(PDO::FETCH_ASSOC);



?>
  
  <h2 style="border:1px solid #ddd; padding:10px; margin:2px; font-size:20px; background:#eee;">
		Kategoriler</h2>
		
<div style="mergin-left:10px;">
  <div class="" style="float:left;  border-radius:50%;
	width:250px; padding:5px;
	margin:5px; height:230px;">
 
 <figure class="story_shape">
    <img src="tema//saglik.png" alt="" class="story_img">
    <figcaption class="story_caption2"><b>Sağlık</b></figcaption>
	 <figcaption style="background:#09BFA6; color:white; width:125px;" class="story_caption"><b>Tl : <?php echo $saglik_tl["toplamMiktar"]; ?></b></figcaption>
	<figcaption style="background:#09BFA6; color:white; width:125px;" class="story_caption3"><b>USD : <?php echo $saglik_usd["toplamMiktar"]; ?></b></figcaption>
</figure>

</div>


  <div class="" style="float:left;
  border-radius:50%;
	width:250px; padding:5px;
	margin:5px; height:230px;">
 
 <figure class="story_shape">
    <img src="tema//market.png" alt="" class="story_img">
    <figcaption style="" class="story_caption2"><b>Market</b></figcaption>
	<figcaption style="background:#09BFA6; color:white; width:125px;" class="story_caption"><b>Tl : <?php echo $market_tl["toplamMiktar"]; ?></b></figcaption>
	<figcaption style="background:#09BFA6; color:white; width:125px;" class="story_caption3"><b>USD : <?php echo $market_usd["toplamMiktar"]; ?></b></figcaption>
</figure>
</div>



  <div class="" style="float:left;
  border-radius:50%;
	width:250px; padding:5px;
	margin:5px; height:230px;">
 
 <figure class="story_shape">
    <img src="tema//ulasim.png" alt="" class="story_img">
    <figcaption class="story_caption2"><b>Ulaşım</b></figcaption>
	<figcaption style="background:#09BFA6; color:white; width:125px;" class="story_caption"><b>Tl : <?php echo $ulasim_tl["toplamMiktar"]; ?></b></figcaption>
	<figcaption style="background:#09BFA6; color:white; width:125px;" class="story_caption3"><b>USD : <?php echo $ulasim_usd["toplamMiktar"]; ?></b></figcaption>
</figure>
</div>



  <div class="" style="float:left;
  border-radius:50%;
	width:250px; padding:5px;
	margin:5px; height:230px;">
 
 <figure class="story_shape">
    <img src="tema//petrol.jpg" alt="" class="story_img">
    <figcaption class="story_caption2"><b>Petrol</b></figcaption>
	<figcaption style="background:#09BFA6; color:white; width:125px;" class="story_caption"><b>Tl : <?php echo $petrol_tl["toplamMiktar"]; ?></b></figcaption>
	<figcaption style="background:#09BFA6; color:white; width:125px;" class="story_caption3"><b>USD : <?php echo $petrol_usd["toplamMiktar"]; ?></b></figcaption>
</figure>
</div>
  <div class="" style="float:left;
  border-radius:50%;
	width:250px; padding:5px;
	margin:5px; height:230px;">
 
 <figure class="story_shape">
    <img src="tema//restoran.png" alt="" class="story_img">
    <figcaption style="background:black; color:white;" class="story_caption2"><b>Restoran</b></figcaption>
	<figcaption style="background:#09BFA6; color:white; width:125px;" class="story_caption"><b>Tl : <?php echo $restoran_tl["toplamMiktar"]; ?></b></figcaption>
	<figcaption style="background:#09BFA6; color:white; width:125px;" class="story_caption3"><b>USD : <?php echo $restoran_usd["toplamMiktar"]; ?></b></figcaption>
</figure>
</div>


</div>