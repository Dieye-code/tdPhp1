<?php

namespace model;



use bd\ClientMoral;
use bd\ClientPhysique;
use ClientMoral as GlobalClientMoral;
use ClientPhysique as GlobalClientPhysique;

class ClientDb extends Model
{
    

    public function addClientMoral(GlobalClientMoral $clientMoral)
    {
        $this->db->persist($clientMoral);
        $this->db->flush();
        return $clientMoral->getId();
    }

    public function addClientPhysique(GlobalClientPhysique $clientPhysique)
    {
        $this->db->persist($clientPhysique);
        $this->db->flush();
        return $clientPhysique->getId();
    }

    public function listeClientMorals()
    {
        return $this->db->getRepository('ClientMoral')->findAll();
    }

    public function listeTypeClients()
    {
        return $this->db->getRepository('TypeClient')->findAll();
    }

    public function getClientMoral($id)
    {
        return $this->db->getRepository('ClientMoral')->find($id);
    }

    public function getTypeClient($id){
        return $this->db->getRepository('TypeClient')->find($id);
    }

    // public function listeClientMorals()
    // {
    //     return $this->executeSelect('SELECT * FROM clientMoral')->fetchAll();
    // }

    // public function listeClienntPhysique(){
    //     return $this->executeSelect('SELECT * FROM clientPhysique')->fetchAll();
    // }

    // public function listeClienntPhysiqueSalarie(){
    //     return $this->executeSelect('SELECT * FROM clientPhysique WHERE idClientMoral IS NOT NULL')->fetchAll();
    // }

    // public function listeClienntPhysiqueNonSalarie(){
    //     return $this->executeSelect('SELECT * FROM clientPhysique WHERE idClientMoral IS NULL')->fetchAll();
    // }

    // public function addClientMoral(ClientMoral $clientMoral){

    //     $sql = "INSERT INTO `clientMoral` (`id`, `raisonSocial`, `adresse`, `nom`, `numero`, `telephone`,  `email`, `login`, `password`) VALUES (NULL,:raisonSocial,:adresse,:nom,:numero,:telephone,:email,:login,:password)";
    //     $this->prepare($sql);
    //     // var_dump($sql);
    //     // die;
    //     return $this->executePrepareAdd($clientMoral->getParam());


    // }

    // public function addClientPhysique(ClientPhysique $clientPhysique){

    //     $sql = "INSERT INTO `clientPhysique`(`id`, `nom`, `prenom`, `nci`, `telephone`, `adresse`, `salaire`, `profession`, `email`, `login`, `password`, `idTypeClient`, `idClientMoral`) VALUES (NULL,:nom,:prenom,:nci,:telephone,:adresse,:salaire,:profession,:email,:login,:password,:idTypeClient,:idClientMoral)";
    //     // var_dump($clientPhysique->getParam());
    //     // die;
    //     $this->prepare($sql);
    //     return $this->executePrepareAdd($clientPhysique->getParam());

    // }

}



// function listeClientMorals()
// {
//     return $pdo->query('SELECT * FROM clientMoral')->fetchAll();
// }


// function listeClientPhysiqueSalaries()
// {
//     return $pdo->query('SELECT * FROM clientPhysique WHERE idClientMoral IS NOT NULL')->fetchAll();
// }


// function listeClientPhysiqueNonSalaries()
// {
// }

// function addClientMoral($tab)
// {
//     $sql = "INSERT INTO `clientMoral` (`id`, `raisonSocial`, `adresse`, `nom`, `numero`, `telephone`, `login`, `password`) VALUES (NULL,:raison,:adresse,:nom,:numero,:telephone,:logi,:pwd)";

//     $data = [
//         'raison' => $tab['raisonSocial'],
//         'adresse' => $tab['AdresseClientMoral'],
//         'nom' => $tab['nomClientMoral'],
//         'numero' => $tab['numeroClientMoral'],
//         'telephone' => $tab['telephoneClientMoral'],
//         'logi' => $tab['loginClientMoral'],
//         'pwd' => $tab['passwordClientMoral']
//     ];
//     $a = $pdoStatement->execute($data);
//     if (!$a)
//         return $pdo->lastInsertId();
//     else
//         return false;
// }

// function addClientPhysique($tab)
// {


//     $sql = "INSERT INTO `clientPhysique`(`id`, `nom`, `prenom`, `nci`, `telephone`, `adresse`, `salaire`, `profession`, `email`, `login`, `password`, `idTypeClient`, `idClientMoral`) VALUES (NULL,:nom,:prenom,:nci,:telephone,:adresse,:salaire,:profession,:email,:logi,:pwd,:idTypeClient,:idClientMoral)";
//     $data = [
//         'nom' => $tab['nom'],
//         'prenom' => $tab['prenom'],
//         'nci' => $tab['cni'],
//         'telephone' => $tab['telephone'],
//         'adresse' => $tab['adresse'],
//         'salaire' => $tab['salaire'],
//         'email' => $tab['email'],
//         'profession' => $tab['profession'],
//         'logi' => $tab['login'],
//         'pwd' => $tab['password'],
//         'idTypeClient' => $tab['typeClientPhysique'],
//         'idClientMoral' => $tab['idClientMoral']
//     ];
//     $a = $pdoStatement->execute($data);
//     if (!$a)
//         return $pdo->lastInsertId();
//     else
//         return false;
// }
