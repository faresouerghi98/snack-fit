<?php

class Evenement  
{
    public $id;
    public $nom;
    public $descp;
    public $lieu;
    public $dated;
    public $datef;
    public $image;
    public $nb_place;
    public $prix;

    public function __construct($id,$nom,$descp,$lieu,$dated,$datef,$image,$nb_place,$prix) {
        $this->id=$id;
        $this->nom=$nom;
        $this->descp=$descp;
        $this->lieu=$lieu;
        $this->dated=$dated;
        $this->datef=$datef;
        $this->image=$image;
        $this->nb_place=$nb_place;
        $this->prix=$prix;
    }
    
}
