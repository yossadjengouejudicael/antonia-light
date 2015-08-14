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
 * Response
 *
 * @author Eng. YOSSA DJENGOUE Judicaël (yossadjengoue@gmail.com/judicael.yossa@polytechnique.cm)
 * @phone: (+00237) 679-635-319 / 699-580-614
 * @skype: judicael.yossa
 * @address: Molyko, Buea, South East, Cameroon.
 */
namespace cm\antonia\kernel\system;

use cm\antonia\kernel\system\ApplicationComponent;

class Response extends ApplicationComponent{
    
    function __construct(Application $app) {
        parent::__construct($app);
    }
    
    public function addHeader($header){
        header($header);
    }
    
    public function redirect($location){
        header('location: '.$location);
        exit;
    }
    
    public function redirect404($contentFile ='404.php'){
        echo '404';
        exit();
    }
    
    public function setCookie($name, $value = '', $expire = 0, $path = null,
            $domain = null, $secure = false, $httpOnly = true){
        setcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
    }
}
