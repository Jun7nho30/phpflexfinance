<?php

class AccountController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
		$account = new Default_Model_Account();
        $this->view->entries = $account->fetchAll();
    }
}