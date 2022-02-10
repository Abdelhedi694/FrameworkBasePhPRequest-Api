<?php 
namespace Models;





class Avis extends AbstractModel implements \JsonSerializable
{

    protected string $nomDeLaTable = "avis";
    private int $id;
    private int $user_id;
    private string $content;
    private int $velo_id;


    public function getContent(){
        return $this->content;
    }

    public function setcontent($content){
        $this->content = $content;
    }

    public function getId(){
        return $this->id;
    }

    public function getVeloId(){
        return $this->velo_id;
    }

    public function setVeloId($veloId){
        $this->velo_id = $veloId;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }


    /**
 * retourne un tableau d'avis'trouvé avec l'id du vélo associé
 * @param int $veloId
 * @return array|bool
 */
public function findAllByVelo(Velo $velo){
    
    $requete = $this->pdo->prepare("SELECT * FROM {$this->nomDeLaTable} WHERE velo_id=:idVelo");
    $requete->execute([
    "idVelo"=> $velo->getId()
    ]);
    $avis = $requete->fetchAll(\PDO::FETCH_CLASS,get_class($this));
    return $avis;
}

 /**
     * ajoute un nouveau avis dans la BDD
     * @param Avis $avis
     * 
     * @return void
     */                     
    public function save(Avis $avis):void
    {
            $sql = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable} 
             (user_id, content, velo_id) VALUES (:user_id,:content,:velo_id)
            ");

            $sql->execute([
                'user_id'=>$avis->user_id,
                'content'=>$avis->content,
                'velo_id'=>$avis->velo_id
            ]);

    }

    /**
     * Modifie un avis 
     * @param Avis $avis
     * 
     */
    public function update(Avis $avis){

        $sql = $this->pdo->prepare("UPDATE {$this->nomDeLaTable} SET author=:author, content=:content WHERE id = :id");
        $sql->execute([
            'author'=>$avis->author,
            'content'=>$avis->content,
            'id'=>$avis->id
            
        ]);

    }

    /**
     * @return User
     */
    public function getAuthor():User
    {
        $modelUser = new \Models\User();
        return $modelUser->findById($this->user_id);

    }


    public function jsonSerialize()
    {
        return [
            "id"=>$this->id,
            "auteur"=>$this->getAuthor(),
            "veloId"=>$this->velo_id,
            "content"=>$this->content
        ];
    }
}


?>