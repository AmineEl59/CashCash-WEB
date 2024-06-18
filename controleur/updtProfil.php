<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/bd.assistants.inc.php";
$id=getMailULoggedOn();
$util = getUtilisateurByMailU($id);
$emploie = getEmploiUserById($id);
$role=$emploie["nomRôle"];


if (isLoggedOn()) {
    $menuBurger[] = Array("url"=>"./?action=aAffecterVisite","label"=>"Affecter Intervention");
    $menuBurger[] = Array("url"=>"./?action=aVoirIntervention","label"=>"Consulter Intervention");
    $menuBurger[] = Array("url"=>"./?action=updProfil","label"=>"Modifier Informations clients");
    $menuBurger[] = Array("url"=>"./?action=statsTech","label"=>"Statistique du mois");
    $menuBurger[] = Array("url"=>"./?action=rTechnicien","label"=>"Rattacher Technicien");
    $menuBurger[] = Array("url"=>"./?action=profil","label"=>"Mon profil");

    $titre = "Update infos client";
    include_once "$racine/vue/entete.html.php";
    include_once "$racine/vue/vueMonProfil.php";
    include_once "$racine/vue/vueUpdProfil.php";
    include_once "$racine/vue/pied.html.php";
} else {
    $titre = "Merci de vous connecter";
    include_once "$racine/vue/entete.html.php";
    include_once "$racine/vue/pied.html.php";
}
?>