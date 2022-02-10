<?php

namespace App;

class Response
{
    /**
     * renvoie du contenu serialisé en JSON en tant que réponse
     * @param $trucARenvoyerAuClient
     * @return void
     */
    public static function json($trucARenvoyerAuClient,?string $methodeSpe = null)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        if($methodeSpe == "delete"){
            header('Access-Control-Allow-Methods: DELETE');
        }
        if($methodeSpe == "put"){
            header('Access-Control-Allow-Methods: PUT');
        }

        echo json_encode($trucARenvoyerAuClient);
    }


    /**
     *
     *  redirige vers l'url passée en parametre
     *
     * @param string $url
     *
     * @return void
     *
     */


    public static function redirect(?array $parametres=null): void
    {


        $url = "index.php";
        if($parametres){
            $url = "?";


            foreach($parametres as $cle => $valeur){

                $nouveauParamGet = $cle."=".$valeur."&";

                $url.=$nouveauParamGet;

            }

            header("Location: ".$url);
            exit();
        }


    }



}