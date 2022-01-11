
<?php
session_start();
include "../token.php";
$id=100;
$user_id=(int)$_POST["user_id"];
$tanggal_pemesanan=date("Y-m-d");
$produkkantin_id=(int)$_POST["produkkantin_id"];
$harga=(int)$_POST["harga"];
$jumlah_barang=(int)$_POST["jumlah_barang"];
$jenis_pembayaran = $_POST["jenis_pembayaran"];;
$status_pembayaran = "Tidak Lunas";


$url="https://localhost:8243/pemesanan/1/pemesanankantin/";
   
$ch = curl_init($url);
# Setup request to send json via POST.
$payload = json_encode( array('user_id'=>$user_id,
'tanggal_pemesanan'=> $tanggal_pemesanan,
'produkkantin_id'=>$produkkantin_id,
'harga'=>$harga,
'jumlah_barang'=>$jumlah_barang,
'jenis_pembayaran'=>$jenis_pembayaran,
'status_pembayaran'=>$status_pembayaran ) );
$authorization = "Authorization: Bearer ".$tokenpesankantin;
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
curl_setopt($ch, CURLOPT_POST, 1);
# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# SSL
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
# Send request.
$result = curl_exec($ch);
curl_close($ch);
# Print response.
//var_dump($result);
header('Location: listpemesanankantin.php');

// echo "id=> ". $id . "<br>";
// echo "user_id=> ". $user_id . "<br>";
// echo "tanggal_pemesanan=> ". $tanggal_pemesanan . "<br>";
// echo "produkkantin_id=> ". $produkkantin_id . "<br>";
// echo "harga=> ". $harga . "<br>";
// echo "jumlah_barang=> ". $jumlah_barang . "<br>";
// echo "jenis_pembayaran=> ". $jenis_pembayaran . "<br>";
// echo "status_pembayaran=> ". $status_pembayaran . "<br>";


?>