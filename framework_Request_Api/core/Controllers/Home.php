<?php 

namespace Controllers;

class Home extends AbstractController
{
    protected $defaultModelName =\Models\Home::class;

   /**
     * 
     * affiche l'accueil
     * 
     * pour déclencher un appel à cette methode, le Kernel est conçu pour surveiller
     * deux parametres dans l'url :   'type'  et 'action' pour le controller et la methode
     * 
     * ici, pour cette methode index, on obtiendra 'type'='home' et 'action'='index'
     * 
     * et donc l'url : 'index.php?type=home&action=index'
     * 
     * 
     * 
     */
    public function index(){



        // si besoin d'interagir avec la BDD, on peut utiliser le modele par defaut
        //du controller, et donc faire une requete sur sa table SQL par defaut
        // directement depuis cette classe : 

        //   $elements = $this->defaultModel->findAll()


        // a besoin de deux parametres : un nom de dossier/template (string),
        // et un tableau d'options contenant au moins le titre de la page
        //et egalement un index et valeur pour chaque variable que le template exploite

        //on peut donc créer un dossier/nomdetemplate.html.php dans le dossier template
        // toute variable passée au tableau d'options de $this->render
        //sera disponible dans ce template


        //pour la création par exemple, je créer une méthode new qui va faire ses vérifs de post et de get pour vérifier
        //si nous l'utilisateur a soumis le formulaire ou pas encor
        //si il l'a soumis je créer une nouvelle instance de mon objet et je set ses valeurs avec les Setteur
        //j'appelle $this->defaultModel->save($monnouvelobjet que je viens d'instancier)
     

        

        return $this->render("home/index", [
            "pageTitle"=>"page d'acceuil"
            // "elements" => $elements
        ]);


    }


}



?>