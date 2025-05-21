<?php
    session_start();
    require_once('functions/user-functions.php');

    if(isset($_GET['signOut']) && $_GET['signOut'] == "1") {
        fsu24d_sign_out();
    }

    $has_error = false;
    if($has_error) {
        echo("Something went wrong");
        die();
    }
?>
<html>
    <body>
        Index
    <?php
if(fsu24d_is_signed_in()) {
    echo("Signed in");
    ?>
        <a href="?signOut=1">Sign out</a>
    <?php
}
else {
    echo("Signed out");
    if(isset($_GET['message']) && $_GET['message'] === 'incorrectDetails') {
        ?>
            <div class="message error">
                The detaiuls where not correct
            </div>
        <?php
    }
    ?>
        <form action="sign-in.php" method="POST">
            <input name="usernameOrEmail" autocomplete="username" />
            <input type="password" name="password" autocomplete="current-password" />
            <input type="submit" />
        </form>
        <h2>Skapa ny</h2>
        <form action="create.php" method="POST">
            <select name="role">
                <option value="customer">Kund</option>
                <option value="subscriber">Prenumerant</option>
                <option value="customer,subscriber">Båda</option>
            </select>
            <input name="email" autocomplete="email" />
            <input name="name" autocomplete="given-name" />
            <input type="password" name="password" autocomplete="new-password" />
            <input type="submit" />
        </form>
    <?php
}
    ?>
    <body>
</html>