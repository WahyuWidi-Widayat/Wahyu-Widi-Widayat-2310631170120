<?php
include 'koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    // Cek apakah nama pelanggan sudah ada
    $cek = $conn->prepare("SELECT * FROM pelanggan WHERE Nama = ?");
    $cek->bind_param("s", $nama);
    $cek->execute();
    $result = $cek->get_result();

    if ($result->num_rows > 0) {
        // Nama sudah ada, tolak penambahan
        header("Location: buat_pesanan.php?message=Nama pelanggan sudah ada");
    } else {
        // Nama belum ada, boleh insert
        $stmt = $conn->prepare("INSERT INTO pelanggan (Nama, Alamat, Email, Telepon) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama, $alamat, $email, $telepon);

        if ($stmt->execute()) {
            header("Location: transaksi.php?message=Pelanggan berhasil ditambahkan");
        } else {
            header("Location: transaksi.php?message=Gagal menambahkan pelanggan");
        }

        $stmt->close();
    }

    $cek->close();
    $conn->close();
}
?>
