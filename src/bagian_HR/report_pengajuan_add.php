<?php
  
 session_start();

 if( !isset($_SESSION["login"]) ){
   header("Location: ../login.php");
   exit;
 }
 
  require '../config.php';
  
  if( isset($_POST["submit"])){

    if( tambah2($_POST) > 0){
      echo "<script>
      alert('Data berhasil ditambahkan!');
      document.location.href = 'report_pengajuan.php';
    </script>";
    }else{
      echo "<script>
      alert('Data gagal ditambahkan!');
      document.location.href = 'report_pengajuan.php';
    </script>";
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
      <a href="../logout.php"><i class="fas fa-sign-out-alt" style='font-size:20px;margin-right:20px'></i>Log Out</a>
    </div>
  </div>

  <div class="content">
    <h2 style="text-align:center">Tambah Pengajuan</h2>
    <div class="container-fluid">
        <div class="content-isi">
          <form  method="post"  action="" enctype="multipart/form-data"> 
          
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
                      <input type="file" class="form-control" id="file_hrd" name="file_hrd"><br><br>
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