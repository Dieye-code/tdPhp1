<?php
namespace model;

use bd\Compte;
use Compte as GlobalCompte;

class CompteDb extends Model
{

    public function addCompte(GlobalCompte $compte){
        $this->db->persist($compte);
        $this->db->flush();
        return $compte->getId();
    }

    public function listeCompts(){
        return $this->db->getRepository('Compte')->findAll();
    }

    public function listeClientMorals(){
        return $this->db->getRepository('ClientMoral')->findAll();
    }

    public function listeClientPhysiques(){
        return $this->db->getRepository('ClientPhysique')->findAll();
    }
    public function listeClientPhysiqueSalaries(){
        return $this->db->createQuery("SELECT c FROM ClientPhysique c WHERE c.clientMoral IS NOT NULL")->getResult();
    }
    public function listeClientPhysiqueNonSalaries(){
        return $this->db->createQuery("SELECT c FROM ClientPhysique c WHERE c.clientMoral IS  NULL")->getResult();
    }

    public function listeTypeComptes(){
        return $this->db->getRepository('TypeCompte')->findAll();
    }

    public function listeTypeFrais(){
        return $this->db->getRepository('TypeFrais')->findAll();
    }

    public function getTypeFrais($libelle){
        return $this->db->createQuery("SELECT t FROM TypeFrais t WHERE t.libelle = '$libelle'")->getOneOrNullResult();
    }

    public function getClientMoral($id){
        return $this->db->getRepository('ClientMoral')->find($id);
    }
    public function getClientPhysique($id){
        return $this->db->getRepository('ClientPhysique')->find($id);
    }
    public function getTypeCompte($id){
        return $this->db->getRepository('TypeCompte')->find($id);
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
