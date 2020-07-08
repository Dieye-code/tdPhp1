<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as orm;

/**
 * @orm\Entity @orm\Table(name="clientphysique")
 */
class ClientPhysique 
{
    /**
     * @orm\id @orm\column(type="integer") @orm\GeneratedValue
     */
    private $id;
    /**
     * @orm\column(type="string", length=100)
     */
    private $nom;
    /**
     * @orm\column(type="string", length=100)
     */
    private $prenom;
    /**
     * @orm\column(type="string", length=100)
     */
    private $nci;/**
    * @orm\column(type="string", length=100)
    */
    private $telephone;
    /**
     * @orm\column(type="string", length=100)
     */
    private $adresse;
    /**
     * @orm\column(type="integer", nullable=true)
     */
    private $salaire;
    /**
     * @orm\column(type="string", length=100, nullable=true)
     */
    private $profession;
    /**
     * @orm\column(type="string", length=100, nullable=true)
     */
    private $email;
    /**
     * @orm\column(type="string", length=100)
     */
    private $login;
    /**
     * @orm\column(type="string", length=100)
     */
    private $password;
    /**
     * @orm\ManyToOne(targetEntity="TypeClient", inversedBy="clientPhysiques",cascade={"persist"})
     * @orm\JoinColumn(name="idTypeClient", referencedColumnName="id")
     */
    private $typeClient;
    /**
     * @orm\ManyToOne(targetEntity="ClientMoral", inversedBy="clientPhysiques",cascade={"persist"})
     * @orm\JoinColumn(name="idClientMoral", referencedColumnName="id")
     */
    private $clientMoral;
    /**
     * @orm\OneToMany(targetEntity="Compte", mappedBy="clientPhysique")
     **/
    private $comptes;

    public function __construct()
    {
        $this->comptes = new ArrayCollection();
    }

    public function getParam(){
        return [
            'nom'=>$this->nom,
            'prenom'=>$this->prenom,
            'nci'=>$this->nci,
            'telephone'=>$this->telephone,
            'adresse'=>$this->adresse,
            'salaire'=>$this->salaire,
            'profession'=>$this->profession,
            'email'=>$this->email,
            'login'=>$this->login,
            'password'=>$this->password,
            'idClientMoral'=>$this->idClientMoral,
            'idTypeClient'=>$this->idTypeClient
        ];
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */ 
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * Get the value of nci
     */ 
    public function getNci()
    {
        return $this->nci;
    }

    /**
     * Set the value of nci
     */ 
    public function setNci($nci)
    {
        $this->nci = $nci;
    }

    /**
     * Get the value of telephone
     */ 
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     */ 
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     */ 
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * Get the value of salaire
     */ 
    public function getSalaire()
    {
        return $this->salaire;
    }

    /**
     * Set the value of salaire
     */ 
    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;
    }

    /**
     * Get the value of profession
     */ 
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * Set the value of profession
     */ 
    public function setProfession($profession)
    {
        $this->profession = $profession;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */ 
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get the value of login
     */ 
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of login
     */ 
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */ 
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get the value of typeClient
     */ 
    public function getTypeClient()
    {
        return $this->typeClient;
    }

    /**
     * Set the value of typeClient
     */ 
    public function setTypeClient($typeClient)
    {
        $this->typeClient = $typeClient;
    }

    /**
     * Get the value of clientMoral
     */ 
    public function getClientMoral()
    {
        return $this->clientMoral;
    }

    /**
     * Set the value of clientMoral
     */ 
    public function setClientMoral($clientMoral)
    {
        $this->clientMoral = $clientMoral;
    }

    /**
     * Get the value of comptes
     */ 
    public function getComptes()
    {
        return $this->comptes;
    }

    /**
     * Set the value of comptes
     */ 
    public function setComptes($comptes)
    {
        $this->comptes = $comptes;
    }
}
