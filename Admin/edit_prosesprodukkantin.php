
<?php
session_start();
include "../token.php";

$id=$_POST["id"];
$nama_produk=$_POST["nama_produk"];
$jenis_produk=$_POST["jenis_produk"];
$harga=$_POST["harga"];



$url="https://localhost:8243/kantin/1/produkkantin/".$id;
   
$ch = curl_init( $url );

$payload = json_encode( array( 'id'=> $id,
'nama_produk'=>$nama_produk,
'jenis_produk'=> $jenis_produk,
'harga'=>$harga ) );

$authorization = "Authorization: Bearer ".$tokenprodukkantin;
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
curl_setopt($ch, CURLOPT_POST, 1);
# Return response instead of printing.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
# SSL
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
# Send request.
$result = curl_exec($ch);
curl_close($ch);
# Print response.
header('Location: produkkantin.php');


?>