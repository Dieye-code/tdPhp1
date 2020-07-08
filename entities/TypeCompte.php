<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as orm;

/**
 * @orm\Entity @orm\Table(name="typecompte")
 */

class TypeCompte 
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
     * @orm\OneToMany(targetEntity="Compte", mappedBy="typeCompte")
     **/
    private $comptes;

    public function __construct()
    {
        $this->comptes = new ArrayCollection();
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
