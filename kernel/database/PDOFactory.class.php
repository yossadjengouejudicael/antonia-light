<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace library;

/**
 * Description of PDOFactory
 *
 * @author root
 */
class PDOFactory {

    public static function getMysqlConnection(){
        $db = new \PDO('mysql:host=localhost;dbname=test', 'root', '');
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}
