<?php 
    $firstname = $name = $email = $phone = $message = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = $_POST['firstname'];
        $name      = $_POST['name'];
        $email     = $_POST['email'];
        $phone     = $_POST['phone'];
        $message   = $_POST['message'];
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
                    <form id="contact-form" method="POST" action="<?= $_SERVER['PHP_SELF']; ?>" role="form">
                        <div class="row">

                            <div class="col-md-6">
                                <label for="firstname">Prénom<span class="blue"> *</span></label>
                                <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Votre prénom" value="<?= $firstname; ?>">
                                <p class="comments">Message d'erreur</p>
                            </div>

                            <div class="col-md-6">
                                <label for="name">Nom<span class="blue"> *</span></label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Votre nom" value="<?= $name; ?>">
                                <p class="comments">Message d'erreur</p>
                            </div>

                            <div class="col-md-6">
                                <label for="email">Email<span class="blue"> *</span></label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Votre email" value="<?= $email; ?>">
                                <p class="comments">Message d'erreur</p>
                            </div>

                            <div class="col-md-6">
                                <label for="phone">Téléphone</label>
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="Votre téléphone" value="<?= $phone; ?>">
                                <p class="comments">Message d'erreur</p>
                            </div>

                            <div class="col-md-12">
                                <label for="message">Message<span class="blue"> *</span></label>
                                <textarea id="message" name="message" class="form-control" placeholder="Votre message" rows="4"><?= $message; ?></textarea>
                                <p class="comments">Message d'erreur</p>
                            </div>

                            <div class="col-md-12">
                                <p class="blue"><strong> *Ces informations sont requises.</strong></p>
                            </div>

                            <div class="col-md-12">
                                <input type="submit" class="button1" value="Envoyer">
                            </div>
                            
                        </div>

                        <p class="thank-you">Votre message a bien été envoyé. Merci de m'avoir contacté :)</p>

                    </form>

                </div> 
            </div>

        </div>
        
    </body>

</html>