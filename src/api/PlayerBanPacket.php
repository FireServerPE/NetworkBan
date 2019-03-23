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
use pocketmine\event\player\{PlayerJoinEvent};
use api\PacketTask;
class PlayerBanPacket implements Listener {

public function __construct(NetworkPacket $plugin){

$plugin->getServer()->getPluginManager()->registerEvents($this, $plugin);
$this->db = $plugin;
}

public function OnBan(PlayerJoinEvent $event){
	$player = $event->getPlayer();

$name = $player->getName();
$consultab = "SELECT * FROM playerban";
$resultado = mysqli_query(AddConexionClient::SocketStart(),$consultab);
while($consulta = mysqli_fetch_array($resultado)){
if($name == $consulta['players']){
$this->db->getScheduler()->scheduleRepeatingTask(new PacketTask($player,$this->db), 20); 	
}
}
AddConexionClient::SocketStart()->close();
}



}