<?php

namespace App\Models;

use App\Classes\ActiveRecord;

class User extends ActiveRecord
{

    public $name;
    public  $email; 
    public  $phone;
    public  $country;


    public function __construct(){ 
        parent::__construct();        
        $this->table = "users";
    } 



    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        return $this->name = $name;
    }
}