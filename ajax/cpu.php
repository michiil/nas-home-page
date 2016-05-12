<?php
  $cpu_name = shell_exec("grep -m 1 'model name' /proc/cpuinfo | awk -F ': ' '{print $2}'");
  $mpstat_data = shell_exec("mpstat -P ALL 1 1 | grep Average | tail -n +3");
  $mpstat_array = array_filter(explode("\n", $mpstat_data));
?>

<h3>CPU:</h3>
<div class="well well-sm">
  <font size="+1"><?php echo $cpu_name?></font>
  <?php
    foreach($mpstat_array as $cpu):
      $cpu_array = preg_split('/[\s]+/', $cpu);
      $cpu_load = round(100-$cpu_array[11], 2);
  ?>
  <div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $cpu_load?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $cpu_load?>%">
      <?php echo $cpu_load?>%
    </div>
  </div>
  <?php endforeach;?>
</div>
