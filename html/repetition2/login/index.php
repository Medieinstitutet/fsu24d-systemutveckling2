<?php
    function translate($text, $id) {

        switch($id) {
            case "loginError.incorrect":
                $text = "The password is not correct";
                break;
            case "loginForm.username":
                $text = "Email";
                break;
        }

        return $text;
    }

    function is_signed_in() { //METODO: implement this utvecklare 2
        return false;
    }

    if(is_signed_in()) {
        header("Location: /repetition2/my-account/");
    }
?>
<html>
    <head>
        <script>
            function showLoader() {
                let hideElement = document.querySelector("*[data-loader-style=hide]");
                hideElement.style.display = "none";

                let showElement = document.querySelector("*[data-loader-style=show]");
                showElement.style.display = "block";
            }

            function validateForm() {
                console.log("validateForm");
                let username = document.querySelector('form[data-form-name=login] input[data-validate-type=username]');
                let password = document.querySelector('form[data-form-name=login] input[data-validate-type=password]');

                if(username.value.length >= 3 && password.value.length >= 6) {
                    showLoader();
                    return true;
                }

                return false;
            }
        </script>
    </head>
    <body>
        <form action="/auth/login.php" method="POST" onSubmit="return validateForm();" data-form-name="login">
            <?php
                if(isset($_GET['message'])) {
                    switch($_GET['message']) {
                        case "incorrect":
                            ?>
                                <div class="error">
                                    <?= translate("Incorrect details.", "loginError.incorrect"); ?>
                                </div>
                            <?php
                            break;
                        case "noUser":
                            ?>
                                <div class="error">
                                    <?= translate("Username doesn't exist", "loginError.noUser"); ?>
                                </div>
                            <?php
                            break;
                        case "signedOut":
                            ?>
                                <div class="success">
                                    Signed out.
                                </div>
                            <?php
                            break;
                        default:
                            ?>
                            <div>
                                Unknown message: <?= $_GET['message'] ?>
                            </div>
                            <?php
                            break;
                    }
                }
            ?>
            <div>
                <label for="login_form_username"><?= translate("Username", "loginForm.username"); ?></label><br />
                <input id="login_form_username" name="username" data-validate-type="username" value="<?php
                    if(isset($_GET['username'])) {
                        echo($_GET['username']);
                    }
                ?>" />
            </div>
            <br />
            <div>
                <label for="login_form_password">Password</label><br />
                <input id="login_form_password" name="password" type="password" data-validate-type="password" />
            </div>
            <br />
            <input type="submit" data-loader-style="hide"/>
            <div data-loader-style="show" style="display: none;">Loading...</div>
            <br />
            <a href="/repetition2/login/forgot-password/">
                Forgot password
            </a>
            <br />
            <a href="/repetition2/create-account/">
                Create account
            </a>
            <hr />
            <!--
            <div onclick="console.log(validateForm())">Debug</div>
            -->
        </form>
    </body>
</html>