<?php
namespace App;

class File
{

    private $uploadDirectory;

    private $fileData;

    private $extension;

    private $tempFile;

    private $name;

    private $target;

    private array $validImages = ["image/png", "image/jpeg", "image/jpg", "image/gif"];

    private $mimeType;



    public function __construct($index)
    {
        $this->uploadDirectory = dirname(__DIR__)."/../images/";  //j'indique l'endroit, le path de où stocker ce fichier
        //attention sur les serveurs il y a des permissions a autoriser pour les modif ou lecture sur certains dossiers

        $this->fileData = $_FILES[$index]; //j'indique l'index que je rentrerais dans le param que j'ai utilisé pour cet input

        $this->tempFile = $this->fileData['tmp_name'];  //Nom du fichier dans le repertoire temporaire

        $this->extension = pathinfo($this->fileData['name'], PATHINFO_EXTENSION);//pour ressortir l'extension d'un fichier

        $this->name = uniqid().".".$this->extension;//je créer un nom unique avec la fonction unique qui envoi un chaine de caractère
        //aléatoire et sur laquelle on concatène .etLeNomDeLextension

        $this->target = $this->uploadDirectory . $this->name;//target contient l'endroit ou stocker le fichier avec son nouveau nom
        //unique

        $this->mimeType = $this->fileData['type'];
    }


    public function isImage(){
       return in_array($this->mimeType, $this->validImages);
    }

    public function upload(){

        move_uploaded_file($this->tempFile, $this->target); //cette fonction a besoin de deux paramètres : de ou on part et ou on stock 
        // c'est à dire du nom du fichier 
        //uploadé qui est stocké dans le repertoire tempo a l'index [tmp_name] et en second paramètre l'endroit ou on va stocker ce fichier
    }

    public function getName(){
        return $this->name;
    }


}
