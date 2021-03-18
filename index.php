<?php
require_once('./vendor/autoload.php');

use Libs\BlockChain\Block;
use Libs\BlockChain\BlockChain;

$cmCoin = new BlockChain();

$lastBlock = $cmCoin->getLastBlock();
$nextIndex = $lastBlock->index + 1;
echo "Minando bloque {$nextIndex}..." . PHP_EOL;
$cmCoin->push(new Block($nextIndex, strtotime("now"), [
  'from' => '112233',
  'to' => '332211',
  'ammount' => 666
]));

$lastBlock = $cmCoin->getLastBlock();
$nextIndex = $lastBlock->index + 1;
echo "Minando bloque {$nextIndex}..." . PHP_EOL;
$lastBlock = $cmCoin->getLastBlock();
$cmCoin->push(new Block($nextIndex, strtotime("now"), [
  'from' => '223344',
  'to' => '554477',
  'ammount' => 321
]));

echo "BlockChain: " . PHP_EOL;
echo json_encode($cmCoin, JSON_PRETTY_PRINT);
?>