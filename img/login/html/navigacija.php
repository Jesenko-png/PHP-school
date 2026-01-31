<?php

    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

?>
<div class="col-12 bg-dark text-white p-2 d-flex justify-content-center align-items-center">
    <div class="m-2">
        <a class="nav-link" href="/login/proizvodi.php">Glavna</a>
    </div>

    <div class="m-2">
        <?php if(isset($_SESSION['ulogovan']) && $_SESSION['ulogovan'] === true): ?>
            <a class="nav-link" href="/login/logout.php">Logout</a>
            <a class="nav-link" href="model/korpanav.php">Korpa</a>

            
        <?php else: ?>
            <a class="nav-link" href="/login/loginforma.php">Login</a>
            
        <?php endif; ?>   
    </div>
</div>