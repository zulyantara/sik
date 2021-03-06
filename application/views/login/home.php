<html lang="en-gb" dir="ltr" class="uk-height-1-1 uk-notouch">
    <head>
        <meta charset="utf-8">
        <title>Login S-IPK</title>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/uikit.docs.min.css"); ?>">
        <script src="<?php echo base_url("assets/js/jquery-2.1.1.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/uikit.min.js"); ?>"></script>
    </head>
    <body class="uk-height-1-1">
        <div class="uk-vertical-align uk-text-center uk-height-1-1">
            <div class="uk-vertical-align-middle" style="width: 250px;">
                <?php echo (isset($error)) ? "<div class=\"uk-alert uk-alert-danger\">".$error."</div>" : ""; ?>
                <form class="uk-panel uk-panel-box uk-form" method="post" action="<?php echo base_url("auth/validate_credential"); ?>">
                    <img class="uk-margin-bottom uk-thumbnail" src="<?php echo base_url("assets/images/logo_s-ipk_1.png"); ?>" alt="Bintang Pelajar">
                    <div class="uk-form-row">
                        <input class="uk-width-1-1 uk-form-large" type="text" placeholder="Username" name="txt_user_name" autofocus="autofocus">
                    </div>
                    <div class="uk-form-row">
                        <input class="uk-width-1-1 uk-form-large" type="password" placeholder="Password" name="txt_user_password">
                    </div>
                    <div class="uk-form-row">
                        <button class="uk-width-1-1 uk-button uk-button-primary uk-button-large" name="btn_login" value="btn_login">Login</button>
                        <br>
                        <a href="<?php echo base_url("auth/register"); ?>">Buat Akun</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>