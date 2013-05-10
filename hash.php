<?php
require "./vendor/autoload.php";

$redis = new Predis\Client();
$bilhetes = array(
    array('id'=>1, 'data'=>'2013-04-12', 'codigo'=> md5(rand(0, 1000))),
    array('id'=>2, 'data'=>'2013-01-07', 'codigo'=> md5(rand(0, 1000))),
    array('id'=>3, 'data'=>'2013-05-09', 'codigo'=> md5(rand(0, 1000)))
);

foreach ($bilhetes as $b) {
    $redis->hmset('bilhete:' . $b['id'], $b);
}
//busca todos os pares chave/valor do bilhte 1
var_dump($redis->hgetall('bilhete:1')); 
echo "<br/>";
//busca o valor da chave codigo do bilhte 2
var_dump($redis->hget('bilhete:2', 'codigo')); 