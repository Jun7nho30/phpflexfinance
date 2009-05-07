<?php

class Default_Form_Account extends Zend_Form
{
    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');

        $this->addElement('text', 'name', array(
            'label'      => 'Account name:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'StringLength',
            )
        ));

        $this->addElement('textarea', 'desc', array(
            'label'      => 'Descriptiom:',
            'required'   => true,
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 20))
                )
        ));
		
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Add New',
        ));

        // And finally add some CSRF protection
        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
    }
}
