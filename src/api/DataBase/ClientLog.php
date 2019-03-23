<?php
namespace api\DataBase;

class ClientLog{

public static function NETWORKLOGIN(){
	return '§7[§aNETWORK-BAN§7] §bInicializado correctamente id Client : '.mt_rand(1,10000);
}

public static function NETWORKDESTROY(){
	return '§7[§aNETWORK-BAN§7] §bCliente Desconectado Termiando Session';
}
public static function NETWORKEROR(){
	return '§7[§aNETWORK-BAN§7] §cOcurrion un problema intente de nuevo';
}
public static function NETWORKADDBAN($name){
	return '§7[§aNETWORK-BAN§7] §bJugador §7: §a'.$name.' §cha sido baneado razon : Hacks';
}
public static function NETWORKBANPLAYER(){
$t1 = "       §7-----[ §bNextCraft §3Network ]§7-----";
$t2 = "§cYou are banned from §4§lServerName§r §cReason: §7Hacks";
$t3 = "      §cAppeal at Twitter: §7@ServerTwitter";
$r = "\n";
	return $t1.$r.$t2.$r.$t3.$r;
}
public static function NETWORKUSECOMMAND(){
	return '§euse §7: §7/networkban §e{§7player§e}';
}
public static function removeBan($name){
	return '§7[§aNETWORK-BAN§7] §bremovido ban a : '.$name;
}
public static function PlayerError(){
	return '§7[§aNETWORK-BAN§7] §aHubo un eror al ejecutar el comando posiblemente el jugador ya esta baneado o no esta registrado en la Base Data';
}
}
