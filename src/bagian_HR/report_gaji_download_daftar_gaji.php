<?php
    require_once __DIR__ . '/../../vendor/autoload.php';
    session_start();
    require '../config.php';

    $karyawan = query("SELECT * FROM data_karyawan");

    $mpdf = new \Mpdf\Mpdf();
    $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Daftar Mashasiswa</title>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <table class="table table-hover" style="margin-top:20px">
            <tr>
                <th style="text-align:center" >KONSULTASI PAJAK EKOS PARTNER</th> 
            </tr>
            <tr>
                <th style="text-align:center" >Jalan Embong No.18 Kota Bandung, Jawa Barat</th> 
            </tr>
            <tr>
                <th style="text-align:center">Daftar Gaji</th> 
            </tr>
        </table><br>
            <h4>Daftar Gaji : '. date("Y/m/d") .'</h4>
        <table class="table table-hover" border="1" cellpading="10" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" style="text-align:center;width:20%;padding:8px;">Nama</th>
                <th scope="col" style="text-align:center;width:15%;padding:8px;">Divisi</th>
                <th scope="col" style="text-align:center;width:15%;padding:8px;">Jabatan</th>
                <th scope="col" style="text-align:center;width:15%;padding:8px;">Gaji Pokok</th>
                <th scope="col" style="text-align:center;width:15%;padding:8px;">Pajak Bulanan</th>
                <th scope="col" style="text-align:center;width:15%;padding:8px;" >Gaji Akhir</th>
            </tr>
        </thead>';

        $totalgaji=0;
        foreach($karyawan as $row){
            $totalgaji = $totalgaji + $row["gajiakhir"];
            $html .= '<tr>
                <td style="padding-left:10px;padding-top:5px;padding-bottom:5px;padding-right:5px">'. $row["nama"] .'</td>
                <td style="padding-left:10px;padding-top:5px;padding-bottom:5px;padding-right:5px" >'. $row["divisi"] .'</td>
                <td style="padding-left:10px;padding-top:5px;padding-bottom:5px;padding-right:5px">'. $row["jabatan"] .'</td>
                <td style="padding-left:10px;padding-top:5px;padding-bottom:5px;padding-right:5px">'. $row["gajiperbulan"] .'</td>
                <td style="padding-left:10px;padding-top:5px;padding-bottom:5px;padding-right:5px">'. $row["pajakbulanan"] .'</td>
                <td style="padding-left:10px;padding-top:5px;padding-bottom:5px;padding-right:5px">'. $row["gajiakhir"] .'</td>
            </tr>';
        }
        $html .= '
        <tr>
            <td style="text-align:center;width:15%;padding:8px;" >Total</td>
            <td style="text-align:center;width:15%;padding:8px;">'. $totalgaji .'</td>
        </tr>
        </table>
        <br>';
    
        $html .= '
        <div class="tdt" style="margin-left:480px;margin-top:50px;">
            <h5>Bandung,........................,...... </h5>
            <h5>Pemilik</h5>
            <h5 style="padding-top:100px;">Allan Kusdinar</h5>
        </div>
        </body>
        </html>';
   
    $mpdf ->WriteHTML($html);
    $mpdf->Output('daftar-gaji-karyawan.pdf','D');
    header('Location: report_gaji.php?status=sukses');

?>