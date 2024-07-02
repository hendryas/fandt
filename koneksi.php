<?php
$servername = "localhost";
$username = "root"; // sesuaikan dengan username MySQL Anda
$password = ""; // sesuaikan dengan password MySQL Anda
$dbname = "db_food_and_travel";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}
echo "Koneksi berhasil";
