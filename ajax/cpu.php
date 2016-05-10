<?php

$cpu_name = shell_exec("grep -m 1 'model name' /proc/cpuinfo | awk -F ': ' '{print $2}'");
$mpstat_data = shell_exec("mpstat -P ALL 1 1 | grep Average | tail -n +3");
$mpstat_array = array_filter(explode("\n", $mpstat_data));

echo "<h3>CPU:</h3>
      <div class=\"well well-sm\"><h4><p>" . $cpu_name . "</p></h4>";
foreach ($mpstat_array as $cpu) {
  $cpu_array = preg_split('/[\s]+/', $cpu);
  $cpu_load = round(100-$cpu_array[11], 2);
  echo "<div class=\"progress\">
          <div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"" . $cpu_load . "\"
          aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:" . $cpu_load . "%\">" .
            $cpu_load . "%
          </div>
        </div>";
};
echo "</div>";

?>
