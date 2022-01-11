
<?php
session_start();

$id=100;
$user_id=(int)$_POST["user_id"];
$tanggal_pemesanan=date("Y-m-d");
$produkpulsa_id=(int)$_POST["produkpulsa_id"];
$harga=(int)$_POST["harga"];
$jenis_pembayaran = $_POST["jenis_pembayaran"];;
$status_pembayaran = "Tidak Lunas";


$url="http://localhost:8031/pemesananPulsa/";
   
$ch = curl_init($url);
# Setup request to send json via POST.
$payload = json_encode( array(
'id'=>$id,    
'user_id'=>$user_id,
'tanggal_pemesanan'=> $tanggal_pemesanan,
'produkpulsa_id'=>$produkpulsa_id,
'harga'=>$harga,
'jenis_pembayaran'=>$jenis_pembayaran,
'status_pembayaran'=>$status_pembayaran ) );
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
$result = curl_exec($ch);
curl_close($ch);
# Print response.
header('Location: listpemesananpulsa.php');




?>