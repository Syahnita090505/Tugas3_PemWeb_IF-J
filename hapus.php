<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    
    $id = $_GET['id'];

    $sql = "DELETE FROM pendaftar WHERE id=$id";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        header('Location: ../index.php');
    } else {
        die("Gagal menghapus data: " . mysqli_error($koneksi));
    }

} else {
    die("Akses dilarang...");
}
?>