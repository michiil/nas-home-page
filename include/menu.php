<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Michi's NAS</a>
    </div>
    <div class="collapse navbar-collapse" id="Navbar">
      <ul class="nav navbar-nav">
        <li <?php echo ($thisPage == "home" ? "class=\"active\"" : "")?>><a href="index.php">Home</a></li>
        <li <?php echo ($thisPage == "status" ? "class=\"active\"" : "")?>><a href="status.php">Status</a></li>
        <li <?php echo (preg_match("/^(syslog|nginx_access|nginx_error)$/",$thisPage) ? "class=\"active\"" : "")?> class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Logs<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li <?php echo ($thisPage == "syslog" ? "class=\"active\"" : "")?>><a href="syslog.php">Syslog</a></li>
            <li <?php echo ($thisPage == "nginx_access" ? "class=\"active\"" : "")?>><a href="nginx_access.php">nginx/access.logs</a></li>
            <li <?php echo ($thisPage == "nginx_error" ? "class=\"active\"" : "")?>><a href="nginx_error.php">nginx/error.log</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="https://torrent.michi.ga">Transmission</a></li>
        <li><a href="https://music.michi.ga">Subsonic</a></li>
      </ul
    </div>
  </div>
</nav>
