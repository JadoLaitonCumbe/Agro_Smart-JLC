<?php
declare(strict_types=1);
require_once dirname(__DIR__, 3) . '/config/bootstrap.php';
$user=require_auth();
try {
    $pdo=db(); $tenant=$user['tenant_id'];
    $q=$pdo->prepare('SELECT COUNT(*) FROM farms WHERE tenant_id=? AND status="active"'); $q->execute([$tenant]); $farms=(int)$q->fetchColumn();
    $q=$pdo->prepare('SELECT COUNT(*) FROM animals WHERE tenant_id=? AND status="active"'); $q->execute([$tenant]); $animals=(int)$q->fetchColumn();
    $q=$pdo->prepare('SELECT COUNT(*) FROM devices WHERE tenant_id=? AND status="active"'); $q->execute([$tenant]); $devices=(int)$q->fetchColumn();
    $q=$pdo->prepare('SELECT COUNT(*) FROM alerts WHERE tenant_id=? AND status="open"'); $q->execute([$tenant]); $alerts=(int)$q->fetchColumn();
    $q=$pdo->prepare('SELECT l.temperature,l.humidity,l.feed_level_kg,l.recorded_at,d.name AS device_name FROM telemetry l JOIN devices d ON d.id=l.device_id WHERE l.tenant_id=? ORDER BY l.recorded_at DESC LIMIT 8');
    $q->execute([$tenant]); $recent=$q->fetchAll();
    json_response(['summary'=>['farms'=>$farms,'animals'=>$animals,'devices'=>$devices,'open_alerts'=>$alerts],'recent'=>$recent]);
} catch(Throwable $e){log_error($e);json_response(['error'=>'Não foi possível carregar o painel'],500);}
