<?php
require_once('./vendor/autoload.php');

use Libs\BlockChain\Block;
use Libs\BlockChain\BlockChain;

$cmCoin = new BlockChain();

echo "Minando bloque 1..." . PHP_EOL;
$cmCoin->push(new Block(1, strtotime("now"), [
  'from' => '112233',
  'to' => '332211',
  'ammount' => 666
]));

echo "Minando bloque 2..." . PHP_EOL;
$cmCoin->push(new Block(2, strtotime("now"), [
  'from' => '223344',
  'to' => '554477',
  'ammount' => 321
]));

echo json_encode($cmCoin, JSON_PRETTY_PRINT);
?>