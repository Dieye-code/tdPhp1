<?php

use Doctrine\ORM\Mapping as orm;

/**
 * @orm\Entity @orm\Table(name="typefrais")
 */

class TypeFrais
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
     * @orm\column(type="integer")
     */
    private $montant;


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
     * Get the value of montant
     */ 
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set the value of montant
     */ 
    public function setMontant($montant)
    {
        $this->montant = $montant;
    }
}
