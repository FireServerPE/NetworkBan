<?php
namespace api;

use pocketmine\event\Listener;
use pocketmine\{Server,Player};
use pocketmine\level\Level;
use pocketmine\scheduler\Task;
use pocketmine\utils\Config;
use pocketmine\math\Vector3;
use pocketmine\block\Block;
use pocketmine\tile\Sign;
use api\NetworkPacket;
use api\DataBase\{AddConexionClient,ClientLog};
use pocketmine\event\player\PlayerCommandPreprocessEvent;
class CommandPacket implements Listener {

public function __construct(NetworkPacket $plugin){

$plugin->getServer()->getPluginManager()->registerEvents($this, $plugin);
$this->db = $plugin;
}

 public function Commands(PlayerCommandPreprocessEvent $event) {
       $cmd = explode(" ", strtolower($event->getMessage()));

 if($cmd[0] === "/ban" or $cmd[0] === "/ban-ip"){
$event->setCancelled(true);
$event->getPlayer()->sendMessage(ClientLog::NETWORKUSECOMMAND());

}


   }

}