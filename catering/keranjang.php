<?php 
	include"inc/config.php";
	include"layout/header.php";
	
		 
	
	if(empty($_SESSION['cart'])){
        $_SESSION['cart'] = '';
    }
    if(!empty($_GET['produk_id']) && $_GET['act']== 'beli'){
        $cart = unserialize($_SESSION['cart']);
        if($cart == ''){
            $cart = [];
        }
        $pid = $_GET['produk_id'];
        $qty = 20;
        
        if(isset($_GET['update_cart'])){
            if(isset($cart[$pid]))
            	if ($_GET['qty'] >= 40)
	                $cart[$pid] = $_GET['qty'];
	           	else
	           		alert('Minimal Quantity 40'); redir('keranjang.php');
        }elseif(isset($_GET['delete_cart'])){
			if(isset($cart[$pid])){
				unset($cart[$pid]);
			}	
				//$arr = unserialize($str);


			//}else{
				
				//redir($url.'keranjang.php');
			//}
				// foreach($cart as $key => $value){
				  // if ($cart[$key] == $_GET['delete_cart']) 
					  // unset($cart[$key]);
				// }
				// $cart = serialize($cart);
		}else{
        
            if(isset($cart[$pid]))
                $cart[$pid] += $qty;
            else
                $cart[$pid] = $qty;
        }
        $_SESSION['cart'] = serialize($cart);
		redir($url.'keranjang.php');
    }
	//unset($_SESSION['cart']);
	//print_r($_SESSION['cart']);
	
	
?> 	 
		<div class="col-md-9">
			<div class="row">
			<div class="col-md-12">
				
				
				<h2>
                   Keranjang anda :
                </h2>
				<table class="table table-striped" style="width:100%">
				<thead>
				<tr style="background:#c3ebf8;font-weight:bold;">
					<td style="width:15%"> Produk </td>
					<td style="width:40%">Details</td>
					<td style="width:10%">QTY</td>
					<td style="width:15%">Total</td>
					<td style="width:5%" class="delete">&nbsp;</td>
				</tr>
				</thead>
				<tbody>
                                <?php 
$total = 0;
$cart = unserialize($_SESSION['cart']);
if($cart == ''){
    $cart = [];
}
foreach($cart as $id => $qty){
     $product = mysql_fetch_array(mysql_query("select * from produk WHERE id='$id'"));
	if(!empty($product)){
		$t = $qty * $product['harga'];
		$total += $t;
		?>
				<tr class="barang-shop">
					<td class="CartProductThumb"><div> <a href="<?php echo $url; ?>menu.php?id=<?php echo $product['id'] ?>"><img src="<?php echo $url.'uploads/'.$product['gambar']; ?>" alt="img" width="120px"></a> </div></td>
					<td><div class="CartDescription">
					<h4> <a href="<?php echo $url; ?>menu.php?id=<?php echo $product['id'] ?>"><?= $product['nama'] ?></a> </h4>
					<div class="price"><?php echo  "Rp ".number_format($product['harga'], 2, ',', '.') ?></div>
					</div></td>
                                        
					<td>
					<form action="<?php echo $url; ?>keranjang.php" method="GET"> 
                                                <input type="hidden" name="update_cart" value="update">
                                                <input type="hidden" name="act" value="beli">
                                                <input type="hidden" name="produk_id" value="<?= $id ?>">
						<input class="form-control" type="number" name="qty" value="<?php echo $qty; ?>" onchange="this.form.submit()">
						</form>
					</td>
					<td class="price"><?php echo number_format($t, 2, ',', '.') ?></td>
					<td><a href="<?php echo $url; ?>keranjang.php?delete_cart=yes&&act=beli&&produk_id=<?php echo $id; ?>" title="Delete"> <i class="glyphicon glyphicon-trash fa-2x"></i></a></td>
				</tr>
<?php } } ?>
				<tr style="background:#c3ebf8;font-weight:bold;">
					<td colspan="3">SUB TOTAL</td>
                                        <td><?php echo number_format($total, 2, ',', '.') ?></td>
										<td>&nbsp;</td>
				</tr>
				</tbody>
				</table>
				
									
				
			
			</div>
			
			<div style="float:right;" class="col-sm-6 col-md-6">
       <h4><b>Total Keranjang Belanja</b></h4>
       <table class="table table-bordered">
            
           <tr>
               <td style="background:#fafafa;"><b>Total</b></td>
               <td><b><?php echo "Rp ".number_format($total, 2, ',', '.') ?></a></td>
           </tr>
       </table>
       <form action="<?php echo  $url.'order.php' ?>" method="POST"> 
           <input type="hidden" name="okay" value="cart">
           <button <?php echo ($total == 0)? 'disabled' : '' ?> type="submit" class="btn btn-primary">Selesai Belanja &raquo;</button>
       </form>
    </div>
			
			</div> 
		</div> 	
<?php include"layout/footer.php"; ?>