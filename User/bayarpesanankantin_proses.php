
<?php
session_start();
include "../token.php";
$id_user=$_POST["id_user"];
$nama_lengkap=$_POST["nama_lengkap"];
$email=$_POST["email"];
$password=$_POST["password"];
$no_ktp=$_POST["no_ktp"];
$no_hp=$_POST["no_hp"];
$saldo=$_POST["saldo"];


// pesanan_kantin
$id=$_POST["id"];
$produkkantin_id=$_POST["produkkantin_id"];
$tanggal_pemesanan=$_POST["tanggal_pemesanan"];
$harga=$_POST["harga"];
$jumlah_barang=$_POST["jumlah_barang"];
$jenis_pembayaran=$_POST["jenis_pembayaran"];
$status_pembayaran=$_POST["status_pembayaran"];
$total_pembayaran=$_POST["total_pembayaran"];

$user_id=$_POST["user_id"];

$url="https://localhost:8243/pemesanan/1/pemesanankantin/".$id;
$url2="https://localhost:8243/user/1/users/".$id_user;

if($saldo>$total_pembayaran){
  $sisa_saldo = $saldo-$total_pembayaran;
  // users
  $ch2 = curl_init( $url2 );
  # Setup request to send json via POST.
  $payload2 = json_encode( array(
    'id'=> $id_user,
    'nama_lengkap'=>$nama_lengkap,
    'email'=>$email,
    'password'=>$password,
    'harga'=>$harga,
    'no_ktp'=>$no_ktp,
    'no_hp'=> $no_hp,
    'saldo'=>$sisa_saldo) );
  $authorization1 = "Authorization: Bearer ".$tokenuser;
  curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, "PUT");
  curl_setopt($ch2, CURLOPT_POSTFIELDS, $payload2 );
  curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization1 ));
  # Return response instead of printing.
  curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true );
  # SSL
  curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, 0);
  # Send request.
  $result2 = curl_exec($ch2);
  curl_close($ch2);

  // pemesanan_kantin
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
  echo "<script>alert('Transaksi Berhasil. Terimakasih Banyak!!');window.location='listpemesanankantin.php'</script>";  
}else{
  echo "<script>alert('Transaksi Gagal. Saldo tiddak cukup!!');window.location='listpemesanankantin.php'</script>";  
  // header('Location: listpemesanankantin.php'); 
}


?>