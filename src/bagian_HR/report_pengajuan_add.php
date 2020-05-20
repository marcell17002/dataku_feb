<?php
 session_start();
 if( !isset($_SESSION["login"]) ){
   header("Location: ../login.php");
   exit;
 }
 
  require '../config.php';
?>

<?php include("config.php"); ?>

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
      <a href="../logout.php"><i class="fas fa-sign-out-alt" style='font-size:20px;margin-right:20px'></i>Log Out</a>
    </div>
  </div>

  <div class="content">
    <h2 style="text-align:center">Tambah Pengajuan</h2>
    <div class="container-fluid">
      <div class="content-isi">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">

            <form class="form-horizontal" method="post" enctype="multipart/form-data">
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
            <div class="form-group"> 
              <div class="row">
                <div class="col-md-10">
                  <label for="file_hrd">Upload File </label>
                  <input type="file" name="myFile" class="filestyle" data-icon="false" required>
                </div>
                <div class="col-md-2">
                  <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                </div>
              </div>
          </form>

          <?php
        // definisi folder upload
        define("UPLOAD_DIR", "../uploads/");

        if (!empty($_FILES["myFile"])) {
          $myFile = $_FILES["myFile"];
          $ext    = pathinfo($_FILES["myFile"]["name"], PATHINFO_EXTENSION);
          $size   = $_FILES["myFile"]["size"];
          
          if ($myFile["error"] !== UPLOAD_ERR_OK) {
            echo '<div class="alert alert-warning" style="margin-top:20px">Gagal upload file.</div>';
            exit;
          }

          // filename yang aman
          $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

          // mencegah overwrite filename
          $i = 0;
          $parts = pathinfo($name);
          while (file_exists(UPLOAD_DIR . $name)) {
            $i++;
            $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
          }

          // upload file
          $success = move_uploaded_file($myFile["tmp_name"],
            UPLOAD_DIR . $name);
          if (!$success) { 
            echo '<div class="alert alert-warning" style="margin-top:20px">Gagal upload file.</div>';
            exit;
          }else{

            $deskripsi = $_POST["deskripsi"];
            $total = $_POST["total"];
            $tgl_pengajuan = date("Y/m/d");
            $departemen = 'HRD';
            
            $insert = $conn->query("INSERT INTO pembayaran
            (file_name_HR, file_size_HR, file_type_HR, deskripsi, total, tgl_pengajuan, departemen) 
            VALUES('$name', '$size', '$ext', '$deskripsi', $total, '$tgl_pengajuan', '$departemen')");
            if($insert){
              echo '<div class="alert alert-success" style="margin-top:20px">File berhasil di upload.</div>';
            }else{
              echo '<div class="alert alert-warning" style="margin-top:20px">Gagal upload file.</div>';
              exit;
            }
          }

          // set permisi file
          chmod(UPLOAD_DIR . $name, 0644);
          header("Location: report_pengajuan.php");
        }
        ?>

      </div>
    </div>
          
        </div>
      </div>
  </div>
</div>
</div>

</body>
</html>