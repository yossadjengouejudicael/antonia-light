<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace library;
/**
 * Description of Managers
 *
 * @author root
 */
class Managers {

    protected $api = null;
    
    protected $dao = null;
    
    protected $managers = array();
    
    public function __construct($api, $dao) {
        $this->api;
        $this->dao;
    }
    
    public function getManagerOf($module){
        if(!is_string($module) || empty($module)){
            throw new \RuntimeException('specified module is invalid');
        }
        if(!isset($this->managers[$module])){
            $aManager = '/library/models/'.$module.'Manager_'.$this->api;
            $this->managers[$module] = new $aManager($this->dao);
        }
        return $this->managers[$module];
    }
}
