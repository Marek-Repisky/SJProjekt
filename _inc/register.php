<?php
    require_once('../config.php');
    require_once('App.php');

    $config = include('../config.php');
    $app = new ToDoApp($config);
    $userAuth = $app->getUserAuth();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $password2 = trim($_POST['password2']);
        $agree = isset($_POST['agree']) ? $_POST['agree'] : '';

        $errors = [];
        if (empty($username)) $errors[] = "Prosím zadajte používateľské meno.";
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Prosím zadajte platný email.";
        if (empty($password)) $errors[] = "Prosím zadajte platné heslo.";
        if ($password !== $password2) $errors[] = "Heslá nie sú rovnaké.";
        if (empty($agree) || $agree !== 'yes') $errors[] = "Musíte súhlasiť s podmienkami služieb.";

        if (empty($errors)) {
            $userAuth->registerUser($username, $email, $password);
            header("Location: ../templates/LoginForm.php");
            exit;
        } 
        else {
            foreach ($errors as $error) echo "<p>$error</p>";
        }
}
?>
