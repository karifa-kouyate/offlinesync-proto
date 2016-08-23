<?php

namespace Ecore\DataRepository;
 
class Store {
    private $_data;

    public function __construct(){
    	$this->_data= array();
    }
 
 	public function set($key, $val){
        $this->_data[$key] = $val;
    }

    public function get($key){
        return isset($this->_data[$key]) ? $this->_data[$key] : null;
    }
 
    public function all(){
        return $this->_data;
    }
     
    public function delete($key){
        unset($this->_data[$key]);
    }

    public function clear(){
        $this->_data=array();
    }

}