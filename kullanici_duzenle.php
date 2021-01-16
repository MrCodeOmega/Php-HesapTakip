<?php
$id= $_GET["id"];
$v = $db->prepare("select * from kullanici where id=?");
$v->execute(array($id));

$m=$v->fetch(PDO::FETCH_ASSOC);
?>

<div class="" style="float:left; margin-left:20px; border:1px
		solid #ddd; width:75%; min-height:200px; background:white;">
		<h2 style="border:1px solid #ddd; padding:10px; margin:2px; font-size:20px; background:#eee;">Kullanıcı Düzenle</h2>
		
		<?php
		
		if($_POST){
			$kullanici_adi= $_POST["kullanici_adi"];
			$sifre= $_POST["sifre"];

			if(!$kullanici_adi || !$sifre){
				
				echo '<div class="alert alert-warning">Tüm Alanları Giriniz...<div>';
			}else{
				
				$guncelle = $db->prepare("update kullanici set
				kullanici_adi =?,
				sifre =?,
				 where id =?
				");
				
				$update =$guncelle-> execute(array($kullanici_adi,$sifre,$id));
				
				if($update){
					
					echo '<div class="alert alert-success">Kullanıcı Güncellendi.  Bekleyiniz...</div>';
					header ("refresh: 2; url=?do=hesap");
				}else{
					
					echo '<div class="alert alert-danger">Düzenlemede Bir Hata Oluştu..</div>';
					
					
				}
				
			}
			
		}else{
			?>
			
			<div class="konular">
			<form action="" method="post">
			<ul style="list-style-type:none ">
			<li><b>Kullanıcı Adı</b></li>
			<li><input type="text" name ="kullanici_adi" value="<?php echo $m["kullanici_adi"]; ?>"></li>
			<li><b>Şifre</b></li>
			<li><input type="password" name ="sifre" value="<?php echo $m["sifre"]; ?>"></li>
			<span style=""><button style="margin-top:40px;" class="btn btn-success" type="submit">Kullanıcıyı Düzenle</button></span> </li>
			
			</ul>
			</form>
			</div>
			
			
			<?php
			
		}
		
		?>
		
		
		</div>