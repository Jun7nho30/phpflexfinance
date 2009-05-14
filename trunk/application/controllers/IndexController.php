<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
		$account = new Default_Model_Transaction();
        print_r($account->fetchAllTrans());
        //$this->view->entries = $account->fetchAll();
    }


}

