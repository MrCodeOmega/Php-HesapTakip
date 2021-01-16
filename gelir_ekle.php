<?php
 if($_POST){
		
         $gelir_adi = $_POST["gelir_adi"];
         $miktar =  $_POST["miktar"];
         $parabirimi = $_POST["parabirimi"];
         $nakit = $_POST["nakit"];
		 
		 if(!$gelir_adi || !$miktar){
			 
			 
			 echo '<div class="hata">Lütfen Tüm Alanları Doldurun</div>';
			 
		 }else {
			 
			 $v = $db->prepare("select * from gelirler where gelir_adi=?");
			 $v->execute(array($gider_adi));
			$x = $v->fetch(PDO::FETCH_ASSOC);
			$z = $v->rowCount();
			 
			
				 
				
              $x = $db->prepare("insert into gelirler set 
			             
						 gelir_adi=?,
						 gelir_miktar=?,
						 gelir_parabirimi_id=?,
						 gelir_turu=?
						 
						 
			  ");				
				
            $kayit = $x->execute(array($gelir_adi,$miktar,$parabirimi,$nakit));				
				
              if($kayit){
				  
				  
				  echo '<div style="border:1px solid #ddd; padding:10px; font-size:25px; background:lightgreen;">Gelir Eklendi Lütfen Bekleyin </div>';
				  header("refresh: 2; url=?do=kullanici_islemleri");
				  
			  }else {
				  
				  echo'<div class="hata">Hata Oluştu Tekrar Deneyin.</div>';
				  
			  }
				
			 
			 
		 }
		  
		  
	  }else {
		?>


<div style="margin-top:10px;">
<h2>Gelir Ekleme Formu</h2>
  <form action="" method="post">
    <label for="fname">Gelir Adı</label>
    <input type="text" id="fname" name="gelir_adi" placeholder="Gelir Adı Giriniz">

    <label for="lname">Gelir Miktarı</label>
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
 
  
    <input style="margin-top:30px;" type="submit" value="Gelir Ekle">
  </form>
  <?php
	  }
  ?>