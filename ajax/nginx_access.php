<?php
  $nginx_access = shell_exec("tail -n 200 /var/log/nginx/access.log | sort -r");
  echo $nginx_access
?>
