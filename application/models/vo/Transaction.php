<?php 

class Default_Model_Vo_Transaction
{
     public $id;
     public $account_id;
	 public $user_id;
	 public $amount;
     
     public function __construct($data = null)
     {
         if ($data != null) {
             $this->id    		= $data['id'];
             $this->account_id  = $data['account_id'];
			 $this->user_id		= $data['user_id'];
			 $this->amount		= $data['amount'];
         }
     }
}
