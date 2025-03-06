<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$commentsFile = 'comments.txt';

// Handle new comment submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment'])) {
    $comment = htmlspecialchars($_POST['comment']);
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Anonymous';
    $timestamp = date('Y-m-d H:i:s');
    $newComment = "$timestamp|$username|$comment\n";

    file_put_contents($commentsFile, $newComment, FILE_APPEND);

    // Redirigir de nuevo a resourse1.php a la sección de comentarios
    header('Location: resourse1.php#comentarios');
    exit();
}

// Read existing comments
$comments = file_exists($commentsFile) ? file($commentsFile, FILE_IGNORE_NEW_LINES) : [];
?>