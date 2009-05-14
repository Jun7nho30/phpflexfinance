<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
		$account = new Default_Model_Account();
        //print_r($account->fetchAll());
        $data = array('id'=>1, 'name'=>"ewer", 'desc'=>"desc1");
        
        $accountVO = new Default_Model_Vo_Account($data);
        
        //$r	= new AccountVO();
        $account->add($accountVO);
    }


}

