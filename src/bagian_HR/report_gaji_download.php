<?php
    require_once __DIR__ . '/../../vendor/autoload.php';
    session_start();
    $conn = mysqli_connect("localhost","root","","db_simpeg");

    $id = $_GET["id"];
    $karyawan = query("SELECT * FROM data_karyawan WHERE id = $id");

    $mpdf = new \Mpdf\Mpdf();

    $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Daftar Mashasiswa</title>
    </head>
    <body>
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
        <thead>';

        foreach($karyawan as $row){
            $html .= '
                <tr>
                    <td>Nama            : </td>
                    <td>'. $row["nama"] .'</td>
                </tr>
                <tr>
                    <td>Divisi          : </td>
                    <td>'. $row["divisi"] .'</td>
                </tr>
                <tr>
                    <td>Jabatan         : </td>
                    <td>'. $row["jabatan"] .'</td>
                </tr>
                <tr>
                    <td>Gaji Pokok      : </td>
                    <td>'. $row["gajiperbulan"] .'</td>
                </tr>
                <tr>
                    <td>Pajak Bulanan   : </td>
                    <td>'. $row["pajakbulanan"] .'</td>
                </tr>
                <tr>
                    <td>Gaji Akhir      : </td>
                    <td>'. $row["gajiakhir"] .'</td>
                </tr>
                ';
        }        

    $html .= '
    </thead>
    </table>
    </body>
    </html>';
    
    $mpdf ->WriteHTML($html);
    $mpdf->Output('slip-gaji-karyawan.pdf','D');
    header('Location: report_gaji.php?status=sukses');

?>