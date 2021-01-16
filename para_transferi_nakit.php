<?php
 if($_POST){
		
         $gider_adi = $_POST["gider_adi"];
         $miktar =  $_POST["miktar"];
         $gider_parabirimi_id = $_POST["gider_parabirimi_id"];
         $gider_turu = $_POST["gider_turu"];
		 
		 if(!$miktar){
			 
			 
			 echo '<div class="hata">Lütfen Tüm Alanları Doldurun</div>';
			 
		 }else {
			 
			 $v = $db->prepare("select * from giderler where gider_adi=?");
			 $v->execute(array($gider_adi));
			$x = $v->fetch(PDO::FETCH_ASSOC);
			$z = $v->rowCount();
			 
			
				 
				
              $x = $db->prepare("insert into giderler set 
			             
						 gider_adi=?,
						 gider_miktar=?,
						 gider_parabirimi_id=?,
						 gider_turu=?
						 
			  ");				
				
            $kayit = $x->execute(array($gider_adi,$miktar,$gider_parabirimi_id,$gider_turu));	

			$y = $db->prepare("insert into gelirler set 
			             
						 gelir_adi=?,
						 gelir_miktar=?,
						 gelir_parabirimi_id=?,
						 gelir_turu=?
						 
			  ");				
				
            $kayit2 = $y->execute(array($gider_adi,$miktar,$gider_parabirimi_id,0));				
				
              if($kayit || $kayit2){
				  
				  
				  echo '<div class="btn btn-success" style="margin-top:120px; border:1px solid #ddd; padding:10px; font-size:25px;">Transfer Başarılı Lütfen Bekleyin </div>';
				  header("refresh: 2; url=?do=hesap");
				  
			  }else {
				  
				  echo'<div class="hata">Hata Oluştu Tekrar Deneyin.</div>';
				  
			  }
				
			 
			 
		 }
		  
		  
	  }else {
		?>


<div style="margin-top:10px;">
<h2>Para Transferi İşlemi</h2>
  <form action="" method="post">
    <label for="fname">İşlem Türü</label>
    <input type="text" id="fname" name="gider_adi" placeholder="Hesap Adı Giriniz" value="Nakiten Karta Para Transferi" readonly="readonly">

    <label for="lname">Hesap Miktarı</label>
    <input type="text" id="lname" name="miktar" placeholder="Para Miktarı Giriniz">

    <label for="parabirimi">Para Birimi</label>
    <select id="parabirimi" name="gider_parabirimi_id">
    <?php
	$v = $db->prepare("select * from parabirimi");
	$v->execute(array());
	$x = $v->fetchALL(PDO::FETCH_ASSOC);
	
	foreach($x as $m){
		echo '<option value="'.$m["parabirimi_id"].'">'.$m["parabirimi"].'</option>';
		
		
	}
	
	?>
    </select>
	<input type="radio" id="age1" name="gider_turu" value="1" checked> <label for="age1">Nakit</label>
 
  
    <input style="margin-top:30px;" type="submit" value="Hesabı Ekle">
  </form>
  <?php
	  }
  ?>