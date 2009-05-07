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

    public function addAction()
    {
		$request = $this->getRequest();
        $form    = new Default_Form_Account();

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $model = new Default_Model_Account($form->getValues());
                $model->save();
                return $this->_helper->redirector('index');
            }
        }

        $this->view->form = $form;

    }


}

