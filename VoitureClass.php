<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of VoitureClass
 *
 * @author thomas
 */
include_once 'VehiculeClass.php';
class VoitureClass extends VehiculeClass {
    
    protected $nbPlaces = 4;
    
    public $typeVolant;
    //put your code here
    protected $motorisation = 'thermique';
    
}
