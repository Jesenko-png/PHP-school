<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/login/proizvodi.php">🛒 WebShop</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <?php if(isset($_SESSION['ulogovan']) && $_SESSION['ulogovan'] === true): ?>
            <li class="nav-item"><a class="nav-link" href="/login/logout.php">Logout</a></li>
            <li class="nav-item"><a class="nav-link" href="/login/model/korpanav.php">Korpa</a></li>
        <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="/login/loginforma.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>