<?php
session_start(); // initialisation du mécanisme de gestion des variables de session
include("config.db.php"); // inclusion des configuration de base de données MySql
include("classes/class.page.php"); // inclusion de la classe page
$html = new page(); // on instancie un objet page
$html->definir_titre("Mon bô site"); // on crée le titre du site
$html->creer_menu("Homepage","accueil"); // création du menu Accueil
$html->creer_menu("XML","xml"); // création du menu XML
$html->creer_menu("Contact","contact"); // création du menu XML
if (!(isset($_SESSION["connected"]))) $_SESSION["connected"]="";
if (trim($_SESSION["connected"])=="ok") {
    $html->creer_menu("Déconnexion","quit"); // si il y a déjà eu une connexion, on crée le lien pour se déconnecter
}
// -------------
$html->affiche(); // on affiche le HTML de la page
?>