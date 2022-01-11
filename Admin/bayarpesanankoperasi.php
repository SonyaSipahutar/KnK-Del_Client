<?php
session_start();
if (isset($_GET["id"])) {
  $idPesanan=$_GET["id"];
  $url="http://localhost:8094/pemesananProdukKoperasi/".$idPesanan;
  $content=file_get_contents($url);
  $myjson=json_decode($content,true);
}
$idPesanan=$_GET["id"];

$id = $myjson["id"];
$user_id = $myjson["user_id"];
$produkkoperasi_id = $myjson["produkkoperasi_id"];
$tanggal_pemesanan = $myjson["tanggal_pemesanan"];
$harga = $myjson["harga"];
$jumlah_barang = $myjson["jumlah_barang"];
$jenis_pembayaran = $myjson["jenis_pembayaran"];
$status_pembayaran = "Lunas";

if(!isset($_SESSION['logged_in'])){
  header('location:../login.php');
}else{
  $email = $_SESSION['email'];
  $password = $_SESSION['password'];
}

$url="http://localhost:8094/pemesananProdukKoperasi/?id=".$id;
$ch = curl_init( $url );
# Setup request to send json via POST.
$payload = json_encode( array(
  'id'=> $id,
  'user_id'=>$user_id,
  'produkkoperasi_id'=>$produkkoperasi_id,
  'tanggal_pemesanan'=>$tanggal_pemesanan,
  'harga'=>$harga,
  'jumlah_barang'=>$jumlah_barang,
  'jenis_pembayaran'=> $jenis_pembayaran,
  'status_pembayaran'=>$status_pembayaran) );
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
$result = curl_exec($ch);
curl_close($ch);
# Print response.
header('Location: listpemesanankoperasi.php'); 

// $id = $myjson->id;
// $user_id = $myjson->user_id;
// $tanggal_pemesanan = $myjson->tanggal_pemesanan;
// $harga = $myjson->harga;
// $jumlah_barang = $myjson->jumlah_barang;
// $jenis_pembayaran = $myjson->jenis_pembayaran;
// $status_pembayaran = "Lunas";

// $harga2 = ($harga*$jumlah_barang) - $saldo;
   

?>

