<?php
$size = 5; // Ukuran tinggi segitiga

// Segitiga Sama Sisi
echo "<pre>"; // Menggunakan <pre> untuk menjaga spasi tetap tampil dalam HTML
echo "1. SEGITIGA SAMA SISI\n";
for ($i = 1; $i <= $size; $i++) {
    // Cetak spasi
    for ($j = $i; $j < $size; $j++) {
        echo " "; // Spasi biasa
    }
    // Cetak bintang
    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }
    echo "\n"; // Pindah baris
}

echo "\n"; // Tambah baris kosong untuk pemisah

// Segitiga Sama Sisi Terbalik
echo "2. SEGITIGA SAMA SISI TERBALIK\n";
for ($i = $size; $i >= 1; $i--) {
    // Cetak spasi
    for ($j = $size; $j > $i; $j--) {
        echo " "; // Spasi biasa
    }
    // Cetak bintang
    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }
    echo "\n"; // Pindah baris
}
echo "</pre>"; // Menutup <pre> untuk format yang rapi
?>
