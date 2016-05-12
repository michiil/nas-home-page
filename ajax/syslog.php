<?php
  $syslog = shell_exec("tail -n 200 /var/log/syslog | sort -r");
  echo $syslog
?>
