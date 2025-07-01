<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of UserClass
 *
 * @author thomas
 */
class UserClass {
    
    public $email = NULL;
    
    public $firstName = NULL;
    
    public $lastName = NULL;
    
    public $password = NULL;
    
    public $birthday = NULL;
    
    public function information() {
        echo '<ul>';
        echo '<li>email : ', $this->email,'</li>';
        echo '</ul>';
    }
    
}
