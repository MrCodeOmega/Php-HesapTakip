<?php

$id =$_GET["id"];


?>



<div class="" style="float:left; margin-left:20px; border:1px
		solid #ddd; width:75%; min-height:200px; background:white;">
		<h2 style="border:1px solid #ddd; padding:10px; margin:2px; font-size:20px; background:#eee;">
		Kullanıcı Sil</h2>
		<div class="konular">
		<?php
		
		$v = $db->prepare("delete from kullanici where id=?");
		$sil = $v->execute(array($id));
		if($sil){
			
			echo '<div class="alert alert-success">Kullanıcı Silindi..</div>';
			header("refresh:2; url=?do=hesap");
			
		}else{
			
			echo '<div class="alert alert-warning">Hata Oluştu..</div>';
			
		}
		?>
		
		</div>
		
		</div>