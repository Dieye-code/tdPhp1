<?php

require_once('model.php');
$pdo = getConnexion();

if (isset($_POST['ajouter'])) {
    extract($_POST);
    var_dump($_POST);
    echo "<br/>";
    if ($typeCompte == '1') {
        $solde = $solde - $frais;
    } else {
        $solde = $solde - $agios;
    }

    $sql = "INSERT INTO `compte`(`id`, `numero`, `clerib`, `solde`, `etat`, `dateDeboc`, `dateCreat`, `dateFermetureTemp`, `dateReouverture`, `idClientPhysique`, `idClientMoral`, `idTypeCompte`) VALUES (NULL,:numero,:cleRib,:solde,:etat,NULL,:dateCr,NULL,NULL,:idClientPhysique,:idClientmoral,:idtypeCompte)";
    $idClientphysique = NULL;
    if($idClientNormal!='0' || $idClientSalarie!='0'){
        $idClientphysique = $idClientNormal != '0' ? $idClientNormal : $idClientSalarie;
    }

    

    $pdoStatement = $pdo->prepare($sql);
    $data = [
        'numero' => 'Coo1',
        'cleRib' => 'Coo1',
        'solde' => $solde,
        'etat' => 'actif',
        'dateCr' => date('Y-m-d'),
        'idClientPhysique' => (int)$idClientphysique,
        'idClientmoral' => $idEmployeur !='0' ? (int)$idEmployeur : NULL,
        'idtypeCompte' => (int)$typeCompte
    ];
    $a = $pdoStatement->execute($data);
    if ($a == true) {
        echo 'Client Physique ajouté';
    }else {
        echo 'erreur creation client Physique';
    }
}
