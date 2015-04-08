<?php

namespace mytag;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;

class Loader extends PluginBase implements Listener{
    
    public function onEnable(){
    	$this->saveDefaultConfig();
    	if($this->getConfig()->get("version") === $this->getDescription()->getVersion()){
    	    $this->getServer()->getPluginManager()->registerEvents($this, $this);
            $this->getServer()->getLogger()->info("§aEnabling ".$this->getDescription()->getFullName()."...");
    	}
    	else{
    	    $this->getServer()->getLogger()->warning("Your configuration file for ".$this->getDescription()->getFullName()." is outdated.");
    	    $this->getPluginLoader()->disablePlugin($this);
    	}
    }
    
    public function onDisable(){
        $this->getServer()->getLogger()->info("§cDisabling ".$this->getDescription()->getFullName()."...");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    	if($sender instanceof Player){
    	    if(strtolower($command->getName()) === "mytag"){
    	    	if(isset($args[0])){
    	    	    if(strtolower($args[0]) === "address"){
    	    	    	$sender->setNameTag($sender->getNameTag()." ".$sender->getAddress().":".$sender->getPort());
    	    	    	$sender->sendMessage("Your IP address and port number has been set on your tag.");
    	    	    	return true;
    	    	    }
    	    	    if(strtolower($args[0]) === "chat"){
    	    	    	//To-do
    	    	    	return true;
    	    	    }
    	    	    if(strtolower($args[0]) === "health"){
    	    	    	$sender->setNameTag($sender->getNameTag()." ".$sender->getHealth()."/".$sender->getMaxHealth());
    	    	    	$sender->sendMessage("Your health has been set on your tag.");
    	    	    	return true;
    	    	    }
    	    	    if(strtolower($args[0]) === "help"){
    	    	    	$sender->sendMessage("MyTag commands");
    	    	    	$sender->sendMessage("§a/mytag address §c- §fShows IP address and port number on the name tag");
    	    	    	$sender->sendMessage("§a/mytag chat §c- §fShows the last message spoken on the name tag");
    	    	    	$sender->sendMessage("§a/mytag health §c- §fShows health on the name tag");
    	    	    	$sender->sendMessage("§a/mytag help §c- §fShows all the sub-commands for /tag");
    	    	    	$sender->sendMessage("§a/mytag hide §c- §fHides the name tag");
    	    	    	$sender->sendMessage("§a/mytag money §c- §fShows the amount of money ");
    	    	    	$sender->sendMessage("§a/mytag op §c- §fShows op status on the name tag, if they have it");
    	    	    	$sender->sendMessage("§a/mytag restore §c- §fRestores current name tag to the default name tag");
    	    	    	$sender->sendMessage("§a/mytag view §c- §fShows the name tag with a message");
    	    	    	return true;
    	    	    }
    	    	    if(strtolower($args[0]) === "hide"){
    	    	    	$sender->setNameTag(null);
    	    	    	$sender->sendMessage("Your name tag has been hidden.");
    	    	    	return true;
    	    	    }
    	    	    if(strtolower($args[0]) === "money"){
    	    	    	//To-do
    	    	    	return true;
    	    	    }
    	    	    if(strtolower($args[0]) === "op"){
    	    	    	return true;
    	    	    }
    	    	    if(strtolower($args[0]) === "restore"){
    	    	    	$sender->setNameTag($sender->getName());
    	    	    	$sender->sendMessage("Your default name tag has been restored.");
    	    	    	return true;
    	    	    }
    	    	    if(strtolower($args[0]) === "view"){
    	    	    	$sender->sendMessage("Your tag: ".$sender->getNameTag());
    	    	    	return true;
    	    	    }
    	    	    return false;
    	    	}
    	    	else{
    	    	    $sender->sendMessage("MyTag commands");
    	    	    $sender->sendMessage("§a/mytag address §c- §fShows IP address and port number on the name tag");
    	    	    $sender->sendMessage("§a/mytag chat §c- §fShows the last message spoken on the name tag");
    	    	    $sender->sendMessage("§a/mytag health §c- §fShows health on the name tag");
    	    	    $sender->sendMessage("§a/mytag help §c- §fShows all the sub-commands for /tag");
    	    	    $sender->sendMessage("§a/mytag hide §c- §fHides the name tag");
    	    	    $sender->sendMessage("§a/mytag money §c- §fShows the amount of money ");
    	    	    $sender->sendMessage("§a/mytag op §c- §fShows op status on the name tag, if they have it");
    	    	    $sender->sendMessage("§a/mytag restore §c- §fRestores current name tag to the default name tag");
    	    	    $sender->sendMessage("§a/mytag view §c- §fShows the name tag with a message");
    	    	}
    	    }
    	}
    	else{
    	    if(strtolower($command->getName()) === "mytag"){
    	    	if(isset($args[0])){
    	    	    if(strtolower($args[0]) === "help"){
    	    		$sender->sendMessage("MyTag commands");
    	    		$sender->sendMessage("§a/mytag address §c- §fShows IP address and port number on the name tag");
    	    		$sender->sendMessage("§a/mytag chat §c- §fShows the last message spoken on the name tag");
    	    		$sender->sendMessage("§a/mytag health §c- §fShows health on the name tag");
    	    		$sender->sendMessage("§a/mytag help §c- §fShows all the sub-commands for /tag");
    	    		$sender->sendMessage("§a/mytag hide §c- §fHides the name tag");
    	    		$sender->sendMessage("§a/mytag money §c- §fShows the amount of money ");
    	    		$sender->sendMessage("§a/mytag op §c- §fShows op status on the name tag, if they have it");
    	    		$sender->sendMessage("§a/mytag restore §c- §fRestores current name tag to the default name tag");
    	    		$sender->sendMessage("§a/mytag view §c- §fShows the name tag with a message");
    	    		return true;
    	    	    }
    	    	    else{
    	    	    	$sender->sendMessage("§cPlease run this command in-game.");
    	    	    	return true;
    	    	    }
    	    	}
    	    	else{
    	    	    $sender->sendMessage("MyTag commands:");
    	    	    $sender->sendMessage("§a/mytag address §c- §fShows IP address and port number on the name tag");
    	    	    $sender->sendMessage("§a/mytag chat §c- §fShows the last message spoken on the name tag");
    	    	    $sender->sendMessage("§a/mytag health §c- §fShows health on the name tag");
    	    	    $sender->sendMessage("§a/mytag help §c- §fShows all the sub-commands for /tag");
    	    	    $sender->sendMessage("§a/mytag hide §c- §fHides the name tag");
    	    	    $sender->sendMessage("§a/mytag money §c- §fShows the amount of money ");
    	    	    $sender->sendMessage("§a/mytag op §c- §fShows op status on the name tag, if they have it");
    	    	    $sender->sendMessage("§a/mytag restore §c- §fRestores current name tag to the default name tag");
    	    	    $sender->sendMessage("§a/mytag view §c- §fShows the name tag with a message");
    	    	    return true;
    	    	}
    	    }
    	}
    }
    
