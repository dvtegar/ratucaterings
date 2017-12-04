<?php 
	include"inc/config.php";
	include"layout/header.php"; 
	if(empty($_SESSION['iam_user'])){
		alert("Silahkan login dahulu.");
		redir("login.php");
	}
	
	$user = mysql_fetch_object(mysql_query("SELECT*FROM user where id='$_SESSION[iam_user]'"));
	
?> 	 
		<div class="col-md-9">
		
			<div class="alert alert-success">Transaksi Berhasil. Silahkan tunggu. Admin akan segera menghubungi anda.</div>
			<div class="row">
			<div class="col-md-12">
				<hr>
				<h4>
                   Detail Pesanan yang anda beli:
                </h4>				
				<table class="table table-striped table-hove"> 
		<thead> 
				<tr> 
					<th>#</th> 
					<th>Nama Produk</th> 
					<th>Harga Satuan</th> 
					<th>QTY</th> 
					<th>Harga *</th>   
				</tr> 
			</thead> 
			<tbody> 
		 <?php
			$pes = mysql_fetch_array(mysql_query("SELECT*FROM pesanan where user_id='$_SESSION[iam_user]' order by id DESC limit 1"));
			$q = mysql_query("select*from detail_pesanan where pesanan_id='$pes[id]'");
			$ongkir = $pes['ongkir'];
			$total = 0;
		 while($data=mysql_fetch_object($q)){ ?> 
				<tr> 
					<th scope="row"><?php echo $no++; ?></th> 
					<?php
						$katpro = mysql_query("select*from produk where id='$data->produk_id'");
								$p = mysql_fetch_object($katpro);
					?>
					<td><?php echo $p->nama ?></td> 
					<td><?php echo number_format($p->harga, 2, ',', '.')  ?></td>  
					<td><?php echo $data->qty ?></td>
					<?php $t = $data->qty*$p->harga; 
						$total += $t;
					?>
					<td><?php echo number_format($t, 2, ',', '.')  ?></td>  
					<!--td>
						<a class="btn btn-sm btn-warning" href="detail_pesanan.php?id=<?php echo $data->id ?>">Detail</a>
						<a class="btn btn-sm btn-success" href="pesanan.php?act=edit&&id=<?php echo $data->id ?>">Edit</a>
						<a class="btn btn-sm btn-danger" href="pesanan.php?act=delete&&id=<?php echo $data->id ?>">Delete</a>
					</td--> 
				</tr>
			<?php } ?>
				<tr>
					<td colspan="4" class="text-center">
					<h5><b>ONGKIR</b></h5>
					</td>
					<td class="text-bold">
					<h5><b><?php  echo number_format($pes['ongkir'], 2, ',', '.') ?></b></h5>
					</td>				
				</tr>
				<tr>
					<td colspan="4" class="text-center">
					<h5><b>TOTAL HARGA</b></h5>
					</td>
					<td class="text-bold">
					<h5><b><?php  echo number_format($total+$ongkir, 2, ',', '.') ?></b></h5>
					</td>
				</tr>
			</tbody> 
		</table>
			
			</div> 
			
			</div> 
		</div> 	
<?php include"layout/footer.php"; ?>