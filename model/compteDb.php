<?php

class CompteDb extends Model
{

    public function listeCompts(){
        return $this->executeSelect("SELECT * FROM compte")->fetchAll();
    }

    public function addCompte(Compte $compte){

        $sql = "INSERT INTO `compte`(`id`, `numero`, `clerib`, `solde`, `etat`, `dateDeboc`, `dateCreat`, `dateFermetureTemp`, `dateReouverture`, `idClientPhysique`, `idClientMoral`, `idTypeCompte`) VALUES (NULL,:numero,:cleRib,:solde,:etat,:dateDebc,:dateCreat,:dateFermetureTemp,:dateReouverture,:idClientPhysique,:idClientmoral,:idtypeCompte)";

        $this->prepare($sql);
        return $this->executePrepareAdd($compte->getParam());

    }
}


// function addCompte($tab)
// {
//     $pdo = getConnexion();
//     $sql = "INSERT INTO `compte`(`id`, `numero`, `clerib`, `solde`, `etat`, `dateDeboc`, `dateCreat`, `dateFermetureTemp`, `dateReouverture`, `idClientPhysique`, `idClientMoral`, `idTypeCompte`) VALUES (NULL,:numero,:cleRib,:solde,:etat,:dateDebc,:dateCr,NULL,NULL,:idClientPhysique,:idClientmoral,:idtypeCompte)";
//     $pdoStatement = $pdo->prepare($sql);
//     $data = [
//         'numero' => $tab['clesRib'],
//         'cleRib' => $tab['clesRib'],
//         'solde' => $tab['solde'],
//         'etat' => $tab['etat'],
//         'dateDebc'  => $tab['dateDebc'],
//         'dateCr' => date('Y-m-d'),
//         'idClientPhysique' => $tab['idClientphysique'],
//         'idClientmoral' => $tab['idEmployeur'],
//         'idtypeCompte' => $tab['typeCompte']
//     ];

//     $a = $pdoStatement->execute($data);
//     if ($a!=False)
//         return $pdo->lastInsertId();
//     else
//         return false;
// }