    public function onPlayerChat(PlayerChatEvent $event){
    	
    }
    
    public function onPlayerJoin(PlayerJoinEvent $event){
	if(file_exists($this->getDataFolder()."data/".$event->getPlayer()->getName().".yml") && $this->getConfig()->get("enable")["auto-set"] === true){
	    $event->getPlayer()->setNameTag(yaml_parse(file_get_contents($this->getDataFolder()."data/".$event->getPlayer()->getName().".yml")));
	}
	else{
	    @mkdir($this->getDataFolder()."data/");
	    file_put_contents($this->getDataFolder()."data/".$event->getPlayer()->getName().".yml", yaml_emit(array("tag" => $event->getPlayer()->getNameTag())));
	    $this->getServer()->getLogger()->notice("Created new data file for ".$event->getPlayer()->getName()." at MyTag\\data\\".$event->getPlayer()->getName().".yml");
	}
    }
	
    public function onPlayerQuit(PlayerQuitEvent $event){
    	if($this->getConfig()->get("enable")["auto-set"] === true){
    	    @mkdir($this->getDataFolder()."data/");
	    file_put_contents($this->getDataFolder()."data/".$event->getPlayer()->getName().".yml", yaml_emit(array("tag" => $event->getPlayer()->getNameTag())));
    	}
    }
}
