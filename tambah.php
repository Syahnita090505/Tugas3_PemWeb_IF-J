<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data - Bimbel Babarsari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-4">
        <div class="header text-center mb-4">
            <h1><i class="bi bi-journal-bookmark-fill"></i> Tambah Data Pendaftar</h1>
            <a href="index.php" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="php/proses_tambah.php" method="POST">
                    <!-- Informasi Pribadi -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="mb-0">Informasi Pribadi</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nama" class="form-label required">Nama Lengkap:</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label required">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                    </div>

                    <!-- Paket Bimbingan -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="mb-0">Paket Bimbingan</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <?php
                                $packages = [
                                    'Paket Intensif SBMPTN' => '500000',
                                    'Paket Regular' => '750000', 
                                    'Paket Supercamp SBMPTN' => '1000000'
                                ];
                                
                                foreach ($packages as $pkgName => $price):
                                ?>
                                <div class="form-check mb-3 p-3 border rounded">
                                    <input class="form-check-input" type="radio" name="paket" 
                                           id="paket<?php echo str_replace(' ', '', $pkgName); ?>" 
                                           value="<?php echo $pkgName; ?>">
                                    <label class="form-check-label w-100" for="paket<?php echo str_replace(' ', '', $pkgName); ?>">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <strong class="d-block"><?php echo $pkgName; ?></strong>
                                                <small class="text-muted">
                                                    <?php echo $pkgName === 'Paket Intensif SBMPTN' ? 'Persiapan intensif untuk SBMPTN' : 
                                                          ($pkgName === 'Paket Regular' ? 'Bimbingan belajar reguler' : 'Program super intensif SBMPTN'); ?>
                                                </small>
                                            </div>
                                            <span class="fw-bold text-success">Rp<?php echo number_format($price, 0, ',', '.'); ?></span>
                                        </div>
                                    </label>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="text-muted small">Pilihan paket bersifat opsional. Jika tidak dipilih, status akan menjadi "Undefined".</div>
                        </div>
                    </div>

                    <!-- Fasilitas Tambahan -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="mb-0">Fasilitas Tambahan</h5>
                        </div>
                        <div class="card-body">
                            <?php
                            $facilitiesList = [
                                'Modul Cetak Lengkap' => '50000',
                                'Modul PDF' => '25000',
                                'Video Rekaman Kelas' => '75000',
                                'Grup Diskusi Telegram' => '40000'
                            ];
                            
                            foreach ($facilitiesList as $facility => $price):
                            ?>
                            <div class="facility-option mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="fasilitas[]" 
                                           id="<?php echo str_replace(' ', '', $facility); ?>" 
                                           value="<?php echo $facility; ?>">
                                    <label class="form-check-label" for="<?php echo str_replace(' ', '', $facility); ?>">
                                        <?php echo $facility; ?> - Rp<?php echo number_format($price, 0, ',', '.'); ?>
                                    </label>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <div class="text-muted small mt-2">Pilihan fasilitas bersifat opsional.</div>
                        </div>
                    </div>

                    <!-- Lokasi dan Pembayaran -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="mb-0">Lokasi & Pembayaran</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="lokasi" class="form-label">Lokasi:</label>
                                <select class="form-select" id="lokasi" name="lokasi">
                                    <option value="">Pilih Lokasi</option>
                                    <option value="Jakarta Pusat">Jakarta Pusat</option>
                                    <option value="Surabaya">Surabaya</option>
                                    <option value="Yogyakarta">Yogyakarta</option>
                                    <option value="Makassar">Makassar</option>
                                    <option value="Aceh">Aceh</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="metode_pembayaran" class="form-label">Metode Pembayaran:</label>
                                <select class="form-select" id="metode_pembayaran" name="metode_pembayaran">
                                    <option value="">Pilih Metode</option>
                                    <option value="Transfer Bank">Transfer Bank</option>
                                    <option value="E-Wallet">E-Wallet</option>
                                    <option value="Tunai">Tunai</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Catatan -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="mb-0">Catatan</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan:</label>
                                <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="-"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="reset" class="btn btn-reset me-md-2">Reset</button>
                        <button type="submit" class="btn btn-primary" name="submit">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>