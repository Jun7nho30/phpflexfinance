<?php 

class Default_Model_Vo_Account
//class AccountVO
{
     public $id;
     public $name;
     public $desc;     
     
     public function __construct($data = null)
     {
         if ($data != null) {
             $this->id    = $data['id'];
             $this->name  = $data['name'];
             $this->desc  = $data['desc'];
         }
     }
}
