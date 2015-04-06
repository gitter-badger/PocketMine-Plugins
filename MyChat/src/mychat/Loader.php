<?php

namespace mychat;

use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase implements Listener{

    public function onEnable(){
    	$this->saveDefaultConfig();
    	$this->saveResource("key.txt");
    	if($this->getConfig()->get("version") === $this->getDescription()->getVersion()){
    	    $this->getServer()->getPluginManager()->registerEvents($this, $this);
            $this->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    	}
    	else{
    	    $this->getLogger()->info("§eYour configuration file is outdated.");
    	    $this->getPluginLoader()->disablePlugin($this);
    	}
    }
    
    public function onDisable(){
        $this->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onPlayerChat(PlayerChatEvent $event){
        $event->setFormat(str_replace(
            [
            "{health}",
            "{ip}",
            "{level}", 
            "{max-health}",
            "{message}", 
            "{player}",
            "{port}"
            ], 
            [
            $event->getPlayer()->getHealth(),
            $event->getPlayer()->getAddress(), 
            $event->getPlayer()->getLevel()->getName(), 
            $event->getPlayer()->getMaxHealth(),
            $event->getMessage(), 
            $event->getPlayer()->getName(), 
            $event->getPlayer()->getPort()
            ], 
            $this->getConfig()->get("format")
        ));
    }
    
    public function onPlayerDeath(PlayerDeathEvent $event){
        if($this->getConfig()->get("enable")["mute"]["player-death-message"] === true){
            $event->setDeathMessage(null);
        }
    }
    public function onPlayerJoin(PlayerJoinEvent $event){
        if($this->getConfig()->get("enable")["mute"]["player-join-message"] === true){
            $event->setJoinMessage(null);
        }
    }
    
    public function onPlayerQuit(PlayerQuitEvent $event){
        if($this->getConfig()->get("enable")["mute"]["player-quit-message"] === true){
            $event->setQuitMessage(null);
        }
    }
}