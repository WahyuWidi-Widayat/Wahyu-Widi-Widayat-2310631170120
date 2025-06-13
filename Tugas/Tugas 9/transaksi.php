<?php
include 'koneksi_db.php';
include 'nav.php';


// Ambil daftar buku dan pelanggan
$buku_result = $conn->query("SELECT ID, Judul FROM Buku");
$pelanggan_result = $conn->query("SELECT ID, Nama FROM Pelanggan");
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <title>Buat Pesanan</title>
</head>
<body>
<div class="container mt-4">

    <h3>Tambah Pelanggan Baru</h3>
    <form method="post" action="tambah_pelanggan.php" class="mb-4">
        <div class="mb-3">
            <label for="nama_pelanggan" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama_pelanggan" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat" id="alamat" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" class="form-control" name="telepon" id="telepon" required>
        </div>
        <button type="submit" class="btn btn-success">Tambah Pelanggan</button>
    </form>


   <h2>Buat Pesanan Baru</h2>
   <?php if (isset($_GET['message'])): ?>
       <div class="alert alert-info"><?= htmlspecialchars($_GET['message']) ?></div>
   <?php endif; ?>


   <form method="post" action="proses_transaksi.php">
       <div class="mb-3">
           <label for="pelanggan_id" class="form-label">Pilih Pelanggan</label>
           <select class="form-select" name="pelanggan_id" id="pelanggan_id" required>
               <option value="">Pilih Pelanggan</option>
               <?php while ($row = $pelanggan_result->fetch_assoc()): ?>
                   <option value="<?= $row['ID'] ?>"><?= $row['Nama'] ?></option>
               <?php endwhile; ?>
           </select>
       </div>


       <h3>Daftar Buku</h3>
       <div class="mb-3">
           <label for="buku_id" class="form-label">Pilih Buku</label>
           <select class="form-select" name="buku[1][id]" id="buku_id" required>
               <option value="">Pilih Buku</option>
               <?php while ($row = $buku_result->fetch_assoc()): ?>
                   <option value="<?= $row['ID'] ?>"><?= $row['Judul'] ?></option>
               <?php endwhile; ?>
           </select>
       </div>
       <div class="mb-3">
           <label for="kuantitas" class="form-label">Jumlah Buku</label>
           <input type="number" class="form-control" id="kuantitas" name="buku[1][kuantitas]" required>
       </div>
       <button type="submit" class="btn btn-primary">Buat Pesanan</button>
   </form>
</div>
</body>
</html>
