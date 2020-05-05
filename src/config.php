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

function ubah($data){
    global $conn;

    $id = $_GET["id"];
    $nama = $data["nama"];
    $JK = htmlspecialchars($data["JK"]);
    $tmp_lhr = htmlspecialchars($data["tmp_lhr"]);
    $tgl_lhr = htmlspecialchars($data["tgl_lhr"]);
    $divisi = htmlspecialchars($data["divisi"]);
    $jabatan = htmlspecialchars($data["jabatan"]);
    $no_telp = htmlspecialchars($data["no_telp"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $suamiistri = htmlspecialchars($data["suamiistri"]);
    $anak = htmlspecialchars($data["anak"]);

    $query = "UPDATE data_karyawan 
                SET nama = '$nama', JK = '$JK', tmp_lhr = '$tmp_lhr', tgl_lhr = '$tgl_lhr', divisi = '$divisi',
                jabatan = '$jabatan', no_telp = '$no_telp', alamat = '$alamat', suamiistri = '$suamiistri',
                anak = $anak
                WHERE id = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows ($conn);
}

if( !$conn ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>