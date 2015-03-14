<?php

namespace DoMath;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase{
    
    public function onEnable(){
        $this->getLogger()->info(TextFormat::GREEN."DoMath enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."DoMath disabled.");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "add"){
            if(isset($args[0]) && isset($args[1])){
                if(is_numeric($args[0]) && is_numeric($args[1])){
                    $answer = $args[0] + $args[1];
                    $sender->sendMessage(TextFormat::RED.$args[0].TextFormat::WHITE." + ".TextFormat::BLUE.$args[1].TextFormat::WHITE." = ".TextFormat::GREEN.$answer);
                }
                else{
                    $sender->sendMessage(TextFormat::RED."Please use numbers.");
                }
            }
            else{
                $sender->sendMessage($command->getUsage());
            }
        }
        if(strtolower($command->getName()) === "divide"){
            if(isset($args[0]) && isset($args[1])){
                if(is_numeric($args[0]) && is_numeric($args[1])){
                    $answer = $args[0] / $args[1];
                    $sender->sendMessage(TextFormat::RED.$args[0].TextFormat::WHITE." / ".TextFormat::BLUE.$args[1].TextFormat::WHITE." = ".TextFormat::GREEN.$answer);
                } 
                else{
                    $sender->sendMessage(TextFormat::RED."Please use numbers.");
                }
            }
            else{
                $sender->sendMessage($command->getUsage()); 
            }
        }
        if(strtolower($command->getName()) === "multiply"){
            if(isset($args[0]) && isset($args[1])){
                if(is_numeric($args[0]) && is_numeric($args[1])){
                    $answer = $args[0] * $args[1];
                    $sender->sendMessage(TextFormat::RED.$args[0].TextFormat::WHITE." * ".TextFormat::BLUE.$args[1].TextFormat::WHITE." = ".TextFormat::GREEN.$answer);
                }
                else{
                    $sender->sendMessage(TextFormat::RED."Please use numbers.");
                }
            }
            else{
                $sender->sendMessage($command->getUsage());
            }
        }
        if(strtolower($command->getName()) === "subtract"){
            if(isset($args[0]) && isset($args[1])){
                if(is_numeric($args[0]) && is_numeric($args[1])){
                    $answer = $args[0] - $args[1];
                    $sender->sendMessage(TextFormat::RED.$args[0].TextFormat::WHITE." - ".TextFormat::BLUE.$args[1].TextFormat::WHITE." = ".TextFormat::GREEN.$answer);
                }
                else{
                    $sender->sendMessage(TextFormat::RED."Please use numbers.");
                }
            }
            else{
                $sender->sendMessage($command->getUsage());
            }
        }
        return true;
    }
}
