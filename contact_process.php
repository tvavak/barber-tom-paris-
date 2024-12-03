<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Adresse email de destination
    $to = "vavaktom@gmail.com";

    // Sujet de l'email
    $email_subject = "Nouveau message de contact: $subject";

    // Contenu de l'email
    $email_body = "Vous avez reçu un nouveau message de contact.\n\n".
                  "Nom: $name\n".
                  "Email: $email\n".
                  "Téléphone: $phone\n".
                  "Message:\n$message";

    // Entêtes de l'email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Envoyer l'email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Répondre avec une confirmation de succès
        echo "Merci pour votre message. Nous vous contacterons bientôt !";
    } else {
        // Répondre avec une erreur
        echo "Une erreur est survenue. Veuillez réessayer plus tard.";
    }
}
?>
