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
 * Route
 *
 * @author Eng. YOSSA DJENGOUE Judicaël (yossadjengoue@gmail.com/judicael.yossa@polytechnique.cm)
 * @phone: (+00237) 679-635-319 / 699-580-614
 * @skype: judicael.yossa
 * @address: Molyko, Buea, South East, Cameroon.
 */
namespace cm\antonia\kernel\system;

class Route {

    protected $action;
    
    protected $module;
    
    protected $url;
    
    protected $varsNames;
    
    protected $vars = array();
    
    function __construct($url, $module, $action, array $varsNames) {
        $this->setAction($action);
        $this->setModule($module);
        $this->setUrl($url);
        $this->setVarsNames($varsNames);
    }

    public function hasVars(){
        return !empty($this->varsNames);
    }
    
    public function match($url){
        if(preg_match('`^'.$this->url.'$`', $url, $matches)){
            return $matches;
        }else{
            return false;
        }
    }
    
    public function getAction() {
        return $this->action;
    }

    public function getModule() {
        return $this->module;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getVarsNames() {
        return $this->varsNames;
    }

    public function getVars() {
        return $this->vars;
    }

    public function setAction($action) {
        if(is_string($action)){
            $this->action = $action;
        }
    }

    public function setModule($module) {
        if(is_string($module)){
            $this->module = $module;
        }       
    }

    public function setUrl($url) {
        if(is_string($url)){
            $this->url = $url;
        }
    }

    public function setVarsNames(array $varsNames) {
        $this->varsNames = $varsNames;
    }

    public function setVars(array $vars) {
        $this->vars = $vars;
    }

    
}
