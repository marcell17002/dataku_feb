<?php
  require_once __DIR__ . '/../../vendor/autoload.php';
 session_start();

 if( !isset($_SESSION["login"]) ){
   header("Location: ../login.php");
   exit;
 }
 
 $conn = mysqli_connect("localhost","root","","db_simpeg");

  if( isset($_POST["submit"])){
    $deskripsi = $_POST["deskripsi"];
    $total = $_POST["total"];
    $file_hrd = $_POST["file_hrd"];
    $tgl_pengajuan = date("Y/m/d");
    $departemen = 'HRD';
    $status = 's';
    
    $query = "INSERT INTO pembayaran (id_pembayaran, deskripsi, total, file_hrd, tgl_pengajuan, departemen)
              VALUES
              (null,'$deskripsi', $total, '$file_hrd', '$tgl_pengajuan', '$departemen')
            ";

    $query = mysqli_query($conn, $query);
    $mpdf = new \Mpdf\Mpdf();
    
    if ($query) {
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
          <td>:  '. $total.'</td>
      </tr>
      <tr>
          <td>&nbsp;&nbsp;&nbsp;Nama</td>
          <td>:  '. $total .'</td>
      </tr>
      <tr>
          <td>&nbsp;&nbsp;&nbsp;Jabatan</td>
          <td>:  '. $total .'</td>
      </tr>
      <tr>
          <td>&nbsp;&nbsp;&nbsp;Gaji Pokok</td>
          <td>:  '. $total .'</td>
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
          <td>:  ' . $total . '<br><br><br></td>
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
  
      header("Location: report_pengajuan.php");
    }else {
      // kalau gagal alihkan ke halaman indek.php dengan status=gagal
      header('Location: report_pengajuan.php?status=gagal');
  }

    
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/bagian_hr/sreport_add.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
<div class="konten">
  <div class="sidebar">
    <div clas="container">
      <div class="row">
        <div class="col-md-6">
            <img src="../../assets/img/avatar.png" style="width: 90% ; height : 90%;margin-top:15%;margin-left:10%;margin-bottom:20%">				
        </div>
        <div class="col-md-6">
          <h3 style="padding-top:20%"> Hello, </h3>
          <h5 style="padding-bottom:5%"> Admin HR </h5>
        </div>
      </div>
    </div>
    
    <a href="./report.php"><i class='far fa-credit-card' style='font-size:20px;margin-right:20px;'></i>Data Pegawai</a>
    <a  href="./report_gaji.php"><i class='fas fa-money-check-alt' style='font-size:20px;margin-right:20px'></i>Gaji Pegawai</a>
    <a class="active"   href="./report_pengajuan.php"><i class='fas fa-file-upload' style='font-size:25px;margin-right:20px'></i>Pengajuan Pembayaran</a>
    <div class="logout">
      <a href="./logout.php"><i class="fas fa-sign-out-alt" style='font-size:20px;margin-right:20px'></i>Log Out</a>
    </div>
  </div>

  <div class="content">
    <h2 style="text-align:center">Tambah Pengajuan</h2>
    <div class="container-fluid">
        <div class="content-isi">
          <form  method="post"  action=""> 
          
               <div class="row">
                  <div class="form-group col-md-12">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" required>
                  </div>
                </div>
               <div class="row">
                  <div class="form-group col-md-12"  style="width:60%">
                    <label for="total">Total</label>
                    <input type="text" class="form-control" id="total" name="total" placeholder="Rp. " required>
                  </div>
                </div>
                  <div class="row">
                    <div class="group col-md-12" style="width:35%" >
                      <label for="file_hrd">Upload File </label>
                      <input type="file" class="form-control" id="file_hrd" name="file_hrd" required><br><br>
                    </div>
                  </div>
              <div style="display:flex; justify-content:flex-end; width:100%; padding:0;">
                <button type="submit" name='submit' class="btn btn-primary" style="margin-top:5%"> Submit</button>
              </div>
          </form>
        </div>
      </div>
  </div>
</div>
</div>

</body>
</html>