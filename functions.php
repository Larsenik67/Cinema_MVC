<?php
//bonus : trouver où faire cette fonction pour pouvoir supprimer ce fichier ensuite !!!
    function getFullQtt(): int
    {
        if(isset($_SESSION['films']) && !empty($_SESSION['films'])){
            return array_reduce($_SESSION["films"], function($acc, $prod){
                return $acc + $prod["qtt"];
            }, 0);
        }
        else return 0;
    }

  
    

    
