<?php

namespace src;

use Compte;
use model\CompteDb;

class CompteController
{
    public function add()
    {

        $compteDb = new CompteDb();

        $clientMorals = $compteDb->listeClientMorals();
        $typeComptes = $compteDb->listeTypeComptes();
        $typeFrais = $compteDb->listeTypeFrais();
        $clientPhysiques = $compteDb->listeClientPhysiques();
        $clientPhysiquesalarie = $compteDb->listeClientPhysiqueSalaries();
        $clientPhysiquesimple = $compteDb->listeClientPhysiqueNonSalaries();
        $agiosOuverture = $compteDb->getTypeFrais("Agios");
        $fraisOuverture = $compteDb->getTypeFrais("Frais ouverture");
        $fraisBlocageOuverture = $compteDb->getTypeFrais("Frais Blocage");

        if (isset($_POST['ajouter'])) {

            extract($_POST);
            if ($typeCompte == '1') {
                $solde = $solde - $frais;
            } else {
                if ($typeCompte == '4') {

                    $solde = $solde - $fraisBlocageCompte;
                }
            }
            $idClientphysique = NULL;
            if ($idClientNormal != '0' || $idClientSalarie != '0') {
                $idClientphysique = $idClientNormal != '0' ? (int) $idClientNormal : (int) $idClientSalarie;
            }

            $compte = new Compte();

            $compte->setNumero($clesRib);
            $compte->setClerib($clesRib);
            $compte->setSolde($solde);
            $compte->setEtat('actif');
            $compte->setDateDeboc($dateDebc != '' ? $dateDebc : NULL);
            $compte->setDateCreat(date('Y-m-d'));
            $compte->setClientPhysique($compteDb->getClientPhysique($idClientphysique));
            $compte->setClientMoral($compteDb->getClientMoral($idEmployeur));
            $compte->setTypeComptes($compteDb->getTypeCompte($typeCompte));

            $a = $compteDb->addCompte($compte);

            if ($a != 0) {
                echo "Compte bien ajoute";
            } else {
                echo "Echec de l'ajout du Compte";
            }
            die;
        } else {
            $title = 'Ajout des Comptes';
            $page = 'compte';
            require_once('view/compte/add.php');
        }
    }
}

// $clientDb = new ClientDb();
//         $typeCompteDb = new TypeCompteDb();
//         $typeFraisDb = new TypeFraisDb();

//         $clientMorals = $clientDb->listeClientMorals();
//         $typeComptes = $typeCompteDb->listeTypeComptes();
        
//         $typeFrais = $typeFraisDb->listeTypesFrais();
//         $clientPhysiques = $clientDb->listeClienntPhysique();
//         $clientPhysiquesalarie = $clientDb->listeClienntPhysiqueSalarie();
//         $clientPhysiquesimple = $clientDb->listeClienntPhysiqueNonSalarie();
//         $agiosOuverture = $typeFraisDb->getFrais("Agios");
//         $fraisOuverture = $typeFraisDb->getFrais("Frais ouverture");
//         $fraisBlocageOuverture = $typeFraisDb->getFrais("Frais Blocage");

//         if (isset($_POST['ajouter'])) {
//             $compteDb = new CompteDb();
//             extract($_POST);
//             if ($typeCompte == '1') {
//                 $solde = $solde - $frais;
//             } else {
//                 if ($typeCompte == '4') {

//                     $solde = $solde - $fraisBlocageCompte;
//                 }
//             }
//             $idClientphysique = NULL;
//             if ($idClientNormal != '0' || $idClientSalarie != '0') {
//                 $idClientphysique = $idClientNormal != '0' ? (int) $idClientNormal : (int) $idClientSalarie;
//             }

//             $compte = new Compte();

//             $compte->setNumero($clesRib);
//             $compte->setClerib($clesRib);
//             $compte->setSolde($solde);
//             $compte->setEtat('actif');
//             $compte->setDateDeboc($dateDebc !='' ? $dateDebc : NULL);
//             $compte->setDateCreat(date('Y-m-d'));
//             $compte->setIdClientPhysique($idClientphysique);
//             $compte->setIdClientMoral($idEmployeur !='0' ? $idEmployeur : NULL);
//             $compte->setIdTypeCompte($typeCompte);

//             $a = $compteDb->addCompte($compte);

//             if($a!=0){
//                 echo "Compte bien ajoute";
//             }else {
//                 echo "Echec de l'ajout du Compte";
//             }
//             die;
//         } else {
//             $title = 'Ajout des Comptes';
//             $page = 'compte';
//             require_once('view/compte/add.php');
//         }