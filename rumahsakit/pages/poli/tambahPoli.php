<?php
// include ("../../config/koneksi.php");
$url = "http://localhost:3000/api/poli/simpan";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_poli = $_POST["nama_poli"];
    $keterangan = $_POST["keterangan"];

    $data = [
        "nama_poli" => $nama_poli,
        "keterangan" => $keterangan
    ];
    $ch = curl_init($url);

    // Konfigurasi cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json', // Header untuk JSON
        'Accept: application/json'
    ]);

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Data JSON
    // Eksekusi cURL
    $response = curl_exec($ch);

    // Cek error
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    } else {
        // echo "Response: " . $response;
        echo '<script>';
        echo 'alert("Data poli berhasil ditambahkan!");';
        echo 'window.location.href = "../../poli.php";';
        echo '</script>';
    }

    // Tutup cURL
    curl_close($ch);
}
