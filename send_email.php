<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sammeln der Formulardaten
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = strip_tags(trim($_POST["message"]));

    // Überprüfen der Eingabedaten
    if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($message)) {
        echo "Bitte füllen Sie alle Felder korrekt aus!!!!";
        exit;
    }

    // E-Mail-Details
    $to = "elifsevde0016@gmail.com"; // Deine E-Mail-Adresse, an die die Nachricht gesendet wird
    $subject = "Neue Nachricht von $name";
    $body = "Du hast eine neue Nachricht erhalten:\n\n".
            "Name: $name\n".
            "E-Mail: $email\n\n".
            "Nachricht:\n$message";
    $headers = "From: $email";

    // Senden der E-Mail
    if (mail($to, $subject, $body, $headers)) {
        echo "Nachricht erfolgreich gesendet!";
    } else {
        echo "Es gab ein Problem beim Senden der Nachricht.";
    }
}
?>
