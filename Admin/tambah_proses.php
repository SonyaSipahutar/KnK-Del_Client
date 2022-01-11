
<?php
session_start();

$id=$_POST["id"];
$nama_matkul=$_POST["harga_pulsa"];

$url="http://localhost:8031/pulsa/";
   
$ch = curl_init( $url );
# Setup request to send json via POST.
$payload = json_encode( array( 'id'=> $id,
'harga_pulsa'=>$nama_matkul,) );
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
$result = curl_exec($ch);
curl_close($ch);
# Print response.
header('Location: pulsa.php');


?>