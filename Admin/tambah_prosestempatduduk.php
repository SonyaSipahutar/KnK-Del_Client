<?php
session_start();
include "../token.php";
$id = $_POST["id"];
$lokasi = $_POST["lokasi"];
$status = $_POST["status"];

$url = "https://localhost:8243/kursi/1/tempatduduk/";

$authorization = "Authorization: Bearer ".$tokenpesantempatduduk;
$ch = curl_init($url);
# Setup request to send json via POST.
$payload = json_encode(array(
    'id' => $id,
    'lokasi' => $lokasi,
    'status' => $status
));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
# Send request.
$result = curl_exec($ch);
curl_close($ch);
# Print response.
header('Location: tempatduduk.php');
