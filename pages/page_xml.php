<?php
if (trim($_POST["traiter_form"]) == "ok") {
    include("classes/XMLManager.php");
    $xml = new XMLManager();
    if (isset($_FILES)) {
        $xml->uploadFile($_FILES);
    }
} else {
    $this->definir_contenu_titre("H1", "Traitement de données"); // création du titre H1
    $this->definir_contenu_titre("H2", "Chargez un fichier XML !!!"); // création du titre H2
    $this->affiche_titres(); // affichage des titres
    ?><div style="width: 400px; margin: auto auto; text-align: center">
        <form action="index.php?choixmenu=xml" method="post" enctype="multipart/form-data">
            <label>Fichier XML à traiter : </label><input type="file" name="fichierxml"><br /><br />
            <input type="hidden" name="traiter_form" value="ok">
            <input type="submit" value="ok">
        </form></div><?php
}
?>