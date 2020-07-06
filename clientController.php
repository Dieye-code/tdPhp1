<?php

require_once('model.php');

if (isset($_POST['ajouter'])) {
    extract($_POST);
    if ($typeClient == '2') {
        $sql = "INSERT INTO `clientMoral` (`id`, `raisonSocial`, `adresse`, `nom`, `numero`, `telephone`, `login`, `password`) VALUES (NULL,:raison,:adresse,:nom,:numero,:telephone,:logi,:pwd)";


        $pdo = getConnexion();
        $pdoStatement = $pdo->prepare($sql);
        $data = [
            'raison' => $raisonSocial,
            'adresse' => $AdresseClientMoral,
            'nom' => $nomClientMoral,
            'numero' => $numeroClientMoral,
            'telephone' => $telephoneClientMoral,
            'logi' => $loginClientMoral,
            'pwd' => $passwordClientMoral
        ];
        $a = $pdoStatement->execute($data);
        if ($a == true) {
            echo 'Client Moral ajouté';
        } else {
            echo 'client moral non ajouté';
        }
    } else {
        $pdo = getConnexion();
        if ($typeClientPhysique == '2' && $idEmployeur == '0') {
            $sql = "INSERT INTO `clientMoral` (`id`, `raisonSocial`, `adresse`, `nom`, `numero`, `telephone`, `login`, `password`) VALUES (NULL,:raison,:adresse,:nom,:numero,:telephone,:logi,:pwd)";


            $pdoStatement = $pdo->prepare($sql);
            $data = [
                'raison' => $raisonSocial,
                'adresse' => $AdresseClientMoral,
                'nom' => $nomClientMoral,
                'numero' => $numeroClientMoral,
                'telephone' => $telephoneClientMoral,
                'logi' => $loginClientMoral,
                'pwd' => $passwordClientMoral
            ];
            $a = $pdoStatement->execute($data);
            if ($a == true) {
                $idClientM = $pdo->lastInsertId();
            }
        }

        $sql = "INSERT INTO `clientPhysique`(`id`, `nom`, `prenom`, `nci`, `telephone`, `adresse`, `salaire`, `profession`, `email`, `login`, `password`, `idTypeClient`, `idClientMoral`) VALUES (NULL,:nom,:prenom,:nci,:telephone,:adresse,:salaire,:profession,:email,:logi,:pwd,:idTypeClient,:idClientMoral)";

        if ($idEmployeur != '0') {
            $idClientMoral = $idEmployeur;
        } else {
            $idClientMoral =  $typeClientPhysique=='2' ? $pdo->lastInsertId() : null;
        }

        $pdoStatement = $pdo->prepare($sql);
        $data = [
            'nom' => $nom,
            'prenom' => $prenom,
            'nci' => $cni,
            'telephone' => $telephone,
            'adresse' => $adresse,
            'salaire' => $salaire != '' ? $salaire : Null,
            'email' => $email != '' ? $email : Null,
            'profession' => $profession != '' ? $profession : Null,
            'logi' => $login,
            'pwd' => $password,
            'idTypeClient' => $typeClientPhysique,
            'idClientMoral' => $idClientMoral
        ];
        $a = $pdoStatement->execute($data);
        if ($a == true) {
            echo 'Client Physique ajouté';
        }else {
            echo 'erreur creation client Physique';
        }
    }
}
