<?php 
    session_start();

    if( !isset($_SESSION["login"]) ){
      header("Location: ../login.php");
      exit;
    }
    
    require '../config.php';
    $id_pembayaran = $_GET["id_pembayaran"];
    $karyawan = query("SELECT * FROM pembayaran WHERE id_pembayaran = $id_pembayaran")[0];

    if( isset($_POST["submit"]) ) {
    if( ubahpengajuan($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diubah!')
                document.location.href = 'pengajuan.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data gagal diubah!')
                document.location.href = 'pengajuan.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/bagian_hr/sreport.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
<div class="konten">
  <div class="sidebar">
    <div clas="container">
      <div class="row">
        <div class="col-md-6">
            <img src="../../assets/img/manager_kuntansi.png" style="width: 90% ; height : 90%;margin-top:15%;margin-left:10%;margin-bottom:20%">				
        </div>
        <div class="col-md-6">
          <h3 style="padding-top:20%;color:white"> Hello, </h3>
          <h5 style="padding-bottom:5%;color:white"> Manager Keuangan </h5>
        </div>
      </div>
    </div>
    
    <a  style="color:white" href="./pengajuan.php"><i class='fas fa-file-upload' style='font-size:25px;margin-right:20px'></i>Pengajuan Pembayaran</a>
    <a class="active"  href="./pembayaran.php" style="color:white" ><i class='fas fa-receipt' style='font-size:20px;margin-right:20px'></i> Pembayaran</a>
    <div class="logout">
      <a href="../logout.php" style="color:white" ><i class="fas fa-sign-out-alt" style='font-size:20px;margin-right:20px'></i>Log Out</a>
    </div>
  </div>

  <div class="content">
    <h2 style="text-align:center">Validasi Data Pembayaran</h2>
    <div class="container-fluid">
        <div class="content-isi">
          <form  method="post"  action="" enctype="multipart/form-data"> 
            <input type="hidden" nama="id_pembayaran" value="<?= $karyawan["id_pembayaran"]; ?>">
              <h4> Isi untuk Validasi </h4>
                <div class="form-group col-md-6">
                  <label for="pre_number">Pre number</label>
                  <input type="text" class="form-control" id="pre_number" name="pre_number" placeholder="Pre_number" required value="<?= $karyawan["pre_number"]; ?>">
                </div>
                <div class="col-md-10">
                  <label for="bukti_bayar">Upload File </label>
                  <input type="file" name="myFile" class="filestyle" data-icon="false">
                </div>
                <div class="col-md-2">
                  <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                </div>
          </form>
          <?php
        // definisi folder upload
        define("UPLOAD_DIR", "../uploads/");
        $id_pembayaran = $_GET["id_pembayaran"];

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

            $pre_number = htmlspecialchars($_POST["pre_number"]);

            $insert = $conn->query("UPDATE pembayaran
            SET file_name_Keuangan = '$name', file_size_Keuangan = '$size', file_type_Keuangan = '$ext', pre_number = '$pre_number'
            WHERE id_pembayaran = $id_pembayaran  ");
            
            if($insert){
              echo '<div class="alert alert-success" style="margin-top:20px">File berhasil di upload.</div>';
            }else{
              echo '<div class="alert alert-warning" style="margin-top:20px">Gagal upload file.</div>';
              exit;
            }
          }

          // set permisi file
          chmod(UPLOAD_DIR . $name, 0644);
          header("Location: pengajuan.php");
        }
        ?>

        </div>
      </div>
  </div>
</div>
</div>

</body>
</html>