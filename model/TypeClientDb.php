<?php

namespace model;

class TypeClientDb extends Model 
{
    public function listeTypeClients(){
        return $this->db->createQuery("SELECT c FROM TypeClient c")
            ->getResult();
    }
    public function getTypeClient($id){
        return $this->db->getRepository('typeclient')->find($id);
    }

    // public function listeTypeClients(){
    //     return $this->executeSelect('SELECT * FROM typeClient')->fetchAll();
    // }
}
