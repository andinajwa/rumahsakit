<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nama_poli = $_POST["nama_poli"];
    $keterangan = $_POST["keterangan"];
    $url = "http://localhost:3000/api/poli/update/$id";

    $data = [
        "nama_poli" => $nama_poli,
        "keterangan" => $keterangan
    ];

    $ch = curl_init($url);

    // Konfigurasi cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Agar respons disimpan dalam variabel
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH"); // Mengatur metode request menjadi PUT
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json', // Header untuk JSON
        'Accept: application/json'
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Data JSON yang dikirim

    // Eksekusi cURL
    $response = curl_exec($ch);

    // Cek apakah ada error
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    } else {
        echo '<script>';
        echo 'alert("Data poli berhasil diubah!");';
        echo 'window.location.href = "../../poli.php";';
        echo '</script>';
    }

    // Tutup cURL
    curl_close($ch);
}
