<?php 
namespace Models;

class Home extends AbstractModel
{

    protected string $nomDeLaTable = "nom de la table en question";


    //il nous faut une propriété private, ainsi qu'un getter et un setter
    //pour chaque colonne de la table SQL (pas de setter pour l'id)

    // private $description

    //
    /* public function getDescription(){
    return $this->description;
    } 

    public function setDescription($description)
    {
        $this->description = $description;
    } */






    // du fait d'hériter dela classe AbstractModel, et d'avoir paramétré un nom de table
    //valide, on dispose déja de trois methodes pour intéragir avec la BDD : 

    // findAll(), findById() et delete()

    //pour tout autre requete SQL, il faudra développer ici une nouvelle méthode 
    //(création, modification, recherche par clé étrangère, etc)


    //par exemple je peux creer une méthode save qui va attendre un objet en paramètre
    //public function save(Maclasse $Monobjet){
        //je fais ma requete Insert
        //$sql = $this->pdo->prepare          ce pdo correspond a la propriéte de l'abstractModel qui va chercher la 
        //methode getPdo dans la classe PdoMySql
    //}

}


?>