<?php
    require_once __DIR__ . '/../../vendor/autoload.php';
    session_start();
    $conn = mysqli_connect("localhost","root","","db_simpeg");

    $sql = "SELECT * FROM data_karyawan";
    $query = mysqli_query($conn, $sql);

    $mpdf = new \Mpdf\Mpdf();

    if($query){
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
        </table><br>
        <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">nama</th>
            <th scope="col">Divisi</th>
            <th scope="col">Jabatan</th>
            <th scope="col">Gaji Pokok</th>
            <th scope="col">Pajak Bulanan</th>
            <th scope="col">Gaji Akhir</th>
          </tr>
        </thead>';
    foreach( $sql as $row) {
        $data .= '
            <tbody>
            <tr>
            <td>'. $row["nama"].'</td>
            <td><'.$row["divisi"].'></td>
            <td><'.$row["jabatan"].'></td>
            <td><'.$row["gajiperbulan"].'></td>
            <td><'.$row["pajakbulanan"].'></td>
            <td>'.$row["gajiakhir"].'</td>
            </tr> 
            </tbody>
            </table>';
    }
}
    $mpdf->WriteHTML($data);
    $mpdf->Output('slip-gaji-karyawan.pdf','D');
    header('Location: report_gaji.php?status=sukses');

?>