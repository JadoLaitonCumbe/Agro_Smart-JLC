<?php require __DIR__.'/../config/bootstrap.php';$n=db()->exec('UPDATE device_commands SET status="expired" WHERE status IN ("queued","sent") AND expires_at<NOW()');echo "Expired: $n\n";
