<?php
include('../koneksi.php');
require_once("../../CatShop/dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
// $dompdf->set_option('defaultFont', 'Courier');
$query = mysqli_query($koneksi, "select * from tb_categories");
$html = '<html><center><h3>Daftar Nasabah</h3></center><hr/><br><br>';
$html .= '<table border="1" width="100%">
			<tr>
				<th>No</th>
				<th>Nasabah</th>
				<th>ID Nasabah</th>
			</tr>';
$no = 1;
while ($row = mysqli_fetch_array($query)) {
	$html .= "<tr>
				<td>" . $no . "</td>
				<td>" . $row['categories'] . "</td>
				<td>" . $row['price'] . "</td>
				</tr>";
	$no++;
}
$html .= "</table></html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan-Nasabah.pdf');
