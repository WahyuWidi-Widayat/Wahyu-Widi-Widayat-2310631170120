<?php
$roda = $_GET['roda'] ?? null;

if ($roda !== null) {
    switch ($roda) {
        case 2:
            $jenis = "Motor";
            break;
        case 3:
            $jenis = "Bajai";
            break;
        case 4:
            $jenis = "Mobil";
            break;
        case 6:
            $jenis = "Truk Kecil";
            break;
        case 8:
            $jenis = "Truk Besar";
            break;
        default:
            $jenis = "Jenis Kendaraan tidak diketahui";
    }

    echo "Jumlah roda: $roda<br>";
    echo "Jenis Kendaraan: $jenis";
} else {
    
    ?>
    <form method="get">
        <label for="roda">Masukkan jumlah roda:</label>
        <input type="number" name="roda" id="roda" required>
        <button type="submit">Cek Jenis Kendaraan</button>
    </form>
    <?php
}
?>
