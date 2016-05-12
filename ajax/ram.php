<?php
  $free_data = shell_exec('free -m | tail -n +2 | head -n -1');
  $mem = preg_split('/[\s]+/', $free_data);
  $memory_usage = round($mem[2]/$mem[1]*100,2);
?>

<h3>Arbeitsspeicher:</h3>
<div class="well well-sm">
  <font size="+1"><p class="text-center"><?php echo $mem[2] . "M von " . $mem[1]?>M verwendet</p></font>
  <div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $memory_usage?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $memory_usage?>%">
      <?php echo $memory_usage?>%
    </div>
  </div>
</div>
