
<?php
session_start();
include "token.php";

$id=100;
$nama_lengkap=$_POST["nama_lengkap"];
$email=$_POST["email"];
$password=$_POST["password"];
$no_ktp=$_POST["no_ktp"];
$no_hp=$_POST["no_hp"];
$saldo=0;

$url="https://localhost:8243/user/1/users/";
   
$ch = curl_init( $url );
# Setup request to send json via POST.
$payload = json_encode( array( 'id'=> $id,
'nama_lengkap'=>$nama_lengkap,
'email'=>$email,
'password'=>$password,
'no_ktp'=>$no_ktp,
'no_hp'=> $no_hp,
'saldo'=>$saldo ) );
$authorization = "Authorization: Bearer ".$tokenuser;
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
curl_setopt($ch, CURLOPT_POST, 1);
# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# SSL
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
# Send request.
$result = curl_exec($ch);
curl_close($ch);
# Print response.
header('Location: login.php');


?>