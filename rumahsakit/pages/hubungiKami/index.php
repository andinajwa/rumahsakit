<?php
require '../../config/koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $query = "INSERT INTO hubungi_kami (nama, email, pesan) VALUES ('$name', '$email','$message')";
    if (mysqli_query($mysqli, $query)) {
        echo '<script>';
        echo 'alert("Berhasil Dikirim");';
        echo 'window.location.href = "../../index.php";';
        echo '</script>';
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
}
mysqli_close($mysqli);