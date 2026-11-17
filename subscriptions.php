<?php require __DIR__.'/../config/bootstrap.php';$n=db()->exec('UPDATE subscriptions SET status="past_due" WHERE status="active" AND ends_at IS NOT NULL AND ends_at<NOW()');echo "Past due: $n\n";
