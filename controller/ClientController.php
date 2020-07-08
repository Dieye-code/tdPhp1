<?php

namespace src;

use bd\ClientMoral;
use bd\ClientPhysique;
use ClientMoral as GlobalClientMoral;
use ClientPhysique as GlobalClientPhysique;
use model\ClientDb;
use model\TypeClientDb;

class ClientController
{
    public function add()
    {
        $cm = new ClientDb();
        // foreach ($typeClients as $typeClient ) {
        //     var_dump($typeClient->getId());

        // }
        // // var_dump($typeClients);
        // die;

        if (isset($_POST['ajouter'])) {

            $clientDb = new ClientDb();

            extract($_POST);

            // var_dump($_POST);
            // die;

            if ($typeClient == '2') {
                $clientMoral = new GlobalClientMoral();
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
                var_dump($a);
                if ($a != '0') {
                    echo "client Moral bien ajouté";
                } else {
                    echo "echec d'ajout du client Moral";
                }
            } else {

                $clientPhysique = new GlobalClientPhysique();

                if ($typeClientPhysique == '2' && $idEmployeur == '0') {
                    $clientMoral = new GlobalClientMoral();
                    $clientMoral->setRaisonSocial($raisonSocial);
                    $clientMoral->setAdresse($AdresseClientMoral);
                    $clientMoral->setNom($nomClientMoral);
                    $clientMoral->setNumero($numeroClientMoral);
                    $clientMoral->setTelephone($telephoneClientMoral);
                    $clientMoral->setLogin($loginClientMoral);
                    $clientMoral->setPassword($passwordClientMoral);
                    $clientMoral->setEmail($emailClientMoral);

                    $clientPhysique->setClientMoral($clientMoral);
                } else {
                    $clientPhysique->setClientMoral($clientDb->getClientMoral($idEmployeur));
                }


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
                $clientPhysique->setTypeClient($clientDb->getTypeClient($typeClientPhysique));

                $a = $clientDb->addClientPhysique($clientPhysique);

                if ($a != '0') {
                    echo "client Physique bien ajouté";
                } else {
                    echo "echec d'ajout du client Physique";
                }
            }
        } else {

            $clientMorals = $cm->listeClientMorals();
            $typeClients = $cm->listeTypeClients();
            $title = 'Ajout des clients';
            $page = 'client';
            require_once('view/client/add.php');
        }
    }
}








//     if ($typeClientPhysique == '2' && $idEmployeur == '0') {
            //         $clientMoral = new ClientMoral();
            //         $clientMoral->setRaisonSocial($raisonSocial);
            //         $clientMoral->setAdresse($AdresseClientMoral);
            //         $clientMoral->setNom($nomClientMoral);
            //         $clientMoral->setNumero($numeroClientMoral);
            //         $clientMoral->setTelephone($telephoneClientMoral);
            //         $clientMoral->setLogin($loginClientMoral);
            //         $clientMoral->setPassword($passwordClientMoral);
            //         $clientMoral->setEmail($emailClientMoral);

            //         $a = $clientDb->addClientMoral($clientMoral);

            //         $idClientMoral = $a;
            //     } else {
            //         $idClientMoral = $idEmployeur!= '0' ?  $idEmployeur : NULL;
            //     }


            //     $sql = "INSERT INTO `clientPhysique`(`id`, `nom`, `prenom`, `nci`, `telephone`, `adresse`, `salaire`, `profession`, `email`, `login`, `password`, `idTypeClient`, `idClientMoral`) VALUES (NULL,:nom,:prenom,:nci,:telephone,:adresse,:salaire,:profession,:email,:login,:password,:idTypeClient,:idClientMoral)";

            //     $clientPhysique = new ClientPhysique();

            //     $clientPhysique->setNom($nom);
            //     $clientPhysique->setPrenom($prenom);
            //     $clientPhysique->setNci($cni);
            //     $clientPhysique->setTelephone($telephone);
            //     $clientPhysique->setAdresse($adresse);
            //     $clientPhysique->setSalaire($salaire != '' ? $salaire : Null);
            //     $clientPhysique->setEmail($email != '' ? $email : Null);
            //     $clientPhysique->setProfession($profession != '' ? $profession : Null);
            //     $clientPhysique->setLogin($login);
            //     $clientPhysique->setPassword($password);
            //     $clientPhysique->setIdClientMoral($idClientMoral);
            //     $clientPhysique->setIdTypeClient($typeClientPhysique);

            //     $a = $clientDb->addClientPhysique($clientPhysique);

            //     if ($a != '0') {
            //         echo "client Physique bien ajouté";
            //     } else {
            //         echo "echec d'ajout du client Physique";
            //     }


            // }
        // } else {

        //     $title = 'Ajout des clients';
        //     $page = 'client';
        //     require_once('view/client/add.php');
        // }
