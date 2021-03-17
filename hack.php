<?php
require_once('./vendor/autoload.php');

use Libs\BlockChain\Block;
use Libs\BlockChain\BlockChain;

$cmCoin = new BlockChain();

echo "Minando bloque 1...\n";
$cmCoin->push(new Block(1, strtotime("now"), [
  'from' => '112233',
  'to' => '332211',
  'ammount' => 666
]));

echo "Minando bloque 2...\n";
$cmCoin->push(new Block(2, strtotime("now"), [
  'from' => '223344',
  'to' => '554477',
  'ammount' => 321
]));

echo "BlockChain válido: " . ($cmCoin->isValid() ? "✔" : "✘") . PHP_EOL;

echo "Hackeando bloque 2..." . PHP_EOL;
$cmCoin->chain[1]->data = [
  'from' => '997788',
  'to' => '339966',
  'ammount' => 666
];
$cmCoin->chain[1]->hash = $cmCoin->chain[1]->calculateHash();

echo "BlockChain válido: " . ($cmCoin->isValid() ? "✔" : "✘") . PHP_EOL;
?>