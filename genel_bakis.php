<?php

$giderler = $db->prepare("select SUM(gider_miktar) AS toplamMiktar FROM giderler where gider_parabirimi_id=?");
$giderler->execute(array(1));
$giderler_tl = $giderler->fetch(PDO::FETCH_ASSOC);

$giderler2 = $db->prepare("select SUM(gider_miktar) AS toplamMiktar FROM giderler where gider_parabirimi_id=?");
$giderler2->execute(array(2));
$giderler_usd = $giderler2->fetch(PDO::FETCH_ASSOC);

$gelirler = $db->prepare("select SUM(gelir_miktar) AS toplamMiktar FROM gelirler where gelir_parabirimi_id=?");
$gelirler->execute(array(1));
$gelirler_tl = $gelirler->fetch(PDO::FETCH_ASSOC);

$gelirler2 = $db->prepare("select SUM(gelir_miktar) AS toplamMiktar FROM gelirler where gelir_parabirimi_id=?");
$gelirler2->execute(array(2));
$gelirler_usd = $gelirler2->fetch(PDO::FETCH_ASSOC);


$today = date("Y-m-d");
$v=$db->prepare("select * from giderler where gider_tarih<=?");
$v->execute(array($today));
$k = $v->fetchALL(PDO::FETCH_ASSOC);
$x = $v->rowCount();

?>


  <div class="main" style="float:left;
	border:1px solid #ddd;
	width:400px; padding:5px;
	margin:5px; height:530px;
	background:#BB72CA ;">
		<h3 style="text-align:center; border:1px sloid #ddd; padding:5px; background:#FFEE9F; font-size:17px"><b>GİDERLER</b></h3>
		<p style="padding:2px; font-size:20px;"><b>TL :</b> <span class="badge badge-primary text-wrap" style="background:#980000; font-size:20px"><?php echo $giderler_tl["toplamMiktar"]; ?></span>
		
		<p style="padding:2px; font-size:20px;"><b>USD :</b> <span class="badge badge-primary text-wrap" style="background:#0A8D2E; font-size:20px"><?php echo  $giderler_usd["toplamMiktar"]; ?></p></span>
		<h3 style="text-align:center; border:1px sloid #ddd; padding:5px; background:#FFEE9F; font-size:17px"><b>Bugüne Ait Giderler</b></h3>
		 <table style="border:1px solid #ddd;">
		 
				 <tr><th>Gider Adı</th>
				 <th>Gider Yeri</th>
				 <th>Gider Miktarı</th>
				 </tr>
		
		<?php
		 if($x){
			 
			 foreach($k as $m){
				?>
				
				 <tr>
				  <td><input type="text" readonly value="<?php echo $m["gider_adi"]; ?>" ></input></td>
				 <td><input type="text" readonly value="<?php echo $m["gider_yeri"]; ?>"></input></td>
				<td><input type="text" readonly value="<?php echo $m["gider_miktar"]; ?>"></input></td>
				 </tr>

				
				
				 
<?php			
			}
			 
		 }
		?>
		
   </table>
			 
			 
</div>

  <div class="hesap" style="float:left;
	border:1px solid #ddd;
	width:400px; padding:5px;
	margin-left:35px; height:430px;
	background:#E06D00;">
		<h3 style=" text-align:center; border:1px sloid #ddd; padding:5px; background:#FFEE9F; font-size:17px"><b>GELİRLER</b></h3>
		<p style="padding:2px; font-size:23px;"><b>TL :</b> <span class="badge badge-primary text-wrap" style="background:#980000; font-size:38px"><?php echo $gelirler_tl["toplamMiktar"]; ?></span>
		<p style="padding:2px; font-size:23px;"><b>USD :</b> <span class="badge badge-primary text-wrap" style="background:#0A8D2E; font-size:38px"><?php echo  $gelirler_usd["toplamMiktar"]; ?>  </span>
		
		
		</p>
  
</div>