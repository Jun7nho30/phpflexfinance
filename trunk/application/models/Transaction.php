<?php 
class Default_Model_Transaction
{
    public 		$id;
	public 		$user_id;
	public 		$account_id;
	public 		$amount;

    protected $_created;
	protected $_userid;
	protected $_mapper;
	public $_explicitType = 'Default_Model_Transaction';

	
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

	public function setDesc($text)
    {
        $this->desc = (string) $text;
        return $this;
    }

    public function getDesc()
    {
        return $this->desc;
    }

	public function setId($id)
    {
        $this->id = (int) $id;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }
	
	public function setAmount($amount)
    {
        $this->amount = (float) $amount;
        return $this;
    }

    public function getAmount()
    {
        return $this->amount;
    }
	
	public function setUserId($id)
    {
        $this->user_id = (int) $id;
        return $this;
    }

    public function getUserId()
    {
        return $this->user_id;
    }	
	
	public function setAccountId($id)
    {
        $this->account_id = (int) $id;
        return $this;
    }

    public function getAccountId()
    {
        return $this->account_id;
    }
	
	public function setMapper($mapper)
    {
        $this->_mapper = $mapper;
        return $this;
    }

    public function getMapper()
    {
        if (null === $this->_mapper) {
            $this->setMapper(new Default_Model_TransactionMapper());
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

    public function fetchAllTrans()
    {
        return $this->getMapper()->fetchAll();
    }

	public function add(Default_Model_VO_Transaction $data)
    {
    	$this->setName($data->name);
    	$this->setDesc($data->desc);
        $this->getMapper()->save($this);
        return $this->fetchAll();		
    }
}