<?php
require "./vendor/autoload.php";

$redis = new Predis\Client();
$redis->del('chave');
$redis->del('chave_sorted');
// Adiciona valores
$redis->sadd('chave', 'A');
$redis->sadd('chave', 'B');
$redis->sadd('chave', 'A');
$redis->sadd('chave', 'C');
//Exibe membros do conjunto
var_dump($redis->smembers('chave'));
echo "<br/>";
// Adiciona valores em um conjunto ordenado
$redis->zadd('chave_sorted', 1, 'A');
$redis->zadd('chave_sorted', 2, 'B');
$redis->zadd('chave_sorted', 1, 'A');
$redis->zadd('chave_sorted', 3, 'C');
$redis->zadd('chave_sorted', 3, 'D');
//Exibe membros do conjunto
var_dump($redis->zrange('chave_sorted', 0, -1));