<?php
declare(strict_types=1);
require_once dirname(__DIR__, 3) . '/config/bootstrap.php';
$user=require_auth();
if($_SERVER['REQUEST_METHOD']!=='POST')json_response(['error'=>'Método não permitido'],405);
require_csrf();
require_role($user,['owner','admin','manager']);
$data=request_json();$deviceId=(int)($data['device_id']??0);$type=(string)($data['command_type']??'');$payload=$data['payload']??[];
$allowed=['dispense_feed','fan_on','fan_off','lamp_on','lamp_off'];
if($deviceId<1||!in_array($type,$allowed,true)||!is_array($payload))json_response(['error'=>'Comando inválido'],422);
if($type==='dispense_feed'){
 $kg=(float)($payload['kg']??0);
 if($kg<=0||$kg>5)json_response(['error'=>'Quantidade deve ser superior a 0 e até 5 kg'],422);
}
try{
 $q=db()->prepare('INSERT INTO device_commands (tenant_id,device_id,created_by,command_type,payload,status,expires_at) SELECT ?,d.id,?,?,?,"queued",DATE_ADD(NOW(),INTERVAL 10 MINUTE) FROM devices d WHERE d.id=? AND d.tenant_id=? AND d.status="active"');
 $q->execute([$user['tenant_id'],$user['id'],$type,json_encode($payload),$deviceId,$user['tenant_id']]);
 if(!$q->rowCount())json_response(['error'=>'Dispositivo não encontrado'],404);
 json_response(['ok'=>true,'command_id'=>(int)db()->lastInsertId()],201);
}catch(Throwable $e){log_error($e);json_response(['error'=>'Não foi possível criar comando'],500);}
