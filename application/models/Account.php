<?php 
class Default_Model_Account
{
    protected $_name;
	protected $_desc;
    protected $_created;
    protected $_id;
	protected $_userid;
	protected $_mapper;
	public $_explicitType = 'Default_Model_Account';

	
	public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }
	
	public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid account property');
        }
        $this->$method($value);
    }

    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid account property');
        }
        return $this->$method();
    }

    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }

	public function setName($text)
    {
        $this->_name = (string) $text;
        return $this;
    }

    public function getName()
    {
        return $this->_name;
    }

	public function setDesc($text)
    {
        $this->_desc = (string) $text;
        return $this;
    }

    public function getDesc()
    {
        return $this->_desc;
    }

	public function setId($id)
    {
        $this->_id = (int) $id;
        return $this;
    }

    public function getId()
    {
        return $this->_id;
    }
	
	public function setUserId($id)
    {
        $this->_user_id = (int) $id;
        return $this;
    }

    public function getUserId()
    {
        return $this->_user_id;
    }	
	
	public function setMapper($mapper)
    {
        $this->_mapper = $mapper;
        return $this;
    }

    public function getMapper()
    {
        if (null === $this->_mapper) {
            $this->setMapper(new Default_Model_AccountMapper());
        }
        return $this->_mapper;
    }


	public function save()
    {
        $this->getMapper()->save($this);
    }

    public function find($id)
    {
        $this->getMapper()->find($id, $this);
        return $this;
    }

    public function fetchAll()
    {
        return $this->getMapper()->fetchAll();
    }

	public function getAllAccounts()
   {
      $accounts = array();
      $result = $this->fetchAll();        
      foreach ($result as $row)
      {
         $account 		= new Default_Model_Account();
         $account->id 	= $row->id;
         $account->name = $row->name;
         $account->desc = $row->desc;
         array_push($accounts, $account);
      }    
      return $accounts;        
   }
}