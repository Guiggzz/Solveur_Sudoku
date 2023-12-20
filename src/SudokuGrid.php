<?php

class SudokuGrid implements GridInterface
{
    public array $data;

    //! Methode loadFromFile qui permet de charger le sudoku et de le décoder

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

    //! Methode __construct qui perme d'instancier data pour pouvoir le réutiliser ailleurs

    public function __construct(array $data){
        $this->data = $data;
    }

    //! Methode get qui permet de lire une valeur à l'index donné

    public function get(int $rowIndex, int $columnIndex): int{
        $cell = $this->data[$rowIndex][$columnIndex];
        return $cell;
    }

    //! Methode set qui perme de mettre une valeur donnée à un endroit donné

    public function set(int $rowIndex, int $columnIndex, int $value): void{
        $this->data[$rowIndex][$columnIndex] = $value;
    }

    //! Methode row qui permet de lire les données d'une ligne

    public function row(int $rowIndex): array{
        foreach($this->data[$rowIndex] as $Values ){
            $row_val_r[] = $Values;
        }
        return $row_val_r;
    }

    //! Methode column qui permet de lire les données d'une colonne

    public function column(int $columnIndex): array{
        foreach($this->data[$columnIndex] as $Values ){
            $row_val_r[] = $Values;
        }
        return $row_val_r;
    }



}
