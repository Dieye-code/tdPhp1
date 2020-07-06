<?php


class TypeFraisDb extends Model 
{
    public function listeTypesFrais(){
        return $this->executeSelect('SELECT * FROM typeFrais')->fetchAll();
    }

    public  function getFrais($frais){
        return $this->executeSelect("SELECT * FROM `typeFrais` WHERE libelle='$frais'")->fetch();
    }


}
