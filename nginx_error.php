<?php
  $thisPage="nginx_error";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Michi's NAS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <script type="text/javascript">
    $(document).ready(function(){
      (function nginx_access() {
        $.ajax({
          url: 'ajax/nginx_error.php',
          success: function(data) {
            $('#nginx_error').html(data);
          },
          complete: function() {
            setTimeout(nginx_error, 2000);
          }
        });
      })();
    });
  </script>
</head>
<body>
  <?php include("include/menu.php"); ?>
  <pre id="nginx_error"><font size="+1">Lade..</font></pre>
</body>
</html>
