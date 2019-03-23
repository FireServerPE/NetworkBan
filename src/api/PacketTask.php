<?php

namespace api;
use api\NetworkPacket;
use pocketmine\scheduler\Task;
use pocketmine\{Player,Server};
use api\DataBase\{AddConexionClient,ClientLog};
class PacketTask extends Task{

public $time = 10;

public function __construct(Player $player, NetworkPacket $plugin){

	
		$this->player = $player;
$this->pl = $plugin;
	}

public function onRun(int $currentTick){
if($this->time >0){$this->time--;}

if($this->time == 0){
$this->player->kick(ClientLog::NETWORKBANPLAYER(),false);
	$this->pl->getScheduler()->cancelTask($this->getTaskId());

}



}




}