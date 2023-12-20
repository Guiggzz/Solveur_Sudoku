<?php

class SudokuGrid implements GridInterface
{
    public array $data;
    
    public static function loadFromFile($filepath): ?SudokuGrid{
        
        $contenu_fichier = file_get_contents($filepath);
        $data = json_decode($contenu_fichier, true);
        if ($data === null) {
           echo "Erreur lors du décodage du fichier JSON.";
           return null;
        } 
        else {
            return new SudokuGrid($data);
        }

    }

    public function __construct(array $data){
        $this->data = $data;
    }


}
