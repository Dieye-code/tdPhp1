<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as orm;

/**
 * @orm\Entity @orm\Table(name="typeclient")
 */

class TypeClient
{
    /**
     * @orm\id @orm\column(type="integer") @orm\GeneratedValue
     */
    private $id;
    /**
     * @orm\column(type="string", length=100, nullable=true)
     */
    private $libelle;
    /**
     * @orm\OneToMany(targetEntity="ClientPhysique", mappedBy="typeClient")
     **/
    private $clientPhysiques;

    public function __construct()
    {
        $this->clientPhysiques = new ArrayCollection();
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
     * Get the value of libelle
     */ 
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     */ 
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * Get the value of clients
     */ 
    public function getClients()
    {
        return $this->clientPhysiques;
    }

    /**
     * Set the value of clients
     */ 
    public function setClients($clients)
    {
        $this->clientPhysiques = $clients;
    }
}
