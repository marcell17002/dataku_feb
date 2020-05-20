<?php 
    if (isset($_GET['file_hrd'])) {
    $file_hrd    = $_GET['file_hrd'];

    $back_dir    ="file/";
    $file_hrd = $back_dir.$_GET['file_hrd'];
     
        if (file_exists($file_hrd)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; file_hrd='.basename($file_hrd));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: private');
            header('Pragma: private');
            header('Content-Length: ' . filesize($file_hrd));
            ob_clean();
            flush();
            readfile($file_hrd);
            
            exit;
        } 
        else {
            $_SESSION['pesan'] = "Oops! File - $file_hrd - not found ...";
            header("location:pengajuan.php");
        }
    }
?>