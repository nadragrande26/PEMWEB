TUGAS 2 WEBSITE

<?php
function cetakBilangan($n) {
    for ($i = 1; $i <= $n; $i++) {
        if ($i % 4 == 0 && $i % 6 == 0) {
            echo "Pemrograman Website 2024<br>";
        } elseif ($i % 5 == 0) {
            echo "2024<br>";
        } elseif ($i % 4 == 0) {
            echo "Pemrograman<br>";
        } elseif ($i % 6 == 0) {
            echo "Website<br>";
        } else {
            echo "$i<br>";
        }
    }
}

// Contoh pemanggilan fungsi dengan input n
cetakBilangan(25);
?>