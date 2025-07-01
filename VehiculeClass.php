<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of VehiculeClass
 *
 * @author thomas
 */
class VehiculeClass {
    
    protected $nbPlaces = NULL;
    
    public $nbRoues = NULL;
    
    protected $marque = NULL;
    
    protected $motorisation = NULL;


    public function afficheNombreDePlace() {
        echo $this->nbPlaces;
    }
    
    public function getMarque() {
        return $this->marque;
    }
    
    public function getPlaces() {
        return $this->nbPlaces;
    }
    
    public function informationHtml() {
        ?>
<ul>
    <li>Marque : <?= $this->marque ?></li>
    <li>Nb roue : <?= $this->nbRoues ?></li>
    <li>Motorisation : <?= $this->motorisation ?></li>
    <li>Nb places : <?= $this->nbPlaces ?></li>
</ul>
        <?php
    }
    
}
