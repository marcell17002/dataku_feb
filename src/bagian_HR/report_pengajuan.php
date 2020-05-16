<?php 
  session_start();

  if( !isset($_SESSION["login"]) ){
    header("Location: ../login.php");
    exit;
  }
  require '../config.php';

  $jumlahDataPerHalaman = 5;
  $jumlahData = count(query("SELECT * FROM pembayaran"));
  $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
  $halamanAktif = ( isset($_GET["page"]) ) ? $_GET["page"] : 1;
  $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

  $karyawan = query("SELECT * FROM pembayaran LIMIT $awalData, $jumlahDataPerHalaman");
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
          <h3 style="padding-top:20%"> Hello, </h3>
          <h5 style="padding-bottom:5%"> Admin HR </h5>
        </div>
      </div>
    </div>
    
    <a  href="./report.php"><i class='far fa-credit-card' style='font-size:20px;margin-right:20px;'></i>Data Pegawai</a>
    <a  href="./report_gaji.php"><i class='fas fa-money-check-alt' style='font-size:20px;margin-right:20px'></i>Gaji Pegawai</a>
    <a  class="active" href="./report_pengajuan.php"><i class='fas fa-file-upload' style='font-size:25px;margin-right:20px'></i>Pengajuan Pembayaran</a>
    <div class="logout">
      <a href="../logout.php"><i class="fas fa-sign-out-alt" style='font-size:20px;margin-right:20px'></i>Log Out</a>
    </div>
  </div>

  <div class="content">
    <h2 style="text-align:center">Data Pegawai</h2>
    <div style="display:flex; justify-content:flex-end; width:100%; padding:0">
			<a href="./report_pengajuan_add.php"><button type="button" class="btn btn-primary" style="margin-top:5%"><i class='fa fa-plus' style='font-size:20px;margin-right:5%'></i>  Ajukan Pembayaran</button></a>
		</div> 

    <div class="content-isi">
    
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Tanggal Pengajuan</th>
          <th scope="col">Tanggal Diserahkan</th>
          <th scope="col">Departemen</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Total</th>
          <th scope="col">File HRD</th>
          <th scope="col">Status</th>
          <th scope="col" style="width:20%">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php	foreach( $karyawan as $row) : ?>
        <?php
          if ($row["file_hrd"] != NULL && $row["file_keuangan"] == NULL && $row["bukti_bayar"] == NULL){
            $status = 'Diajukan';
          }else{
            if ($row["file_hrd"] != NULL && $row["file_keuangan"] != NULL && $row["bukti_bayar"] == NULL){
                $status = 'Disetujui';
            }else{
                if ($row["file_hrd"] != NULL && $row["file_keuangan"] != NULL && $row["bukti_bayar"] != NULL){
                    $status = 'Dibayarkan';
                }else{
                    $status = 'Pending';
                }
            }
          }
          ?>
        <tr>
          <td><?php echo $row["tgl_pengajuan"];?></td>
          <td><?php echo $row["tgl_serah"];?></td>
          <td><?php echo $row["departemen"];?></td>
		  	  <td><?php echo $row["deskripsi"];?></td>
          <td><?php echo $row["total"];?></td>
			    <td><?php echo $row["file_hrd"];?></td>
			    <td><?php echo $status;?></td>
          <td style="text-align:center">
          <a href="report_pengajuan_edit.php?id_pembayaran=<?=$row["id_pembayaran"];?>"><i class='fas fa-edit' style='font-size:20px;margin-right:20px'></i>Edit </a> | 
          <a href="report_pengajuan_delete.php?id_pembayaran=<?= $row["id_pembayaran"]; ?>" onclick="return confirm('Anda Yakin?');"><i class='fas fa-trash' style='font-size:20px;margin-left:20px;margin-right:20px'></i>Delete</a>
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
