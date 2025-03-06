<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $usersFile = 'users.txt';
    $authenticated = false;

    if (file_exists($usersFile)) {
        $users = file($usersFile, FILE_IGNORE_NEW_LINES);
        foreach ($users as $user) {
            list($storedEmail, $storedPassword, $firstName) = explode('|', $user);
            if ($storedEmail === $email && password_verify($password, $storedPassword)) {
                $authenticated = true;
                $_SESSION['email'] = $email;
                $_SESSION['firstName'] = $firstName;
                break;
            }
        }
    }

    if ($authenticated) {
        header('Location: index.html');
        exit();
    } else {
        header('Location: login.html?error=invalid_credentials');
        exit();
    }
}
?>