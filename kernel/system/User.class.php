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
 * User
 *
 * @author Eng. YOSSA DJENGOUE Judicaël (yossadjengoue@gmail.com/judicael.yossa@polytechnique.cm)
 * @phone: (+00237) 679-635-319 / 699-580-614
 * @skype: judicael.yossa
 * @address: Molyko, Buea, South East, Cameroon.
 */
namespace cm\antonia\kernel\system;

use cm\antonia\kernel\system\ApplicationComponent;

class User extends ApplicationComponent{

    public function __construct($app) {
        parent::__construct($app);
    }
    
    public function getAttribute($attribute) {
        return isset($_SESSION[$attribute]) ? $_SESSION[$attribute] : null;
    }
    
    public function getFlash() {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    
    public function hasFlash(){
        return isset($_SESSION['flash']);
    }
    
    public function isAuthenticated() {
        return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
    }
    
    public function setAttribute($key, $value) {
        $_SESSION[$key] = $value;
    }
    
    public function setAuthenticated($authenticated = true) {
        if(!is_bool($authenticated)){
            throw new \InvalidArgumentException('The value specified to '
                    . 'User::setAuthenticated must be a boolean');
        }
        $_SESSION['auth'] = $authenticated;
    }
    
    public function setFlash($value) {
        $_SESSION['flash'] = $value;
    }
}
