<?php
require_once __DIR__ . '/../../vendor/autoload.php';

require '../config.php';
$karyawan = query("SELECT * FROM data_karyawan");
$id = $_GET["id"];

$mpdf = new \Mpdf\Mpdf();

$data = '';
      $data .= ' 
      <table style=" border-collapse: collapse;width:100%;">
      <tr>
          <th style="text-align:center" >KONSULTASI PAJAK EKOS PARTNER</th> 
      </tr>
      <tr>
          <th style="text-align:center" >Jalan Embong No.18 Kota Bandung, Jawa Barat</th> 
      </tr>
      <tr>
          <th style="text-align:center">Slip Gaji</th> 
      </tr>
      </table><br>';
      $data .= '
      <table style=" border-collapse: collapse; border: 1px solid black;width:100%;padding-left:5%">
      <tr>
          <td width="35%"><br><br>&nbsp;&nbsp;&nbsp;Tanggal </td>
          <td>    </td>
      </tr>
      <tr>
          <td>&nbsp;&nbsp;&nbsp;Tanggal Pengajuan</td>
          <td>:  '. date("Y/m/d") .'</td>
      </tr>
      <tr>
          <td>&nbsp;&nbsp;&nbsp;Nama</td>
          <td>:  '. $nama .'</td>
      </tr>
      <tr>
          <td>&nbsp;&nbsp;&nbsp;Jabatan</td>
          <td>:  '. $jabatan .'</td>
      </tr>
      <tr>
          <td>&nbsp;&nbsp;&nbsp;Gaji Pokok</td>
          <td>:  '. $gajiperbulan .'</td>
      </tr>
      <tr>
          <td>&nbsp;&nbsp;&nbsp;Tunjangan Jabatan</td>
          <td>:  '. $total .'</td>
      </tr>
      <tr>
          <td>&nbsp;&nbsp;&nbsp;Uang Lembur</td>
          <td>:  ' . $total .'</td>
      </tr>
      <tr>
          <td>&nbsp;&nbsp;&nbsp;Bonus</td>
          <td>:  '. $total .'</td>
      </tr>
      <tr>
          <td>&nbsp;&nbsp;&nbsp;Jumlah Uang <br><br><br></td>
          <td>:  ' . $gajiakhir . '<br><br><br></td>
      </tr>
      <tr>
          <td style="text-align:right"><br><br></td>
          <td style="text-align:center"><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.........,..................... 20</td>
      </tr>
      <tr>
          <td style="text-align:right"></td>
          <td style="text-align:center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pemilik</td>
      </tr>
       <tr>
          <td style="text-align:right"><br><br><br><br></td>
          <td style="text-align:center"><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;..................................</td>
      </tr>
      <tr>
         <td style="text-align:right"><br><br><br></td>
         <td style="text-align:center"><br><br><br></td>
     </tr>
      </table>
      <table style=" border-collapse: collapse;width:100%;">
     
      </table><br>';
     
      $mpdf ->WriteHTML($data);
      $mpdf->Output('pengajuan.pdf','D');

?>