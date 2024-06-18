<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si tous les champs ont été remplis
    if (!empty($_POST['agence']) && !empty($_POST['idTechnicien']) && !empty($_POST['date_debut']) && !empty($_POST['date_fin'])) {
        // Récupérer les valeurs du formulaire
        $idAgence = $_POST['agence'];
        $idTechnicien = $_POST['idTechnicien'];
        $dateDebut = $_POST['date_debut'];
        $dateFin = $_POST['date_fin'];
        try {
            insererDansRattacher($idAgence, $idTechnicien, $dateDebut, $dateFin);
            echo "<p class=\"good-message\">Les données ont été insérées avec succès dans la table rattacher.</p>";
        } catch (PDOException $e) {
            echo "<p class=\"error-message\">" . $e->getMessage() . "</p>";
        }
    } else {
        echo "<p class=\"error-message\">Veuillez remplir tous les champs du formulaire.</p>";
    }
}
?>


<form action="" method="post" class="rattacherTechnicien container2">
    <h2>Rattacher Technicien</h2>
<label for="agence">Agence :</label>
    <select name="agence" id="agence">
        <option value="">Sélectionnez une agence</option>
        <?php
        $agenceIds = getAllAgenceIds();
        foreach ($agenceIds as $agenceId) {
            echo "<option value=\"$agenceId\">Agence $agenceId</option>";
        }
        ?>
    </select>

    <label for="idTechnicien">Id technicien:</label>
    <select name="idTechnicien" required>
        <option value="">Sélectionnez un technicien</option>
        <?php
        $technicianIds = getAllTechnicianIds();
        foreach ($technicianIds as $technicianId) {
            echo "<option value=\"$technicianId\">$technicianId</option>";
        }
        ?>
    </select>

    <label for="date_debut">Date de début :</label>
    <input type="date" id="date_debut" name="date_debut" min="<?php echo date('Y-m-d'); ?>"><br><br>

    <label for="date_fin">Date de fin :</label>
    <input type="date" id="date_fin" name="date_fin" min="<?php echo date('Y-m-d'); ?>"><br><br>

    <input type="submit" value="Rattacher Technicien" class="plus">
</form>