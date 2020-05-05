<?php 
  session_start();

  if( !isset($_SESSION["login"]) ){
    header("Location: ../login.php");
    exit;
  }
  require '../config.php';

  $jumlahDataPerHalaman = 3;
  $jumlahData = count(query("SELECT * FROM data_karyawan"));
  $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
  $halamanAktif = ( isset($_GET["page"]) ) ? $_GET["page"] : 1;
  $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

  $karyawan = query("SELECT * FROM data_karyawan LIMIT $awalData, $jumlahDataPerHalaman")
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
            <img src="../../assets/img/keuangan.png" style="width: 90% ; height : 90%;margin-top:15%;margin-left:10%;margin-bottom:20%">				
        </div>
        <div class="col-md-6">
          <h3 style="padding-top:20%"> Hello, </h3>
          <h5 style="padding-bottom:5%"> Admin Keuangan </h5>
        </div>
      </div>
    </div>
    
    <a class="active" href="./pengajuan.php"><i class='fas fa-file-upload' style='font-size:25px;margin-right:20px'></i>Pengajuan Pembayaran</a>
    <a  href="./pembayaran.php"><i class='fas fa-receipt' style='font-size:20px;margin-right:20px'></i> Pembayaran</a>
    <div class="logout">
      <a href="../logout.php"><i class="fas fa-sign-out-alt" style='font-size:20px;margin-right:20px'></i>Log Out</a>
    </div>
  </div>

  <div class="content">
    <h2 style="text-align:center">Data Pengajuan Pembayaran</h2> 

    <div class="content-isi">
    
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Tanggal Pengajuan</th>
          <th scope="col">Tanggal Diterima</th>
          <th scope="col">Departemen</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Total</th>
          <th scope="col">File</th>
          <th scope="col">Status</th>
          <th scope="col" style="width:20%">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php	foreach( $karyawan as $row) : ?>
        <tr>
          <td><?php echo $row["nama"];?></td>
          <td><?php echo $row["JK"];?></td>
          <td><?php echo $row["tmp_lhr"];?></td>
		  	  <td><?php echo $row["tgl_lhr"];?></td>
          <td><?php echo $row["divisi"];?></td>
			    <td><?php echo $row["jabatan"];?></td>
			    <td><?php echo $row["alamat"];?></td>
		    	<td><?php echo $row["no_telp"];?></td>
			    <td><?php echo $row["suamiistri"];?></td>
			    <td><?php echo $row["anak"];?></td>
          <td style="text-align:center">
          <a href="report_edit.php?id=<?=$row["id"];?>"><i class='fas fa-edit' style='font-size:20px;margin-right:20px'></i>Edit </a> | 
          <a href="report_delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Anda Yakin?');"><i class='fas fa-trash' style='font-size:20px;margin-left:20px;margin-right:20px'></i>Delete</a>
          </td>
        </tr>
        <?php endforeach; ?>

      <?php // Pagination ?>
      <?php if($halamanAktif > 1) : ?>
      <a href="?page<?= $halamanAktif - 1; ?>">&laquo;</a>
      <?php endif; ?>
      <?php for($i=1; $i <= $jumlahHalaman; $i++) : ?>
          <?php if($i == $halamanAktif) : ?>
            <a href="?page=<?= $i; ?>" style="font-weight: bold;"> <?= $i; ?> </a>
          <?php else : ?>
            <a href="?page=<?= $i; ?>"> <?= $i; ?> </a>
          <?php endif; ?>
      <?php endfor; ?>
      <?php if($halamanAktif < $jumlahHalaman) : ?>
      <a href="?page<?= $halamanAktif + 1; ?>">&raquo;</a>
      <?php endif; ?>


      </tbody>
    </table>
    </div>
  </div>
</div>

</body>
</html>
