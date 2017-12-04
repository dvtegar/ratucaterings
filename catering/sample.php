<?php
ob_start();
?>
<h1>HI</h1>
<?php
$html = ob_get_contents();
ob_end_clean();

include("assets/MPDF57/mpdf.php");

$mpdf=new mPDF(); 

$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
exit;

//==============================================================
//==============================================================
//==============================================================


?>