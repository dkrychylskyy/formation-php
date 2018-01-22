<?php
/*
 * Page qui affiche le formulaire de contact
 */
$this->definir_contenu_titre("H1","Nous contacter"); // création du titre H1
$this->definir_contenu_titre("H2","Vous pouvez nous envoyer un mail !!!"); // création du titre H2
$this->affiche_titres(); // affichage des titres
if ((trim($_POST["titre"])!="") || (trim($_POST["message"])!="")) {
    mail("jeanmarc.benito@gmail.com",$_POST["titre"],$_POST["message"]);
    echo "<p style=\"text-align: center;\">Nous avons bien rerçu votre message et vous en remercions.</p>";
}
else {
?><script language="javascript">
function envoie() {
	if (document.contact.titre.value=='' || document.contact.message.value=='') {
		alert('Veuillez saisir un titre et un message !');
		return false;
	}
	else {
		return true;
	}
}
</script><div style="width: 300px; margin: auto auto; text-align: center">
<form name="contact" action="index.php?choixmenu=contact" method="post" onsubmit="return envoie();";>
<label>Titre : </label><input name="titre" type="text"><br /><br />
<label>Message : </label><textarea name="message"></textarea><br /><br />
<input type="submit" value="ok">
</form></div><?php 
}
?>