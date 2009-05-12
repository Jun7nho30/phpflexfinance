<?php 
class Default_Model_HelloWorld
{
    /**
     * @param  string $name
     * @param  string $greeting
     * @return string
     */
    //public function hello($name, $greeting = 'Hello')
    public function hello($name, $greeting = 'Hello')
    {
        return $greeting . ', ' . $name;
    }
    
	public function say()
    {
        return "HHHHELLOO";
    }
}