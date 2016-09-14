<?php
include 'config.php';
		$verifica = mysql_query("SELECT * FROM upgrades") or die("<br>Erro ao selecionar");
		while($sql = mysql_fetch_array($verifica)){
				if(intval($sql['price'])==999){
					?>
		<div class="shop-item century normal">
		<center><img src="<?php echo $sql['img']; ?>" class="shop-img"/></center>
		<center><span class="shop-desc century normal"><?php echo $sql['title']; ?></span></center>
		<center><span class="shop-description century normal"><?php echo $sql['description']; ?></span></center>
		<center><span class="shop-price century normal">$<?php echo ($_COOKIE['perclick']*200); ?> Points!</span></center>
		<center><a class="shop-buy century normal" href="<?php echo 'buy.php?type='.$sql['type'].'&quantity='.$sql['quantity'].'&price='.$_COOKIE['perclick']*200; ?>">BUY!</a></center>
		</div>
					<?php
				}else{
					?>
		<div class="shop-item century normal">
		<center><img src="<?php echo $sql['img']; ?>" class="shop-img"/></center>
		<center><span class="shop-desc century normal"><?php echo $sql['title']; ?></span></center>
		<center><span class="shop-description century normal"><?php echo $sql['description']; ?></span></center>
		<center><span class="shop-price century normal">$<?php echo $sql['price']; ?> Points!</span></center>
		<center><a class="shop-buy century normal" href="<?php echo 'buy.php?type='.$sql['type'].'&quantity='.$sql['quantity'].'&price='.$sql['price']; ?>">BUY!</a></center>
		</div>
					<?php	
				}
		}
		?>