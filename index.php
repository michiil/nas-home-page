<?php
# Laufzeit ermitteln:
$uptime = shell_exec("uptime | awk -F'( |,|:)+' '{if ($7==\"min\") m=$6; else {if ($7~/^day/) {d=$6;h=$8;m=$9} else {h=$6;m=$7}}} {print d+0\",\"h+0\",\"m+0}'");
$uptime_array = explode(',', $uptime);

# Festplattennutzung:
$df_data = shell_exec('df -h -x tmpfs -x devtmpfs | tail -n +2');
$df_array = array_filter(explode("\n", $df_data));
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Michi's NAS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      (function ram() {
        $.ajax({
          url: 'ajax/ram.php',
          success: function(data) {
            // alert(data);
            $('#ram').html(data);
          },
          complete: function() {
            // Schedule the next request when the current one's complete
            setTimeout(ram, 2000);
          }
        });
      })();
      (function cpu() {
        $.ajax({
          url: 'ajax/cpu.php',
          success: function(data) {
            // alert(data);
            $('#cpu').html(data);
          },
          complete: function() {
            // Schedule the next request when the current one's complete
            setTimeout(cpu, 2000);
          }
        });
      })();
    });
  </script>
</head>
<body>

<div class="container">
  <div class="jumbotron">
    <h1>Michi's NAS</h1>
    <p>Läuft seit <?php echo ($uptime_array[0] == 1 ? " einem Tag" : $uptime_array[0] . " Tagen") . ($uptime_array[1] == 1 ? ", einer Stunde " : ", " . $uptime_array[1] . " Stunden ") . ($uptime_array[2] == 1 ? " und einer Minute " : "und " . $uptime_array[2] . " Minuten ") ?>ohne Probleme.</p>
  </div>

  <div class="row">

    <div id="ram" class="col-sm-4">
      <h3>Arbeitsspeicher:</h3>
      <div class="well well-sm">
        <h4><p class="text-center">Lade..</p></h4>
      </div>
    </div>

    <div id="cpu" class="col-sm-4">
      <h3>CPU:</h3>
      <div class="well well-sm">
        <h4><p class="text-center">Lade..</p></h4>
      </div>
    </div>

    <div class="col-sm-4">
      <h3>Festplatten:</h3>
      <?php foreach($df_array as $disk):?>
        <?php $disk_array = preg_split('/[\s]+/', $disk);?>
        <div class="well well-sm"><h4><p>"<?php echo $disk_array[0]?>" :</p></h4>
        <div class="progress">
          <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo rtrim($disk_array[4],"%")?>"
            aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $disk_array[4]?>">
            <?php echo $disk_array[4]?>
          </div>
        </div>
        <h4><p class="text-center"><?php echo $disk_array[2] . " von " . $disk_array[1] . " verwendet"?></br></p></h4></div>
      <?php endforeach; ?>
    </div>
  </div>

</div>

</body>
</html>
