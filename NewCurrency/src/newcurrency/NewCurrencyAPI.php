<?php

namespace newcurrency;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;

class NewCurrencyAPI extends PluginBase{

    public function onEnable(){
      	$this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
      	$this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function getCurrencyPrefix(){
        return;
    }
    
    public function getCurrencySuffix(){
        return;
    }
    
    public function getPlayerBalance(Player $player){
        return;
    }
}
