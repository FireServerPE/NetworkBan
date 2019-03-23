<?php
namespace api;
use pocketmine\plugin\PluginBase;
use pocketmine\{Player,Server};
use api\DataBase\{AddConexionClient,ClientLog};
use api\{PlayerBanPacket,CommandPacket};
use api\DebugDevTools\{IntervalAction};
use pocketmine\command\{Command,CommandSender};
class NetworkPacket extends PluginBase{
public function onEnable(){	
$this->getServer()->getLogger()->info(ClientLog::NETWORKLOGIN());
AddConexionClient::SocketStart();
$this->LoggerNework();
if(AddConexionClient::SocketStart()->errno){
	AddConexionClient::SocketStop();
	$this->getServer()->getLogger()->info(ClientLog::NETWORKEROR());
}
$this->SystemBanAction();	
AddConexionClient::SocketStart()->close();
}

public function SystemBanAction(){
new PlayerBanPacket($this);
new CommandPacket($this);
/*
new IntervalAction($this);
*/
}


public function onDisable(){
	$this->getServer()->getLogger()->info(ClientLog::NETWORKDESTROY());
	AddConexionClient::SocketStart()->close();
}


public function onCommand(CommandSender $player, Command $command, $label, array $args):bool{
	switch($command->getName()){
		case 'networkban':
if($player->isOp()){
if(isset($args[0])){
   $jug = $this->getServer()->getPlayer($args[0]);
if($jug == null){
	$player->sendMessage(ClientLog::NETWORKEROR());
}else{
$name = $jug->getName();
$sql = "INSERT INTO playerban (players) VALUES ('$name')";
AddConexionClient::SendBan($sql);
foreach($this->getServer()->getOnlinePlayers() as $pl){
$pl->sendMessage(ClientLog::NETWORKADDBAN($name));
}
$jug->kick(ClientLog::NETWORKBANPLAYER(),false);
AddConexionClient::SocketStart()->close();

}
}
}
		return true;
		case "unban":
		if($player->isOp()){
		if(isset($args[0])){
		 $name = $args[0];
		
$sql = "DELETE FROM `playerban` WHERE players='$name'";
AddConexionClient::removeBan($sql);
AddConexionClient::SocketStart()->close();
$player->sendMessage(ClientLog::removeBan($name));
}
		}
		return true;

}
}
public function LoggerNework(){
$this->getServer()->getLogger()->info('=========================================');
$this->getServer()->getLogger()->info('Inicado Servidor v1.0');
$this->getServer()->getLogger()->info('System NetworkBan Iniciado version : 3.9 Beta');
$this->getServer()->getLogger()->info('Licencia NextCraft Network');
$this->getServer()->getLogger()->info('Sofware API : NetworkBanAPI.php');
$this->getServer()->getLogger()->info('============================================');


}
}