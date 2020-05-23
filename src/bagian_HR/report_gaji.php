<?php 
  session_start();

  if( !isset($_SESSION["login"]) ){
    header("Location: ../login.php");
    exit;
  }
  
  require '../config.php';
  $jumlahDataPerHalaman = 6;
  $jumlahData = count(query("SELECT * FROM data_karyawan"));
  $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
  $halamanAktif = ( isset($_GET["page"]) ) ? $_GET["page"] : 1;
  $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

  $karyawan = query("SELECT *
                      FROM data_karyawan
                      LIMIT $awalData, $jumlahDataPerHalaman")
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
    
    <a  href="./report.php" style="color:white"><i class='far fa-credit-card' style='font-size:20px;margin-right:20px;'></i>Data Pegawai</a>
    <a class="active" href="./report_gaji.php" style="color:white"><i class='fas fa-money-check-alt' style='font-size:20px;margin-right:20px'></i>Gaji Pegawai</a>
    <a  href="./report_pengajuan.php" style="color:white"><i class='fas fa-file-upload' style='font-size:25px;margin-right:20px'></i>Pengajuan Pembayaran</a>
    <div class="logout">
      <a href="../logout.php" style="color:white"><i class="fas fa-sign-out-alt" style='font-size:20px;margin-right:20px'></i>Log Out</a>
    </div>
  </div>

  <div class="content">
    <h2 style="text-align:center">Data Gaji</h2>
    <div style="display:flex; justify-content:flex-end;">
			<a href="./report_gaji_download_daftar_gaji.php" style="margin-right:5%"><button type="button" class="btn btn-success" style="margin-top:5%"><i class='fa fa-download' style='font-size:15px;padding-right:10px'></i> Unduh Daftar Gaji</button></a>
		</div> 
    <div class="content-isi">
    
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Nama</th>
          <th scope="col">Divisi</th>
          <th scope="col">Jabatan</th>
          <th scope="col">Gaji Pokok</th>
          <th scope="col">Pajak Bulanan</th>
          <th scope="col">Gaji Akhir</th>
          <th scope="col"style="text-align:center;width:15%">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php $totalgaji = 0;?>
      <?php	foreach( $karyawan as $row) : ?>        
        <tr>
        <?php 
        $totalgaji = $totalgaji + $row["gajiakhir"];?>
          <td><?php echo $row["nama"];?></td>
          <td><?php echo $row["divisi"];?></td>
          <td><?php echo $row["jabatan"];?></td>
          <td><?php echo $row["gajiperbulan"];?></td>
          <td><?php echo $row["pajakbulanan"];?></td>
		    	<td><?php echo $row["gajiakhir"];?></td>
          <td style="text-align:center">
          <a href="report_gaji_download.php?id=<?=$row["id"];?>"><button type="button" class="btn btn-primary">Download</button></a>
          </td>
        </tr>
        <?php endforeach; ?> 
        
        <?php // Pagination ?>
          <?php if($halamanAktif > 1) : ?>
         <a href="?page<?= $halamanAktif - 1; ?>">&laquo;</a>
         <?php endif; ?>
         <?php for($i=1; $i <= $jumlahHalaman; $i++) : ?>
          <?php if($i == $halamanAktif) : ?>
            <a href="?page=<?= $i; ?>" style="font-size: 15px;color:white"><mark> <?= $i; ?></mark> </a>
          <?php else : ?>
            <a href="?page=<?= $i; ?>"> <?= $i; ?> </a>
          <?php endif; ?>
       <?php endfor; ?>
          <?php if($halamanAktif < $jumlahHalaman) : ?>
          <a href="?page<?= $halamanAktif + 1; ?>">&raquo;</a>
       <?php endif; ?>
        </tbody>
    </table>
    Total Gaji : <?php echo $totalgaji;?>
    </div>
  </div>
  </div>
</div>

</body>
</html>
