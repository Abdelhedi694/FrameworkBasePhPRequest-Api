<?php 
namespace Controllers;


class AbstractController{


    protected object $defaultModel;
    
    protected $defaultModelName;


        public function __construct()
                {
                                    // new \Models\Cocktail()
                $this->defaultModel= new $this->defaultModelName();

                }

        public function redirect(? array $url=null):Response
        {

            return \App\Response::redirect($url);

        }     
        
        public function render(string $nomDeTemplate,array $donnees)
        {

            return \App\View::render($nomDeTemplate, $donnees);

        }

        public function getUser(){
            return \Models\User::getUser();
        }

    public function json($trucARenvoyerAuClient,?string $methodSpe = null){
        return \App\Response::json($trucARenvoyerAuClient, $methodSpe);
    }

    public function get(string $dataType, array $requestBodyParams){
        return \App\Request::get($dataType,$requestBodyParams);
    }

    public function post(string $dataType, array $requestBodyParams){
        return \App\Request::post($dataType,$requestBodyParams);
    }
    public function delete(string $dataType, array $requestBodyParams){
        return \App\Request::delete($dataType,$requestBodyParams);
    }
    public function put(string $dataType, array $requestBodyParams){
        return \App\Request::put($dataType,$requestBodyParams);
    }

}



?>