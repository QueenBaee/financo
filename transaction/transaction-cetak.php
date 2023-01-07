<?php
include('../koneksi.php');
require_once("../dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "select * from tb_transaction");
$html = '<center><h3>Daftar Transaction</h3></center><hr/><br><br>';
$html .= '<table border="1" width="100%">
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Jenis</th>
                <th>Harga</th>
                <th>Tanggal</th>
			</tr>';
$no = 1;
while ($row = mysqli_fetch_array($query)) {
	$html .= "<tr>
				<td>" . $no . "</td>
				<td>" . $row['nama'] . "</td>
				<td>" . $row['jenis'] . "</td>
                <td>" . $row['harga'] . "</td>
                <td>" . $row['tanggal'] . "</td>
				</tr>";
	$no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan-transaction.pdf');
