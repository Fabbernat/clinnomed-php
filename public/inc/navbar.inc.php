<link rel="icon" type="image/x-icon" href="icons/clinnomedredlogo.png">
<?php

// File: inc/navbar.inc.php
/**
 * The echo href paths below intentionally don't have ../, because the only place this include file should be used is in the root. Otherwise, the paths won't work.
 */
$current_file = basename($_SERVER['PHP_SELF']);


if (isset($_SESSION['user_id'])) {
    $isLoggedIn = true;
} else {
    $isLoggedIn = false;
}
?>
<nav class="nav-left">
    <a class="nav <?php echo ($current_file == 'index.php') ? 'current_page' : ''; ?>"
       href="index.php"><p class="yellow">Főoldal</p></a>
    <a class="nav <?php echo ($current_file == 'betegertekek.php') ? 'current_page' : ''; ?>"
       href="../betegertekek.php"><p class="yellow">Betegértékek</p></a>
    <a class="nav <?php echo ($current_file == 'betegek.php') ? 'current_page' : ''; ?>"
       href="betegek.php"><p class="yellow">Betegek</p></a>
    <a class="nav <?php echo ($current_file == 'exporter.php') ? 'current_page' : ''; ?>"
       href="exporter.php"><p class="yellow">Exporter</p></a>
    <a class="nav <?php echo ($current_file == 'settings.php') ? 'current_page' : ''; ?>"
       href="settings.php"><p class="yellow">Beállítások</p></a>

    <?php
    echo ($current_file == 'admin.php') ? ' <a class="nav current_page" href="admin.php"><p class="yellow">Admin</p></a>' : '';
    ?>
</nav>
<nav class="nav-right">
    <!-- Display "Log in and Sign up" link only if the user is logged in -->
    <?php if (!$isLoggedIn): ?>

        <a class="nav <?php echo ($current_file == 'signup.php') ? 'current_page' : ''; ?>"
           href="signup.php"><p class="yellow">Regisztráció</p></a>
        <a class="nav <?php echo ($current_file == 'login.php') ? 'current_page' : ''; ?>"
           href="login.php"><p class="yellow">Bejelentkezés</p></a>
    <?php endif; ?>
    <!-- Display "Log out" link only if the user is logged in -->
    <?php if ($isLoggedIn): ?>
        <a class="nav <?php echo ($current_file == 'logout.php') ? 'current_page' : ''; ?>"
           href="logout.php"><p class="yellow">Log out</p></a>
        <a class="nav <?php echo ($current_file == 'profile.php') ? 'current_page' : ''; ?>"
           href="profile.php">
            <?php
            if (isset($_SESSION['profile_picture'])) {
                $profile_picture = $_SESSION['profile_picture'];
                if (str_starts_with($profile_picture, '../')) {
                    $profile_picture = substr($profile_picture, 3);
                }
                echo "<img src='" . $profile_picture . "' alt='Your Current Profile Picture' class=\"code border-radius-px fifty-fixel-height\">";
            } else {
                echo "<img alt=\"Default profile picture\" class=\"code border-radius-px 
fifty-fixel-height\" src=\"img/profile_icon.jpg\">";
            }
            ?>
            <p class="yellow">Profile</p>
        </a>

        <!-- Add the profile picture element here -->

        <a class="nav <?php echo ($current_file == 'progress.php') ? 'current_page' : ''; ?>"
           href="progress.php"><p class="yellow">Progress</p></a>
    <?php endif; ?>
</nav>
<nav class="two-px-border">
    <a class="nav <?php echo ($current_file == 'feedback.php') ? 'current_page' : ''; ?>"
       href="feedback.php"><p class="yellow">Visszajelzés</p></a>

</nav>
