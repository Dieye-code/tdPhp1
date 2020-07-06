<?php


class Model
{
    /**
     * Instance de PDO
     *
     * @var PDO
     */
    private $pdo;

    /**
     * Instance de PDOStatement
     *
     * @var PDOStatement
     */
    private $pdoStatement;

    
    protected function getConnexion()
    {
        if($this->pdo == null){
            try {
                $host = 'mysql:host=localhost;dbname=groupe2BP';
                $this->pdo = new PDO(
                    $host,
                    'root',
                    '',
                    array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)
                );
            } catch (PDOException $ex) {
                die("connexion impossible<br>" . $ex->getMessage());
            }
        }
    }

    protected function prepare($sql){
        try {
            $this->getConnexion();
            $this->pdoStatement = $this->pdo->prepare($sql);
        } catch (\Throwable $th) {
            die('Erreur Prepare requete '.$th->getMessage());
        }
    }

    protected function executePrepareAdd($tab){
        try {
            // var_dump($tab);
            // die;
            if($this->pdoStatement->execute($tab)){
                return $this->pdo->lastInsertId();
            }else{
                return 0;
            }
        } catch (\Throwable $th) {
            die('Erreur executePrepareAdd requete');
        }
    }

    protected function executePrepareMAJ($tab){
        try {
            return $this->pdoStatement->execute($tab);
        } catch (\Throwable $th) {
            die('Erreur executePrepareAdd requete');
        }
    }

    protected function executePrepareSelect($tab){
        try {
            $this->pdoStatement->execute($tab);
            return $this->pdoStatement;
        } catch (\Throwable $th) {
            die('Erreur executePrepareAdd requete');
        }
    }

    protected function executeAdd($sql){
        try {

            $this->getConnexion();
            if($this->pdo->exec($sql)){
                return $this->pdo->lastInsertId($sql);
            }else{
                return 0;
            }
        } catch (\Throwable $th) {
            die('Erreur executePrepareAdd requete');
        }
    }

    protected function executeMAJ($sql){
        try {
            $this->getConnexion();
            return $this->pdo->exec($sql);
        } catch (\Throwable $th) {
            die('Erreur executePrepareAdd requete');
        }
    }

    protected function executeSelect($sql){
        try {
            $this->getConnexion();
            return $this->pdo->query($sql);
        } catch (\Throwable $th) {
            die('Erreur executePrepareAdd requete');
        }
    }
}
