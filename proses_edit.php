<?php 
include 'koneksi.php';

//ambil data dari file edit.php
$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$paket = isset($_POST['paket']) ? $_POST['paket'] : 'Undefined';

// fasilitas checkbox
$fasilitas = '';
if (isset($_POST['fasilitas']) && is_array($_POST['fasilitas'])) {
    $fasilitas = implode(', ', $_POST['fasilitas']);
}

$lokasi = isset($_POST['lokasi']) ? $_POST['lokasi'] : '';
$metode_pembayaran = isset($_POST['metode_pembayaran']) ? $_POST['metode_pembayaran'] : '';
$catatan = isset($_POST['catatan']) ? $_POST['catatan'] : '-';

// data harga 
$packagePrices = [
    'Paket Intensif SBMPTN' => 500000,
    'Paket Regular' => 750000,
    'Paket Supercamp SBMPTN' => 1000000,
    'Undefined' => 0
];

$facilityPrices = [
    'Modul Cetak Lengkap' => 50000,
    'Modul PDF' => 25000,
    'Video Rekaman Kelas' => 75000,
    'Grup Diskusi Telegram' => 40000
];

$locationPrices = [
    'Jakarta Pusat' => 100000,
    'Surabaya' => 150000,
    'Yogyakarta' => 80000,
    'Makassar' => 115000,
    'Aceh' => 120000
];

$paymentFees = [
    'Transfer Bank' => 3000,
    'E-Wallet' => 2000,
    'Tunai' => 0
];

// hitung total harga
$total = 0;

// harga paket
$packagePrice = $packagePrices[$paket] ?? 0;
$total += $packagePrice;

// harga fasilitas
$facilitiesPrice = 0;
if (isset($_POST['fasilitas']) && is_array($_POST['fasilitas'])) {
    foreach ($_POST['fasilitas'] as $facility) {
        $facilitiesPrice += $facilityPrices[$facility] ?? 0;
    }
}
$total += $facilitiesPrice;

// biaya lokasi
$locationPrice = $locationPrices[$lokasi] ?? 0;
$total += $locationPrice;

// pajak 10% kecuali jika paket Undefined
$subtotal = $packagePrice + $facilitiesPrice + $locationPrice;
$taxRate = ($paket === 'Undefined') ? 0 : 0.1; // 0% jika undefined
$tax = $subtotal * $taxRate;
$total += $tax;

// Biaya admin
$paymentFee = $paymentFees[$metode_pembayaran] ?? 0;
$total += $paymentFee;

//query untuk update data di mysql
$sql = "UPDATE pendaftar set nama = '$nama',
                            email = '$email',
                            paket = '$paket',
                            fasilitas = '$fasilitas',
                            lokasi = '$lokasi',
                            metode_pembayaran = '$metode_pembayaran',
                            catatan = '$catatan',
                            price1 = $packagePrice,
                            price2 = $locationPrice,
                            price3 = $facilitiesPrice,
                            price4 = 0,
                            tax = $tax,
                            total_biaya = $total
        WHERE id = $id";

$query = mysqli_query($koneksi, $sql);

if($query){
    header('Location: ../index.php');
} else {
    die("gagal menyimpan perubahan.");
}
?>