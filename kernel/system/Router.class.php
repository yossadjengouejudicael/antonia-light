<?php
//    Antonia - Pride to be Cameroonian
//    
//    This file is part of Antonia
//
//    Antonia is a free framework: you can redistribute it and/or modify
//    it under the terms of the GNU General Public License as published by
//    the Free Software Foundation, either version 3 of the License, or
//    (at your option) any later version.
//
//    Antonia is distributed in the hope that it will be useful,
//    but WITHOUT ANY WARRANTY; without even the implied warranty of
//    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//    GNU General Public License for more details.
//
//    You should have received a copy of the GNU General Public License
//    along with Antonia.  If not, see <http://www.gnu.org/licenses/>

/**
 * Router
 *
 * @author Eng. YOSSA DJENGOUE Judicaël (yossadjengoue@gmail.com/judicael.yossa@polytechnique.cm)
 * @phone: (+00237) 679-635-319 / 699-580-614
 * @skype: judicael.yossa
 * @address: Molyko, Buea, South East, Cameroon.
 */
namespace cm\antonia\kernel\system;

use cm\antonia\kernel\system\Route;

class Router {

    protected $routes = array();
    
    public function addRoute(Route $route){
        if(!in_array($route, $this->routes)){
            $this->routes[] = $route;
        }
    }
    
    public function getRoute($url){
        foreach ($this->routes as $route) {
            //*
            if(($varsValues = $route->match($url))!==false){
                // if road has variables
                if($route->hasVars()){
                    $varsNames = $route->getVarsNames();
                    $listVars = array();
                    // one create a new key-value array
                    foreach ($varsValues as $key => $match) {
                        if($key!==0){
                            $listVars[$varsNames[$key-1]] = $match;
                        }
                    }
                    // one assign this table of variables to the road
                    $route->setVars($listVars);
                }
                return $route;
            }
        }
        return null;
    }
}
