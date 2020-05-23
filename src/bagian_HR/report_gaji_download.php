<?php
    require_once __DIR__ . '/../../vendor/autoload.php';
    session_start();
    require '../config.php';

    $id = $_GET["id"];
    $karyawan = query("SELECT * FROM data_karyawan WHERE id = $id");

    $mpdf = new \Mpdf\Mpdf();

    $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Daftar Mashasiswa</title>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <table class="table table-hover" style="margin-top:10px">
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
        <h5 style="margin-top:20px"> Slip Gaji : '. date("l").' , '.date("Y-m-d").'</h5> 
        <table class="table table-hover" style="margin-top:20px">
            <thead>';

        foreach($karyawan as $row){
            $total= $row['gajiperbulan'] +  $row['pajakbulanan']+  $row['gajiakhir'];
            $html .= '<div class="as"  style="margin:20px">
                <tr>
                    <td style="width:20%">Nama</td>
                    <td>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $row["nama"] .'</td>
                </tr>
                <tr>
                    <td>Divisi</td>
                    <td>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $row["divisi"] .'</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $row["jabatan"] .'</td>
                </tr>
                <tr>
                    <td><br></td><td><br></td>
                </tr>
                <tr>
                    <td>Gaji Pokok</td>
                    <td>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $row["gajiperbulan"] .'</td>
                </tr>
                <tr>
                    <td>Pajak Bulanan</td>
                    <td>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $row["pajakbulanan"] .'</td>
                </tr>
                <tr>
                    <td>Gaji Akhir</td>
                    <td>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $row["gajiakhir"] .'</td>
                </tr>
                <tr>
                    <td><br></td><td><br></td>
                </tr>
                <tr>
                    <td>Total </td>
                    <td>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $total .'</td>
                </tr> </div>
                ';
        }        

    $html .= '
    </thead>
    </table>
    <div class="tdt" style="margin-left:480px;margin-top:50px;">
    <h5>Bandung,........................,...... </h5>
    <h5>Pemilik</h5>
    <h5 style="padding-top:100px;text-align:center">Allan Kusdinar</h5>
</div>
    </body>
    </html>';
    
    $mpdf ->WriteHTML($html);
    $mpdf->Output('slip-gaji-karyawan.pdf','D');
    header('Location: report_gaji.php?status=sukses');

?>