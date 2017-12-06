<?php
	ob_start();
	include"../inc/config.php";
	validate_admin_not_login("login.php");
	if (@$_GET['act'] != "cetak") {
		include"inc/header.php";
	}
?>
<div class="container">
	<h4>Laporan Pengeluaran</h4>
	<?php
		if (@$_GET['act'] != "cetak") {
			?>
				<a href="?act=cetak" class="btn btn-primary">Cetak</a>
			<?php
		}
	?>
	<div class="col-md-12">
		<hr/>
	</div>

	<div class="row">
		<table class="table table-striped" border="1">
			<tr>
				<th>No</th>
				<th>Nama barang</th>
				<th>Tanggal Pengeluaran</th>
				<th>Harga</th>
        <th>Jumlah Barang</th>
        <th>Total</th>
			</tr>
			<tbody>
				<?php
          $totalall =0;

					$no = 0;
					$q = mysql_query("Select laporan.* from laporan order by id_pengeluaran desc") or die (mysql_error());
					while ($data = mysql_fetch_object($q)) {
						$no++;
              $totalall += $data->total;
							$tgl=explode("-",$data->Tanggal_pengeluaran);
							$tgl1=$tgl['2'].'-'. $tgl['1'].'-'. $tgl['0'];
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data->nama_barang; ?></td>
							<td><?php echo $tgl1; ?></td>
							<td><?php echo "Rp. " .number_format($data->harga, 2, ",", "."); ?></td>
              <td><?php echo $data->jumlah; ?></td>
							<td><?php echo "Rp. " .number_format($data->total, 2, ",", "."); ?></td>
						</tr>
						<?php
					}
				?>
				<tr>
					<td colspan="5" align="right">
						<font size="3">
							<b>TOTAL</b>
						</font>
					</td>
					<td>
						<font size="3"><?php echo number_format($totalall, 2, ",", "."); ?></font>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<?php
if (@$_GET['act'] == "cetak") {
	$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
	ob_end_clean();
	include("../assets/MPDF57/mpdf.php");
	$mpdf=new mPDF();
	//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
	$stylesheet = file_get_contents('../assets/css/style.css');
	$mpdf->WriteHTML($stylesheet, 1);
	$mpdf->WriteHTML(utf8_encode($html), 2);
	$mpdf->Output();
	exit;
}
else {
	include"inc/footer.php";
}
?>
