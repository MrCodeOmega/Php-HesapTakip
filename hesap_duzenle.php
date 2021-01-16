<?php
$id= $_GET["id"];
$v = $db->prepare("select * from hesaplar where hesap_id=?");
$v->execute(array($id));

$m=$v->fetch(PDO::FETCH_ASSOC);
?>

<div class="" style="float:left; margin-left:20px; border:1px
		solid #ddd; width:75%; min-height:200px; background:white;">
		<h2 style="border:1px solid #ddd; padding:10px; margin:2px; font-size:20px; background:#eee;">Hesabı Düzenle</h2>
		
		<?php
		
		if($_POST){
			$hesap_adi= $_POST["hesap_adi"];
			$parabirimi= $_POST["parabirimi"];
			$nakit= $_POST["nakit"];
			$miktar = $_POST["miktar"];
			
			if(!$hesap_adi || !$miktar){
				
				echo '<div class="alert alert-warning">Tüm Alanları Giriniz...<div>';
			}else{
				
				$guncelle = $db->prepare("update hesaplar set
				hesap_adi =?,
				parabirimi_id =?,
				nakit=?,
				miktar=? where hesap_id =?
				");
				
				$update =$guncelle-> execute(array($hesap_adi,$parabirimi,$nakit,$miktar,$id));
				
				if($update){
					
					echo '<div class="alert alert-success">Hesap Güncellendi.  Bekleyiniz...</div>';
					header ("refresh: 2; url=?do=hesap");
				}else{
					
					echo '<div class="alert alert-danger">Hesap Düzenlemede Bir Hata Oluştu..</div>';
					
					
				}
				
			}
			
		}else{
			?>
			
			<div class="konular">
			<form action="" method="post">
			<ul style="list-style-type:none ">
			<li><b>Hesap Adı</b></li>
			<li><input type="text" name ="hesap_adi" value="<?php echo $m["hesap_adi"]; ?>"></li>
			<li><b>Para Birimi</b></li>
			<li><select name="parabirimi" id="">
			<?php
			$b = $db->prepare("select * from parabirimi order by parabirimi_id desc");
			$b->execute(array());
			$c =$b->fetchALL(PDO::FETCH_ASSOC);
			foreach($c as $z){
				echo '<option value="'.$z["parabirimi_id"].'"';
				
			echo $m["parabirimi_id"]==$z["parabirimi_id"] ? 'selected': null;
			echo'>'.$z["parabirimi"].'</option>';
				
			}
			
			?>
			</select></li>
			<li><b>Miktar</b></li>
			<li><input type="text" name ="miktar" value="<?php echo $m["miktar"]; ?>"></li>
			<li><select name="nakit" id="">
			<option value="1"<?php echo $m["nakit"] ==1 ? 'selected' : null; ?>>Nakit</option>
			<option value="0"<?php echo $m["nakit"] ==0 ? 'selected' : null; ?>>Kredi</option>
			</select> <span style=""><button style="margin-top:40px;" class="btn btn-success" type="submit">Hesabı Düzenle</button></span> </li>
			
			</ul>
			</form>
			</div>
			
			
			<?php
			
		}
		
		?>
		
		
		</div>