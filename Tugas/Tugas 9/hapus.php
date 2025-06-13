<?php
include 'koneksi_db.php';

// Ambil semua data buku
$result = $conn->query("SELECT * FROM buku");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hapus Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'nav.php'; ?>

<div class="container mt-4">
    <h2>Hapus Buku</h2>
    <p>Pilih buku yang ingin dihapus:</p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['Judul']) ?></td>
                <td><?= htmlspecialchars($row['Penulis']) ?></td>
                <td><?= $row['Tahun_Terbit'] ?></td>
                <td>
                    <a href="proses_hapus.php?id=<?= $row['ID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
