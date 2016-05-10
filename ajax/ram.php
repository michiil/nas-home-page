<?php

# Ram Verbrauch ermitteln:
$free_data = shell_exec('free -m | tail -n +2 | head -n -1');
$mem = preg_split('/[\s]+/', $free_data);
$memory_usage = round($mem[2]/$mem[1]*100,2);

echo "<h3>Arbeitsspeicher:</h3>
      <div class=\"well well-sm\">
        <h4><p class=\"text-center\">" . $mem[2] . "M von " . $mem[1] . "M verwendet</p></h4>
        <div class=\"progress\">
          <div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"" . $memory_usage . "\"aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:" . $memory_usage . "%\">" .
            $memory_usage . "%
          </div>
        </div>
      </div>";
?>
