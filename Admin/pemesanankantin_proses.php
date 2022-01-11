
<?php
session_start();

$id=100;
$user_id=(int)$_POST["user_id"];
$tanggal_pemesanan=date("Y-m-d");
$produkkantin_id=(int)$_POST["produkkantin_id"];
$harga=(int)$_POST["harga"];
$jumlah_barang=(int)$_POST["jumlah_barang"];
$jenis_pembayaran = $_POST["jenis_pembayaran"];;
$status_pembayaran = "Tidak Lunas";


$url="http://localhost:8083/pemesanankantin/";
   
$ch = curl_init($url);
# Setup request to send json via POST.
$payload = json_encode( array('user_id'=>$user_id,
'tanggal_pemesanan'=> $tanggal_pemesanan,
'produkkantin_id'=>$produkkantin_id,
'harga'=>$harga,
'jumlah_barang'=>$jumlah_barang,
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