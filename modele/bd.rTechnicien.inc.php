<?php
include_once "bd.inc.php";
function getAllAgenceIds() {
    // Récupérer toutes les id des agences qui existe
    $resultatAgences = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select idAgences from agences");
        $req->execute();

        $resultatAgences = $req->fetchAll(PDO::FETCH_COLUMN);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }

    return $resultatAgences;
}
function insererDansRattacher($idAgence, $idTechnicien, $dateDebut, $dateFin) {
    // Insérer le rattachement d'un technicien en fonction des valeurs choisies
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO rattacher (idAgences, idTechnicien, dateDebutRattachement, dateFinRattachement) VALUES (?, ?, ?, ?)");
        $req->execute([$idAgence, $idTechnicien, $dateDebut, $dateFin]);
    } catch (PDOException $e) {
        throw new PDOException("Erreur lors de l'insertion dans la table rattacher : " . $e->getMessage());
    }
}
?>