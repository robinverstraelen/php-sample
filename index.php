<?php
print("It works!! :)");
print(getHostByName(getHostName()));
$db_ip = "%DB_TIER_IP%";
print($db_ip);
print_r(getenv());
phpinfo();
?>