<?php 
    $firstname = $name = $email = $phone = $message = "";
    $firstnameError = $nameError = $emailError = $phoneError = $messageError = "";
    $isSuccess = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = verifyInput($_POST['firstname']);
        $name      = verifyInput($_POST['name']);
        $email     = verifyInput($_POST['email']);
        $phone     = verifyInput($_POST['phone']);
        $message   = verifyInput($_POST['message']);
        $isSuccess = true;

        if (empty($firstname)) {
            $firstnameError = "Ton prénom est requis !";
            $isSuccess = false;
        }
        if (empty($name)) {
            $nameError = "Ton nom est indispensable !";
            $isSuccess = false;
        }
        if (empty($message)) {
            $messageError = "Une petite description de toi serait la bienvenue !";
            $isSuccess = false;
        }
        if (!isEmail($email)) {
            $emailError = "Ca ne ressemble pas à un email ça !";
            $isSuccess = false;
        }
        if (!isPhone($phone)) {
            $phoneError = "Ne mettre que des chiffres et des espaces !";
            $isSuccess = false;
        }

    }

    function isPhone($var) {
        return preg_match("/^[0-9 ]*$/", $var);
    }

    function isEmail($var) {
        return filter_var($var, FILTER_VALIDATE_EMAIL);
    }

    function verifyInput($var) {
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);
        return $var;
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Contactez-moi !</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato" type="text/css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="divider"></div>
            <div class="heading">
                <h2>Contactez-moi</h2>
            </div>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1" >
                    <form id="contact-form" method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form">
                        <div class="row">

                            <div class="col-md-6">
                                <label for="firstname">Prénom<span class="blue"> *</span></label>
                                <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Votre prénom" value="<?= $firstname; ?>">
                                <p class="comments"><?= $firstnameError; ?></p>
                            </div>

                            <div class="col-md-6">
                                <label for="name">Nom<span class="blue"> *</span></label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Votre nom" value="<?= $name; ?>">
                                <p class="comments"><?= $nameError; ?></p>
                            </div>

                            <div class="col-md-6">
                                <label for="email">Email<span class="blue"> *</span></label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Votre email" value="<?= $email; ?>">
                                <p class="comments"><?= $emailError; ?></p>
                            </div>

                            <div class="col-md-6">
                                <label for="phone">Téléphone</label>
                                <input type="tel" id="phone" name="phone" class="form-control" placeholder="Votre téléphone" value="<?= $phone; ?>">
                                <p class="comments"><?= $phoneError; ?></p>
                            </div>

                            <div class="col-md-12">
                                <label for="message">Message<span class="blue"> *</span></label>
                                <textarea id="message" name="message" class="form-control" placeholder="Votre message" rows="4"><?= $message; ?></textarea>
                                <p class="comments"><?= $messageError; ?></p>
                            </div>

                            <div class="col-md-12">
                                <p class="blue"><strong> *Ces informations sont requises.</strong></p>
                            </div>

                            <div class="col-md-12">
                                <input type="submit" class="button1" value="Envoyer">
                            </div>
                            
                        </div>

                        <p class="thank-you" style="display:<?php if($isSuccess) echo 'block'; else echo 'none'; ?>;">Votre message a bien été envoyé. Merci de m'avoir contacté :)</p>

                    </form>

                </div> 
            </div>

        </div>
        
    </body>

</html>