<?php
?>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="events.php">Events</a></li>
            <?php if ($_SESSION['loggedIn']) { ?>
                <li><a href="logout.php">Logout</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>