<?php

require_once('model.php');

$pdo = getConnexion();

$clientMorals = $pdo->query('SELECT * FROM clientMoral')->fetchAll();
$typeComptes = $pdo->query('SELECT * FROM typeCompte')->fetchAll();

$typeFrais = $pdo->query('SELECT * FROM typeFrais')->fetchAll();
$clientPhysiques = $pdo->query('SELECT * FROM clientPhysique')->fetchAll();
$clientPhysiquesalarie = $pdo->query('SELECT * FROM clientPhysique WHERE idClientMoral IS NOT NULL')->fetchAll();
$clientPhysiquesimple = $pdo->query('SELECT * FROM clientPhysique WHERE idClientMoral IS NULL')->fetchAll();
$agios = $pdo->query("SELECT * FROM `typeFrais` WHERE libelle='Agios'")->fetch();
$frais = $pdo->query("SELECT * FROM `typeFrais` WHERE libelle='Frais Ouverture'")->fetch();
$fraisBlocage = $pdo->query("SELECT * FROM `typeFrais` WHERE libelle='Frais Blocage'")->fetch();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="La gestion de  la Banque du peuple" />
    <meta name="author" content="moustaphadieye96@gmail.com" />
    <meta name="keywords" content="Banque, Client, Compte" />
    <title>Ajout d'un compte client</title>
    <link rel="stylesheet" href="file.css">
</head>

<body>
    <!--le header de la Page-->
    <div class="header">
        <a href="#">
            <span class="logo_1">BANQUE DU</span> <span class="logo_2">PEUPLE</span>
        </a>
    </div>

    <!--Le Contenu de la page-->
    <div class="container">
        <!--Le side Bare-->
        <div class="sideBare">
            <div class="sideBare_header">
                <img src="profil.png" alt="Profil" class="profil">
                <span class="email">moustaphadieye96@gmail.com</span>
            </div>
            <div class="sideBare_body">
                <div class="nav active"><a href="#">Dashboard</a></div>
                <div class="nav active"><a href="compte.php">Compte</a></div>
                <div class="nav"><a href="client.php">Client</a></div>
            </div>
        </div>
        <!--Le main de la page-->
        <div class="main">
            <div class="panel-primary">
                <div class="panel-heading">
                    Ajout d'un Compte Client
                </div>
                <div class="panel-body">
                    <form action="compteController.php" method="post" id="myForm" novalidate>
                        <div class="infoCompte">
                            <div class="title">Info Compte</div>
                            <div class="form-group">
                                <label for="solde" class="control-label">Clés RIB</label>
                                <input type="text" class="form-control" name="clesRib" id="clesRib">
                            </div>
                            <div class="form-group">
                                <label for="typeCompte" class="control-label">Type de Compte</label>
                                <select name="typeCompte" id="typeCompte" class="form-control">
                                    <option value="0">--Type de Compte</option>
                                    <?php
                                    foreach ($typeComptes as $typeCompte) {
                                    ?>
                                        <option value="<?php echo $typeCompte['id']; ?>"><?php echo $typeCompte['libelle']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group" id="dateDeblocage">
                                <label for="solde" class="control-label">Date Déblocage</label>
                                <input type="date" class="form-control" name="dateDebc" id="dateDebc">
                            </div>
                            <div class="form-group">
                                <label for="solde" class="control-label">Solde</label>
                                <input type="number" class="form-control" name="solde" id="solde" value="0">
                                <span class="alert-danger" id="solde-invalid">Le solde doit etre superieur  à <?php echo $frais['montant']; ?></span>
                                <span class="alert-danger" id="fraisBlocage-invalid">Le solde doit etre superieur  à <?php echo $fraisBlocage['montant']; ?></span>
                                <span class="alert-danger" id="agios-invalid">Le solde doit etre superieur  à <?php echo $agios['montant']; ?></span>
                            </div>
                            <div class="form-group" id="fraisBancaire">
                                <label for="frais" class="control-label">Frais Bancaire</label>
                                <span><?php echo $frais['montant']; ?></span>
                                <input type="hidden" class="form-control" name="frais" id="frais" value="<?php echo $frais['montant']; ?>" >
                            </div>
                            <div class="form-group" id="agiosCompte">
                                <label for="agios" class="control-label">Agios</label>
                                <span><?php echo $agios['montant']; ?></span>
                                <input type="hidden" class="form-control" name="agios" id="agios" value="<?php echo $agios['montant']; ?>" >
                            </div>
                            <div class="form-group" id="bloqueCompte">
                                <label for="fraisBlocageCompte" class="control-label">Frais Blocage</label>
                                <span><?php echo $fraisBlocage['montant']; ?></span>
                                <input type="hidden" class="form-control" name="fraisBlocageCompte" id="fraisBlocageCompte" value="<?php echo $fraisBlocage['montant']; ?>" >
                            </div>
                            <div class="form-group" id="typeClientSelect">
                                <label for="typeClient" class="control-label">Type Client</label>
                                <select name="typeClient" id="typeClient" class="form-control">
                                    <option value="0">--Type Client--</option>
                                    <option value="1">Client Physique</option>
                                    <option value="2">Client Moral</option>
                                </select>
                            </div>
                            <div class="form-group" id="typeClientPhysiqueSelect">
                                <label for="typeClientPhysique" class="control-label">Type Client
                                    Physique</label>
                                <select name="typeClientPhysique" id="typeClientPhysique" class="form-control">
                                    <option value="1">Non Salarié</option>
                                    <option value="2">Salarié</option>
                                </select>
                            </div>
                            <div class="infoClientPhysique" id="infoClientPhysique">
                                <div class="form-group">
                                    <label for="solde" class="control-label">Client Non Salarié</label>
                                    <select name="idClientNormal" id="idClientNormal" class="form-control">
                                        <option value="0">--Client--</option>
                                        <?php
                                        foreach ($clientPhysiquesimple as $clientP) {
                                        ?>
                                            <option value="<?php echo $clientP['id']; ?>"><?php echo $clientP['prenom'].' '.$clientP['nom']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="infoClientPhysiqueSalarie" id="infoClientPhysiqueSalarie">
                                <div class="form-group">
                                    <label for="solde" class="control-label">Client Salarié</label>
                                    <select name="idClientSalarie" id="idClientSalarie" class="form-control">
                                        <option value="0">--Client--</option>
                                        <?php
                                        foreach ($clientPhysiquesalarie as $clientP) {
                                        ?>
                                            <option value="<?php echo $clientP['id']; ?>"><?php echo $clientP['prenom'].' '.$clientP['nom']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="infoClientEntreprise" id="infoClientEntreprise">
                                <div class="form-group">
                                    <label for="solde" class="control-label">Client</label>
                                    <select name="idEmployeur" id="idEmployeur" class="form-control">
                                        <option value="0">--Entreprise--</option>
                                        <?php
                                        foreach ($clientMorals as $clientMoral) {
                                        ?>
                                            <option value="<?php echo $clientMoral['id']; ?>"><?php echo $clientMoral['nom']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn-primary" name="ajouter" value="Ajouter">

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="compte.js"></script>

    <div class="footer">

    </div>

</body>

</html>