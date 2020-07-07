<?php

namespace src;

use bd\Compte;
use model\ClientDb;
use model\CompteDb;
use model\TypeCompteDb;
use model\TypeFraisDb;

class CompteController
{
    public function add()
    {
        $clientDb = new ClientDb();
        $typeCompteDb = new TypeCompteDb();
        $typeFraisDb = new TypeFraisDb();

        $clientMorals = $clientDb->listeClientMorals();
        $typeComptes = $typeCompteDb->listeTypeComptes();
        
        $typeFrais = $typeFraisDb->listeTypesFrais();
        $clientPhysiques = $clientDb->listeClienntPhysique();
        $clientPhysiquesalarie = $clientDb->listeClienntPhysiqueSalarie();
        $clientPhysiquesimple = $clientDb->listeClienntPhysiqueNonSalarie();
        $agiosOuverture = $typeFraisDb->getFrais("Agios");
        $fraisOuverture = $typeFraisDb->getFrais("Frais ouverture");
        $fraisBlocageOuverture = $typeFraisDb->getFrais("Frais Blocage");

        if (isset($_POST['ajouter'])) {
            $compteDb = new CompteDb();
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
            $compte->setDateDeboc($dateDebc !='' ? $dateDebc : NULL);
            $compte->setDateCreat(date('Y-m-d'));
            $compte->setIdClientPhysique($idClientphysique);
            $compte->setIdClientMoral($idEmployeur !='0' ? $idEmployeur : NULL);
            $compte->setIdTypeCompte($typeCompte);

            $a = $compteDb->addCompte($compte);

            if($a!=0){
                echo "Compte bien ajoute";
            }else {
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
