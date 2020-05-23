<?php
    require_once __DIR__ . '/../../vendor/autoload.php';
    session_start();
    require '../config.php';

    $karyawan = query("SELECT * FROM data_karyawan");

    $id = '1';

    $mpdf = new \Mpdf\Mpdf();
    $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Daftar Mashasiswa</title>
    </head>
    <body>
        <h1>Daftar Gaji</h1>
        <table class="table table-hover" border="1" cellpading="10" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Divisi</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Gaji Pokok</th>
                <th scope="col">Pajak Bulanan</th>
                <th scope="col">Gaji Akhir</th>
            </tr>
        </thead>';

        $totalgaji=0;
        foreach($karyawan as $row){
            $totalgaji = $totalgaji + $row["gajiakhir"];
            $html .= '<tr>
                <td>'. $row["nama"] .'</td>
                <td>'. $row["divisi"] .'</td>
                <td>'. $row["jabatan"] .'</td>
                <td>'. $row["gajiperbulan"] .'</td>
                <td>'. $row["pajakbulanan"] .'</td>
                <td>'. $row["gajiakhir"] .'</td>
            </tr>';
        }
    $html .= '
    <tr>
        <td>Total</td>
        <td>'. $totalgaji .'</td>
    </tr>';

    $html .= '</table>
    </body>
    </html>';
   
    $mpdf ->WriteHTML($html);
    $mpdf->Output('daftar-gaji-karyawan.pdf','D');
    header('Location: report_gaji.php?status=sukses');

?>