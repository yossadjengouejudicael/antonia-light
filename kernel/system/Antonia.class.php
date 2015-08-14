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
 * Antonia
 *
 * @author Eng. YOSSA DJENGOUE Judicaël (yossadjengoue@gmail.com/judicael.yossa@polytechnique.cm)
 * @phone: (+00237) 679-635-319 / 699-580-614
 * @skype: judicael.yossa
 * @address: Molyko, Buea, South East, Cameroon.
 */

namespace cm\antonia\kernel\system;

class Antonia {
    
    public static function getAdminPath() {
        return realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'admin');
    }
    
    public static function getModulesPath() {
        return realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'modules');
    }
    
    public static function getWebPath() {
        return realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'web');
    }
    
    public static function getLibPath(){
        return realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'lib');
    }
    
    public static function getLogPath(){
        return realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'log');
    }
    
    public static function getKernelPath(){
        return realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'kernel');
    }
    
    public static function getConfigPath(){
        return realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'config');
    }
    
    public static function getErrorPath(){
        return realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'error');
    }
    
    public static function getRootPath(){
        return realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..');
    }
}
