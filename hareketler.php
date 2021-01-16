<?php 
$v = $db->prepare("select * from giderler inner join parabirimi on parabirimi.parabirimi_id= 
giderler.gider_parabirimi_id order by gider_id desc");

$v->execute(array());
$k = $v->fetchALL(PDO::FETCH_ASSOC);
$x = $v->rowCount();

?>


<div class="main" style="border:1px
		solid #ddd; width:100%; background:green; margin-left:15px;">
		<h2 style="border:1px solid #ddd; padding:10px; margin:2px; font-size:20px; background:#eee;">
		Hesap Hareketleri</h2>
		<div class="" style="" >
		<table cellspacing="0" cellpadding="3" style="text-align:center;">
		<thead>
		<tr style="border:1px solid #ddd; padding:10px;">
		<th width="600">Gider Adı</th><th width="500">Para Birimi</th>
		<th width="200">Nakit-Kredi</th><th width="200">Miktar</th>
		<th width="200">Yer</th>
		<th width="600">Tarih</th>
		
		</tr>
		</thead>
		<?php
		 if($x){
			 
			 foreach($k as $m){
				 
				 ?>
				 <tbody>
				 <tr>
				 <td style="border: 1px solid #ddd; padding:10px; text-align: center; "><?php echo $m["gider_adi"]; ?></td> <td style="border: 1px solid #ddd; padding:10px; "><?php echo $m["parabirimi"]; ?></td> 
				 <td style="border: 1px solid #ddd; padding:15px;">
				 <?php
					if($m["gider_turu"]==1){
						
						echo '<div>
  <span style="font-size:15px;" class="badge badge-pill badge-success">Nakit</span>
</div>';
						
			 }else{
				 
				 
				 echo '<div>
  <span style="font-size:15px;" class="badge badge-pill badge-warning">Kredi</span>
</div>';
			 }

				 ?>
				      </td>
					   <td style="border: 1px solid #ddd; padding:10px;"><?php echo $m["gider_miktar"];?></td>
					   <td style="border: 1px solid #ddd; padding:10px;"><?php echo $m["gider_yeri"];?></td>
				 <td style="border: 1px solid #ddd; padding:10px;"><?php echo $m["gider_tarih"];?></td>
				
				 </tr>
				 
				 </tbody>
				 
				 
				 <?php
			 }
			 
			 
			 
		 }else{
			 
			 echo '<tr><td colspan="5p"><div class="alert alert-secondary" role="alert">Hiç Hesap Yok..</div></td></tr>';
		 }
		
		?>
		</table>
		</div>
		</div>