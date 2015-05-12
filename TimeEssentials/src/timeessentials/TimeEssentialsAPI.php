<?php

namespace timeessentials;

use pocketmine\plugin\PluginBase;
use timeessentials\commands\TimeEssentialsCommand;
use timeessentials\TimeEssentialsListener;

class TimeEssentialsAPI extends PluginBase{

    public function onEnable(){
        $this->command = new TimeEssentialsCommand($this);
        $this->listener = new TimeEssentialsListener($this);
        $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onDisable(){
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
}