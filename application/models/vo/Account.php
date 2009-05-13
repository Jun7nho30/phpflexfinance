<?php 
class Default_VO_Model_Account
{
     public $id;
     public $name;
     
     public function __construct($data = null)
     {
         if ($data != null) {
             $this->id    = $data['id'];
             $this->name  = $data['name'];
         }
     }
}
