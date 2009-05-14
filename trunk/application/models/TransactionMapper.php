<?php
class Default_Model_TransactionMapper
{
    protected $_dbTable;

    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
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
            $this->setDbTable('Default_Model_DbTable_Transaction');
        }
		
        return $this->_dbTable;
    }

    public function save(Default_Model_Transaction $trans)
    {
        $data = array(
            'user_id'   => $trans->getUserId(),
            'account_id'=> $trans->getAccountId(),
			'amount'	=> $trans->getAmount(),
			'user_id' => 1
        );

        if (null === ($id = $account->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }

    public function find($id, Default_Model_Transaction $trans)
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
            $entry = new Default_Model_Transaction();
            $entry->setId($row->id)
                  ->setUserId($row->user_id)
                  ->setAccountId($row->account_id)
				  ->setAmount($row->amount)
                  ->setMapper($this);
            $entries[] = $entry;
        }
        return $entries;
    }
}
