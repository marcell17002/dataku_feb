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

          if ($data["jabatan"] == "Manager"){
            $gajiperbulan = 25000000;
            $bpjs = 250000;
          }else {
            if ($data["jabatan"] == "Staff"){
              $gajiperbulan = 10000000;
              $bpjs = 100000;
            } else {
                $gajiperbulan = 50000000;
                $bpjs = 500000;
            }
          }

          $gajipertahun = ($gajiperbulan * 12) - 54000000;

          if ($data["suamiistri"] == "Ya"){
            $tunjangan_nikah = 4500000;
          } else {
            $tunjangan_nikah = 0;
          }

          if ($data["anak"] < 2){
            $tunjangan_anak = $data["anak"] * 4500000;
          } else {
            $tunjangan_anak = 9000000;
          }
            $pendapatankenapajak = $gajipertahun - $tunjangan_nikah - $tunjangan_anak;
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

    $query = "INSERT INTO data_karyawan
              VALUES
              ('','$nama','$ktp','$JK','$tmp_lhr','$tgl_lhr','$tgl_masuk','$divisi','$jabatan','$no_telp','$alamat','$suamiistri',$anak, $gajiperbulan, $pajakbulanan, $gajiakhir)
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

    if ($data["jabatan"] == "Manager"){
        $gajiperbulan = 25000000;
        $bpjs = 250000;
      }else {
        if ($data["jabatan"] == "Staff"){
          $gajiperbulan = 10000000;
          $bpjs = 100000;
        } else {
            $gajiperbulan = 50000000;
            $bpjs = 500000;
        }
      }

      $gajipertahun = ($gajiperbulan * 12) - 54000000;

      if ($data["suamiistri"] == "Ya"){
        $tunjangan_nikah = 4500000;
      } else {
        $tunjangan_nikah = 0;
      }

      if ($data["anak"] < 2){
        $tunjangan_anak = $data["anak"] * 4500000;
      } else {
        $tunjangan_anak = 9000000;
      }
        $pendapatankenapajak = $gajipertahun - $tunjangan_nikah - $tunjangan_anak;
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

    $query = "UPDATE data_karyawan 
                SET nama = '$nama', ktp = '$ktp', JK = '$JK', tmp_lhr = '$tmp_lhr', tgl_lhr = '$tgl_lhr', tgl_masuk = '$tgl_masuk', divisi = '$divisi',
                jabatan = '$jabatan', no_telp = '$no_telp', alamat = '$alamat', suamiistri = '$suamiistri',
                anak = $anak, gajiperbulan = $gajiperbulan, pajakbulanan = $pajakbulanan, gajiakhir = $gajiakhir
                WHERE id = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows ($conn);
}

//REPORT PENGAJUAN ------------------------------------ REPORT PENGAJUAN ---------------------------- REPORT PENGAJUAN
//REPORT PENGAJUAN ------------------------------------ REPORT PENGAJUAN ---------------------------- REPORT PENGAJUAN
//REPORT PENGAJUAN ------------------------------------ REPORT PENGAJUAN ---------------------------- REPORT PENGAJUAN

function hapus2($id_pembayaran){
    global $conn;
    mysqli_query($conn, "DELETE FROM pembayaran WHERE id_pembayaran =$id_pembayaran");
    return mysqli_affected_rows($conn);
}


if( !$conn ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>