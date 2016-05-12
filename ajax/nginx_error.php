<?php
  $nginx_error = shell_exec("tail -n 200 /var/log/nginx/error.log | sort -r");
  echo $nginx_error
?>
