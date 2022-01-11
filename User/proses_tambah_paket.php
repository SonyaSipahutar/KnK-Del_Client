<?php
session_start();
include "../token.php";
$id = $_POST["id"];
$user_id=$_POST["user_id"];
$nama_Lengkap = $_POST["nama_Lengkap"];
$alamat_tujuan=$_POST["alamat_tujuan"];
$alamat_pengirim=$_POST["alamat_pengirim"];
$nomor_hp_penerima=$_POST["nomor_hp_penerima"];
$deskripsi_paket=$_POST["deskripsi_paket"];
$status_pengiriman=0;
$url="https://localhost:8243/pengiriman/1/pengiriman/tambah";

$authorization = "Authorization: Bearer ".$tokenpaket;
$ch = curl_init($url);
$payload=json_encode(array(
    'id'=>$id,
    'nama_Lengkap'=>$nama_Lengkap,
    'alamat_tujuan'=>$alamat_tujuan,
    'alamat_pengirim'=>$alamat_pengirim,
    'nomor_hp_penerima'=>$nomor_hp_penerima,
    'deskripsi_paket'=>$deskripsi_paket,
    'harga_pengiriman'=>15000,
    'status_pengiriman'=>$status_pengiriman,
    'user_id'=>$user_id
));

curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$result=curl_exec($ch);
curl_close($ch);
header("Location: paket.php");
?>