<?php
include '../../config/koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idPoli = $_SESSION['id_poli'];
    $idDokter = $_SESSION['id'];
    $tanggal = $_POST["tanggal_periksa"];

    // $queryOverlap = "SELECT * FROM jadwal INNER JOIN dokter ON jadwal.id_dokter = dokter.id INNER JOIN poli ON 
    // dokter.id_poli = poli.id WHERE id_poli = '$idPoli' AND mulai = '$tanggal'
    // OR (jam_mulai < '$jamMulai' AND jam_selesai > '$jamMulai'))";

    // $resultOverlap = mysqli_query($mysqli,$queryOverlap);

    // if (mysqli_num_rows($resultOverlap)>0) {
    //     echo '<script>alert("Dokter lain telah mengambil jadwal ini");window.location.href="../../jadwalPeriksa.php";</script>';
    // }
    // else{
    // Query tambah data jadwal
    $query = "INSERT INTO jadwal (id_dokter, mulai, status) VALUES ('$idDokter', '$tanggal' , '1')";

    if (mysqli_query($mysqli, $query)) {
        echo '<script>';
        echo 'alert("Jadwal berhasil ditambahkan!");';
        echo 'window.location.href = "../../jadwalPeriksa.php";';
        echo '</script>';
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
    // }
}
mysqli_close($mysqli);
