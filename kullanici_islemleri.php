<?php 
$v = $db->prepare("select * from kullanici order by id desc");
$v->execute(array());
$k = $v->fetchALL(PDO::FETCH_ASSOC);
$x = $v->rowCount();


$giderler = $db->prepare("select SUM(gider_miktar) AS toplamMiktar FROM giderler");
$giderler->execute(array(1,1));
$gider_toplam = $giderler->fetch(PDO::FETCH_ASSOC);

$gelirler = $db->prepare("select SUM(gelir_miktar) AS toplamMiktar FROM gelirler");
$gelirler->execute(array(1,1));
$gelir_toplam = $gelirler->fetch(PDO::FETCH_ASSOC);

?>
 <div class="main" style="float:left;
	border:1px solid #ddd;
	width:300px; padding:5px;
	margin-left:125px; height:230px;
	background:#820707 ;">
		<h3 style="border:1px sloid #ddd; padding:5px; background:#eee; font-size:17px;">Gider Ekle</h3>
		<p style="padding:2px; color:white;"><b>Toplam Gider :</b> <span class="badge badge-primary text-wrap" style="font-size:17px"><?php echo $gider_toplam["toplamMiktar"]; ?></span>

		<a href="?do=gider_ekle" ><button style="margin-top:55px;" class="btn btn-warning">Ekle</button></a>
		</p>
  
</div>

<div class="main" style="float:left;
	border:1px solid #ddd;
	width:300px; padding:5px;
	margin-left:35px; height:230px;
	background:#E9FF4C ;">
		<h3 style="border:1px sloid #ddd; padding:5px; background:#eee; font-size:17px">Gelir Ekle</h3>
		<p style="padding:2px;"><b>Toplam Gelir :</b> <span class="badge badge-primary text-wrap" style="font-size:17px"><?php echo $gelir_toplam["toplamMiktar"]; ?></span>

		<a href="?do=gelir_ekle" ><button style="margin-top:55px;" class="btn btn-warning">Ekle</button></a>
		</p>
  
</div>

<div class="hesap" style="border:1px
		solid #ddd; width:100%; background:white; margin-left:15px; margin-top:55px;">
		<h2 style="border:1px solid #ddd; padding:10px; margin:2px; font-size:20px; background:#eee;">
		Kullanıcı Düzenle</h2>
		<div class="" style="" >
		<table cellspacing="0" cellpadding="3">
		<thead>
		<tr style="border:1px solid #ddd; padding:10px;">
		<th width="600">Kullanıcı Adı</th>
		<th width="600">Kullanıcı IP</th>
		<th width="600"><span style="margin-left:60px;">İşlemler</span></th>
		</tr>
		</thead>
		<?php
		 if($x){
			 
			 foreach($k as $m){
				 
				 ?>
				 <tbody>
				 <tr>
				 <td style="border: 1px solid #ddd; padding:10px; text-align: center; "><?php echo $m["kullanici_adi"]; ?></td>  
				 <td style="border: 1px solid #ddd; padding:10px;"><?php echo $m["kullanici_ip"]; ?></td>
				 <td style="border: 1px solid #ddd;  padding:10px;"><span style="margin-left:30px;"><a type="button" class="btn btn-warning" href="?do=kullanici_duzenle&id=<?php echo $m["id"]; ?>">Düzenle</a></span>  <span><a type="button" class="btn btn-danger" href="?do=kullanici_sil&id=<?php echo $m["id"]; ?>">Sil</a></span></td>
				 </tr>
				 
				 </tbody>
				 
				 
				 <?php
			 }
			 
			 
			 
		 }else{
			 
			 echo '<tr><td colspan="5p"><div class="alert alert-secondary" role="alert">Hiç Hesap Yok..</div></td></tr>';
		 }
		
		?>
		</table>
		<p class="alert alert-danger" style="width:30%; height:50%;">UYARI!!</p>
		<p style="border: 1px solid #ddd; padding:10px;">Eğer Tüm Kullanıcıları Silerseniz Veri Tabanına Ulaşın.</p>
		</div>
		
		</div>