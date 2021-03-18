<?php
namespace Libs\BlockChain;

class Persistor{
  private $store_path = "data/";
  private $store_name = "blockchain.json";

  public function __construct()
  {
    if(!is_dir($this->store_path))
    {
      mkdir($this->store_path, 0777, true);
    }
  }

  public function getBlockChain()
  {
    if(!file_exists($this->store_path . $this->store_name)){
      return false;
    }

    return json_decode(file_get_contents($this->store_path . $this->store_name));
  }

  public function initBlockChain($genesisBlock)
  {
    if(file_exists($this->store_path . $this->store_name)){
      return false;
    }

    file_put_contents($this->store_path . $this->store_name, json_encode([$genesisBlock]), LOCK_EX);
  }

  /**
   * TODO: Vuelta de rosca.
   * Estoy sobreescribiendo la blockchain entera cada vez, en lugar de agregar el nuevo bloque al final.
   */
  public function addBlock($block){
    $blockChain = $this->getBlockChain();

    array_push($blockChain, $block);

    file_put_contents($this->store_path . $this->store_name, json_encode($blockChain), LOCK_EX);
  }
}
?>