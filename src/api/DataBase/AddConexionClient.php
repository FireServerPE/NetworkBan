<?php
namespace api\DataBase;
class AddConexionClient{
public static function SocketStart(){
	return new \mysqli('localhost','root','','banservers');
}
public static function SocketStop(){
	return die('Conexion_faild_db');
}
public static function SendBan($args){
	return self::SocketStart()->query($args);
}
public static function removeBan($args){
	return self::SocketStart()->query($args);
}

public static function existDB($name){
	$p = null;
$consultab = "SELECT * FROM playerban";
$resultado = mysqli_query(AddConexionClient::SocketStart(),$consultab);
while($consulta = mysqli_fetch_array($resultado)){
if($name == $consulta['players']){
$p = 'true';
	}else{
$p = 'false';
	}

}
return $p;
}


}