<?php



class Database{

private $host= "localhost";
private $dbname = "saveurs_et_delices";
private $username = "root";
<<<<<<< HEAD
private $password = "";
=======
private $password = "root";
>>>>>>> 2a5e71f (add all files from walid)

public function connect(){
    try{
        $pdo = new PDO(
            "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
            $this->username,
            $this->password
        );

        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $pdo;

    }catch(PDOException $e){

    die("Erreur connexion :" . $e->getMessage());

    }
}
<<<<<<< HEAD

=======
>>>>>>> 2a5e71f (add all files from walid)
}
?>