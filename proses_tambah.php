<?php 
    include 'koneksi.php';

    //ambil data dari form
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $paket = isset($_POST['paket']) ? $_POST['paket'] : 'Undefined';

    //fasilitas checkbox
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

    // Pajak 10% kecuali jika paket Undefined akan 0%
    $subtotal = $packagePrice + $facilitiesPrice + $locationPrice;
    $taxRate = ($paket === 'Undefined') ? 0 : 0.1; // 0% jika undefined
    $tax = $subtotal * $taxRate;
    $total += $tax;

    // Biaya admin
    $paymentFee = $paymentFees[$metode_pembayaran] ?? 0;
    $total += $paymentFee;

    // query 
    $sql = "INSERT INTO pendaftar (nama, email, paket, fasilitas, lokasi, metode_pembayaran, catatan, 
                                   price1, price2, price3, price4, tax, total_biaya, tanggal_daftar) 
            VALUES ('$nama', '$email', '$paket', '$fasilitas', '$lokasi', '$metode_pembayaran', '$catatan',
                    $packagePrice, $locationPrice, $facilitiesPrice, 0, $tax, $total, NOW())";

    // untuk jalanin querynya
    $query = mysqli_query($koneksi, $sql);

    // eror handling
    if ($query){
        header('Location: ../index.php');
    } else {
        echo "Gagal menambah data: " . mysqli_error($koneksi);
    }
?>