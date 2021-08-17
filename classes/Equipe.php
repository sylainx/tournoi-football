<?php


class Equipe{
    private $nom;
    private $logo;
    private $point=0;
    private $but=0;

    // --------- constructeurs --------------
    
    // public function __construct(){  }

    public function __construct($nom,$logo){
        $this->nom=$nom;
        $this->logo=$logo;
    }

    // ------- getters
    public function getNom(){
        return $this->nom;
    }
    
    public function getLogo(){
        return $this->logo;
    }

    public function getPoint(){
        return $this->point;
    }
    
    public function getBut(){
        return $this->but;
    }
    
    
    // ------- setters
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setLogo($logo){
        $this->logo = $logo;
    }

    public function setPoint($point){
        $this->point = $point;
    }
    
    public function setBut($but){
        $this->but = $but;
    }
    

}

?>