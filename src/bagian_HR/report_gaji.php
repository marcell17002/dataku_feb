<?php 
  session_start();

  if( !isset($_SESSION["login"]) ){
    header("Location: ../login.php");
    exit;
  }
  
  require '../config.php';
  $jumlahDataPerHalaman = 10;
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
	<link rel="stylesheet" type="text/css" href="../../assets/css/bagian_hr/sreport_gaji.css">
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
    <a class="active"  href="./report_gaji.php"><i class='fas fa-money-check-alt' style='font-size:20px;margin-right:20px'></i>Gaji Pegawai</a>
    <a  href="./report_pengajuan.php"><i class='fas fa-file-upload' style='font-size:25px;margin-right:20px'></i>Pengajuan Pembayaran</a>
    <div class="logout">
      <a href="../logout.php"><i class="fas fa-sign-out-alt" style='font-size:20px;margin-right:20px'></i>Log Out</a>
    </div>
  </div>

  <div class="content">
    <h2 style="text-align:center">Data Gaji</h2>
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
        </tr>
      </thead>
      <tbody>
      <?php	foreach( $karyawan as $row) : ?>
        <tr>
        <?php 
          if ($row["jabatan"] == "Manager"){
            $gajiperbulan = 25000000;
            $bpjs = 250000;
          }else {
            if ($row["jabatan"] == "Staff"){
              $gajiperbulan = 10000000;
              $bpjs = 100000;
            } else {
                $gajiperbulan = 50000000;
                $bpjs = 500000;
            }
          }
        ?>
        <?php
          $gajipertahun = ($gajiperbulan * 12) - 54000000;
        ?>
        <?php 
          if ($row["suamiistri"] == "Ya"){
            $tunjangan_nikah = 4500000;
          } else {
            $tunjangan_nikah = 0;
          }
        ?>
        <?php 
          if ($row["anak"] < 2){
            $tunjangan_anak = $row["anak"] * 4500000;
          } else {
            $tunjangan_anak = 9000000;
          }
        ?>
        <?php $pendapatankenapajak = $gajipertahun - $tunjangan_nikah - $tunjangan_anak;
            if ($pendapatankenapajak > 500000000){
              $p1 = 50000000 * 0.05;
              $p2 = 250000000 * 0.15;
              $a1 = $pendapatankenapajak - 300000000;
              $p3 = $a1 * 0.25;
            } else {
              $p1 = 50000000 * 0.05;
              $a2 = $pendapatankenapajak - 50000000;
              $p2 = $a2 * 0.15;
              $p3 = 0;
            }
            $pajakpertahun = $p1 + $p2 + $p3;
            $pajakbulanan = $pajakpertahun / 12;
            $gajiakhir = $gajiperbulan - $pajakbulanan - $bpjs;
        ?>
          <td><?php echo $row["nama"];?></td>
          <td><?php echo $row["divisi"];?></td>
          <td><?php echo $row["jabatan"];?></td>
          <td><?php echo $gajiperbulan;?></td>
          <td><?php echo $pajakbulanan;?></td>
		    	<td><?php echo $gajiakhir;?></td>
          <td style="text-align:center">
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
</div>

</body>
</html>
