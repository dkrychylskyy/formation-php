<?php 
/*
 * Page qui affiche le formulaire de connexion
 */
$this->definir_contenu_titre("H1","Espace sécurisé"); // création du titre H1
$this->definir_contenu_titre("H2","Veuillez vous connecter !!!"); // création du titre H2
$this->affiche_titres(); // affichage des titres
?><div style="width: 300px; margin: auto auto; text-align: center">
<form action="index.php" method="post">
<label>Utilisateur : </label><input name="val_user" type="text"><br /><br />
<label>Mot de passe : </label><input name="val_pwd" type="password"><br /><br />
<?php 
// on prépare la variable qui va permettre de garder la trace du lien qui a été demandé et qui enclenche la demande de donnexion
$oldmenu=$_GET["choixmenu"];
?>
<input type="hidden" name="old_choixmenu" value="<?php echo $oldmenu; ?>"><!-- Ce champ caché permet de garder la trrace du lien qui a été demandé avant de basculer verrs la connexion -->
<input type="hidden" name="choixmenu" value="login"<!-- Ce champ caché var permettre de traiter l'envoi du formulaire -->
<input type="submit" value="ok">
</form></div>