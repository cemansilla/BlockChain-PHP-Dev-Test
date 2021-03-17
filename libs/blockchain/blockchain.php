<?php
namespace Libs\BlockChain;

use Libs\BlockChain\Block;

class BlockChain{
  public function __construct()
  {
    $this->chain = [$this->createGenesisBlock()];
    $this->difficulty = 4;
  }

  private function createGenesisBlock()
  {
    return new Block(0, strtotime("2008-10-25"), "Genesis Block");
  }

  public function getLastBlock()
  {
    return $this->chain[count($this->chain)-1];
  }

  public function push($block)
  {
    $block->previousHash = $this->getLastBlock()->hash;
    $this->mine($block);

    array_push($this->chain, $block);
  }

  public function mine($block)
  {
    while (substr($block->hash, 0, $this->difficulty) !== str_repeat("0", $this->difficulty)) {
      $block->nonce++;
      $block->hash = $block->calculateHash();
    }

    return $block->hash;
  }

  public function isValid()
  {
    for ($i = 1; $i < count($this->chain); $i++) {
      $currentBlock = $this->chain[$i];
      $previousBlock = $this->chain[$i-1];

      if ($currentBlock->hash != $currentBlock->calculateHash()) {
        return false;
      }

      if ($currentBlock->previousHash != $previousBlock->hash) {
        return false;
      }
    }

    return true;
  }
}
?>