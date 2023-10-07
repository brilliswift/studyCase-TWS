<?php

require_once 'lib/nusoap.php';

$client= new nusoap_client('http://192.168.0.107/nusoap/server.php?wsdl', 'wsdl', true);

// dua bilangan yang akan dijumlahkan atau dikurangi
$bil1 = 10;
$bil2 = 15;

// proses call method 'jumlahkan' di script server.php yang ada di komputer B
$result = $client->call('jumlahkan', array('x' => $bil1, 'y' => $bil2));

$resultes = $client->call('kurang', array('a' => $bil1, 'b' => $bil2));

//tentativ
if($client->fault){
  echo 'Fault';
  print_r($result);
}else{

  $err=$client->getError();
  if($err){
    echo 'Gagal   '.$err;
  }else{
    echo "<p>Hasil penjumlahan ".$bil1." dan ".$bil2." adalah ".$result."</p>";
    echo "<p>Hasil pengurangan ".$bil1." dan ".$bil2." adalah ".$resultes."</p>";
  }
}


//echo "<p>Hasil penjumlahan ".$bil1." dan ".$bil2." adalah ".$result."</p>";
//echo "<p>Hasil pengurangan ".$bil1." dan ".$bil2." adalah ".$resultes."</p>";