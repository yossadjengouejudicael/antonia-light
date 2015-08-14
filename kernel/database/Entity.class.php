<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace library;

/**
 * Description of Entity
 *
 * @author root
 */
abstract class Entity implements \ArrayAccess{

    protected $errors = array();
    
    protected $id;
    
    public function __construct(array $properties=array()) {
        if(!empty($properties)){
            $this->hydrate($properties);
        }
    }
    
    public function hydrate(array $data){
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);
            if(is_callable(array($this, $method))){
                $this->$method($value);
            }
        }
    }
    
    public function isNew(){
        return empty($this->id);
    }
    
    public function getErrors(){
        return $this->errors;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        if(is_int($id)){
            $this->id = $id;
        }
    }
    public function offsetExists($offset) {
        return isset($this->$offset) && is_callable(array($this,$offset));
    }

    public function offsetGet($offset) {
        if (isset($this->$offset) && is_callable(array($this, $offset)))
        {
            return $this->$offset() ;
        }
    }

    public function offsetSet($offset, $value) {
        $method = 'set'.ucfirst($offset);
        if(isset($this->$offset) && is_callable(array($this, $method))){
            $this->$method($value);
        }
    }

    public function offsetUnset($offset) {
        throw net \Exception('cannot delete any value');
    }

}
