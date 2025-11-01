<?php 
include 'php/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Bimbel Babarsari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-4">
        <div class="header text-center mb-4">
            <h1><i class="bi bi-journal-bookmark-fill"></i> Data Pendaftaran Bimbel</h1>
            <p class="text-muted">Dashboard Manajemen Pendaftar</p>
        </div>

        <!-- untuk menambahkan data ke file tambah.php-->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Data Pendaftar</h3>
            <a href="tambah.php" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Data
            </a>
        </div>

        <?php
        $sql = "SELECT * FROM pendaftar ORDER BY tanggal_daftar DESC";
        $query = mysqli_query($koneksi, $sql);
        $jumlah_data = mysqli_num_rows($query);
        ?>

        <?php if ($jumlah_data == 0): ?>
            <div class="alert alert-info text-center">
                <i class="bi bi-info-circle"></i> Tidak ada data.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Paket</th>
                            <th>Total Biaya</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($data = mysqli_fetch_assoc($query)):
                            $total_biaya = number_format($data['total_biaya'], 0, ',', '.');
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><strong><?php echo htmlspecialchars($data['nama']); ?></strong></td>
                                <td>
                                    <?php 
                                    if (empty($data['paket']) || $data['paket'] == 'Undefined') {
                                        echo '<span class="badge bg-warning">Undefined</span>';
                                    } else {
                                        echo htmlspecialchars($data['paket']);
                                    }
                                    ?>
                                </td>
                                <td><strong>Rp<?php echo $total_biaya; ?></strong></td>
                                <td>
                                    <!--ini untuk menambahkan aksinya,bisa detail, update dan delete-->
                                    <a href="detail.php?id=<?php echo $data['id']; ?>" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                    <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <a href="php/hapus.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>