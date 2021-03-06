<?php
require "./vendor/autoload.php";

$redis = new Predis\Client();
// Adiciona valor
$redis->set('chave', 'Rota dos Concursos');
//Busca valor
echo $redis->get('chave');
echo '<br/>';
//Busca a substring
echo $redis->getrange('chave', 0, 3);
echo '<br/>';
//Replace da parte de uma string por outra
$redis->setrange('chave', 7, ' Conhecimento!!');
echo $redis->get('chave');
echo '<br/>';
//Adiciona ao final de uma string
$redis->set('chave_add', 'A');
echo $redis->get('chave');
echo '<br/>';
//Adiciona ao final de um valor uma string
$redis->append('chave', ' Aqui vc garante sua vaga!!');
echo $redis->get('chave');
echo '<br/>';
// Retorna o tamanho do valor de uma string
echo $redis->strlen('chave');
echo '<br/>';
$redis->set('chave_numerica', 0);
//incrementa o elemento
$redis->incr('chave_numerica');
$redis->incr('chave_numerica');
echo $redis->get('chave_numerica');
echo '<br/>';
//decrementa o elemento
$redis->decr('chave_numerica');
echo $redis->get('chave_numerica');
echo '<br/>';
echo '<pre>';
// Adicionando e recuperando múltiplas chaves!!
$arrStrings = array(
    "chave_str:1"=>"Valor da chave 1",
    "chave_str:2"=>"Valor da chave 2",
    "chave_str:3"=>"Valor da chave 3",
);
//Remove tudo se existir
$redis->del(array_keys($arrStrings));
//adiciona os valores em lote
$redis->mset($arrStrings);
//busca os valores em lote
var_dump($redis->mget(array_keys($arrStrings)));