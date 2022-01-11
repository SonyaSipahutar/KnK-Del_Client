
<?php
session_start();

$id = 100;
$user_id = (int)$_POST["id"];
$tanggal_pemesanan = date("Y-m-d");
$tempat_duduk_id = (int)$_POST["tempat_duduk_id"];
$nama_lengkap = $_POST["nama_lengkap"];
$email = $_POST["email"];
$no_ktp = $_POST["no_ktp"];
$no_hp = $_POST["no_hp"];

$url = "http://localhost:8091/pemesanantempatduduk/";

$ch = curl_init($url);
# Setup request to send json via POST.
$payload = json_encode(array(
    'id' => $user_id,
    'tanggal_pemesanan' => $tanggal_pemesanan,
    'tempat_duduk_id' => $tempat_duduk_id,
    'nama_lengkap' => $nama_lengkap,
    'email' => $email,
    'no_ktp' => $no_ktp,
    'no_hp' => $no_hp
));
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
# Send request.
$result = curl_exec($ch);
curl_close($ch);
# Print response.
header('Location: listpemesanantempatduduk.php');



?>