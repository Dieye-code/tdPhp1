<?php

class TypeCompteDb extends Model 
{
    public function listeTypeComptes(){
        return $this->executeSelect('SELECT * FROM typeCompte')->fetchAll();
    }
}