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


function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM data_karyawan WHERE id =$id");
    return mysqli_affected_rows($conn);
}

function hapus2($id_pembayaran){
    global $conn;
    mysqli_query($conn, "DELETE FROM pembayaran WHERE id_pembayaran =$id_pembayaran");
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

function ubah2($data){
    global $conn;

    $id_pembayaran = $_GET["id_pembayaran"];
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $total = htmlspecialchars($data["total"]);
    $file_hrd = htmlspecialchars($data["file_hrd"]);
    $tgl_pengajuan = date("Y/m/d");
    $departemen = 'HRD';

    $query = "UPDATE pembayaran
                SET deskripsi = '$deskripsi', total = '$total', file_hrd = '$file_hrd', tgl_pengajuan = '$tgl_pengajuan', departemen = '$departemen'
                WHERE id_pembayaran = $id_pembayaran";

    mysqli_query($conn, $query);
    return mysqli_affected_rows ($conn);
}

function ubahpengajuan($data){
    global $conn;

    $id_pembayaran = $_GET["id_pembayaran"];
    $pre_number = htmlspecialchars($data["pre_number"]);
    $file_keuangan = htmlspecialchars($data["file_keuangan"]);
    $tgl_serah = date("Y/m/d");

    $query = "UPDATE pembayaran
                SET pre_number = '$pre_number', file_keuangan = '$file_keuangan', tgl_serah = '$tgl_serah'
                WHERE id_pembayaran = $id_pembayaran";

    mysqli_query($conn, $query);
    return mysqli_affected_rows ($conn);
}

function ubahpembayaran($data){
    global $conn;

    $id_pembayaran = $_GET["id_pembayaran"];
    $bukti_bayar = htmlspecialchars($data["bukti_bayar"]);

    $query = "UPDATE pembayaran
                SET bukti_bayar = '$bukti_bayar'
                WHERE id_pembayaran = $id_pembayaran";

    mysqli_query($conn, $query);
    return mysqli_affected_rows ($conn);
}

if( !$conn ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>