<?php

class page {

    private $page_titre;
    private $contenu_titre = array();
    private $menu = array();

    /**
     * définir le titre du site
     */
    public function definir_titre($txt) {
        $this->page_titre = $txt;
    }

    /**
     *
     */
    public function definir_contenu_titre($h, $txt) {
        $this->contenu_titre[$h] = $txt;
    }

    /**
     * créer un item de menu
     */
    public function creer_menu($texte, $url) {
        $this->menu[$texte] = $url;
    }

    /**
     * Afficher les titres de contenu
     * Cette méthode parcours le tableau des titres des contenus de page pourr les afficher : H1, H2, ...
     */
    public function affiche_titres() {
        if (is_array($this->contenu_titre)) {
            reset($this->contenu_titre);
            foreach ($this->contenu_titre as $cle => $valeur) {
                echo "&nbsp;<" . $cle . ">" . $valeur . "</" . $cle . ">&nbsp;";
            }
        }
    }

    /**
     * afiche la page HTML finale
     */
    public function affiche() {
        // --------------------------------------------------------------------------------
        // on traite ici ces 2 cas pour pouvoir ajouter/supprimer un lien de menu our la déconnexion
        // Traitement de la connexion 
        if (trim($_POST["choixmenu"]) == "login") {
            global $dblink;
            $req1 = "select id from users where username='" . $_POST["val_user"] . "' and password=PASSWORD('" . $_POST["val_pwd"] . "')";
            echo $req1;
            $result = $dblink->query($req1);
            $ligne = $result->fetch_object();
            if ($ligne) {
                $_SESSION["connected"] = "ok"; // on ajoute la variable de session qui va permrettre de garder la trace de la connexion
                $this->creer_menu("Déconnexion", "quit"); // on ajoute le lien de menu pour se déconnecter
            }
            $_POST["choixmenu"] = $_POST["old_choixmenu"]; // on rrécupèrer le choix de menu demandé avant la connexion
            $_GET["choixmenu"] = $_POST["old_choixmenu"]; // on rrécupèrer le choix de menu demandé avant la connexion
        }
        // Traitement de la deconnexion
        if (trim($_GET["choixmenu"]) == "quit") {
            $_SESSION["connected"] = ""; // on supprime la variable de session qui garde la trace de la connexion
            unset($this->menu["Déconnexion"]); // on supprime l'enregistrement deconnexion dans le tableau des menus de la classe
        }
        // --------------------------------------------------------------------------------
        echo"<HTML><HEAD>";
        echo "<TITLE>" . $this->page_titre . "</TITLE>";
        echo"</HEAD><BODY><NAV>";
        // on crée les liens de menus du site
        if (is_array($this->menu)) {
            reset($this->menu);
            foreach ($this->menu as $cle => $valeur) {
                echo "&nbsp;<SPAN><a href=\"index.php?choixmenu=" . $valeur . "\">" . $cle . "</a></SPAN>&nbsp;";
            }
        }
        echo"</NAV>";
        // on affiche le contenu des pages
        echo"<DIV id=\"content\" style=\"width:100%\">";
        if (trim($_POST["choixmenu"]) != "")
            $_GET["choixmenu"] = $_POST["choixmenu"];
        switch ($_GET["choixmenu"]) {
            case "xml":
                if (trim($_SESSION["connected"]) == "ok")
                    include("pages/page_xml.php");
                else
                    include("pages/page_login.php");
                break;
            case "contact":
                include("pages/page_contact.php");
                break;
            default:
                include("pages/page_accueil.php");
                break;
        }
        echo"</DIV></BODY></HTML>";
    }

}

?>