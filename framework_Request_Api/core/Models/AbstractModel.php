<?php 
namespace Models;


class AbstractModel{

protected $pdo;
protected string $nomDeLaTable;
public function __construct(){
    $this->pdo = \Database\PdoMySQL::getPdo();

}


    /**
 * retourne un tableau contenant tous les éléments
 * 
 * @return array|bool
 */
public function findAll()
{

        
        $requete = $this->pdo->query("SELECT * FROM {$this->nomDeLaTable}");
        
        $element = $requete->fetchAll(\PDO::FETCH_CLASS,get_class($this));

        return $element;
}




/**
 * retourne un tableau contenant un élément trouvé par son id
 * 
 * @return array|bool
 * @param $id
 */
public function findById($id)
{
        
        $requete = $this->pdo->prepare("SELECT * FROM {$this->nomDeLaTable} WHERE id = :id");
    $requete->execute([
        "id" => $id
    ]);
    $requete->setFetchMode(\PDO::FETCH_CLASS,get_class($this));
   $element = $requete->fetch();
   return $element;
}


/**
* supprime un élément dans la bdd en verifiant son id
* @param int $id
* @return void
*/
public function remove(int $id):void
{
    
    $requeteSupression = $this->pdo->prepare("DELETE FROM {$this->nomDeLaTable} WHERE id = :id");

$requeteSupression->execute([
    "id"=> $id,
    
]);
}

}

?>