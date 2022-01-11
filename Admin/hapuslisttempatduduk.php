<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $url = "http://localhost:8091/pemesanantempatduduk/" . $id;
    $content = file_get_contents($url);
    $myjson = json_decode($content, true);


    $ch = curl_init($url);
    # Setup request to send json via POST.
    $payload = json_encode(array('id' => $id));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    # Return response instead of printing.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    # Send request.
    $result = curl_exec($ch);
    curl_close($ch);
    # Print response.
    echo "<script>alert('Berhasil Hapus. Terimakasih Banyak!!');window.location='listpemesanantempatduduk.php'</script>";
}
