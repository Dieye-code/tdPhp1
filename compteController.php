<?php

require_once('model.php');
$pdo = getConnexion();

if (isset($_POST['ajouter'])) {
    extract($_POST);
    if ($typeCompte == '1') {
        $solde = $solde - $frais;
    } else {
        if($typeCompte=='2'){
            $solde = $solde - $agios;
        } else{
            $solde = $solde - $fraisBlocageCompte;
        }
    }


    $idClientphysique = NULL;

    $sql = "INSERT INTO `compte`(`id`, `numero`, `clerib`, `solde`, `etat`, `dateDeboc`, `dateCreat`, `dateFermetureTemp`, `dateReouverture`, `idClientPhysique`, `idClientMoral`, `idTypeCompte`) VALUES (NULL,:numero,:cleRib,:solde,:etat,:dateDebc,:dateCr,NULL,NULL,:idClientPhysique,:idClientmoral,:idtypeCompte)";
    $idClientphysique = NULL;
    if($idClientNormal!='0' || $idClientSalarie!='0'){
        $idClientphysique = $idClientNormal != '0' ? (int)$idClientNormal : (int)$idClientSalarie;
    }


    $pdoStatement = $pdo->prepare($sql);
    $data = [
        'numero' => $clesRib,
        'cleRib' => $clesRib,
        'solde' => $solde,
        'etat' => 'actif',
        'dateDebc'  => $dateDebc !='' ? $dateDebc : NULL,
        'dateCr' => date('Y-m-d'),
        'idClientPhysique' => $idClientphysique,
        'idClientmoral' => $idEmployeur !='0' ? (int)$idEmployeur : NULL,
        'idtypeCompte' => (int)$typeCompte
    ];
    $a = $pdoStatement->execute($data);
    if ($a == true) {
        echo 'Compte ajouté';
    }else {
        echo 'erreur creation Compte';
    }
}
