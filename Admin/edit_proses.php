
<?php
session_start();

$id=$_POST["id"];
$namaProduk=$_POST["namaProduk"];
$jenisProduk=$_POST["jenisProduk"];
$harga=$_POST["harga"];

// echo $id.$nama_produk.$jenis_produk.$harga;

$url="http://localhost:8094/produkKoperasi/?id=".$id;
   
$ch = curl_init( $url );
# Setup request to send json via POST.
$payload = json_encode( array( 'id'=> $id,
'namaProduk'=>$namaProduk,
'jenisProduk'=> $jenisProduk,
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