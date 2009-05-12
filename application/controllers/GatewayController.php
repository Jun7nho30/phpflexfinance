<?php

class GatewayController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
		$server = new Zend_Amf_Server();
		$server->setClass('Default_Model_Account'); 
		$server->setClass('Default_Model_HelloWorld');
		
		$server->setClassMap('AccountVO', 'Default_Model_Account');
		
		echo $server->handle(); 
    }


}

