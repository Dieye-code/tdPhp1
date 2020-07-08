<?php


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as orm;

/**
 * @orm\Entity @orm\Table(name="clientmoral")
 */
class ClientMoral
{
    /**
     * @orm\id @orm\column(type="integer") @orm\GeneratedValue
     */
    private $id;
    /**
     * @orm\column(type="string", length=100)
     */
    private $raisonSocial;
    /**
     * @orm\column(type="string", length=100, nullable=true)
     */
    private $adresse;
    /**
     * @orm\column(type="string", length=100, nullable=true)
     */
    private $nom;
    /**
     * @orm\column(type="string", length=100)
     */
    private $numero;
    /**
     * @orm\column(type="string", length=100, nullable=true)
     */
    private $telephone;
    /**
     * @orm\column(type="string", length=100, nullable=true)
     */
    private $email;
    /**
     * @orm\column(type="string", length=100, nullable=true)
     */
    private $login;
    /**
     * @orm\column(type="string", length=100, nullable=true)
     */
    private $password;
    /**
     * @orm\OneToMany(targetEntity="ClientPhysique", mappedBy="employeur")
     **/
    private $clientPhysiques;
    /**
     * @orm\OneToMany(targetEntity="Compte", mappedBy="clientMoral")
     **/
    private $comptes;

    public function __construct()
    {
        $this->clientPhysiques = new ArrayCollection();
        $this->comptes = new ArrayCollection();
    }
    

    public function getParam(){
        return [
            'raisonSocial'=>$this->raisonSocial,
            'adresse'=>$this->adresse,
            'nom'=>$this->nom,
            'numero'=>$this->numero,
            'telephone'=>$this->telephone,
            'email'=>$this->email,
            'login'=>$this->login,
            'password'=>$this->password
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
     * Get the value of raisonSocial
     */ 
    public function getRaisonSocial()
    {
        return $this->raisonSocial;
    }

    /**
     * Set the value of raisonSocial
     */ 
    public function setRaisonSocial($raisonSocial)
    {
        $this->raisonSocial = $raisonSocial;
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
     * Get the value of numero
     */ 
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     */ 
    public function setNumero($numero)
    {
        $this->numero = $numero;
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
     * Get the value of clientPhysiques
     */ 
    public function getClientPhysiques()
    {
        return $this->clientPhysiques;
    }

    /**
     * Set the value of clientPhysiques
     */ 
    public function setClientPhysiques($clientPhysiques)
    {
        $this->clientPhysiques = $clientPhysiques;
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
