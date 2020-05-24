<?php
 session_start();
  
 if( !isset($_SESSION["login"]) ){
   header("Location: ../login.php");
   exit;
 }

 require '../config.php';
  if( isset($_POST["submit"])){
    
      if( tambah($_POST) > 0){
        echo "<script>
        alert('Data berhasil ditambahkan!');
      </script>";
      header('Location: report.php');
      }else{
        echo "<script>
        alert('Data gagal ditambahkan!');
      </script>";
      header('Location: report.php');
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
            <img src="../../assets/img/avatar.png" style="width: 90% ; height : 90%;margin-top:15%;margin-left:10%;margin-bottom:20%">				
        </div>
        <div class="col-md-6">
          <h3 style="padding-top:20%;color:white"> Hello, </h3>
          <h5 style="padding-bottom:5%;color:white"> Admin HR </h5>
        </div>
      </div>
    </div>
    
    <a class="active" href="./report.php" style="color:white"><i class='far fa-credit-card' style='font-size:20px;margin-right:20px;'></i>Data Pegawai</a>
    <a  href="./report_gaji.php" style="color:white"><i class='fas fa-money-check-alt' style='font-size:20px;margin-right:20px'></i>Gaji Pegawai</a>
    <a  href="./report_pengajuan.php" style="color:white"><i class='fas fa-file-upload' style='font-size:25px;margin-right:20px'></i>Pengajuan Pembayaran</a>
    <div class="logout">
      <a href="../logout.php" style="color:white"><i class="fas fa-sign-out-alt" style='font-size:20px;margin-right:20px'></i>Log Out</a>
    </div>
  </div>

  <div class="content">
    <h2 style="text-align:center">Tambah Pegawai</h2>
    <div class="container-fluid">
      <div class="row">
        <div class="content-isi">
          <form  method="post"  action=""> 
              <h3 style="">Data Pribadi</h3>

                  <div class="form-group col-md-6">
                  <label for="nama">Nama Lengkap</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
                  </div>
                  <div class="form-group col-md-4">
                  <label for="ktp">Nomor KTP</label>
                  <input type="text" class="form-control" id="ktp" name="ktp" placeholder="Nomor KTP" required>
                  </div>
                  <div class="form-group col-md-2">
                      <label for="JK"> Jenis kelamin</label>
                      <select id="JK" name="JK" class="form-control" required>
                          <option value = "Pria">Pria</option>
                          <option value = "Wanita">Wanita</option>
                      </select>
                  </div>

                  <div class="form-group col-md-3">
                      <label for="tmp_lhr">Tempat Lahir</label>
                      <input type="text" class="form-control" id="tmp_lhr" name="tmp_lhr" placeholder="Tempat lahir" required>
                  </div>
                  <div class="form-group col-md-3">
                      <label for="tgl_lhr">Tanggal Lahir</label> <br>
                      <input type="date"  class="form-control id="tgl_lhr" name="tgl_lhr" required>
                  </div>
                  <div class="form-group col-md-3">
                      <label for="tgl_masuk">Tanggal Masuk</label> <br>
                      <input type="date"  class="form-control id="tgl_masuk" name="tgl_masuk" required>
                  </div>
                  
                  <div class="form-group col-md-3">
                      <label for="divisi">Divisi</label>
                      <select id="divisi" name="divisi" class="form-control" required>
                          <option value = "Kredit" selected>Kredit</option>
                          <option value = "IT">IT</option>
                      </select>
                  </div>
              <div class="form-group col-md-3">
                      <label for="jabatan">Jabatan</label>
                      <select id="jabatan" name="jabatan" class="form-control" required>
                          <option value = "Manager" selected>Manager</option>
                          <option value = "Staff">Staff</option>
                          <option value = "Board of Manager" >Board of Manager</option>
                      </select>
                  </div>

                  <div class="form-group col-md-3">
                      <label for="no_telp">No. Handphone</label>
                      <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="+62 ..." required>
                  </div>

                  <div class="form-group col-md-2">
                      <label for="suamiistri"> Menikah</label>
                      <select id="suamiistri" name="suamiistri" class="form-control" required>
                          <option value = "Ya" >Ya</option>
                          <option value = "Tidak">Tidak</option>
                      </select>
                  </div>
                  <div class="form-group col-md-3">
                      <label for="anak">Jumlah Anak</label>
                      <input type="text" class="form-control" id="anak" name="anak" placeholder="..." required>
                  </div>
                  <div class="form-group col-md-8">
                      <label for="alamat">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
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

