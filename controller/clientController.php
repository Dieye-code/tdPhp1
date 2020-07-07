<?php

namespace src;

use bd\ClientMoral;
use bd\ClientPhysique;
use model\ClientDb;
use model\TypeClientDb;

class ClientController
{
    public function add()
    {
        $cm = new ClientDb();
        $clientMorals = $cm->listeClientMorals();
        $tf = new TypeClientDb();
        $typeClients = $tf->listeTypeClients();

        if (isset($_POST['ajouter'])) {

            $clientDb = new ClientDb();

            extract($_POST);

            // var_dump($_POST);
            // die;

            if ($typeClient == '2') {
                $clientMoral = new ClientMoral();
                $clientMoral->setRaisonSocial($raisonSocial);
                $clientMoral->setAdresse($AdresseClientMoral);
                $clientMoral->setNom($nomClientMoral);
                $clientMoral->setNumero($numeroClientMoral);
                $clientMoral->setTelephone($telephoneClientMoral);
                $clientMoral->setLogin($loginClientMoral);
                $clientMoral->setPassword($passwordClientMoral);
                $clientMoral->setEmail($emailClientMoral);

                // var_dump($clientMoral);
                // die;

                $a = $clientDb->addClientMoral($clientMoral);
                if ($a != '0') {
                    echo "client Moral bien ajouté";
                } else {
                    echo "echec d'ajout du client Moral";
                }
            } else {
                if ($typeClientPhysique == '2' && $idEmployeur == '0') {
                    $clientMoral = new ClientMoral();
                    $clientMoral->setRaisonSocial($raisonSocial);
                    $clientMoral->setAdresse($AdresseClientMoral);
                    $clientMoral->setNom($nomClientMoral);
                    $clientMoral->setNumero($numeroClientMoral);
                    $clientMoral->setTelephone($telephoneClientMoral);
                    $clientMoral->setLogin($loginClientMoral);
                    $clientMoral->setPassword($passwordClientMoral);
                    $clientMoral->setEmail($emailClientMoral);

                    $a = $clientDb->addClientMoral($clientMoral);

                    $idClientMoral = $a;
                } else {
                    $idClientMoral = $idEmployeur!= '0' ?  $idEmployeur : NULL;
                }


                $sql = "INSERT INTO `clientPhysique`(`id`, `nom`, `prenom`, `nci`, `telephone`, `adresse`, `salaire`, `profession`, `email`, `login`, `password`, `idTypeClient`, `idClientMoral`) VALUES (NULL,:nom,:prenom,:nci,:telephone,:adresse,:salaire,:profession,:email,:login,:password,:idTypeClient,:idClientMoral)";

                $clientPhysique = new ClientPhysique();

                $clientPhysique->setNom($nom);
                $clientPhysique->setPrenom($prenom);
                $clientPhysique->setNci($cni);
                $clientPhysique->setTelephone($telephone);
                $clientPhysique->setAdresse($adresse);
                $clientPhysique->setSalaire($salaire != '' ? $salaire : Null);
                $clientPhysique->setEmail($email != '' ? $email : Null);
                $clientPhysique->setProfession($profession != '' ? $profession : Null);
                $clientPhysique->setLogin($login);
                $clientPhysique->setPassword($password);
                $clientPhysique->setIdClientMoral($idClientMoral);
                $clientPhysique->setIdTypeClient($typeClientPhysique);

                $a = $clientDb->addClientPhysique($clientPhysique);

                if ($a != '0') {
                    echo "client Physique bien ajouté";
                } else {
                    echo "echec d'ajout du client Physique";
                }


            }
        } else {

            $title = 'Ajout des clients';
            $page = 'client';
            require_once('view/client/add.php');
        }
    }
}
