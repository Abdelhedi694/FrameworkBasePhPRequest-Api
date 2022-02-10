<?php 
namespace Models;


class Velo extends AbstractModel implements \JsonSerializable
{

    protected string $nomDeLaTable = "velos";
    private int $id;
    private string $name;
    private string $description;
    private string $image;
    private int $price;
    private int $userId;

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }


    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description;
    }


    public function getImage(){
        return $this->image;
    }

    public function setImage($image){
        $this->image = $image;
    }


    public function getprice(){
        return $this->price;
    }

    public function setPrice($price){
        $this->price = $price;
    }


    public function getId(){
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * ajoute un nouveau velo dans la BDD
     * @param Velo $velo
     * 
     * @return void
     */                     
    public function save(Velo $velo):void
    {
            $sql = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable} 
             (name, description, image, price) VALUES (:name, :description, :image, :price)
            ");

            $sql->execute([
                'name'=>$velo->name,
                'description'=>$velo->description,
                'image'=>$velo->image,
                "price"=>$velo->price
            ]);

    }


    /**
     * Modifie un velo 
     * @param Velo $velo
     * 
     */
    public function update(Velo $velo){

        $sql = $this->pdo->prepare("UPDATE {$this->nomDeLaTable} SET name = :name, description=:description, image=:image, price=:price WHERE id = :id");
        $sql->execute([
            'name'=>$velo->name,
            'description'=>$velo->description,
            'image'=>$velo->image,
            'price'=>$velo->price,
            'id'=>$velo->id
        ]);

    }


    public function jsonSerialize()
    {
        return [
            "id"=>$this->id,
            "nom"=>$this->name,
            "description"=>$this->description,
            "prix"=>$this->price,
            "image"=>$this->image,
            "avis"=>$this->getAvis()
        ];
    }

    public function getAvis(){

        $modelAvis = new \Models\Avis();
        return $modelAvis->findAllByVelo($this);
    }

    /**
     * @return User
     */
    public function getAuthor():User
    {
        $modelUser = new \Models\User();
        return $modelUser->findById($this->user_id);

    }


}


?>