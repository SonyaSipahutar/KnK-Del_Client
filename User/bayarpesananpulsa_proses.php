
<?php
session_start();

$id_user=$_POST["id_user"];
$nama_lengkap=$_POST["nama_lengkap"];

$password=$_POST["password"];
$no_ktp=$_POST["no_ktp"];
$no_hp=$_POST["no_hp"];
$saldo=$_POST["saldo"];


// pesanan_pulsa
$id=$_POST["id"];
$produkpulsa_id=$_POST["produkpulsa_id"];
$tanggal_pemesanan=$_POST["tanggal_pemesanan"];
$harga=$_POST["harga"];
$jenis_pembayaran=$_POST["jenis_pembayaran"];
$status_pembayaran=$_POST["status_pembayaran"];
$total_pembayaran=$_POST["total_pembayaran"];

$user_id=$_POST["user_id"];

$url="http://localhost:8031/pemesananPulsa/?id=".$id;
$url2="http://localhost:8081/users/?id=".$id_user;

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
curl_setopt( $ch2, CURLOPT_POSTFIELDS, $payload2 );
curl_setopt( $ch2, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
curl_setopt( $ch2, CURLOPT_RETURNTRANSFER, true );
# Send request.
$result2 = curl_exec($ch2);
curl_close($ch2);

// pemesanan_pulsa
$ch = curl_init( $url );
# Setup request to send json via POST.
$payload = json_encode( array(
  'id'=> $id,
  'user_id'=>$user_id,
  'produkpulsa_id'=>$produkpulsa_id,
  'tanggal_pemesanan'=>$tanggal_pemesanan,
  'harga'=>$harga,
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

echo "<script>alert('Transaksi Berhasil. Terimakasih Banyak!!');window.location='listpemesananpulsa.php'</script>";   
}else{
  echo "<script>alert('Transaksi Gagal. Saldo tiddak cukup!!');window.location='listpemesananpulsa.php'</script>";  
}


?>