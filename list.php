<?php
require "./vendor/autoload.php";

$redis = new Predis\Client();
//Remove uma chave
$redis->del('chave');
//Adiciona valor(es)
$redis->lpush('chave', 'v1');
$redis->lpush('chave', 'v2', 'v3', 'v4', 'v5', 'v6');
//Obtém tamanho da lista
$tam = $redis->llen('chave');
echo $tam;
echo "<br/>";
//Obtém um intervalo de elemento da lista
var_dump($redis->lrange('chave', 0,  $tam - 1)); 
echo "<br/>";
var_dump($redis->lrange('chave', 0,  -1)); 
echo "<br/>";
// Remove e retorna o último da lista
echo $redis->lpop('chave');
echo "<br/>";
// Remove e retorna o primeiro da lista
echo $redis->rpop('chave');