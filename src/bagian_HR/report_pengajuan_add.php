<?php
 session_start();

 if( !isset($_SESSION["login"]) ){
   header("Location: ../login.php");
   exit;
 }
 
 $conn = mysqli_connect("localhost","root","","db_simpeg");

  if( isset($_POST["submit"])){
    $deskripsi = $_POST["deskripsi"];
    $total = $_POST["total"];
    $file_hrd = 'asl';
    $tgl_pengajuan = date("Y/m/d");
    $departemen = 'HRD';
    $status ='pending';

    if ($row["file_hrd"] != NULL && $row["file_keuangan"] == NULL && $row["bukti_bayar"] == NULL){
      $status = 'Diajukan';
    }else{ if ($row["file_hrd"] != NULL && $row["file_keuangan"] != NULL && $row["bukti_bayar"] == NULL){
        $status = 'Disetujui';
      }else{
          if ($row["file_hrd"] != NULL && $row["file_keuangan"] != NULL && $row["bukti_bayar"] != NULL){
              $status = 'Dibayarkan';
          }else{
              $status = 'Pending';
          }
      }
    }
    
    $query = "INSERT INTO pembayaran (id_pembayaran, deskripsi, total, file_hrd, tgl_pengajuan, departemen, status)
              VALUES
              (null,'$deskripsi', $total, '$file_hrd', '$tgl_pengajuan', '$departemen', '$status')
            ";

    mysqli_query($conn, $query);
    header("Location: report_pengajuan.php");
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
    
    <a class="active" href="./report.php"><i class='far fa-credit-card' style='font-size:20px;margin-right:20px;'></i>Data Pegawai</a>
    <a  href="./report_gaji.php"><i class='fas fa-money-check-alt' style='font-size:20px;margin-right:20px'></i>Gaji Pegawai</a>
    <a  href="./report_pengajuan.php"><i class='fas fa-file-upload' style='font-size:25px;margin-right:20px'></i>Pengajuan Pembayaran</a>
    <div class="logout">
      <a href="./logout.php"><i class="fas fa-sign-out-alt" style='font-size:20px;margin-right:20px'></i>Log Out</a>
    </div>
  </div>

  <div class="content">
    <h2 style="text-align:center">Tambah Pengajuan</h2>
    <div class="container-fluid">
      <div class="row">
        <div class="content-isi">
          <form  method="post"  action=""> 

                  <div class="form-group col-md-12">
                  <label for="deskripsi">Deskripsi</label>
                  <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" required>
                  </div>
                  <div class="form-group col-md-7">
                  <label for="total">Total</label>
                  <input type="text" class="form-control" id="total" name="total" placeholder="Rp. " required>
                  </div>
                  <br>
                  <div class="row">
                    <div class="group col-md-12" style="width:30%" >
                      <label for="file_hrd">Upload File </label>
                      <input type="file" class="form-control" id="file_hrd" name="file_hrd" required><br><br>
                    </div>
                  </div>

              <br>
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

