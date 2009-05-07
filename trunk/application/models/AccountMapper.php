<?php
class Default_Model_AccountMapper
{
    protected $_dbTable;

    public function setDbTable($dbTable)
    {
    	
        if (is_string($dbTable)) {
        	//print_r(new $dbTable());
			
            $dbTable = new $dbTable();
			//echo "  getDbTable-".$dbTable; 
			//exit;
        }
		
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Default_Model_DbTable_Account');
        }
		
        return $this->_dbTable;
    }

    public function save(Default_Model_Account $account)
    {
        $data = array(
            'name'   => $account->getName(),
            'desc' => $account->getDesc()
        );

        if (null === ($id = $account->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }

    public function find($id, Default_Model_Account $account)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $account->setId($row->id)
                  ->setName($row->name)
                  ->setDesc($row->desc);
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Default_Model_Account();
            $entry->setId($row->id)
                  ->setName($row->name)
                  ->setDesc($row->desc)
                  ->setMapper($this);
            $entries[] = $entry;
        }
        return $entries;
    }
}
