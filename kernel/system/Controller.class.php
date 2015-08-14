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
 * Application
 *
 * @author Eng. YOSSA DJENGOUE Judicaël (yossadjengoue@gmail.com/judicael.yossa@polytechnique.cm)
 * @phone: (+00237) 679-635-319 / 699-580-614
 * @skype: judicael.yossa
 * @address: Molyko, Buea, South East, Cameroon.
 */
namespace cm\antonia\kernel\system;

use cm\antonia\kernel\system\ApplicationComponent;

class Controller extends ApplicationComponent{

    protected $action = '';
    
    protected $module = '';
    
    public function __construct(Application $app, $module, $action) {
        parent::__construct($app);
        $this->setAction($action);
        $this->setModule($module);
    }

    public function execute(){
        if(empty($this->action)){
            echo 'yes';
            exit();
            $this->action = 'index';
        }
        $method = 'execute'.ucfirst($this->action);
        if(!is_callable(array($this, $method))){
            throw new \RuntimeException('action '.$this->action.' is not defined in'
                    . 'this module');
        }
        $this->$method($this->app->getRequest());
    }

    public function setAction($action) {
        if(!is_string($action) || empty($action)){
            throw new \InvalidArgumentException('action must be a valid string');
        }
        $this->action = $action;
    }

    public function setModule($module) {
        if(!is_string($module) || empty($module)){
            throw new \InvalidArgumentException('module must be a valid string');
        }
        $this->module = $module;
    }

}
