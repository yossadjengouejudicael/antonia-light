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
 * Request
 *
 * @author Eng. YOSSA DJENGOUE Judicaël (yossadjengoue@gmail.com/judicael.yossa@polytechnique.cm)
 * @phone: (+00237) 679-635-319 / 699-580-614
 * @skype: judicael.yossa
 * @address: Molyko, Buea, South East, Cameroon.
 */
namespace cm\antonia\kernel\system;

use cm\antonia\kernel\system\ApplicationComponent;

class Request extends ApplicationComponent{
    
    const REQUEST_METHOD = 'REQUEST_METHOD';
    
    const REQUEST_URI = 'REQUEST_URI';
    
    function __construct(Application $app) {
        parent::__construct($app);
    }

    public function cookie($key){
        return $this->hasCookie($key) ? filter_input(INPUT_COOKIE, $key) : null;
    }
    
    public function hasCookie($key){
        return filter_has_var(INPUT_COOKIE, $key);
    }
    
    public function get($key){
        return $this->hasGet($key) ? filter_input(INPUT_GET, $key) : null;
    }
    
    public function hasGet($key){
        return filter_has_var(INPUT_GET, $key);
    }
    
    public function method(){
        return filter_input(INPUT_SERVER, self::REQUEST_METHOD);
    }
    
    public function post($key){
        return $this->hasPost($key) ? filter_input(INPUT_POST, $key) : null;
    }
    
    public function hasPost($key){
        return filter_has_var(INPUT_POST, $key);
    }
    
    public function uri(){
        return filter_input(INPUT_SERVER, self::REQUEST_URI);
    }
}
