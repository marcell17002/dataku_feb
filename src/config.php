<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'db_simpeg';
$conn = mysqli_connect($host, $user, $password, $db);

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

//REPORT ------------------ REPORT ------------------------ REPORT -------------------------------- REPORT-------------------REPORT
//REPORT ------------------ REPORT ------------------------ REPORT -------------------------------- REPORT-------------------REPORT
//REPORT ------------------ REPORT ------------------------ REPORT -------------------------------- REPORT-------------------REPORT

function tambah($data){
    global $conn;

    $nama = $data["nama"];
    $ktp = $data["ktp"];
    $JK = $data["JK"];
    $tmp_lhr = $data["tmp_lhr"];
    $tgl_lhr = $data["tgl_lhr"];
    $tgl_masuk = $data["tgl_masuk"];
    $divisi = $data["divisi"];
    $jabatan = $data["jabatan"];
    $no_telp = $data["no_telp"];
    $alamat = $data["alamat"];
    $suamiistri = $data["suamiistri"];
    $anak = $data["anak"];

    $query = "INSERT INTO data_karyawan
              VALUES
              ('','$nama','$ktp','$JK','$tmp_lhr','$tgl_lhr','$tgl_masuk','$divisi','$jabatan','$no_telp','$alamat','$suamiistri',$anak)
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM data_karyawan WHERE id =$id");
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;

    $id = $_GET["id"];
    $nama = $data["nama"];
    $ktp = htmlspecialchars($data["ktp"]);
    $JK = htmlspecialchars($data["JK"]);
    $tmp_lhr = htmlspecialchars($data["tmp_lhr"]);
    $tgl_lhr = htmlspecialchars($data["tgl_lhr"]);
    $tgl_lhr = htmlspecialchars($data["tgl_masuk"]);
    $divisi = htmlspecialchars($data["divisi"]);
    $jabatan = htmlspecialchars($data["jabatan"]);
    $no_telp = htmlspecialchars($data["no_telp"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $suamiistri = htmlspecialchars($data["suamiistri"]);
    $anak = htmlspecialchars($data["anak"]);

    $query = "UPDATE data_karyawan 
                SET nama = '$nama', ktp = '$ktp', JK = '$JK', tmp_lhr = '$tmp_lhr', tgl_lhr = '$tgl_lhr', tgl_masuk = '$tgl_masuk', divisi = '$divisi',
                jabatan = '$jabatan', no_telp = '$no_telp', alamat = '$alamat', suamiistri = '$suamiistri',
                anak = $anak
                WHERE id = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows ($conn);
}

//REPORT PENGAJUAN ------------------------------------ REPORT PENGAJUAN ---------------------------- REPORT PENGAJUAN
//REPORT PENGAJUAN ------------------------------------ REPORT PENGAJUAN ---------------------------- REPORT PENGAJUAN
//REPORT PENGAJUAN ------------------------------------ REPORT PENGAJUAN ---------------------------- REPORT PENGAJUAN

function tambah2($data){
    global $conn;
    require_once __DIR__ . '/../vendor/autoload.php'; 

    $deskripsi = $_POST["deskripsi"];
    $total = $_POST["total"];
    $file_hrd = uploadfile_hrd();
    if( $file_hrd === false){
        return false;
    }

    $tgl_pengajuan = date("Y/m/d");
    $departemen = 'HRD';
    
    $query = "INSERT INTO pembayaran (deskripsi, total, file_hrd, tgl_pengajuan, departemen)
              VALUES
              ('$deskripsi', $total, '$file_hrd', '$tgl_pengajuan', '$departemen')
            ";
    mysqli_query($conn, $query);

    // MPDF ------------------------- MPDF -------------------------- MPDF ------------------------ MPDF
    $mpdf = new \Mpdf\Mpdf();
    
    if ($query) {
      $data = '';
      $data .= ' 
      <table style=" border-collapse: collapse;width:100%;">
      <tr>
          <th style="text-align:center" >KONSULTASI PAJAK EKOS PARTNER</th> 
      </tr>
      <tr>
          <th style="text-align:center" >Jalan Embong No.18 Kota Bandung, Jawa Barat</th> 
      </tr>
      <tr>
          <th style="text-align:center">Slip Gaji</th> 
      </tr>
      </table><br>';
      $data .= '
      <table style=" border-collapse: collapse; border: 1px solid black;width:100%;padding-left:5%">
      <tr>
          <td width="35%"><br><br>&nbsp;&nbsp;&nbsp;Tanggal </td>
          <td>    </td>
      </tr>
      <tr>
          <td>&nbsp;&nbsp;&nbsp;Tanggal Pengajuan</td>
          <td>:  '. $total.'</td>
      </tr>
      <tr>
          <td>&nbsp;&nbsp;&nbsp;Nama</td>
          <td>:  '. $nama .'</td>
      </tr>
      <tr>
          <td>&nbsp;&nbsp;&nbsp;Jabatan</td>
          <td>:  '. $total .'</td>
      </tr>
      <tr>
          <td>&nbsp;&nbsp;&nbsp;Gaji Pokok</td>
          <td>:  '. $total .'</td>
      </tr>
      <tr>
          <td>&nbsp;&nbsp;&nbsp;Tunjangan Jabatan</td>
          <td>:  '. $total .'</td>
      </tr>
      <tr>
          <td>&nbsp;&nbsp;&nbsp;Uang Lembur</td>
          <td>:  ' . $total .'</td>
      </tr>
      <tr>
          <td>&nbsp;&nbsp;&nbsp;Bonus</td>
          <td>:  '. $total .'</td>
      </tr>
      <tr>
          <td>&nbsp;&nbsp;&nbsp;Jumlah Uang <br><br><br></td>
          <td>:  ' . $total . '<br><br><br></td>
      </tr>
      <tr>
          <td style="text-align:right"><br><br></td>
          <td style="text-align:center"><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.........,..................... 20</td>
      </tr>
      <tr>
          <td style="text-align:right"></td>
          <td style="text-align:center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pemilik</td>
      </tr>
       <tr>
          <td style="text-align:right"><br><br><br><br></td>
          <td style="text-align:center"><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;..................................</td>
      </tr>
      <tr>
         <td style="text-align:right"><br><br><br></td>
         <td style="text-align:center"><br><br><br></td>
     </tr>
      </table>
      <table style=" border-collapse: collapse;width:100%;">
     
      </table><br>';
     
      $mpdf ->WriteHTML($data);
      $mpdf->Output('pengajuan.pdf','D');
  
      header("Location: report_pengajuan.php");
    }else {
      // kalau gagal alihkan ke halaman indek.php dengan status=gagal
      header('Location: report_pengajuan.php?status=gagal');
  }


    return mysqli_affected_rows($conn);
}

function hapus2($id_pembayaran){
    global $conn;
    mysqli_query($conn, "DELETE FROM pembayaran WHERE id_pembayaran =$id_pembayaran");
    return mysqli_affected_rows($conn);
}

function ubah2($data){
    global $conn;

    $id_pembayaran = $_GET["id_pembayaran"];
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $total = htmlspecialchars($data["total"]);
    $fileLama = htmlspecialchars($data["fileLama"]);

    if( $FILES['file_hrd']['error'] === 4 ){
        $file_hrd = $fileLama;
    }else{
        $file_hrd = uploadfile_hrd();
    }


    
    $tgl_pengajuan = date("Y/m/d");
    $departemen = 'HRD';

    $query = "UPDATE pembayaran
                SET deskripsi = '$deskripsi', total = '$total', file_hrd = '$file_hrd', tgl_pengajuan = '$tgl_pengajuan', departemen = '$departemen'
                WHERE id_pembayaran = $id_pembayaran";

    mysqli_query($conn, $query);
    return mysqli_affected_rows ($conn);
}

function uploadfile_hrd(){
    
    $namaFile = $_FILES['file_hrd']['name'];
    $ukuranFile = $_FILES['file_hrd']['size'];
    $error = $_FILES['file_hrd']['error'];
    $tmpName = $_FILES['file_hrd']['tmp_name'];

    if ( $error === 4 ){
        echo "<script>
                alert('Pilih file yang diupload!');
            </script>";
        return false;
    }

    $ekstensiFileValid = ['jpg','jpeg','png','pdf'];
    $ekstensiFile = explode ('.', $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if( !in_array($ekstensiFile, $ekstensiFileValid) ){
        echo "<script>
                alert('Pilih file pdf untuk diupload!');
            </script>";
        return false;
    }

    if( $ukuranFile > 1000000){
        echo "<script>
                alert('Ukuran file terlalu besar!');
            </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFile;

    move_uploaded_file($tmpName, 'file/' . $namaFileBaru);

    return $namaFileBaru;

}


//PENGAJUAN ---------------------- PENGAJUAN ------------------------ PENGAJUAN -------------------------------- PENGAJUAN
//PENGAJUAN ---------------------- PENGAJUAN ------------------------ PENGAJUAN -------------------------------- PENGAJUAN
//PENGAJUAN ---------------------- PENGAJUAN ------------------------ PENGAJUAN -------------------------------- PENGAJUAN

function ubahpengajuan($data){
    global $conn;

    $id_pembayaran = $_GET["id_pembayaran"];
    $pre_number = htmlspecialchars($data["pre_number"]);
    $fileLama = htmlspecialchars($data["fileLama"]);

    if( $FILES['file_keuangan']['error'] === 4 ){
        $file_keuangan = $fileLama;
    }else{
        $file_keuangan = uploadpengajuan();
    }
    $tgl_serah = date("Y/m/d");

    $query = "UPDATE pembayaran
                SET pre_number = '$pre_number', file_keuangan = '$file_keuangan', tgl_serah = '$tgl_serah'
                WHERE id_pembayaran = $id_pembayaran";

    mysqli_query($conn, $query);
    return mysqli_affected_rows ($conn);
}

function uploadpengajuan(){
    
    $namaFile = $_FILES['file_keuangan']['name'];
    $ukuranFile = $_FILES['file_keuangan']['size'];
    $error = $_FILES['file_keuangan']['error'];
    $tmpName = $_FILES['file_keuangan']['tmp_name'];

    if ( $error === 4 ){
        echo "<script>
                alert('Pilih file yang diupload!');
            </script>";
        return false;
    }

    $ekstensiFileValid = ['jpg','jpeg','png','pdf'];
    $ekstensiFile = explode ('.', $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if( !in_array($ekstensiFile, $ekstensiFileValid) ){
        echo "<script>
                alert('Pilih file pdf untuk diupload!');
            </script>";
        return false;
    }

    if( $ukuranFile > 1000000){
        echo "<script>
                alert('Ukuran file terlalu besar!');
            </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFile;

    move_uploaded_file($tmpName, 'file/' . $namaFileBaru);

    return $namaFileBaru;

}

//PEMBAYARAN ----------------------- PEMBAYARAN ------------------------- PEMBAYARAN --------------------------- PEMBAYARAN
//PEMBAYARAN ----------------------- PEMBAYARAN ------------------------- PEMBAYARAN --------------------------- PEMBAYARAN
//PEMBAYARAN ----------------------- PEMBAYARAN ------------------------- PEMBAYARAN --------------------------- PEMBAYARAN

function ubahpembayaran($data){
    global $conn;

    $id_pembayaran = $_GET["id_pembayaran"];
    $fileLama = htmlspecialchars($data["fileLama"]);

    if( $FILES['bukti_bayar']['error'] === 4 ){
        $bukti_bayar = $fileLama;
    }else{
        $bukti_bayar = uploadpembayaran();
    }

    $query = "UPDATE pembayaran
                SET bukti_bayar = '$bukti_bayar'
                WHERE id_pembayaran = $id_pembayaran";

    mysqli_query($conn, $query);
    return mysqli_affected_rows ($conn);
}

function uploadpembayaran(){
    
    $namaFile = $_FILES['bukti_bayar']['name'];
    $ukuranFile = $_FILES['bukti_bayar']['size'];
    $error = $_FILES['bukti_bayar']['error'];
    $tmpName = $_FILES['bukti_bayar']['tmp_name'];

    if ( $error === 4 ){
        echo "<script>
                alert('Pilih file yang diupload!');
            </script>";
        return false;
    }

    $ekstensiFileValid = ['jpg','jpeg','png','pdf'];
    $ekstensiFile = explode ('.', $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if( !in_array($ekstensiFile, $ekstensiFileValid) ){
        echo "<script>
                alert('Pilih file pdf untuk diupload!');
            </script>";
        return false;
    }

    if( $ukuranFile > 1000000){
        echo "<script>
                alert('Ukuran file terlalu besar!');
            </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFile;

    move_uploaded_file($tmpName, 'file/' . $namaFileBaru);

    return $namaFileBaru;

}

if( !$conn ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>