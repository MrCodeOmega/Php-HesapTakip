<?php
 if($_POST){
		
         $gider_adi = $_POST["gider_adi"];
         $miktar =  $_POST["miktar"];
         $parabirimi = $_POST["parabirimi"];
         $nakit = $_POST["nakit"];
		 $kategori= $_POST["kategori"];
		 $gider_yeri= $_POST["gider_yeri"];
		 
		 if(!$gider_adi || !$miktar){
			 
			 
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
						 gider_turu=?,
						 gider_kategori_id=?,
						 gider_yeri=?
						 
			  ");				
				
            $kayit = $x->execute(array($gider_adi,$miktar,$parabirimi,$nakit,$kategori,$gider_yeri));				
				
              if($kayit){
				  
				  
				  echo '<div style="border:1px solid #ddd; padding:10px; font-size:25px; background:lightgreen;">Hesap Eklendi Lütfen Bekleyin </div>';
				  header("refresh: 2; url=?do=kullanici_islemleri");
				  
			  }else {
				  
				  echo'<div class="hata">Hata Oluştu Tekrar Deneyin.</div>';
				  
			  }
				
			 
			 
		 }
		  
		  
	  }else {
		?>


<div style="margin-top:10px;">
<h2>Gider Ekleme Formu</h2>
  <form action="" method="post">
    <label for="fname">Gider Adı</label>
    <input type="text" id="fname" name="gider_adi" placeholder="Gider Adı Giriniz">

    <label for="lname">Gider Miktarı</label>
    <input type="text" id="lname" name="miktar" placeholder="Para Miktarı Giriniz">
	 <label for="lname">Harcama Yapılan Yer</label>
    <input type="text" id="lname" name="gider_yeri" placeholder="Harcama Yeri Giriniz">

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
	
	
	 <label for="parabirimi">Gider Kategorisi</label>
    <select id="parabirimi" name="kategori">
    <?php
	$v = $db->prepare("select * from kategoriler");
	$v->execute(array());
	$x = $v->fetchALL(PDO::FETCH_ASSOC);
	
	foreach($x as $m){
		echo '<option value="'.$m["kategori_id"].'">'.$m["kategori_adi"].'</option>';
		
		
	}
	
	?>
    </select>
	<input type="radio" id="age1" name="nakit" value="1"> <label for="age1">Nakit</label><span style="margin-left:30px;"><input type="radio" id="age1" name="nakit" value="0">
  <label for="age1">Kart</label><br></span>
 
  
    <input style="margin-top:30px;" type="submit" value="Gideri Ekle">
  </form>
  <?php
	  }
  ?>