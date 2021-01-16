<?php 
$v = $db->prepare("select * from hesaplar inner join parabirimi on parabirimi.parabirimi_id= 
hesaplar.parabirimi_id order by hesap_id desc");

$v->execute(array());
$k = $v->fetchALL(PDO::FETCH_ASSOC);
$x = $v->rowCount();

?>


<div class="main" style="border:1px
		solid #ddd; width:100%; background:white; margin-left:15px;">
		<h2 style="border:1px solid #ddd; padding:10px; margin:2px; font-size:20px; background:#eee;">
		Hesap Düzenle</h2>
		<div class="" style="" >
		<table cellspacing="0" cellpadding="3">
		<thead>
		<tr style="border:1px solid #ddd; padding:10px;">
		<th width="600">Hesap Adı</th><th width="500">Para Birimi</th>
		<th width="200">Nakit-Kredi</th><th width="200">Miktar</th><th width="600">Tarih</th>
		<th width="600"><span style="margin-left:60px;">İşlemler</span></th>
		</tr>
		</thead>
		<?php
		 if($x){
			 
			 foreach($k as $m){
				 
				 ?>
				 <tbody>
				 <tr>
				 <td style="border: 1px solid #ddd; padding:10px; text-align: center; "><?php echo $m["hesap_adi"]; ?></td> <td style="border: 1px solid #ddd; padding:10px; "><?php echo $m["parabirimi"]; ?></td> 
				 <td style="border: 1px solid #ddd; padding:15px;">
				 <?php
					if($m["nakit"]==1){
						
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
					   <td style="border: 1px solid #ddd; padding:10px;"><?php echo $m["miktar"];?></td>
				 <td style="border: 1px solid #ddd; padding:10px;"><?php echo $m["hesap_tarih"];?></td>
				 <td style="border: 1px solid #ddd;  padding:10px;"><span style="margin-left:30px;"><a type="button" class="btn btn-warning" href="?do=hesap_duzenle&id=<?php echo $m["hesap_id"]; ?>">Düzenle</a></span>  <span><a type="button" class="btn btn-danger" href="?do=hesap_sil&id=<?php echo $m["hesap_id"]; ?>">Sil</a></span></td>
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