<?php

namespace Controllers;

class Message extends AbstractController
{
    protected $defaultModelName =\Models\Message::class;

    public function indexApi(){
        header('Access-Control-Allow-Origin: *');
        echo json_encode($this->defaultModel->findAll());
    }

public function newApi(){


    $author = null;
    $content = null;

    $corpsRequete = file_get_contents('php://input');
    $valeur = json_decode($corpsRequete, true);

    if(!empty($valeur['author'])){$author = htmlspecialchars($valeur['author']);}
    if(!empty($valeur['content'])){$content = htmlspecialchars($valeur['content']);}
    if ($author && $content){

        $message = new \Models\Message();
        $message->setAuthor($author);
        $message->setContent($content);
        $this->defaultModel->save($message);


        return $this->json("ok");
    }else{
        return $this->json("none");
    }


}


    /**
     * supprime un velo par son id dans la bdd
     *
     *
     */
    public function deleteApi(){



        $request = $this->delete('json', ['id'=>'number']);

        if (!$request) {
            return $this->json("pas d'id", "delete");

        }


        $message = $this->defaultModel->findById($request['id']);

        if (!$message) {
            return $this->json("pas de velo", "delete");
        }

        $this->defaultModel->remove($request['id']);
        return $this->json("velo supprimé", "delete");

    }

}