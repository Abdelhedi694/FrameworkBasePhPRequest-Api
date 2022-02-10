<?php
namespace Models;



class User extends AbstractModel implements \JsonSerializable
{
    protected string $nomDeLaTable = "users";

    protected $id;

    protected $username;

    protected $password;

    protected $email;

    protected $display_name;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT) ;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * @param mixed $display_name
     */
    public function setDisplayName($display_name): void
    {
        $this->display_name = $display_name;
    }


    /**
     * ajoute un nouveau user dans la BDD
     * @param User $user
     *
     * @return void
     */
    public function register(User $user):void
    {
        $sql = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable} 
             (username,password,email,display_name) VALUES (:username,:password,:email,:display_name)
            ");

        $sql->execute([
            "username"=>$user->username,
            "password"=>$user->password,
            "email"=>$user->email,
            "display_name"=>$user->display_name
        ]);

    }

    public function findByUserName($username){
        $sql = $this->pdo->prepare("SELECT * FROM {$this->nomDeLaTable} WHERE username = :username");

        $sql->execute([
            "username"=>$username
        ]);

        $sql->setFetchMode(\PDO::FETCH_CLASS,get_class($this));
        return $sql->fetch();

    }

    public function logIn($password):bool{
    $result = false;

        if (password_verify($password, $this->password))  {
            $_SESSION['user'] = [
                "id"=>$this->id,
                "username"=>$this->username,
                "display_name"=>$this->display_name];
            $result = true;
        }
        return $result;

    }

    public function logOut(){
        session_unset();
    }

    /**
     * @return User|bool
     */
    public static function getUser()
    {

        if (isset($_SESSION['user'])){
            $modelUser = new \Models\User();
            return $modelUser->findById($_SESSION['user']['id']);
        }else{
            return false;
        }


    }

    public function jsonSerialize()
    {
        return [
            "nom"=>$this->getDisplayName()
        ];
    }
}