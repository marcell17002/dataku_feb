<?php
session_start();

if( !isset($_SESSION["login"]) ){
  header("Location: ../login.php");
  exit;
}

require '../config.php';
$id_pembayaran = $_GET["id_pembayaran"];

if( hapus2($id_pembayaran) > 0) {
    echo "
        <script>
            alert('Data berhasil dihapus!')
            document.location.href = 'report_pengajuan.php';
        </script>
    ";
}else{
    echo "
        <script>
            alert('Data gagal dihapus!')
            document.location.href = 'report_pengajuan.php';
        </script>
    ";
}
?>