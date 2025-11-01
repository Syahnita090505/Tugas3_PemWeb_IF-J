<?php 
include 'php/koneksi.php';

$id = $_GET['id'];

//query untuk ambil data pendaftar
$sql = "SELECT * FROM pendaftar WHERE id = $id";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) < 1){
    die("Data tidak ditemukan..");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data - Bimbel Babarsari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-4">
        <div class="header text-center mb-4">
            <h1><i class="bi bi-journal-bookmark-fill"></i> Detail Data Pendaftar</h1>
            <a href="index.php" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <?php if ($data['paket'] === 'Undefined' || empty($data['paket'])): ?>
                <div class="undefined-warning mb-4">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <strong>Perhatian:</strong> Paket bimbingan tidak dipilih.
                </div>
                <?php endif; ?>

                <table class="result-table">
                    <tr>
                        <th>Name</th>
                        <td><?php echo htmlspecialchars($data['nama']); ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo htmlspecialchars($data['email']); ?></td>
                    </tr>
                    <tr>
                        <th>Paket Bimbel</th>
                        <td><?php echo htmlspecialchars($data['paket']); ?></td>
                    </tr>
                    <tr>
                        <th>Lokasi Belajar</th>
                        <td><?php echo htmlspecialchars($data['lokasi']); ?></td>
                    </tr>
                    <tr>
                        <th>Fasilitas Tambahan</th>
                        <td>
                            <?php 
                            if (!empty($data['fasilitas'])) {
                                echo nl2br(htmlspecialchars($data['fasilitas']));
                            } else {
                                echo '-';
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Catatan</th>
                        <td><?php echo nl2br(htmlspecialchars($data['catatan'])); ?></td>
                    </tr>
                    <tr>
                        <th>Metode Pembayaran</th>
                        <td><?php echo htmlspecialchars($data['metode_pembayaran']); ?></td>
                    </tr>
                </table>

                <?php if ($data['paket'] !== 'Undefined' && !empty($data['paket'])): ?>
                <div class="total-price-section mt-4">
                    <h5 class="mb-3">Rincian Biaya</h5>
                    <div class="price-breakdown">
                        <div class="price-item">
                            <span>Paket</span>
                            <span>Rp<?php echo number_format($data['price1'], 0, ',', '.'); ?></span>
                        </div>
                        <div class="price-item">
                            <span>Lokasi</span>
                            <span>Rp<?php echo number_format($data['price2'], 0, ',', '.'); ?></span>
                        </div>
                        <div class="price-item">
                            <span>Fasilitas Tambahan</span>
                            <span>Rp<?php echo number_format($data['price3'], 0, ',', '.'); ?></span>
                        </div>
                        <div class="price-item">
                            <span>Pajak</span>
                            <span>Rp<?php echo number_format($data['tax'], 0, ',', '.'); ?></span>
                        </div>
                        <div class="price-item">
                            <span>Biaya Layanan</span>
                            <span>
                                <?php 
                                $paymentFee = 0;
                                if ($data['metode_pembayaran'] == 'Transfer Bank') $paymentFee = 3000;
                                elseif ($data['metode_pembayaran'] == 'E-Wallet') $paymentFee = 2000;
                                echo 'Rp' . number_format($paymentFee, 0, ',', '.');
                                ?>
                            </span>
                        </div>
                        <div class="price-item total-price">
                            <span>Total Biaya</span>
                            <span>Rp<?php echo number_format($data['total_biaya'], 0, ',', '.'); ?></span>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning me-md-2">
                        <i class="bi bi-pencil"></i> Edit Data
                    </a>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>