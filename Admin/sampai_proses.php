<?php
session_start();
if (isset($_GET["id"])) {
  $idPesanan=$_GET["id"];
  $url="https://localhost:8243/pengiriman/1/pengiriman/ambilById/".$idPesanan;
  include "../token.php";
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

  $headers = array(
      "Accept: application/json",
      "Authorization:  Bearer curl -X GET ". $tokenpaket
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
$nama_Lengkap = $myjson["nama_Lengkap"];
$alamat_tujuan = $myjson["alamat_tujuan"];
$alamat_pengirim = $myjson["alamat_pengirim"];
$nomor_hp_penerima = $myjson["nomor_hp_penerima"];
$deskripsi_paket = $myjson["deskripsi_paket"];
$harga_pengiriman = $myjson["harga_pengiriman"];
$status_pengiriman = 2;
$user_id=$myjson["user_id"];
if(!isset($_SESSION['logged_in'])){
  header('location:../login.php');
}else{
  $email = $_SESSION['email'];
  $password = $_SESSION['password'];
}

$url="https://localhost:8243/pengiriman/1/pengiriman/update/".$id;
$ch = curl_init( $url );
# Setup request to send json via POST.
$payload = json_encode( array(
  'id'=> $id,
  'nama_Lengkap'=>$nama_Lengkap,
  'alamat_tujuan'=>$alamat_tujuan,
  'alamat_pengirim'=>$alamat_pengirim,
  'nomor_hp_penerima'=>$nomor_hp_penerima,
  'deskripsi_paket'=>$deskripsi_paket,
  'harga_pengiriman'=> $harga_pengiriman,
  'status_pengiriman'=>$status_pengiriman,
  'user_id'=>$user_id) );
$authorization = "Authorization: Bearer ".$tokenpaket;
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

header('Location: paket.php'); 
?>