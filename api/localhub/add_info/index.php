<?php
header("Access-Control-Allow-Origin: *");


$method = 'POST';
$server = 'http://zimbor.go.ro/solr/';
$core  = 'localhub';
$command ='/update';
$qs = '?_=1617366504771&commitWithin=1000&overwrite=true&wt=json';

$url =  $server.$core.$command.$qs;
 
$data = file_get_contents('php://input');


$url = $server.$core.$command.$qs;

$options = array(
    'http' => array(
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => $data
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ }

var_dump($result);
?>