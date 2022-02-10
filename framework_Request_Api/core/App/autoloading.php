<?php 
spl_autoload_register(

    function($nomDeClasseEnQuestion){

        $nomDeClasseEnQuestion = str_replace("\\" , "/", $nomDeClasseEnQuestion);

        require_once "core/{$nomDeClasseEnQuestion}.php";

    }

)

?>