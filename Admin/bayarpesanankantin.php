<?php
session_start();
if (isset($_GET["id"])) {
  $idPesanan=$_GET["id"];
  $url="https://localhost:8243/pemesanan/1/pemesanankantin/".$idPesanan;
  include "../token.php";
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

  $headers = array(
      "Accept: application/json",
      "Authorization:  Bearer curl -X GET ". $tokenpesankantin
  );
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  //for debug only!
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

  $resp = curl_exec($curl);
  curl_close($curl);
  $myjson=json_decode($resp,true);

}
$idPesanan=$_GET["id"];

$id = $myjson["id"];
$user_id = $myjson["user_id"];
$produkkantin_id = $myjson["produkkantin_id"];
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

$url="https://localhost:8243/pemesanan/1/pemesanankantin/".$id;
$ch = curl_init( $url );
# Setup request to send json via POST.
$payload = json_encode( array(
  'id'=> $id,
  'user_id'=>$user_id,
  'produkkantin_id'=>$produkkantin_id,
  'tanggal_pemesanan'=>$tanggal_pemesanan,
  'harga'=>$harga,
  'jumlah_barang'=>$jumlah_barang,
  'jenis_pembayaran'=> $jenis_pembayaran,
  'status_pembayaran'=>$status_pembayaran) );
$authorization = "Authorization: Bearer ".$tokenpesankantin;
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
# Return response instead of printing.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
# SSL
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
# Send request.
$result = curl_exec($ch);
curl_close($ch);
# Print response.

header('Location: listpemesanankantin.php'); 

// $id = $myjson->id;
// $user_id = $myjson->user_id;
// $tanggal_pemesanan = $myjson->tanggal_pemesanan;
// $harga = $myjson->harga;
// $jumlah_barang = $myjson->jumlah_barang;
// $jenis_pembayaran = $myjson->jenis_pembayaran;
// $status_pembayaran = "Lunas";

// $harga2 = ($harga*$jumlah_barang) - $saldo;
   

?>

