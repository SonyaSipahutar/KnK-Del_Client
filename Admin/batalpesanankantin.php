<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    include "../token.php";
    $url="https://localhost:8243/pemesanan/1/pemesanankantin/".$id;

    $authorization = "Authorization: Bearer ".$tokenpesankantin;
    $ch = curl_init( $url );
    # Setup request to send json via POST.
    $payload = json_encode( array( 'id'=> $id ) );
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload );
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$authorization));
    # Return response instead of printing.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
    # SSL
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    # Send request.
    $result = curl_exec($ch);
    curl_close($ch);
 
    header('Location: listpemesanankantin.php');
}
?>