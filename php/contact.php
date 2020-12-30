<?php 
    $array = array(
        "firstname" => "",
        "name" => "",
        "email" => "",
        "phone" => "",
        "message" => "",
        "firstnameError" => "",
        "nameError" => "",
        "emailError" => "",
        "phoneError" => "",
        "messageError" => "",
        "isSuccess" => "false"
    );

    $emailTo = "ahmedrassoulahmed@gmail.com";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $array["firstname"] = verifyInput($_POST['firstname']);
        $array["name"]      = verifyInput($_POST['name']);
        $array["email"]     = verifyInput($_POST['email']);
        $array["phone"]     = verifyInput($_POST['phone']);
        $array["message"]   = verifyInput($_POST['message']);
        $array["isSuccess"] = true;
        $emailText = "";

        if (empty($array["firstname"])) {
            $array["firstnameError"] = "Ton prénom est requis !";
            $array["isSuccess"] = false;
        } else {
            $emailText .= "Firstname : {$array["firstname"]}\n";
        }
        if (empty($array["name"])) {
            $array["nameError"] = "Ton nom est indispensable !";
            $array["isSuccess"] = false;
        } else {
            $emailText .= "name : {$array["name"]}\n";
        }
        if (!isEmail($array["email"])) {
            $array["emailError"] = "Ca ne ressemble pas à un email ça !";
            $array["isSuccess"] = false;
        } else {
            $emailText .= "email : {$array["email"]}\n";
        }
        if (!isPhone($array["phone"])) {
            $array["phoneError"] = "Ne mettre que des chiffres et des espaces !";
            $array["isSuccess"] = false;
        } else {
            $emailText .= "phone : {$array["phone"]}\n";
        }
        if (empty($array["message"])) {
            $array["messageError"] = "Une petite description de toi serait la bienvenue !";
            $array["isSuccess"] = false;
        } else {
            $emailText .= "message: {$array["message"]}\n";
        }
        
        if ($array["isSuccess"]) {
            $headers = "From: {$array["firstname"]} {$array["name"]} <{$array["email"]}>\r\nReply-To: {$array["email"]}";
            mail($emailTo, "Un message pour vous", $emailText, $headers);
        }

        echo json_encode($array);

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
