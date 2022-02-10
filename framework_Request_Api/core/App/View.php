<?php 
namespace App;

class View{

    /**
 * 
 * genere le rendu d'une page à partie d'un template et des données fournies
 * 
 * @param string $nomDeTemplate
 * @param array $donnees
 * 
 */
public static function render(string $nomDeTemplate,array $donnees):void{



    extract($donnees);

    ob_start();
    
    require_once "templates/{$nomDeTemplate}.html.php";

    $pageContent = ob_get_clean();
    
    ob_start();
    require_once "templates/layout.html.php";
    echo ob_get_clean();

}

}
?>