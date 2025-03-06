<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);

    $usersFile = 'users.txt';

    // Check if the email already exists
    if (file_exists($usersFile)) {
        $users = file($usersFile, FILE_IGNORE_NEW_LINES);
        foreach ($users as $user) {
            list($storedEmail) = explode('|', $user);
            if ($storedEmail === $email) {
                header('Location: register.html?error=email_taken');
                exit();
            }
        }
    }

    // Save the new user
    file_put_contents($usersFile, "$email|$password|$firstName|$lastName\n", FILE_APPEND);
    header('Location: index.html');
    exit();
}
?>