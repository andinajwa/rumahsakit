<?php
// Koneksi ke database
require 'config/koneksi.php';

// Ambil id poli dari AJAX
$poliId = $_POST['poliId'];

function getHariIndonesia($tanggal)
{
    $hariInggris = date('l', strtotime($tanggal));
    $hariIndonesia = [
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
    ];
    return $hariIndonesia[$hariInggris];
}


// Buat kueri SQL untuk mengambil jadwal berdasarkan poli
$query = "SELECT jadwal.id as idJadwal, dokter.nama, jadwal.mulai FROM jadwal INNER JOIN dokter 
ON jadwal.id_dokter = dokter.id INNER JOIN poli ON dokter.id_poli = poli.id WHERE poli.id = '$poliId' AND status = '1'";
$result = mysqli_query($mysqli, $query);

// Periksa apakah kueri berhasil dieksekusi
if ($result) {
    // Format data jadwal menjadi opsi select
    if (mysqli_num_rows($result) > 0) {
        $jadwalOptions = "";
        while ($dataJadwal = mysqli_fetch_assoc($result)) {
            $hari = getHariIndonesia($dataJadwal['mulai']);
            $tanggal = date('d-m-Y', strtotime($dataJadwal['mulai'])); // Format tanggal
            $jamMulai = date('H:i', strtotime($dataJadwal['mulai'])); // Format jam
            $jadwalOptions .= "<option value='" . $dataJadwal['idJadwal'] . "'>"
                . $dataJadwal['nama'] . " - " . $hari . ", " . $tanggal . " " . $jamMulai . "</option>";
        }
        // Kirim data jadwal ke AJAX
        echo $jadwalOptions;
    } else {
        echo "<option value=''>Jadwal tidak ditemukan</option>";
    }

    // Bebaskan hasil kueri
    mysqli_free_result($result);
} else {
    // Tampilkan pesan kesalahan jika kueri gagal dieksekusi
    echo "Error: " . mysqli_error($mysqli);
}

// Tutup koneksi ke database
mysqli_close($mysqli);
