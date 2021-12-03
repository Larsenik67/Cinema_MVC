<?php

abstract class AbstractEntity {

    protected static function hydrate($data, $object){

        foreach($data as $field => $value){

            $fieldArray = explode("_", $field); //realisateur_ud => ["realisateur", "id"]
            // si je rencontre "id", je suis dans le cas d'une clé étrangère
            if(isset($fieldArray[1]) && $fieldArray[1] == "id") {
                // RealisateurManager
                $managerName = ucfirst($fieldArray[0])."Manager";
                // require_once "model/manager/RealisateurManager.php"
                require_once 
            }
        }
    }
}