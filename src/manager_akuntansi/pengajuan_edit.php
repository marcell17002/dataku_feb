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
	<link rel="stylesheet" type="text/css" href="../../assets/css/bagian_hr/sreport_add.css">
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
          <h3 style="padding-top:20%"> Hello, </h3>
          <h5 style="padding-bottom:5%"> Manager Akuntansi </h5>
        </div>
      </div>
    </div>
    
    <a class="active" href="./pengajuan.php"><i class='fas fa-file-upload' style='font-size:25px;margin-right:20px'></i>Pengajuan Pembayaran</a>
    <a  href="./pembayaran.php"><i class='fas fa-receipt' style='font-size:20px;margin-right:20px'></i> Pembayaran</a>
    <div class="logout">
      <a href="./logout.php"><i class="fas fa-sign-out-alt" style='font-size:20px;margin-right:20px'></i>Log Out</a>
    </div>
  </div>

  <div class="content">
    <h2 style="text-align:center">Validasi Data Pembayaran</h2>
    <div class="container-fluid">
      <div class="row">
        <div class="content-isi">


          <form  method="post"  action=""> 
          
                <input type="hidden" nama="id_pembayaran" value="<?= $karyawan["id_pembayaran"]; ?>">
                  <h4> Isi untuk Validasi </h4>
                    <div class="form-group col-md-6">
                      <label for="pre_number">Pre number</label>
                      <input type="text" class="form-control" id="pre_number" name="pre_number" placeholder="Pre_number" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-3">
                    <label for="inputEmail4">Upload File  </label>
                    <input type="file" class="form-control" id="file" name="file_keuangan"><br><br>
                    </div>
                  </div>
              <br>
              <div style="display:flex; justify-content:flex-end; width:100%; padding:0;">
                <button type="submit" name='submit' class="btn btn-primary" style="margin-top:2%"> Validasi</button>
              </div>
          </form>
        </div>
      </div>
  </div>
</div>
</div>

</body>
</html>