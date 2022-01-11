
<?php
session_start();

$id=$_POST["id"];
$nama_produk=$_POST["namaProduk"];
$jenis_produk=$_POST["jenisProduk"];
$harga=$_POST["harga"];

$url="http://localhost:8094/produkKoperasi/";
   
$ch = curl_init( $url );
# Setup request to send json via POST.
$payload = json_encode( array( 'id'=> $id,
'namaProduk'=>$nama_produk,
'jenisProduk'=> $jenis_produk,
'harga'=>$harga ) );
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
$result = curl_exec($ch);
curl_close($ch);
# Print response.
header('Location: koperasi.php');


?>