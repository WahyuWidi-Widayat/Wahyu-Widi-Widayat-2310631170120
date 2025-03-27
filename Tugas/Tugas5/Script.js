function cekNilai() {
    let nilai = document.getElementById("nilai").value;
    let hasil = document.getElementById("hasil");
    
    if (nilai < 0 || nilai > 100 || nilai === "") {
        hasil.innerHTML = "<span style='color:red;'>Nilai tidak valid!</span>";
    } else if (nilai >= 80) {
        hasil.innerHTML = "Huruf Mutu: A";
    } else if (nilai >= 70) {
        hasil.innerHTML = "Huruf Mutu: B";
    } else if (nilai >= 60) {
        hasil.innerHTML = "Huruf Mutu: C";
    } else if (nilai >= 50) {
        hasil.innerHTML = "Huruf Mutu: D";
    } else {
        hasil.innerHTML = "Huruf Mutu: E";
    }
}