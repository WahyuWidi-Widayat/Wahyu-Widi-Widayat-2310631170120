<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Praktikum 7.5</title>
</head>
<body>
    <h2>Form Pembayaran UKT</h2>
    <form method="post" action="">
        NPM         : <input type="number" name="npm"><br>
        Nama        : <input type="text" name="nama"><br>
        Prodi       : <input type="text" name="prodi"><br>
        Semester    : <input type="number" name="semester"><br>
        Biaya UKT   : <input type="number" name="UKT"><br>
        <input type="submit" value="Proses">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $npm = $_POST['npm'];
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];
        $semester = $_POST['semester'];
        $UKT = $_POST['UKT'];

        if (is_numeric($npm) && is_numeric($semester) && is_numeric($UKT)) {
           if ($semester >= 1 && $semester <= 14) {
            if ($semester > 8 && $UKT >= 5000000 ){
                $diskon = 0.15 * $UKT;
                $total = $UKT - $diskon;

                echo "<h3>Hasil:</h3>";
                echo "NPM : $npm<br>";
                echo "Nama : $nama<br>";
                echo "Prodi : $prodi<br>";
                echo "Semester : $semester<br>";
                echo "Biaya UKT : $UKT<br>";
                echo "Diskon : $diskon<br>";
                echo "Total Pembayaran : $total<br>";
                echo "Diskon 15% diberikan karena semester lebih dari 8 dan UKT lebih dari 5 juta<br>";
            } elseif ($semester < 8 && $UKT >= 5000000) {
                $diskon = 0.10 * $UKT;
                $total = $UKT - $diskon;
                 echo "<h3>Hasil:</h3>";
                echo "NPM : $npm<br>";
                echo "Nama : $nama<br>";
                echo "Prodi : $prodi<br>";
                echo "Semester : $semester<br>";
                echo "Biaya UKT : $UKT<br>";
                echo "Diskon : $diskon<br>";
                echo "Total Pembayaran : $total<br>";
                echo "Diskon 10% diberikan karena UKT lebih dari 5 juta<br>";
            } else {
                $diskon = 0;
                $total = $UKT;
                   echo "<h3>Hasil:</h3>";
                echo "NPM : $npm<br>";
                echo "Nama : $nama<br>";
                echo "Prodi : $prodi<br>";
                echo "Semester : $semester<br>";
                echo "Biaya UKT : $UKT<br>";
                 echo "Diskon : $diskon<br>";
                echo "Total Pembayaran : $total<br>";

            }
        } 
    }
}
        else {
            echo "<p>Data tidak valid. Pastikan semua inputan benar.</p>";
        }
    

    ?>
</body>
</html>