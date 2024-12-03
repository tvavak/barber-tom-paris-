<?php

<?php
// Remplacement de l'adresse email de destination
$to = "vavaktom@gmail.com"; 

// Récupération des données du formulaire
$from = $_REQUEST['email'];
$name = $_REQUEST['name'];
$subject = $_REQUEST['subject'];
$number = isset($_REQUEST['number']) ? $_REQUEST['number'] : 'Non spécifié';
$cmessage = $_REQUEST['message'];

// Configuration des en-têtes de l'email
$headers = "From: $from\r\n";
$headers .= "Reply-To: $from\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// Objet de l'email
$subject = "Vous avez reçu un message de votre site Web";

// Préparation du contenu de l'email en HTML
$logo = 'img/logo.png'; // Chemin vers le logo
$link = '#'; // Lien du site ou de la page associée

$body = "<!DOCTYPE html>
<html lang='fr'>
<head><meta charset='UTF-8'><title>Message reçu</title></head>
<body>";
$body .= "<table style='width: 100%; font-family: Arial, sans-serif;'>";
$body .= "<thead style='text-align: center;'><tr><td colspan='2' style='border:none;'>";
$body .= "<a href='{$link}'><img src='{$logo}' alt='Logo' style='max-width: 150px;'></a><br><br>";
$body .= "</td></tr></thead><tbody>";
$body .= "<tr><td style='border:none;'><strong>Nom :</strong> {$name}</td></tr>";
$body .= "<tr><td style='border:none;'><strong>Email :</strong> {$from}</td></tr>";
$body .= "<tr><td style='border:none;'><strong>Téléphone :</strong> {$number}</td></tr>";
$body .= "<tr><td style='border:none;'><strong>Sujet :</strong> {$subject}</td></tr>";
$body .= "<tr><td style='border:none;'><strong>Message :</strong></td></tr>";
$body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
$body .= "</tbody></table>";
$body .= "</body></html>";

// Envoi de l'email
if (mail($to, $subject, $body, $headers)) {
	echo "Email envoyé avec succès.";
} else {
	echo "Une erreur est survenue lors
