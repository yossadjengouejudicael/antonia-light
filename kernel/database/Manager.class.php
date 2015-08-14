<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace library;
/**
 * Description of Manager
 *
 * @author root
 */
abstract class Manager {

    protected $dao;
    
    public function __construct($dao) {
        $this->dao = $dao;
    }
}
