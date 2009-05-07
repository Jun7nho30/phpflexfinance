<?php

class Default_Model_DbTable_Account extends Zend_Db_Table_Abstract
{
    /** Table name */
    protected $_name    = 'accounts';
	protected $_sequence = true;
	
	public function insert(array $data)
    {
        $data['user_id'] = 1;
		try {
 			return parent::insert($data);

} catch (Zend_Exception $e) {
    echo "Caught exception: " . get_class($e) . "\n";
    echo "Message: " . $e->getMessage() . "\n";exit;
    // Other code to recover from the error
}
        
    }
}
