<?php
include("../../config/koneksi.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $url = "http://localhost:3000/api/poli/delete/$id";
    $ch = curl_init($url);

    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json', // Header untuk JSON
        'Accept: application/json'
    ]);
    $response = curl_exec($ch);

    if(curl_errno($ch)){
        echo 'error: '. curl_error($ch);
    }else{
        echo '<script>';
        echo 'alert("Data poli berhasil dihapus!");';
        echo 'window.location.href = "../../poli.php";';
        echo '</script>';
    }
}
