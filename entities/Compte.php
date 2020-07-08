<?php


use Doctrine\ORM\Mapping as orm;

/**
 * @orm\Entity @orm\Table(name="compte")
 */
class Compte 
{
    /**
     * @orm\id @orm\column(type="integer") @orm\GeneratedValue
     */
    private $id;
    /**
     * @orm\column(type="string", length=100)
     */
    private $numero;
    /**
     * @orm\column(type="string", length=100)
     */
    private $clerib;
    /**
     * @orm\column(type="integer")
     */
    private $solde;
    /**
     * @orm\column(type="string", length=20)
     */
    private $etat;
    /**
     * @orm\column(type="string", length=12, nullable=true)
     */
    private $dateDeboc;
    /**
     * @orm\column(type="string", length=12)
     */
    private $dateCreat;
    /**
     * @orm\column(type="string", length=12, nullable=true)
     */
    private $dateFermetureTemp;
    /**
     * @orm\column(type="string", length=12, nullable=true)
     */
    private $dateReouverture;
    /**
     * @orm\ManyToOne(targetEntity="ClientPhysique", inversedBy="comptes",cascade={"persist"})
     * @orm\JoinColumn(name="idClientPhysique", referencedColumnName="id")
     */
    private $clientPhysique;
    /**
     * @orm\ManyToOne(targetEntity="ClientMoral", inversedBy="comptes",cascade={"persist"})
     * @orm\JoinColumn(name="idClientMoral", referencedColumnName="id")
     */
    private $clientMoral;
    /**
     * @orm\ManyToOne(targetEntity="TypeCompte", inversedBy="comptes",cascade={"persist"})
     * @orm\JoinColumn(name="idTypeCompte", referencedColumnName="id")
     */
    private $typeComptes;


    public function getParam(){
        return [
            'numero'=>$this->numero,
            'cleRib'=>$this->clerib,
            'solde'=> $this->solde,
            'etat'=>$this->etat,
            'dateDebc'=>$this->dateDeboc,
            'dateCreat'=>$this->dateCreat,
            'dateFermetureTemp'=>$this->dateFermetureTemp,
            'dateReouverture'=>$this->dateReouverture,
            'idClientPhysique'=>$this->idClientPhysique,
            'idClientmoral'=>$this->idClientMoral,
            'idtypeCompte'=>$this->idTypeCompte
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
     * Get the value of clerib
     */ 
    public function getClerib()
    {
        return $this->clerib;
    }

    /**
     * Set the value of clerib
     */ 
    public function setClerib($clerib)
    {
        $this->clerib = $clerib;
    }

    /**
     * Get the value of solde
     */ 
    public function getSolde()
    {
        return $this->solde;
    }

    /**
     * Set the value of solde
     */ 
    public function setSolde($solde)
    {
        $this->solde = $solde;
    }

    /**
     * Get the value of etat
     */ 
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set the value of etat
     */ 
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * Get the value of dateDeboc
     */ 
    public function getDateDeboc()
    {
        return $this->dateDeboc;
    }

    /**
     * Set the value of dateDeboc
     */ 
    public function setDateDeboc($dateDeboc)
    {
        $this->dateDeboc = $dateDeboc;
    }

    /**
     * Get the value of dateCreat
     */ 
    public function getDateCreat()
    {
        return $this->dateCreat;
    }

    /**
     * Set the value of dateCreat
     */ 
    public function setDateCreat($dateCreat)
    {
        $this->dateCreat = $dateCreat;
    }

    /**
     * Get the value of dateFermetureTemp
     */ 
    public function getDateFermetureTemp()
    {
        return $this->dateFermetureTemp;
    }

    /**
     * Set the value of dateFermetureTemp
     */ 
    public function setDateFermetureTemp($dateFermetureTemp)
    {
        $this->dateFermetureTemp = $dateFermetureTemp;
    }

    /**
     * Get the value of dateReouverture
     */ 
    public function getDateReouverture()
    {
        return $this->dateReouverture;
    }

    /**
     * Set the value of dateReouverture
     */ 
    public function setDateReouverture($dateReouverture)
    {
        $this->dateReouverture = $dateReouverture;
    }
    

    /**
     * Get the value of clientPhysique
     */ 
    public function getClientPhysique()
    {
        return $this->clientPhysique;
    }

    /**
     * Set the value of clientPhysique
     */ 
    public function setClientPhysique($clientPhysique)
    {
        $this->clientPhysique = $clientPhysique;
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
     * Get the value of typeComptes
     */ 
    public function getTypeComptes()
    {
        return $this->typeComptes;
    }

    /**
     * Set the value of typeComptes
     */ 
    public function setTypeComptes($typeComptes)
    {
        $this->typeComptes = $typeComptes;
    }
}
