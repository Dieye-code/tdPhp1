<?php

namespace model;

class TypeClientDb extends Model 
{
    public function listeTypeClients(){
        return $this->executeSelect('SELECT * FROM typeClient')->fetchAll();
    }
}
