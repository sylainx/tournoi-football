<?php


class Equipe{
    private $nom;
    private $logo;
    private $but=0;
    private $point=0,$mj=0,$mg=0,$mn=0,$mp=0,$bc=0,$diff=0;

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
    
    public function getMj(){
        return $this->mj;
    }
    
    public function getMg(){
        return $this->mg;
    }
    
    public function getMn(){
        return $this->mn;
    }
    
    public function getMp(){
        return $this->mp;
    }
    
    public function getBc(){
        return $this->bc;
    }
    
    public function getDiff(){
        return $this->diff;
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
      
    public function setMj($mj){
        return $this->mj = $mj;
    }
    
    public function setMg($mg){
        return $this->mg = $mg;
    }
    
    public function setMn($mn){
        return $this->mn = $mn;
    }
    
    public function setMp($mp){
        return $this->mp = $mp;
    }
    
    public function setBc($bc){
        return $this->bc = $bc;
    }
    
    public function setDiff($diff){
        return $this->diff = $diff;
    }


}

?>